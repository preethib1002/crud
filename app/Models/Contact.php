<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'address', 'mobile','email','country','dateofbirth','gender','zipcode','state'];


    public function country(){
    return $this->hasOne('App\Models\Country','contact_id')->with(['states']);
  }



}
