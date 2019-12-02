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

class ProductController extends Controller
{
    //
    public function index()
    {
        # code...
        $categorys = Category::getCategory();
        $projects = DB::table('projects')
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
                
                $project->files[] = $file->content;
            }
            $project->nameCategory = Category::find($project->idCategory)->name;
        }

        return view('product.index', compact(['projects', 'categorys']));
    }
    public function getCategory($id = null)
    {   
        $categorys = Category::getCategory();

        if($id === null) {
            $projects = DB::table('projects')
            ->orderBy('created_at','DESC')
            ->paginate(6);
        }else {
            $projects = DB::table('projects')
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
                
                $project->files[] = $file->content;
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
                
                $project->files[] = $file->content;
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
                // not done
            }
        }
    }
}
