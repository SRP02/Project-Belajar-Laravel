<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formStudentController extends Controller
{
      //
      public function index(){
        return view('create',[
            'title' => "Create Student",
        ]);
    }
}
