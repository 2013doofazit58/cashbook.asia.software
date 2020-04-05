<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddProductSupplierEntry;
use App\AdminPurchaseType;
use App\UniteEntry;
use App\ShopInformation;
use App\ProductName;
use App\PurchaseInvoice;
use App\PurchaseProductEntry;
use Carbon\Carbon;
use Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

        $purchaseInvoiceList = PurchaseInvoice::with('productSupplierName')->where('shopId',Auth::user()->shopId)->where('shopUserId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
        $adminPurchaseTypeList = AdminPurchaseType::all();
        return ['purchaseInvoiceList' => $purchaseInvoiceList,'adminPurchaseTypeList' => $adminPurchaseTypeList];
    }

    public function purchaseInvoiceShow()
    {
        if (Auth::user()->shopId) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $purchaseInvoice = PurchaseInvoice::where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get()->count();
            $purchaseInvoiceIncrement = $purchaseInvoice + 1;
            $date = Carbon::now()->format('d/m/Y');
            return ['date' => $date, 'purchaseInvoiceIncrement' => $purchaseInvoiceIncrement];
        }
    }
    public function shopWishProductSupplier()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $productSupplierList = AddProductSupplierEntry::orderBy('productSupplierId','desc')->where('shopTypeId',$shopTypeId)->where('createBy',Auth::User()->id)->get();
        return ['productSupplierList' => $productSupplierList];
    }
    public function shopWishProductSupplierId($productSupplierId)
    {
        $singleProductSupplier = AddProductSupplierEntry::where('productSupplierId',$productSupplierId)->first();
        $productSupplierPhone = $singleProductSupplier->productSupplierPhone;
        $productSupplierAddress = $singleProductSupplier->productSupplierAddress;

        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $previousPayableDue = PurchaseInvoice::where('productSupplierId',$productSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->first();
        if (isset($previousPayableDue->previousPayableDue)) {
            $previousBill = $previousPayableDue->previousPayableDue;
            return ['previousBill'=> $previousBill,'productSupplierPhone' => $productSupplierPhone,'productSupplierAddress'=>$productSupplierAddress];
        }
        return ['productSupplierPhone' => $productSupplierPhone,'productSupplierAddress'=>$productSupplierAddress];
    }
    public function purchaseTypeShow()
    {
        $purchaseType = AdminPurchaseType::orderBY('purchaseTypeId','desc')->get();
        return ['purchaseType' => $purchaseType];
    }
    public function unitNameShow()
    {
          $unitNameShow= UniteEntry::orderBy('uniteEntryId','desc')->get();
          return  ['unitNameShow' => $unitNameShow];
    }
    public function productNameShow()
    {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $productNameList = ProductName::where('shopTypeId',$shopTypeId)->where('shopId',Auth::user()->shopId)->get();
          return  ['productNameList' => $productNameList];
    }

    public function productList()
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $purchaseProductList = PurchaseProductEntry::with('productName','unitName')->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
        return ['purchaseProductList' => $purchaseProductList];
    }
    public function totalPurchaseValue($purchaseInvoiceNo)
    {
        $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
        $purchaseProductList = PurchaseProductEntry::where('purchaseInvoiceNo',$purchaseInvoiceNo)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->get();
        return ['purchaseProductList' => $purchaseProductList];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $this->validate($request, [
              'productSupplierId' => 'required',
              'purchaseTypeId' => 'required',
          ],
          [
             'productSupplierId.required' => 'Select Product Supplier  Name',
             'purchaseTypeId.required' => 'Select Purchase Type Name',
          ]);

          $purchaseTypeId = implode(',', array_values($request->purchaseTypeId));

          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          $purchaseInvoice = new PurchaseInvoice();
          $purchaseInvoice->purchaseDate = $request->purchaseDate;
          $purchaseInvoice->purchaseInvoiceNo = $request->purchaseInvoiceNo;
          $purchaseInvoice->productSupplierId = $request->productSupplierId;
          $purchaseInvoice->purchaseTypeId = $purchaseTypeId;
          $purchaseInvoice->totalPurchaseValue = $request->totalPurchaseValue;
          $purchaseInvoice->carriageInward = $request->carriageInward;
          $purchaseInvoice->totalAmount = $request->totalAmount;
          $purchaseInvoice->discount = $request->discount;
          $purchaseInvoice->supplierPayable = $request->supplierPayable;
          $purchaseInvoice->otherCost = $request->otherCost;
          $purchaseInvoice->damageAndWarranty = $request->damageAndWarranty;
          $purchaseInvoice->totalProductCost = $request->totalProductCost;
          // if (PurchaseInvoice::where('productSupplierId',$request->productSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->exists()) {
          //     $previousPayableDue = PurchaseInvoice::where('productSupplierId',$request->productSupplierId)->where('shopId',Auth::user()->shopId)->where('shopTypeId',$shopTypeId)->latest()->first()->previousPayableDue;
          //       if ($request->currentPayable > $request->payable) {
          //         $previousPayable = $request->currentPayable - $request->payable;
          //         $totalPayableBill = $previousPayable + $previousPayableDue;
          //         $purchaseInvoice->previousPayableDue = $totalPayableBill;
          //       }
          // }
          // else {
          //     if ($request->currentPayable > $request->payable) {
          //       $previousPayable = $request->currentPayable - $request->payable;
          //       $purchaseInvoice->previousPayableDue = $previousPayable;
          //     }
          // }
          $purchaseInvoice->currentPayable = $request->currentPayable;
          // $purchaseInvoice->totalPayable = $request->payable;
          $purchaseInvoice->shopId = Auth::user()->shopId;
          $purchaseInvoice->shopTypeId = $shopTypeId;
          $purchaseInvoice->shopUserId = Auth::user()->shopId;
          $purchaseInvoice->createBy = Auth::User()->id;
          $purchaseInvoice->created_at = Carbon::now();
          $purchaseInvoice->save();
    }
    public function productEntry(Request $request)
    {
        if (PurchaseProductEntry::where('purchaseInvoiceNo',$request->purchaseInvoiceNo)->where('productId',$request->productId)->where('unitId',$request->unitId)->exists()) {
             PurchaseProductEntry::where('purchaseInvoiceNo',$request->purchaseInvoiceNo)->where('productId',$request->productId)->where('unitId',$request->unitId)->update([
               'quantity' => $request->quantity,
               'unitPrice' => $request->unitPrice,
               'totalPrice' => $request->totalPrice,
             ]);

        }
        else {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
           PurchaseProductEntry::insert([
              'purchaseInvoiceNo' => $request->purchaseInvoiceNo,
              'productId' => $request->productId,
              'quantity' => $request->quantity,
              'unitId' => $request->unitId,
              'unitPrice' => $request->unitPrice,
              'totalPrice' => $request->totalPrice,
              'shopId' => Auth::user()->shopId,
              'shopTypeId' => $shopTypeId,
              'createBy' => Auth::User()->id,
              'created_at' => Carbon::now(),
          ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($purchaseProductId)
    {
        PurchaseProductEntry::where('purchaseProductId',$purchaseProductId)->delete();
    }
}
