<?php

namespace App\Http\Controllers;

use App\ProductBrandEntry;
use App\ShopInformation;
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


    public function productBrandPositions($shopTypeId){
        $categorycount = ProductBrandEntry::where('shopTypeId',$shopTypeId)->get()->count();
        $categoryIncrement =  $categorycount +1;
        return ['categoryIncrement' => $categoryIncrement];
    }




    public function brandPositions()
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
            'productBrandName' => 'required',
            'productBrandStatus' => 'required',
        ],
            [
                'productBrandName.required' => "Enter Product Brand Name",
                'productBrandStatus.required' => "Select Product Brand Status",
            ]);

        if (Auth::user()->shopId == "") {
              if (ProductBrandEntry::where('shopTypeId',$request->shopTypeId)->where('productBrandName', $request->productBrandName)->exists()) {
                  return ['changeProductBrandName' => 'Change Product Brand Name'];
                  }
              else {
                    ProductBrandEntry::insert([
                        'productBrandName' => $request->productBrandName,
                        'productBrandStatus' => $request->productBrandStatus,
                        'createByType' => Auth::user()->id,
                        'shopTypeId' => $request->shopTypeId,
                        'productBrandPosition' => $request->productBrandPosition,
                        'createBy' => Auth::user()->id,
                        'created_at' => Carbon::now(),
                    ]);
                }
        }
        else {

            $shopTypeId = ShopInformation::where('shopInfoId', Auth::user()->shopId)->first()->shopTypeId;

            if (ProductBrandEntry::where('shopTypeId',$shopTypeId)->where('productBrandName', $request->productBrandName)->exists()) {
                return ['changeProductBrandName' => 'Change Product Brand Name'];
             }
            else {
                    ProductBrandEntry::insert([
                    'productBrandName' => $request->productBrandName,
                    'productBrandStatus' => $request->productBrandStatus,
                    'createByType' => Auth::user()->id,
                    'shopTypeId' => $shopTypeId,
                    'productBrandPosition' => $request->productBrandPosition,
                    'createBy' => Auth::user()->id,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
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
            'productBrandName' => 'required',
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
