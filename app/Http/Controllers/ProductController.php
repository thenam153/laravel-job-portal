<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        return view('product.index');
    }
    public function getCategory()
    {
        return view('product.category');
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
        return view('product.myproject');
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
            $project->save();
            if($request->file('files')!== null) {
                foreach($request->file('files') as $fileStorage) {
                    if($fileStorage->extension() == 'png'|| $fileStorage->extension() == 'jpeg' || $fileStorage->extension() == 'jpg' || $fileStorage->extension() == 'gif' || $fileStorage->extension() == 'doc' || $fileStorage->extension() == 'docx') {
                        $file = new File();
                        $file->content = Storage::url($fileStorage->store('public'));
                        $file->idProject = $project->id;
                        $file->save();

                        $fk = new Fk_file_project();
                        $fk->idFile = $file->id;
                        $fk->idProject = $project->id;
                        $fk->save();
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
}
