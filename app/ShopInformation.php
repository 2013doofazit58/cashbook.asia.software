<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopInformation extends Model
{
    public function shopTypeName(){
      return $this->belongsTo(ShopTypeEntry::class,'shopTypeId','shopTypeEntryId');
    }
}
