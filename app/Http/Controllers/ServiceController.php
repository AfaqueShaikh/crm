<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\VehicleModel;
use App\Models\VehicleModelType;
use App\Models\VehicleTypes;
use Session;
use Auth;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session as FacadesSession;

class ServiceController extends Controller
{
   public function list()
   {
      $data = Service::all();

      
      return view('services.list', ['data' => $data]);
   }


   /**
    * add
    *
    * @return void
    */
   public function add()
   {
      $vehicleTypes = VehicleTypes::all();
      $vehicleModel = VehicleModel::all();
      $vehicleModelType = VehicleModelType::all();
      return view('services.add', compact('vehicleTypes', 'vehicleModel', 'vehicleModelType'));
   }

   public function update($id)
   {

      $data = Service::find($id);
      return view('services.edit', compact('data'));
   }

   /**
    * postAdd
    *
    * @return void
    */
   public function postAdd(Request $request)
   {

      
      $obj = new Service();
   
      $obj->vehicle_type_id = $request->vehicle_type;
      $obj->vehicle_model_id = $request->vehicle_model;
      $obj->vehicle_model_type_id = $request->vehicle_model_type;
      $obj->vehicle_category = $request->category;
      $obj->charge_per_km = $request->charge_per_km;
      $obj->gst = $request->gst;
      $obj->save();
      return redirect(url('admin/services/list'));
   }
    
   public function postUpdate(Request $request, $id)
   {

      $obj = Service::find($id);
      $obj->type_name = $request->type_name;
      $obj->save();
      return redirect(url('admin/services/list'));
   }

   public function delete( $id)
   {

      $obj = Service::where('id', $id)->delete();
      
      return redirect(url('admin/services/list'));
   }
}
