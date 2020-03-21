<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopEmployeeEntry extends Model
{
    public function shopEmployeeTypes(){
       return $this->belongsTo(ShopEmployeeType::class,'employeeTypeId','shopEmployeeTypeId');
    }

}
