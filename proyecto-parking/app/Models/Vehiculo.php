<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $primaryKey="id_veh";
    protected $table="vehiculos";
    protected $fillable=['placa_veh','propietario_veh','marca_veh','color_veh'];
    public $timestamps = false;
}
