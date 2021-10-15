<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Service;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleTypes;

class ApiController extends Controller {
   
   public function listDrivers(){
      $driverdata = Driver::all();
      $result = ['data'=>$driverdata,'success'=>1,'success_message'=>""];
      return response()->json($result, 200);
   }


   public function login(Request $request)   {

      

      $user = User::where('user_phone_number',$request->phone_number)->first();

      
      if($user)
      {
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
      }else{

         $user =  new User();
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->user_phone_number = $request->phone_number;
         $user->is_new = '1';
         $user->save();
         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
      }
   }

   public function driverLogin(Request $request)   {

      

      $user = Driver::where('driver_phone_number',$request->phone_number)->first();

      
      if($user)
      {
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
      }else{

         $user =  new Driver();
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->driver_phone_number = $request->phone_number;
         $user->is_new = '1';
         $user->save();
         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
      }
   }

   public function verifyOtp(Request $request)   {

      $user = User::where('user_phone_number',$request->phone_number)
            ->where('otp', $request->otp)
            ->first();
            
      if($user)
      {
         $user->otp_verfied = '1';
         $user->save();
         return ["message"=> "Success.","status"=> "success",'data'=>[["user_data"=>$user]]];
      }else{
            return ["message"=> "Otp not matched.","status"=> "error",'data'=>[]];
      }
   }

   public function driverVerifyOtp(Request $request)   {

      $user = Driver::where('driver_phone_number',$request->phone_number)
            ->where('otp', $request->otp)
            ->first();
            
      if($user)
      {
         $user->otp_verfied = '1';
         $user->save();
         return ["message"=> "Success.","status"=> "success",'data'=>[["driver_data"=>$user]]];
      }else{
            return ["message"=> "Otp not matched.","status"=> "error",'data'=>[]];
      }
   }

   public function resendOtp(Request $request)   {

      $user = User::where('user_phone_number',$request->phone_number)->first();

      if($user)
      {
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
      }else{
            return ["message"=> "Phone number not registered.","status"=> "error",'data'=>[]];
      }
   }
   
   public function driverResendOtp(Request $request)   {

      $user = Driver::where('driver_phone_number',$request->phone_number)->first();

      if($user)
      {
         $fourRandomDigit = mt_rand(1000,9999);
         $user->otp_verfied = '0';
         $user->otp = $fourRandomDigit;
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
      }else{
            return ["message"=> "Phone number not registered.","status"=> "error",'data'=>[]];
      }
   }


   public function register(Request $request)
   {
      $user = User::where('user_phone_number',$request->phone_number)->first();

      if($user)
      {
         $user->user_name = $request->user_name;
         $user->user_city= $request->user_city;
         $user->user_state= $request->user_state;
         $user->user_date_of_birth= $request->user_date_of_birth;
         $user->user_email= $request->user_email;
         $user->user_emergency_contact= $request->user_emergency_contact;
         $user->zipcode= $request->zipcode;
         $user->is_new = '0';
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["user_data"=>$user]]];
      }else{
            return ["message"=> "Phone number not registered.","status"=> "error",'data'=>[]];
      }

   }

   public function driverRegister(Request $request)
   {
      $user = Driver::where('driver_phone_number',$request->phone_number)->first();

      if($user)
      {
         $user->driver_name = $request->driver_name;
         $user->driver_address= $request->driver_address;
         $user->driver_city= $request->driver_city;
         $user->driver_state= $request->driver_state;
         $user->driver_date_of_birth= $request->driver_date_of_birth;
         $user->driver_rating= $request->driver_rating;
         $user->driver_license_number= $request->driver_license_issued_by;
         $user->driver_license_validity= $request->driver_license_validity;
         $user->zipcode= $request->zipcode;
         $user->is_new = '0';

         if ($request->hasFile('driver_aadhar_card_photo')) {

            $image = $request->file('driver_aadhar_card_photo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path("img"), $new_name);
            $user->driver_aadhar_card_photo = $new_name;
        }

         if ($request->hasFile('driver_license_photo')) {

            $image = $request->file('driver_license_photo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("img"), $new_name);
            $user->driver_license_photo = $new_name;
        }
         $user->save();

         return ["message"=> "Success.","status"=> "success",'data'=>[["driver_data"=>$user]]];
      }else{
            return ["message"=> "Phone number not registered.","status"=> "error",'data'=>[]];
      }

   }

   public function driverVehicle(Request $request){

      $obj = new Vehicle(); 
      $obj->vehicle_number = $request->vehicle_number;
      $obj->vehicle_type_id = $request->vehicle_type_id;
      $obj->driver_id = $request->driver_id;
      $obj->vehicle_model_id = $request->vehicle_model_id;
      $obj->vehicle_model_type_id = $request->vehicle_model_type_id;
      $obj->vehicle_category = $request->vehicle_category;
      $obj->vehicle_color_id = $request->vehicle_color_id;
      $obj->vehicle_insurance_validity = $request->vehicle_insurance_validity;
      $obj->vehicle_insurance_number = $request->vehicle_insurance_number;
      $obj->vehicle_sharing = $request->vehicle_sharing;
      $obj->number_of_seats = $request->number_of_seats;
      $obj->save();

      return ["message"=> "Success.","status"=> "success",'data'=>[["vehicle_data"=>$obj]]];
   }

   public function bookRide(Request $request)
   {
      $vehicleData = Vehicle::where("current_lat", $request->pickup_lat)
            ->where("current_long", $request->pickup_long)
            ->where('vehicle_model_type_id', $request->model_type_id)
            ->where('vehicle_type_id', $request->vehicle_type_id)
            ->where('vehicle_model_id', $request->model_id)
            ->where('vehicle_sharing', $request->vehicle_sharing)
            ->where('available_seats', '!=', 0)
            ->first();


            $serviceData = Service::where('vehicle_model_type_id', $request->model_type_id)
            ->where('vehicle_type_id', $request->vehicle_type_id)
            ->where('vehicle_model_id', $request->model_id)
            ->first();
      if(!$vehicleData)
      {
            return ["message"=> "No Vehicle Found.","status"=> "error"];
      }

      $driverData = Driver::find($vehicleData->driver_id);
      $booking = new Booking();
      $booking->pickup_location_lat = $request->pickup_lat;
      $booking->pickup_location_long = $request->pickup_long;
      $booking->drop_location_lat = $request->drop_lat;
      $booking->drop_location_long = $request->drop_long;
      $booking->user_id = $request->user_id;
      $booking->payment_mode = $request->payment_mode;
      $booking->model_type_id = $request->model_type_id;
      $booking->driver_id = $vehicleData->driver_id;
      $booking->service_type = $serviceData->id;
      $booking->save();
      $driverData = Driver::first();
      $vehicleData = $vehicleData;
      return ["message"=> "Success.","status"=> "success",'data'=>[["driverData"=>$driverData, 'vehicleData'=>$vehicleData, 'bookindDetail'=>$booking]]];
   }

   public function rideOtp(Request $request)
   {
      $booking = Booking::find($request->trip_id);

      $fourRandomDigit = mt_rand(1000,9999);
      if($request->otp_type == 'start')
      {
         $booking->start_otp = $fourRandomDigit;
      }
      else{
         $booking->end_otp = $fourRandomDigit;
      }
      
      $booking->save();
      return ["message"=> "Success.","status"=> "success",'data'=>[["otp"=>$fourRandomDigit]]];
   }

   public function search(Request $request)
   {

    
      $distance = $this->distance($request->pickup_lat, $request->pickup_long,$request->drop_lat,$request->drop_long, 'K');
      $query = Service::query();
      
      if($request->has('vehicle_type_id'))
      {
         $query->where('vehicle_type_id', $request->vehicle_type_id);
      }

      $data = $query->get();
      $fairData = [];
      
      foreach($data as $key => $obj){
         $fairData[$key]['model_type'] = $obj->vehicleModelType->model_type ;
         $fairData[$key]['model_type_id'] = $obj->vehicleModelType->id ;

         if(!$request->shared_trip)
         {
         $fair = round($distance * $obj->charge_per_km, 2);
      }else{
            $no_of_seats = 4;
            $fair = round(($distance * $obj->charge_per_km)/$no_of_seats, 2);
         }
         
         $fairData[$key]['fair'] = $fair ;
         $fairData[$key]['gst'] = $obj->gst . '%' ;
         $fairData[$key]['distance'] = round($distance, 2); 
      }

      
      
      if(count($data) > 0)
      {
         return ["message"=> "Success.","status"=> "success",'data'=>[["fair_data"=>$fairData]]];
      }else{
            return ["message"=> "No Data found.","status"=> "error",'data'=>[]];
      }

   }

   public function getVehicleTypes()
   {
      $data = VehicleTypes::all();
      return ["message"=> "Success.","status"=> "success",'data'=>[["vehicle_types"=>$data]]];
   }

   public function myBookings(Request $request)
   {
      $bookingData = Booking::where('user_id', $request->user_id)->get();
      return ["message"=> "Success.","status"=> "success",'data'=>[["bookingData"=>$bookingData]]];
   }

   public function getUserProfile(Request $request)
   {
      $userData = User::find($request->user_id);
      return ["message"=> "Success.","status"=> "success",'data'=>[["userData" => $userData]]];
   }

   public function updateUserProfile(Request $request)
   {
      $userData = User::find($request->user_id);

      if($userData)
      {
         $userData->user_name = $request->user_name;
         $userData->user_city= $request->user_city;
         $userData->user_state= $request->user_state;
         $userData->user_date_of_birth= $request->user_date_of_birth;
         $userData->user_email= $request->user_email;
         $userData->user_emergency_contact= $request->user_emergency_contact;
         $userData->zipcode= $request->zipcode;
         $userData->save();  
         return ["message"=> "Success.","status"=> "success",'data'=>[["user_data"=>$userData]]];
      }else{
            return ["message"=> "No Data found.","status"=> "error",'data'=>[]];
      }
      
      
   }

   function distance($lat1, $lon1, $lat2, $lon2, $unit) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);
    
      if ($unit == "K") {
          return ($miles * 1.609344);
      } else if ($unit == "N") {
          return ($miles * 0.8684);
      } else {
          return $miles;
      }
    }
  

    public function cancelTrip(Request $request)
    {
       $booking = Booking::find($request->trip_id);
       $booking->cancel_by = $request->cancel_by;
       $booking->trip_cancelled = true;
       $booking->trip_cancelled_reason = $request->cancel_reason;
       $booking->save();

       return ["message"=> "Success.","status"=> "success",'data'=>[]];
      }
    
}
