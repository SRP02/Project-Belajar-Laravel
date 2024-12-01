<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    function index(){
        return view('contact',[
            'title' => "contact",
            'nama' => "Satria Rudi Pratama",
            'alamat' => " Jl. Raya Gunungwungkal, Bondol, Sendangrejo, Kec. Tayu, Kabupaten Pati, Jawa Tengah 59155",
            'linkedin_link' => "https://www.linkedin.com/in/satria-rudi-pratama-25538a298/",
            'repository_link' => "https://github.com/SRP02",
        ]);
    }
}
