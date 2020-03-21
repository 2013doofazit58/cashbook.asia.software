<?php

namespace App\Http\Controllers;

use App\AssetBrandEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopAssetBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AssetBrandEntry::where('createBy',Auth::user()->id)->orderBy('assetBrandEntryId','desc')->paginate(20);
        return  ['shopAssetData' => $data];
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
        //
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
        $data = AssetBrandEntry::where('assetBrandEntryId',$id)->first();
        return ['ShopAssetdata'=>$data];
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
        $this->validate($request, [
            'assetBrandName' => 'required',
            'assetBrandStatus' => 'required',
        ],
            [
                'assetBrandName.required' => "Enter Asset Brand Name",
                'assetBrandStatus.required' => "Select Asset Brand Status",
            ]);
        $data = AssetBrandEntry::where('assetBrandEntryId',$id)->update([
            'assetBrandName' => $request->assetBrandName,
            'assetBrandStatus' => $request->assetBrandStatus,
            'updateBy' => Auth::user()->id,
            'updated_at' => Carbon::now(),
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
        //
    }
}
