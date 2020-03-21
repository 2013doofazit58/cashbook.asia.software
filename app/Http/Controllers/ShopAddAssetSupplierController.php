<?php

namespace App\Http\Controllers;

use App\ShopAddAssetSupplierEntry;
use App\ShopInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopAddAssetSupplierController extends Controller
{
    public function index()
    {
       if (isset(Auth::user()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
           $assetSupplierGetData = ShopAddAssetSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->paginate(20);
           return ['assetSupplierGetData'=> $assetSupplierGetData];
       }
       else {
           $assetSupplierGetData = ShopAddAssetSupplierEntry::where('createBy',Auth::User()->id)->paginate(20);
           return ['assetSupplierGetData'=> $assetSupplierGetData];
       }
    }


    public function create()
    {
      if (isset(Auth::user()->shopId)) {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
          $countCode = ShopAddAssetSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get()->count();
          $autoIncrementCode  = $countCode + 1;
          return ['autoIncrementCode' => $autoIncrementCode];
      }
    }

    public function assetSupplierList()
    {
       if (isset(Auth::user()->shopId)) {
           $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
           $assetSupplierGetData = ShopAddAssetSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->paginate(20);
           return ['assetSupplierGetData'=> $assetSupplierGetData];
       }
       else {
           $assetSupplierGetData = ShopAddAssetSupplierEntry::where('createBy',Auth::User()->id)->paginate(20);
           return ['assetSupplierGetData'=> $assetSupplierGetData];
       }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'assetSupplierName' => 'required',
            'assetSupplierMail' => 'required|unique:shop_add_asset_supplier_entries,assetSupplierMail',
            'assetSupplierPhone' => 'required|numeric',
            'assetSupplierAddress' => 'required',
        ]);

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        $assetSupplierData = new ShopAddAssetSupplierEntry();
        $assetSupplierData->assetSupplierName = $request->assetSupplierName;
        $assetSupplierData->assetSupplierCode = $request->assetSupplierCode;
        $assetSupplierData->assetSupplierPhone = $request->assetSupplierPhone;
        $assetSupplierData->assetSupplierHotLine = $request->assetSupplierHotLine;
        $assetSupplierData->assetSupplierMail = $request->assetSupplierMail;
        $assetSupplierData->assetSupplierFb = $request->assetSupplierFb;
        $assetSupplierData->assetSupplierWeb = $request->assetSupplierWeb;
        $assetSupplierData->assetSupplierImo = $request->assetSupplierImo;
        $assetSupplierData->assetSupplierAddress = $request->assetSupplierAddress;
        $assetSupplierData->assetSupplierAddress = $request->assetSupplierAddress;
        $assetSupplierData->shopTypeId = $shopTypeId;
        $assetSupplierData->createBy = Auth::user()->id;
        $assetSupplierData->save();
    }


   public function show($id)
   {
       //
   }


    public function edit($id)
    {
        $data=ShopAddAssetSupplierEntry::where('assetSupplierId',$id)->first();
        return ['data'=>$data];
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'assetSupplierName' => 'required',
            'assetSupplierCode' => 'required',
            'assetSupplierPhone' => 'required|numeric',
            'assetSupplierAddress' => 'required',
        ]);
        ShopAddAssetSupplierEntry::where('assetSupplierId', $id)->update([
            'assetSupplierName' => $request->assetSupplierName,
            'assetSupplierCode' => $request->assetSupplierCode,
            'assetSupplierPhone' => $request->assetSupplierPhone,
            'assetSupplierHotLine' => $request->assetSupplierHotLine,
            'assetSupplierMail' => $request->assetSupplierMail,
            'assetSupplierFb' => $request->assetSupplierFb,
            'assetSupplierWeb' => $request->assetSupplierWeb,
            'assetSupplierImo' => $request->assetSupplierImo,
            'assetSupplierAddress' => $request->assetSupplierAddress,
            'updateBy' => Auth::user()->id,
        ]);
    }

    public function destroy($id)
    {
        $data=ShopAddAssetSupplierEntry::where('assetSupplierId',$id)->delete();
    }

}
