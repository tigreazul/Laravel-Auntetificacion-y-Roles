<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembro_hogar';
    protected $primaryKey = 'idMiembro';
    public $timestamps = false;
}
