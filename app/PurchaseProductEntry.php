<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProductEntry extends Model
{
    public function productName(){
      return $this->belongsTo(ProductName::class,'productId','productNameId');
    }
    public function unitName(){
      return $this->belongsTo(UniteEntry::class,'unitId','uniteEntryId');
    }
}
