<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(){

        return view('adminpanel.ContentPage');
    }
   
    public function postShow(){

        return view('backend.post.postShow');
    }
}
