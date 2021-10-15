<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatabaseStorageModel;
use App\Models\VehicleModel;
use App\Models\VehicleTypes;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class VehicleModelController extends Controller
{
   public function list()
   {
      $data = VehicleModel::all();

      
      return view('vehicle-models.list', ['data' => $data]);
   }


   /**
    * add
    *
    * @return void
    */
   public function add()
   {
      return view('vehicle-models.add');
   }

   public function update($id)
   {

      $data = VehicleModel::find($id);
      return view('vehicle-models.edit', compact('data'));
   }

   /**
    * postAdd
    *
    * @return void
    */
   public function postAdd(Request $request)
   {
      $obj = new VehicleModel();
      $obj->model_name = $request->model_name;
      $obj->save();
      return redirect(url('admin/vehicle-models/list'));
   }
    
   public function postUpdate(Request $request, $id)
   {

      $obj = VehicleModel::find($id);
      $obj->model_name = $request->model_name;
      $obj->save();
      return redirect(url('admin/vehicle-models/list'));
   }

   public function delete( $id)
   {

      $obj = VehicleModel::where('id', $id)->delete();
      
      return redirect(url('admin/vehicle-models/list'));
   }
}
