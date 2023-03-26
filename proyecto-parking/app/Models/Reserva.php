<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey="idreserva";
    protected $table="reservas";
    protected $fillable=['idespacio','idusuario','fecha_reserva','fecha_ingreso','fecha_salida','estado'];
    public $timestamps = false;
}
