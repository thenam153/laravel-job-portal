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

use App\Events\ApplyProject;
use App\Events\NewRequest;
use App\Events\NewComment;


class ProductController extends Controller
{
    //
    public function index()
    {
        # code...
        $categorys = Category::getCategory();
        $projects = DB::table('projects')
            ->where('status', '<>', 'done')
            ->orderBy('created_at','DESC')
            ->paginate(6);
        foreach($projects as $project) {
            $category = Category::find($project->idCategory);
            $project->nameCategory = $category->name;
            $project->contentCategory = $category->content;
            $project->skills = json_decode($project->skills);
            if(!is_array($project->skills)) $project->skills = [];
            $files = DB::table('files')
            ->where('idProject', $project->id)
            ->get();
            $project->files = array();
            foreach($files as $file) {
                if($file !== null) $project->files[] = $file->content;
            }
            $project->nameCategory = Category::find($project->idCategory)->name;
        }
        return view('product.index', compact(['projects', 'categorys']));
    }
    public function getSearch(Request $request)
    {
        $categorys = Category::getCategory();
        if($request->search != null) {
            $search = $request->search;
            $idCategory = $request->category;
            if($request->category == 0) {
                $projects = DB::table('projects')
                ->where('status', '<>', 'done')
                ->where('projects.name', 'like', '%'.$request->search.'%')
                ->orWhere('projects.content', 'like', '%'.$request->search.'%')
                ->paginate(6);
                foreach($projects as $project) {
                    $category = Category::find($project->idCategory);
                    $project->nameCategory = $category->name;
                    $project->contentCategory = $category->content;
                    $project->skills = json_decode($project->skills);
                    if(!is_array($project->skills)) $project->skills = [];
                    $files = DB::table('files')
                    ->where('idProject', $project->id)
                    ->get();
                    $project->files = array();
                    foreach($files as $file) {
                        if($file !== null) $project->files[] = $file->content;
                    }
                    $project->nameCategory = Category::find($project->idCategory)->name;
                }
                return view('product.search', compact(['projects', 'categorys', 'search', 'idCategory']));
            }else {
                $category = Category::find($request->category);
                if($category == null) return redirect('/index');
                $projects = DB::table('projects')
                ->where('status', '<>', 'done')
                ->where('idCategory', $category->id)
                ->where('projects.name', 'like', '%'.$request->search.'%')
                ->orWhere('projects.content', 'like', '%'.$request->search.'%')
                ->paginate(6);
                foreach($projects as $project) {
                    $category = Category::find($project->idCategory);
                    $project->nameCategory = $category->name;
                    $project->contentCategory = $category->content;
                    $project->skills = json_decode($project->skills);
                    if(!is_array($project->skills)) $project->skills = [];
                    $files = DB::table('files')
                    ->where('idProject', $project->id)
                    ->get();
                    $project->files = array();
                    foreach($files as $file) {
                        if($file !== null) $project->files[] = $file->content;
                    }
                    $project->nameCategory = Category::find($project->idCategory)->name;
                }
                return view('product.search', compact(['projects', 'categorys', 'search', 'idCategory']));
            }
        }else {
            return redirect('/index');
        }
    }
    public function getCategory($id = null)
    {   
        $categorys = Category::getCategory();

        if($id === null) {
            $projects = DB::table('projects')
            ->where('status', '<>', 'done')
            ->orderBy('created_at','DESC')
            ->paginate(6);
        }else {
            $projects = DB::table('projects')
            ->where('status', '<>', 'done')
            ->where('idCategory', $id)
            ->orderBy('created_at','DESC')
            ->paginate(6);
        }

        foreach($projects as $project) {
            $category = Category::find($project->idCategory);
            $project->nameCategory = $category->name;
            $project->contentCategory = $category->content;
            $project->skills = json_decode($project->skills);
            if(!is_array($project->skills)) $project->skills = [];
            $files = DB::table('files')
            ->where('idProject', $project->id)
            ->get();
            $project->files = array();
            foreach($files as $file) {
                if($file !== null) $project->files[] = $file->content;
                
                // $project->files[] = $file->content;
            }
            $project->nameCategory = Category::find($project->idCategory)->name;
        }
        
        return view('product.category', compact(['projects', 'categorys']));
    }
    public function getSubmitProject()
    {   
        if(Auth::user() === null || !Auth::user()->level) {
            return redirect('/login');
        }
        $categorys = Category::all();
        return view('product.postproject', compact('categorys'));
    }
    public function getMyProject()
    {
        $myprojects = DB::table('projects')
        ->where('idUser', Auth::user()->id)
        ->orderBy('created_at','DESC')
        ->paginate(5);
        foreach($myprojects as $project) {
            $category = Category::find($project->idCategory);
            $project->nameCategory = $category->name;
            $project->contentCategory = $category->content;
            $project->skills = json_decode($project->skills);
            if(!is_array($project->skills)) $project->skills = [];
            $files = DB::table('files')
            ->where('idProject', $project->id)
            ->get();
            $project->files = array();
            foreach($files as $file) {
                if($file !== null) $project->files[] = $file->content;
                
                // $project->files[] = $file->content;
            }
            $project->nameCategory = Category::find($project->idCategory)->name;
        }
        return view('product.myproject', compact(['myprojects']));
    }

    public function postCategory()
    {
        return 1;
    }
    public function postSubmitProject(Request $request)
    {
        $project = new Project();
        if(trim($request->name) !== '' && $request->price > 0) {
            $project->idUser = Auth::user()->id;
            $project->name = $request->name;
            $project->content = $request->content;
            $project->idCategory = $request->category;
            $project->price = $request->price;
            $skills = explode(',' , $request->skills);
            $project->skills = json_encode($skills);
            $project->save();
            if($request->file('files')!== null) {
                foreach($request->file('files') as $fileStorage) {
                    if($fileStorage->extension() == 'png'|| $fileStorage->extension() == 'jpeg' || $fileStorage->extension() == 'jpg' || $fileStorage->extension() == 'gif' || $fileStorage->extension() == 'doc' || $fileStorage->extension() == 'docx') {
                        $file = new File();
                        $destination = $fileStorage->store('public');
                        $file->content = Storage::url($destination);
                        $file->destination = $destination;
                        $file->idProject = $project->id;
                        $file->save();

                        // $fk = new Fk_file_project();
                        // $fk->idFile = $file->id;
                        // $fk->idProject = $project->id;
                        // $fk->save();
                    }
                }
            }
            return redirect('/myproject');
        }else{
            $errors = new MessageBag(['error' => 'Đã xảy ra lỗi vui lòng thử lại']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
    public function postMyProject()
    {
        return 1;
    }
    public function deleteMyProject($id)
    {
        # code...
        $project = Project::find($id);
        if(Auth::user()->id === $project->idUser) {
            $files = File::where('idProject', $project->id)->get();
            foreach($files as $file) {
                Storage::delete($file->destination);
                File::find($file->id)->delete();
            }
            $project->delete();
        }
        return redirect('/myproject');
    }
    public function getProject($id)
    {
        if($id === null) return redirect('/index');
        $categorys = Category::getCategory();
        $project = Project::find($id);
        if($project === null) return redirect('/index');
        $category = Category::find($project->idCategory);
        $project->nameCategory = $category->name;
        $project->contentCategory = $category->content;
        $project->skills = json_decode($project->skills);

        if(!is_array($project->skills)) $project->skills = [];

        $files = DB::table('files')
        ->where('idProject', $project->id)
        ->get();
        $project->showFile = false;
        if(count($files) !== 0) {
            $project->file = $files[0]->content;
            $project->showFile = true;
        }
        $requests = DB::table('requests')
        ->where('idUserOwner', Auth::id())
        ->where('idProject', $project->id)
        ->where('status', 'pending')
        ->get();

        foreach($requests as $req) {
            $req->owner = User::find($req->idUserOwner);
            $req->staff = User::find($req->idUserStaff);
            $req->project = Project::find($req->idProject);
        }
        $project->nameCategory = Category::find($project->idCategory)->name;
        $run = DB::table('requests')
        ->where('idProject', $project->id)
        ->where('idUserOwner', Auth::id())
        ->where('status', 'accepted')
        ->first();
        if($run != null) {
            $run->owner = User::find($run->idUserOwner);
            $run->staff = User::find($run->idUserStaff);
            $run->project = Project::find($run->idProject);
        }
        
        return view('product.project', compact('project', 'categorys', 'requests', 'run'));
    }

    public function postApply(Request $request)
    {   
        $project = Project::find($request->idProject);
        if($project->idUser === $request->idUser) return response()->json(['error' => 'duplicate' ]);
        
        $req = DB::table('requests')
        ->where('idProject', $request->idProject)
        ->where('idUserOwner', $project->idUser)
        ->where('idUserStaff', $request->idUser)
        ->first();
        if($req) {
            return response()->json(['warning' => 'Đã yêu cầu!' ]);
        }
        $r = new RequestTable();
        $r->idProject = $request->idProject;
        $r->idUserOwner = $project->idUser;
        $r->idUserStaff = $request->idUser;
        $r->status = 'pending';
        $r->save();
        
        $notify = new Notify();
        $notify->idProject = $request->idProject;
        $notify->idUserOwner = $project->idUser;
        $notify->idUserStaff = $request->idUser;
        $notify->status = 'yet';
        $notify->content= 1;
        $notify->save();
        
        $notifySelf = new Notify();
        $notifySelf->idProject = $request->idProject;
        $notifySelf->idUserOwner = $request->idUser;
        $notifySelf->idUserStaff = $project->idUser;
        $notifySelf->status = 'yet';
        $notifySelf->content= 2;
        $notifySelf->save();

        $amount = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', $project->idUser)
        ->count();

        $amountSelf = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', $request->idUser)
        ->count();

        broadcast(new NewRequest($project->idUser, $amount));
        broadcast(new NewRequest($request->idUser, $amountSelf));
        broadcast(new ApplyProject($project->idUser, $request->idProject, $request->idUser));

        return response()->json(['success' => 'done' ]);
    }
    public function anyRequest(Request $request) {
        if(!Auth::check()) return response()->json(['error' => 'Please login'], 404);
        $amount = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', Auth::id())
        ->count();
        $request = DB::table('requests')
        ->where('idUserOwner', Auth::id())
        ->get();
        
        foreach($request as $r) {
            $r->owner = User::find($r->idUserOwner);
            $r->staff = User::find($r->idUserStaff);
            $r->project = Project::find($r->idProject);
        }
        return response()->json(['request' =>  $request, 'amount' => $amount]);;
    }
    public function getNotify() {
        $notifys = DB::table('notifys')
        ->where('idUserOwner', Auth::id())
        ->orderBy('created_at','DESC')
        ->get();
        foreach($notifys as $req) {
            $req->owner = User::find($req->idUserOwner);
            $req->staff = User::find($req->idUserStaff);
            $req->project = Project::find($req->idProject);
            if($req->status == 'yet') {
                $noti = Notify::find($req->id);
                $noti->status = "done";
                $noti->save();
                $req->seen = false;
            }else {
                $req->seen = true; 
            }
        }
        return view('product.notify', compact('notifys'));
    }
    public function getReceived()
    {
        $requests = DB::table('requests')
        ->where('idUserStaff', Auth::id())
        ->orderBy('created_at','DESC')
        ->get();
        $projects = [];
        foreach($requests as $req) {
            $project = Project::find($req->idProject);
            $category = Category::find($project->idCategory);
            $project->nameCategory = $category->name;
            $project->contentCategory = $category->content;
            $project->skills = json_decode($project->skills);
            if(!is_array($project->skills)) $project->skills = [];
            $files = DB::table('files')
            ->where('idProject', $project->id)
            ->get();
            $project['file'] = null;

            foreach($files as $key => $file) {
                if($file !== null) $project['file'] = $file->content;
            break;
                
                // $project->files[] = $file->content;
            }
            $project->statusOfRequest = $req->status;
            $projects[] = $project;
        }
        return view('product.received', compact('projects'));
    }
    public function postReceived() {
    }
    public function postResponseRequest(Request $request)
    {
        $req = RequestTable::find($request->id);
        if($req->idUserOwner != Auth::id()) {
            return response()->json(['error' => 'Sai hết rồi'], 404);
        }
        $req->status = $request->status;
        $req->save();

        $notify = new Notify();
        $notify->idProject = $req->idProject;
        $notify->idUserOwner = $req->idUserStaff;
        $notify->idUserStaff = $req->idUserOwner;
        $notify->status = 'yet';
        if($req->status == 'accepted') {
            $notify->content= 3;
        }else {
            $notify->content= 4;
        }
        $notify->save();

        $notifySelf = new Notify();
        $notifySelf->idProject = $req->idProject;
        $notifySelf->idUserOwner = $req->idUserOwner;
        $notifySelf->idUserStaff = $req->idUserStaff;
        $notifySelf->status = 'yet';
        if($req->status == 'accepted') {
            $notifySelf->content= 5;
        }else {
            $notifySelf->content= 6;
        }
        $notifySelf->save();
        
        $amount = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', $req->idUserOwner)
        ->count();

        $amountSelf = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', $req->idUserStaff)
        ->count();

        broadcast(new NewRequest($req->idUserOwner, $amount));
        broadcast(new NewRequest($req->idUserStaff, $amountSelf));

        return response()->json(['success' => $request->status]);
        }
    public function postComment(Request $request)
    {
        # code...
        $comment = new Comment();
        $comment->idProject = $request->idProject;
        $comment->content = $request->content;
        $comment->idUser = Auth::id();
        $comment->save();
        $user = User::find(Auth::id());
        broadcast(new NewComment($comment, $user)); 
        return $comment;
    }
    public function postGetComment(Request $request)
    {
        $comment = DB::table('comments')
        ->where('idProject', $request->idProject)
        ->get();
        foreach($comment as $cm) {
            $cm->user = User::find($cm->idUser);
            $cm->url = '';
            $cm->name = $cm->user->name;
        }
        return $comment;
    }
    public function getUser($id = null)
    {
        $user = null;
        if($id) {
            $user = User::find($id);
        }else {
            $user = Auth::user();
        }
        if($user == null) return redirect('/login');
        $user->quantity = DB::table('projects')->where('idUser', $user->id)->count();

        $projects = DB::table('requests')->where('idUserStaff', $user->id)->where('status', 'accepted')->get();

        $user->quantityAccepted = DB::table('requests')->where('idUserStaff', $user->id)->where('status', 'accepted')->count();

        $done = 0;
        foreach($projects as $project) {
            $project = Project::find($project->idProject);
            if($project->status == 'done') {
                $done++;
            }
        }
        $user->quantityDone = $done;

        return view('product.user', compact(['user']));
    }
    public function postDone(Request $request)
    {
        $req = DB::table('requests')
        ->where('idProject', $request->idProject)
        ->where('idUserStaff', $request->idUser)
        ->first();
        if($req != null) {
            $project = Project::find($request->idProject);
            $project->status = 'done';
            $project->save();
        }

        $notify = new Notify();
        $notify->idProject = $req->idProject;
        $notify->idUserOwner = $req->idUserOwner;
        $notify->idUserStaff = $req->idUserStaff;
        $notify->status = 'yet';
        $notify->content= 7;
        $notify->save(); // 

        $notifySelf = new Notify();
        $notifySelf->idProject = $req->idProject;
        $notifySelf->idUserOwner = $req->idUserStaff;
        $notifySelf->idUserStaff = $req->idUserOwner;
        $notifySelf->status = 'yet';
        $notifySelf->content= 8;
        $notifySelf->save();

        $amount = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', $req->idUserOwner)
        ->count();

        $amountSelf = DB::table('notifys')
        ->where('status', 'yet')
        ->groupBy('idUserOwner')
        ->having('idUserOwner', $req->idUserStaff)
        ->count();

        broadcast(new NewRequest($req->idUserOwner, $amount));
        broadcast(new NewRequest($req->idUserStaff, $amountSelf));


        return response()->json(['status' => 'success']);
    }
    public function postEditUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return response()->json(["status" => "success"]);
    }
}
