<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatabaseStorageModel;
use App\Models\VehicleTypes;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class VehicleTypeController extends Controller
{
   public function list()
   {
      $data = VehicleTypes::all();

      // dd($data);
      return view('vehicle-types.list', ['data' => $data]);
   }


   /**
    * add
    *
    * @return void
    */
   public function add()
   {
      return view('vehicle-types.add');
   }

   public function update($id)
   {

      $data = VehicleTypes::find($id);
      return view('vehicle-types.edit', compact('data'));
   }

   /**
    * postAdd
    *
    * @return void
    */
   public function postAdd(Request $request)
   {
      $obj = new VehicleTypes();
      $obj->type_name = $request->type_name;
      $obj->save();
      return redirect(url('admin/vehicle-types/list'));
   }
    
   public function postUpdate(Request $request, $id)
   {

      $obj = VehicleTypes::find($id);
      $obj->type_name = $request->type_name;
      $obj->save();
      return redirect(url('admin/vehicle-types/list'));
   }

   public function delete( $id)
   {

      $obj = VehicleTypes::where('id', $id)->delete();
      
      return redirect(url('admin/vehicle-types/list'));
   }
}
