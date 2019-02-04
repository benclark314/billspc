<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Show Contact Form Page (/contact)
    public function showForm(){
      return view('contact.form');
    }
}
