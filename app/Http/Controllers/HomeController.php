<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class HomeController extends Controller {
   
   public function index(){

     dd("Home");

      
      return view('pages.home',compact('brandData'));
   }



  
}
