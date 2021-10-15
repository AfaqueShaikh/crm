<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatabaseStorageModel;
use App\Models\VehicleColor;
use App\Models\VehicleModel;
use App\Models\VehicleTypes;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class VehicleColorController extends Controller
{
   public function list()
   {
      $data = VehicleColor::all();

      
      return view('vehicle-colors.list', ['data' => $data]);
   }


   /**
    * add
    *
    * @return void
    */
   public function add()
   {
      return view('vehicle-colors.add');
   }

   public function update($id)
   {

      $data = VehicleColor::find($id);
      return view('vehicle-colors.edit', compact('data'));
   }

   /**
    * postAdd
    *
    * @return void
    */
   public function postAdd(Request $request)
   {
      $obj = new VehicleColor();
      $obj->name = $request->name;
      $obj->save();
      return redirect(url('admin/vehicle-colors/list'));
   }
    
   public function postUpdate(Request $request, $id)
   {

      $obj = VehicleColor::find($id);
      $obj->name = $request->name;
      $obj->save();
      return redirect(url('admin/vehicle-colors/list'));
   }

   public function delete( $id)
   {

      $obj = VehicleColor::where('id', $id)->delete();
      
      return redirect(url('admin/vehicle-colors/list'));
   }
}
