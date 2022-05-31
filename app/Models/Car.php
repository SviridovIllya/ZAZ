<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
      'brand',
      'model',
      'type',
      'fuel_type',
      'door_count',
      'seat_count',
      'gear_box_type',
      'showroom_id',
      'customer_id',
      'price',
      'year'
    ];

    public function service():HasOne
    {
        return $this->hasOne(Service::class, 'car_id');
    }
}
