<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
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
            $user= User::where('email', '=', $email)->get();
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

            // $code = new Confirm();
            // $code->user_id= $user->id;
            // $code_confirm= str_random(50);
            // $code->code= $code_confirm;
            // $code->status=0;
            // $code->save();

            // Mail::to($request->email)->send(new ConfirmUser($code_confirm, $user->name));

            // return redirect('/confirm');
            return $user;
        }
        return redirect('/');
    }
}
