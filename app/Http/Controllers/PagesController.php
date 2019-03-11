<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Get index page(/)
    public function getIndex(){
      return view('pages.index');
    }

    //Get index page(/)
    public function getAbout(){
      $title = 'About Bill\'s PC';
      return view('pages.about', compact('title'));
    }
}
