<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    public function productSupplierName(){
      return $this->belongsTo(AddProductSupplierEntry::Class,'productSupplierId','productSupplierId');
    }
}
