<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    use HasFactory;
    protected $primaryKey="idespacio";
    protected $table="espacios";
    protected $fillable=['nomespacio','descripcion','estado'];
    public $timestamps = false;
}
