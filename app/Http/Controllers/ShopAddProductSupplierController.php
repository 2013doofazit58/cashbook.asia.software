<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\AddProductSupplierEntry;
use App\ShopInformation;

class ShopAddProductSupplierController extends Controller
{

    public function index()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $productSupplierGetData = AddProductSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->paginate(20);
            return ['productSupplierGetData'=> $productSupplierGetData];
        }
        else {
            $productSupplierGetData = AddProductSupplierEntry::where('createBy',Auth::User()->id)->paginate(20);
            return ['productSupplierGetData'=> $productSupplierGetData];
        }
    }


    public function create()
    {
      if (isset(Auth::user()->shopId)) {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $countCode = AddProductSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get()->count();
        $autoIncrementCode  = $countCode + 1;
        return ['autoIncrementCode' => $autoIncrementCode];
      }
    }
    public function productSupplierList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $productSupplierGetData = AddProductSupplierEntry::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->paginate(20);
            return ['productSupplierGetData'=> $productSupplierGetData];
        }
        else {
            $productSupplierGetData = AddProductSupplierEntry::where('createBy',Auth::User()->id)->paginate(20);
            return ['productSupplierGetData'=> $productSupplierGetData];
        }

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'productSupplierName' => 'required',
            'productSupplierMail' => 'required|unique:add_product_supplier_entries,productSupplierMail',
            'productSupplierCode' => 'required',
            'productSupplierPhone' => 'required|numeric',
            'productSupplierAddress' => 'required',
        ]);

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        AddProductSupplierEntry::insert([
            'productSupplierName' => $request->productSupplierName,
            'productSupplierCode' => $request->productSupplierCode,
            'productSupplierPhone' => $request->productSupplierPhone,
            'productSupplierHotLine' => $request->productSupplierHotLine,
            'productSupplierMail' => $request->productSupplierMail,
            'productSupplierFb' => $request->productSupplierFb,
            'productSupplierWeb' => $request->productSupplierWeb,
            'productSupplierImo' => $request->productSupplierImo,
            'productSupplierAddress' => $request->productSupplierAddress,
            'shopTypeId' => $shopTypeId,
            'createBy' => Auth::user()->id,
        ]);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = AddProductSupplierEntry::where('productSupplierId',$id)->first();
        return ['data'=>$data];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'productSupplierName' => 'required',
            'productSupplierCode' => 'required',
            'productSupplierPhone' => 'required|numeric',
            'productSupplierMail' => 'required|email|unique:users,email',
            'productSupplierAddress' => 'required',
        ]);
        AddProductSupplierEntry::where('productSupplierId', $id)->update([
            'productSupplierName' => $request->productSupplierName,
            'productSupplierCode' => $request->productSupplierCode,
            'productSupplierPhone' => $request->productSupplierPhone,
            'productSupplierHotLine' => $request->productSupplierHotLine,
            'productSupplierMail' => $request->productSupplierMail,
            'productSupplierFb' => $request->productSupplierFb,
            'productSupplierWeb' => $request->productSupplierWeb,
            'productSupplierImo' => $request->productSupplierImo,
            'productSupplierAddress' => $request->productSupplierAddress,
            'updateBy' => Auth::user()->id,
        ]);
    }

    public function destroy($id)
    {
        AddProductSupplierEntry::where('productSupplierId',$id)->delete();
    }
}
