<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Modulo extends Model
{
    protected $table = 'modulo';
  	// protected $fillable = ['name', 'description'];
  	// protected $guarded = ['ID'];
    protected $primaryKey = 'ID';


  	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    // protected $casts = [
    //     'is_admin' => 'boolean'
    // ];

    // public static function findByEmail($email)
    // {
    //     return static::where(compact('email'))->first();
    // }

    // public function profession()
    // {
    //     return $this->belongsTo(Profession::class);
    // }

    // public function profile()
    // {
    //     return $this->hasOne(UserProfile::class);
    // }
    
    // public function isAdmin()
    // {
    //     return $this->is_admin;
    // }

}
