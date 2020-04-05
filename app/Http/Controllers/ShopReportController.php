<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\ShopAssetCategory;
use App\ShopInformation;
use App\ShopTypeEntry;

class ShopReportController extends Controller
{
    public function shoptype()
    {
        $adminShopDataShow = Category::with('shopTypeName')->distinct()->get(['shopTypeId']);
        $adminShopDatalabel = Category::with('shopTypeName')->distinct()->get(['label','shopTypeId']);
        $shopOwnerTypeShow = Category::with('shopTypeName')->where('createBy',Auth::user()->id)->distinct()->get(['shopTypeId']);
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $shopGlobalTypeShow = Category::with('shopTypeName')->where('shopTypeId',$shopTypeId)->distinct()->get(['shopTypeId']);
            return ['shopOwnerTypeShow'=> $shopOwnerTypeShow,'shopGlobalTypeShow' => $shopGlobalTypeShow,'adminShopDataShow' => $adminShopDataShow ,'adminShopDatalabel'=> $adminShopDatalabel ];
          }
        return ['shopOwnerTypeShow'=> $shopOwnerTypeShow,'adminShopDataShow' => $adminShopDataShow ,'adminShopDatalabel'=> $adminShopDatalabel ];
    }
    public function categorydata()
    {
        $category = Category::where('label',1)->where('createBy',Auth::user()->id)->get()->count();
        $subcategory = Category::where('label',2)->where('createBy',Auth::user()->id)->get()->count();
        $thirdCategory = Category::where('label',3)->where('createBy',Auth::user()->id)->get()->count();
        $foreCategory = Category::where('label',4)->where('createBy',Auth::user()->id)->get()->count();
        $fiveCategory = Category::where('label',5)->where('createBy',Auth::user()->id)->get()->count();
        $sixCategory = Category::where('label',6)->where('createBy',Auth::user()->id)->get()->count();
        $sevenCategory = Category::where('label',7)->where('createBy',Auth::user()->id)->get()->count();
        $eightCategory = Category::where('label',8)->where('createBy',Auth::user()->id)->get()->count();
        $nineCategory = Category::where('label',9)->where('createBy',Auth::user()->id)->get()->count();
        $tenCategory = Category::where('label',10)->where('createBy',Auth::user()->id)->get()->count();
        return ['category'=> $category,'subcategory' => $subcategory,'thirdCategory' => $thirdCategory,'foreCategory' => $foreCategory,'fiveCategory' => $fiveCategory,'sixCategory' => $sixCategory,'sevenCategory' => $sevenCategory,'eightCategory' => $eightCategory,'nineCategory' => $nineCategory,'tenCategory' => $tenCategory ];

    }
    public function categoryOwnerShow($categoryLabel)
    {
        $categoryListData = Category::where('label',$categoryLabel)->where('createBy',Auth::user()->id)->get();
        return ['categoryListData'=>$categoryListData];
    }
    public function categoryGlobalShow($categoryLabel)
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $categoryListData = Category::where('label',$categoryLabel)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::user()->id)->get();
            return ['categoryListData'=>$categoryListData];
        }
    }

    public function condition()
    {
        $authInfo = Auth::User();
        return ['authInfo' => $authInfo];
    }

    public function adminCategoryListShow($shopTypeId, $labelId){
        $adminCategoryList = Category::where('label',$labelId)->where('shopTypeId',$shopTypeId)->get();
        return ['adminCategoryList'=> $adminCategoryList];
    }
    public function categoryGlobalCount()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $category = Category::where('label',1)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $subcategory = Category::where('label',2)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $thirdCategory = Category::where('label',3)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $foreCategory = Category::where('label',4)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $fiveCategory = Category::where('label',5)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $sixCategory = Category::where('label',6)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $sevenCategory = Category::where('label',7)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $eightCategory = Category::where('label',8)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $nineCategory = Category::where('label',9)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();
            $tenCategory = Category::where('label',10)->where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::User()->id)->get()->count();

            return ['globalCategoryCount'=> $category,'globalSubcategoryCount' => $subcategory,'globalThirdCategoryCount' => $thirdCategory,'globalForeCategoryCount' => $foreCategory,'globalFiveCategoryCount' => $fiveCategory,'globalSixCategoryCount' => $sixCategory,'globalSevenCategoryCount' => $sevenCategory,'globalEightCategoryCount' => $eightCategory,'globalNineCategoryCount' => $nineCategory,'globalTenCategoryCount' => $tenCategory ];
        }
    }

    public function shopAssetCategoryReportOwner()
    {

        $category =  ShopAssetCategory::where('label',1)->where('createBy',Auth::user()->id)->get()->count();
        $subcategory = ShopAssetCategory::where('label',2)->where('createBy',Auth::user()->id)->get()->count();
        $thirdCategory = ShopAssetCategory::where('label',3)->where('createBy',Auth::user()->id)->get()->count();
        $foreCategory = ShopAssetCategory::where('label',4)->where('createBy',Auth::user()->id)->get()->count();
        $fiveCategory = ShopAssetCategory::where('label',5)->where('createBy',Auth::user()->id)->get()->count();
        $sixCategory = ShopAssetCategory::where('label',6)->where('createBy',Auth::user()->id)->get()->count();
        $sevenCategory = ShopAssetCategory::where('label',7)->where('createBy',Auth::user()->id)->get()->count();
        $eightCategory = ShopAssetCategory::where('label',8)->where('createBy',Auth::user()->id)->get()->count();
        $nineCategory = ShopAssetCategory::where('label',9)->where('createBy',Auth::user()->id)->get()->count();
        $tenCategory = ShopAssetCategory::where('label',10)->where('createBy',Auth::user()->id)->get()->count();

        return ['category'=> $category,'subcategory' => $subcategory,'thirdCategory' => $thirdCategory,'foreCategory' => $foreCategory,'fiveCategory' => $fiveCategory,'sixCategory' => $sixCategory,'sevenCategory' => $sevenCategory,'eightCategory' => $eightCategory,'nineCategory' => $nineCategory,'tenCategory' => $tenCategory ];

    }
    public function shopAssetCategoryReportOwnerShow($labelId)
    {
          $assetCategoryList =  ShopAssetCategory::where('label',$labelId)->where('createBy',Auth::user()->id)->get();
          return ['assetCategoryList' => $assetCategoryList];
    }
    public function shopAssetCategoryReportGlobalShow($labelId)
    {
        $assetCategoryList =  ShopAssetCategory::where('label',$labelId)->where('createBy','!=', Auth::User()->id)->get();
        return ['assetCategoryList' => $assetCategoryList];
    }
    public function shopAssetCategoryReportGlobal()
    {

        $category = ShopAssetCategory::where('label',1)->where('createBy','!=', Auth::User()->id)->get()->count();
        $subcategory = ShopAssetCategory::where('label',2)->where('createBy','!=', Auth::User()->id)->get()->count();
        $thirdCategory = ShopAssetCategory::where('label',3)->where('createBy','!=', Auth::User()->id)->get()->count();
        $foreCategory = ShopAssetCategory::where('label',4)->where('createBy','!=', Auth::User()->id)->get()->count();
        $fiveCategory = ShopAssetCategory::where('label',5)->where('createBy','!=', Auth::User()->id)->get()->count();
        $sixCategory = ShopAssetCategory::where('label',6)->where('createBy','!=', Auth::User()->id)->get()->count();
        $sevenCategory = ShopAssetCategory::where('label',7)->where('createBy','!=', Auth::User()->id)->get()->count();
        $eightCategory = ShopAssetCategory::where('label',8)->where('createBy','!=', Auth::User()->id)->get()->count();
        $nineCategory = ShopAssetCategory::where('label',9)->where('createBy','!=', Auth::User()->id)->get()->count();
        $tenCategory = ShopAssetCategory::where('label',10)->where('createBy','!=', Auth::User()->id)->get()->count();

        return ['globalCategoryCount'=> $category,'globalSubcategoryCount' => $subcategory,'globalThirdCategoryCount' => $thirdCategory,'globalForeCategoryCount' => $foreCategory,'globalFiveCategoryCount' => $fiveCategory,'globalSixCategoryCount' => $sixCategory,'globalSevenCategoryCount' => $sevenCategory,'globalEightCategoryCount' => $eightCategory,'globalNineCategoryCount' => $nineCategory,'globalTenCategoryCount' => $tenCategory ];

    }


}
