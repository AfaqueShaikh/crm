<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function color()
    {
          return $this->belongsTo('App\Models\VehicleColor','vehicle_color_id', 'id');
    }

    public function vehicleModel()
    {
          return $this->belongsTo('App\Models\VehicleModel', 'vehicle_model_id', 'id');
    }

    public function VehicleType()
    {
          return $this->belongsTo('App\Models\VehicleTypes', 'vehicle_type_id', 'id');
    }

    public function vehicleModelType()
    {
          return $this->belongsTo('App\Models\VehicleModelType', 'vehicle_model_type_id', 'id');
    }
}
