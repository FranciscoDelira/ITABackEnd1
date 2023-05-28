<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    use HasFactory;

    public function Maintenancerequest(){
        return $this->belongsTo(Maintenancerequest::class);
    }

    public function personalData(){
        return $this->belongsTo(PersonalData::class);
    }
}
