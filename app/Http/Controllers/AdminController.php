<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Category;
use App\Fk_file_project;
use App\Fk_skill_user;
use App\Project;
use App\RequestTable;
use App\Skill;
use App\User;
use App\File;
use App\Comment;
use App\Notify;
use App\Email;
use Mail;

use App\Mail\ConfirmUser;
use App\Mail\RegisterUser;
use App\Mail\SubscribeUser;

class AdminController extends Controller
{
    //
    public function __construct()
	{
    	$this->middleware('admin');
      date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    public function index()
    {   
        $project = Project::count();
        $user = User::count();
        $comment = Comment::count();
        $email = Email::count();

        return view('admin.index', compact('project', 'user', 'comment', 'email'));
    }
    public function getProject()
    {
        return view('admin.project');
    }
    public function getCategory()
    {
        return view('admin.category');
    }
    public function getUser()
    {
        return view('admin.user');
    }
    public function getComment()
    {
        return view('admin.comment');
    }
    public function getExtension()
    {
        return "Hệ thống đang phát triển, quay lại sau!";
        // return view('admin.extension');
    }

    public function getDataProject() {
        $projects = Project::all();
        foreach($projects as $project) {
            $user = User::find($project->idUser);
            $project->user = $user;
            $project->nameUser = $user->name;
            if($project->status === 'start') {
                $project->status = "Bắt đầu";
            }elseif($project->status === 'active') {
                $project->status = "Đang thực hiện";
            }else {
                $project->status = "Hoàn thành";
            }
            $project->skills = json_decode($project->skills);
            $project->skills = implode($project->skills, ', ');
        }
        return $projects;
    }

    public function deleteProject(Request $request)
    {
        $project = Project::find($request->id);
        $files = File::where('idProject', $project->id)->get();
        foreach($files as $file) {
            Storage::delete($file->destination);
            File::find($file->id)->delete();
        }
        $project->delete();
        return 1;
    }

    public function getDataCategory()
    {
        return Category::all();
    }
    public function editDataCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->content = $request->content;
        $category->save();
        return $category;
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);

        $projects = DB::table('projects')
        ->where('idCategory', $category->id)
        ->get();

        foreach($projects as $p) {
            $project = Project::find($p->id);
            $files = File::where('idProject', $project->id)->get();
            foreach($files as $file) {
                Storage::delete($file->destination);
                File::find($file->id)->delete();
            }
            $project->delete();
        }

        $category->delete();
        return 1;
    }
    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->content = $request->content;
        $category->save();

        return $category;
    }
    public function getDataUser()
    {
        $users = User::all();
        foreach($users as $user) {
            $user->projects = DB::table('projects')->where('idUser', $user->id)->get();
        }
        return $users;

    }
    public function editDataUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->level = $request->level;
        $user->save();
        return 1;
    }
    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);

        $projects = DB::table('projects')
        ->where('idUser', $user->id)
        ->get();

        foreach($projects as $p) {
            $project = Project::find($p->id);
            $files = File::where('idProject', $project->id)->get();
            foreach($files as $file) {
                Storage::delete($file->destination);
                File::find($file->id)->delete();
            }
            $project->delete();
        }

        $user->delete();

        return 1;
    }
    public function getDataComment()
    {
        $comments = Comment::all();
        foreach($comments as $comment) {
            $comment->user = User::find($comment->idUser);
            $comment->project = Project::find($comment->idProject);
        }
        return $comments;
    }
    public function deleteComment(Request $request)
    {   
        $comment = Comment::find($request->id);
        $comment->delete();

        return 1;
    }
    public function getEmail()
    {
        return view('admin.email');
    }
    public function getDataEmail()
    {
        return Email::all();
    }
    public function deleteEmail(Request $request)
    {
        $email = Email::find($request->id);
        $email->delete();
        return 1;
    }
    public function sendMail(Request $request)
    {
        $email = Email::find($request->id);
        Mail::to($email->email)->send(new SubscribeUser());
        return 1;
    }
}
