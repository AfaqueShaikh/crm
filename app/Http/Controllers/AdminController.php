<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatabaseStorageModel;
use App\Models\Login;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
   public function adminDashboard()
   {   
    return view('admin.dashboard');
   }

   public function list()
   {
      $data = Login::where('id','!=',1)->get();

      

      
      return view('admin.list', ['data' => $data]);
   }


   /**
    * add
    *
    * @return void
    */
   public function add()
   {
      return view('admin.add');
   }

   public function update($id)
   {

      $data = Login::find($id);
      return view('admin.edit', compact('data'));
   }

   /**
    * postAdd
    *
    * @return void
    */
   public function postAdd(Request $request)
   {
      $obj = new Login();
      $obj->email = $request->email;
      $obj->password = bcrypt($request->password);
      $obj->save();
      return redirect(url('admin/admin-users/list'));
   }
    
   public function postUpdate(Request $request, $id)
   {

      $obj = Login::find($id);
     $obj->email = $request->email;
      $obj->password = bcrypt($request->password);
      $obj->save();
      return redirect(url('admin/admin-users/list'));
   }

   public function delete( $id)
   {

      $obj = Login::where('id', $id)->delete();
      
      return redirect(url('admin/admin-users/list'));
   }
   
}
