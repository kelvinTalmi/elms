<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leavedate extends Model
{
    use HasFactory;


function employee(){

        return $this->belongsTo(Employee::class);
    }


    

    function department(){

        return $this->belongsTo(Department::class);
    }

    

    function leavetype(){

        return $this->belongsTo(Leavetype::class);
    }

}
