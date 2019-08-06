<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detallecuota extends Model
{
    protected $table = 'detalle_cuota';
    protected $primaryKey = 'idCuotaDetalle';
    public $timestamps = false;
}
