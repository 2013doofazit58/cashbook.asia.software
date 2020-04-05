<?php

namespace App\Http\Controllers;

use App\ProductBrandEntry;
use App\ShopInformation;
use App\ShopTypeEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopProductBrandController extends Controller
{

    public function index()
    {

        $adminProductBrandList = ProductBrandEntry::with('shopTypeName')->orderBy('productBrandEntryId','desc')->get();
        $shopProductBrandList = ProductBrandEntry::with('shopTypeName')->where('createBy',Auth::user()->id)->orderBy('productBrandEntryId','desc')->get();
        return ['shopProductBrandList' => $shopProductBrandList,'adminProductBrandList' => $adminProductBrandList];

    }

    public function productBrandReport(){
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $shoptypeName = ShopTypeEntry::where('shopTypeEntryId',$shopTypeId)->first()->shopTypeName;

        $globalProductBrandReport = ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::user()->id)->get()->count();
        $owneProductBrandReport = ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::user()->id)->get()->count();

        return ['shoptypeName'=> $shoptypeName,'owneProductBrandReport' => $owneProductBrandReport,'globalProductBrandReport' => $globalProductBrandReport];

    }
    public function shopProductBrandReportList($uniqueId){
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        if ($uniqueId == 1) {
            $owneProductBrandReport = ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::user()->id)->get();
            return ['owneProductBrandReport' => $owneProductBrandReport];
        }
        if ($uniqueId == 2){
           $globalProductBrandReport = ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('createBy','!=', Auth::user()->id)->get();
           return ['globalProductBrandReport' => $globalProductBrandReport];
        }


    }

    public function adminProductBrandPosition($shopTypeId){
        $productBrandcount = ProductBrandEntry::where('shopTypeId',$shopTypeId)->get()->count();
        $productBrandIncrement =  $productBrandcount +1;
        return ['productBrandIncrement' => $productBrandIncrement];
    }


    public function shopProductBrandPosition()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

            $productBrandcount = ProductBrandEntry::where('shopTypeId',$shopTypeId)->get()->count();
            $productBrandIncrement =  $productBrandcount +1;
            return ['productBrandIncrement' => $productBrandIncrement];
        }
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'productBrandName' => 'required|unique:product_brand_entries,productBrandName',
            'productBrandStatus' => 'required',
        ],
        [
            'productBrandName.required' => "Enter Product Brand Name",
            'productBrandStatus.required' => "Select Product Brand Status",
        ]);



          $ProductBrandEntry = new ProductBrandEntry();
          $ProductBrandEntry->productBrandName = $request->productBrandName;
          $ProductBrandEntry->productBrandPosition = $request->productBrandPosition;
          $ProductBrandEntry->productBrandStatus = $request->productBrandStatus;
          if (isset(Auth::user()->shopId)) {
             $shopTypeId = ShopInformation::where('shopInfoId', Auth::user()->shopId)->first()->shopTypeId;
             $ProductBrandEntry->shopTypeId = $shopTypeId;
          }
          else {
            $ProductBrandEntry->shopTypeId = $request->shopTypeId;
          }
          $ProductBrandEntry->createBy = Auth::user()->id;
          $ProductBrandEntry->created_at = Carbon::now();
          $ProductBrandEntry->save();

    }


    public function show($id)
    {
        $data = ProductBrandEntry::where('productBrandEntryId', $id)->first()->productBrandStatus;

        if ($data == 1) {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
                'productBrandStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        } else {
            ProductBrandEntry::where('productBrandEntryId', $id)->update([
                'productBrandStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }


    public function edit($id)
    {
        $editProductBrandType = ProductBrandEntry::where('productBrandEntryId', $id)->first();
        return ['editProductBrandType' => $editProductBrandType];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productBrandName' => 'required|unique:product_brand_entries,productBrandName',
            'productBrandStatus' => 'required',
        ],
        [
            'productBrandName.required' => "Enter Product Brand Name",
            'productBrandStatus.required' => "Select Product Brand Status",
        ]);

        ProductBrandEntry::where('productBrandEntryId', $id)->update([
            'productBrandName' => $request->productBrandName,
            'productBrandStatus' => $request->productBrandStatus,
            'updateBy' => Auth::user()->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductBrandEntry::where('productBrandEntryId', $id)->delete();
    }
}
