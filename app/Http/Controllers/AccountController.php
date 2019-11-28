<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\User;
use App\Mail\ConfirmUser;
use App\Mail\RegisterUser;
use App\Confirm;

class AccountController extends Controller
{
    //
    public function __construct() {
        $this->middleware('guest')->except('logout');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function getLogin() {
        return view('account.login');
    }

    public function getRegister() {
        return view('account.register');
    }

    public function postRegister(Request $request) {
        $rules = [
            'name'          => 'required|min:1',
            'password'      => 'required|min:6',
            'repassword'   => 'required|min:6',
            'phone'         => 'required|regex:/(0)[0-9]{9}/',
            'email'         => 'required|email'
        ];
        $messages = [
            'email.required'    => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'name.required'     => 'Không được để trống',
            'repassword.required'      => 'Không được để trống',
            'phone.required'        => 'Không được để trống',
            'phone.regex' => 'Số chứng minh thư à?',
            'name.min'              => 'Tên chứa ít nhất 3 ký tự'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where('email', '=', $email)->get();
            if(count($user)) {
                $errors = new MessageBag(['errorComfirmEmail' => 'Email đã được sử dụng']);
                return redirect('/register')->withInput()->withErrors($errors);
            }
            if($request->password != $request->repassword){
                $err = new MessageBag(['errorPassword' => 'Mật khẩu không khớp']);
                return redirect('/register')->withInput()->withErrors($err);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email=$request->email;
            $user->password= Hash::make($request->password);
            $user->phone= $request->phone;
            $user->level= 0;

            $user->save();

            $code = new Confirm();
            $code->user_id= $user->id;
            $code_confirm= str_random(50);
            $code->code= $code_confirm;
            $code->status=0;
            $code->save();

            Mail::to($request->email)->send(new ConfirmUser($code_confirm, $user->name));
            Auth::logout();
            return redirect('/confirm');
        }
        return redirect('/');
    }

    public function postLogin(Request $request) {
        // return $request->password;
        $rules = [
    		'email' => 'required|min:6',
    		'password' => 'required|min:6'
    	];

    	$messages = [
    		'email.required'  => 'Email không được để trống',
    		'email.min'		 => 'Email chứa ít nhất 6 ký tự', 
    		'password.required' => 'Mật khẩu không được để trống',
    		'password.min'		=> 'Mật khẩu phải chứa ít nhất 6 ký tự'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
        }
        
    	$email = $request->input('email');
    	$password = $request->input('password');

    	if(Auth::attempt(['email' => $email, 'password' => $password, 'level' => 2])){
    		return redirect('/index');
    	}else if(Auth::attempt(['email' => $email, 'password' => $password,'level' => 1])){
            
    		return redirect('/');
    	}else{
    		$errors = new MessageBag(['errorLogin' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
    		return redirect()->back()->withErrors($errors);
    	}
    }

    public function confirm($code)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time= time();
        $codeUser= Confirm::where('code', $code)->get();

        if(count($codeUser)!=0){
            $codeUser =  $codeUser[0];
            // $timeCreate = strtotime($codeUser['create_at']);
            // return $time - strtotime($codeUser['created_at']);
            if($time - strtotime($codeUser['created_at']) > 600){
                Confirm::find($codeUser->id)->delete();
                return redirect('/login');
            }
            else{
                if($codeUser['status'] == 0){
                    $user = User::find($codeUser['user_id']);
                    $user->level = 1;
                    $user->save();
                    $confirm = Confirm::find($codeUser['id']);
                    $confirm->delete();
                    return redirect('/login');
                }
                if($codeUser['status'] == 1){
                    $user= User::find($codeUser['user_id']);
                    return view('account.reset', ['id' => $user->id,'code' => $code]);
                }
            }
        }else{
            return redirect('/');
        }
    }

    public function getForget() {
        return view('account.forget');
    }
    public function postForget(Request $request) {
        $email = $request->email;
        $codeUser = User::where('email', $email)->get();
        // return $codeUser;
        if(count($codeUser) !=0 ){
            $codeUser=  $codeUser[0];
            $code = new Confirm();
            $code->user_id = $codeUser['id'];
            $code_confirm = str_random(50);
            $code->status = 1;
            $code->code = $code_confirm;
            $code->save();

            Mail::to($request->email)->send(new RegisterUser($code_confirm, $codeUser['name']));
            return redirect('/confirm');
        }else{
            $errorComfirmEmail = new MessageBag(['errorComfirmEmail' => 'Không tìm thấy tài khoản!']);
            return redirect()->back()->withInput()->withErrors($errorComfirmEmail);
        }
    }

    public function postReset(Request $request) {
        // return $request->password.$request->rePassword;
        $rules = [
            'password'      => 'required|min:6',
            'rePassword'   => 'required|min:6',
        ];
        $messages = [
            
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'rePassword.required'      => 'Không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if($request->password != $request->rePassword){
                    $err = new MessageBag(['errorPassword' => 'Mật khẩu không khớp']);
                    return redirect()->back()->withErrors($err);
                }
            $c = Confirm::where('code', $request->code)->get();

            if(count($c)!=0){
                $c = $c[0];
                $user= User::find($request->id);
                $user->password= Hash::make($request->password);
                $user->save();
                $cD= Confirm::find($c['id']);
                $cD->delete();
            }
            return redirect('/login');
        }
        return redirect('/register');
    }
}
