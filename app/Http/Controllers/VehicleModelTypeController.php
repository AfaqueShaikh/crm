<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DatabaseStorageModel;
use App\Models\VehicleModel;
use App\Models\VehicleModelType;
use App\Models\VehicleTypes;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class VehicleModelTypeController extends Controller
{
   public function list()
   {
      $data = VehicleModelType::all();

      
      return view('vehicle-model-types.list', ['data' => $data]);
   }


   /**
    * add
    *
    * @return void
    */
   public function add()
   {
      return view('vehicle-model-types.add');
   }

   public function update($id)
   {

      $data = VehicleModelType::find($id);
      return view('vehicle-model-types.edit', compact('data'));
   }

   /**
    * postAdd
    *
    * @return void
    */
   public function postAdd(Request $request)
   {
      $obj = new VehicleModelType();
      $obj->model_type = $request->model_type;
      $obj->save();
      return redirect(url('admin/vehicle-model-types/list'));
   }
    
   public function postUpdate(Request $request, $id)
   {

      $obj = VehicleModelType::find($id);
      $obj->model_type = $request->model_type;
      $obj->save();
      return redirect(url('admin/vehicle-model-types/list'));
   }

   public function delete( $id)
   {

      $obj = VehicleModelType::where('id', $id)->delete();
      
      return redirect(url('admin/vehicle-model-types/list'));
   }
}
