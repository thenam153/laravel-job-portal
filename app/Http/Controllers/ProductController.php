<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        // dd(Auth::user());
        if(Auth::user() === null || !Auth::user()->level) {
            return redirect('/login');
        }
        return view('product.postproject');
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
        $links = [];
        dd($request->file('files')->store('public'));
        foreach ($request->file('files') as $file) {
            
            $file->move('casd','sdasd');

            array_push($links, $file->store('name','public'));   
        }
        return $links;
    }
    public function postMyProject()
    {
        return 1;
    }
}
