<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopEmployeeEntry;
use App\ShopEmployeeType;
use App\User;
use Carbon\Carbon;
use Auth;

class ShopEmployeeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeTypeList = ShopEmployeeType::where('shopEmployeeTypeStatus',1)->orderBy('shopEmployeeTypeId','desc')->get();
        return ['employeeTypeList' => $employeeTypeList];
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
           'employeeTypeId' => 'required',
           'userName' => 'required|unique:shop_employee_entries,userName',
           'password' => 'required',
           'fullName' => 'required',
           'fatherName' => 'required',
           'motherName' => 'required',
           'dateOfBirth' => 'required',
           'religion' => 'required',
           'sex' => 'required',
           'maritalStatus' => 'required',
           'nidNumber' => 'required',
           'nationality' => 'required',
           'presentAddress' => 'required',
           'permanentAddress' => 'required',
       ]);

        $shopEmployeeEntryId = ShopEmployeeEntry::insertGetId([
            'employeeTypeId' => $request->employeeTypeId,
            'userName' => $request->userName,
            'password' => $request->password,
            'fullName' => $request->fullName,
            'fatherName' => $request->fatherName,
            'motherName' => $request->motherName,
            'dateOfBirth' => $request->dateOfBirth,
            'phoneNumber' => $request->phoneNumber,
            'religion' => $request->religion,
            'sex' => $request->sex,
            'maritalStatus' => $request->maritalStatus,
            'nidNumber' => $request->nidNumber,
            'nationality' => $request->nationality,
            'presentAddress' => $request->presentAddress,
            'permanentAddress' => $request->permanentAddress,
            'createBy' => Auth::User()->id,
            'created_at' => Carbon::now(),
        ]);
        User::insert([
            'name' => $request->fullName,
            'phone' => $request->phoneNumber,
            'employeeId' => $shopEmployeeEntryId,
            'shopAccessName' => $request->userName,
            'password' => bcrypt($request->password),
            'address' => $request->presentAddress,
            'role' => 4,
            'createBy' => Auth::User()->id,
            'created_at' => Carbon::now(),
        ]);

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
    public function destroy($id)
    {
        //
    }
}
