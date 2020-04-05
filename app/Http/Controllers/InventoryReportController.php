<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopInformation;
use App\Category;
use App\ProductName;
use App\ProductCategory;
use App\ProductBrandEntry;
use App\ProductPriceSetupDetail;
use App\PurchaseProductEntry;
use Carbon\Carbon;
use Auth;

class InventoryReportController extends Controller
{
    public function inventoryProductNameWithoutPrice()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $productNameList = ProductName::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->paginate(50);
            return ['productNameList' => $productNameList];
        }
    }
    public function inventoryProductNameWithPrice()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $productPriceSetupList = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->paginate(50);
            return['productPriceSetupList' => $productPriceSetupList];
        }
    }
    public function invetoryCategoryWithoutPriceList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

            $productPriceSetupCategory = ProductPriceSetupDetail::with('categoryName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->distinct()->paginate(5,['categoryId']);
            $productPriceSetupCategoryProduct = ProductPriceSetupDetail::where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
            $productPriceSetupProduct = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
            $productName = ProductName::where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();

            return ['productPriceSetupCategoryProduct'=>$productPriceSetupCategoryProduct,'productPriceSetupCategory' => $productPriceSetupCategory,'productPriceSetupProduct'=>$productPriceSetupProduct,'productName' => $productName];
        }
    }
    public function invetoryCategoryWithPriceList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

            $productPriceSetupCategory = ProductPriceSetupDetail::with('categoryName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->distinct()->paginate(5,['categoryId']);
            $productPriceSetupProduct = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();

            return ['productPriceSetupCategory' => $productPriceSetupCategory,'productPriceSetupProduct'=>$productPriceSetupProduct];
        }
    }
    public function lowQuantityProductList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $lowQuantityProductList = PurchaseProductEntry::with('productName','unitName')->where('quantity','<=',10)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->paginate(50);

            return ['lowQuantityProductList' => $lowQuantityProductList];
        }

    }
    public function expireDateOverProductList()
    {
       if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $expireDateOverProductList = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
            $nowData = Carbon::now()->format('Y-m-d');
            return ['expireDateOverProductList' => $expireDateOverProductList, 'nowData' => $nowData];
       }
    }
    public function expireDateSoonProductList()
    {
      if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $expireDateSoonProductList = ProductPriceSetupDetail::with('productName','productBrandName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
          $nowData = Carbon::now()->format('Y-m-d');
          return ['expireDateSoonProductList' => $expireDateSoonProductList, 'nowData' => $nowData];
      }
   }
}
