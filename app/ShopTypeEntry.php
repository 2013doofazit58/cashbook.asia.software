<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopTypeEntry extends Model
{

   public function categorys(){
       return $this->hasMany(Category::class,'shopTypeId','shopTypeEntryId');
   }

}
