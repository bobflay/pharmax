<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected  $fillable = ['name','email','number','path','url','country_code'];

    public function drugs() 
    {
        return $this->hasMany(Drug::class);
    }

}
