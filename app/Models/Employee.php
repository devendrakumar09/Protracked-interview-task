<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function getCmpnay()
    {
        return $this->hasOne('App\Models\Company','id','company');
    }
}
