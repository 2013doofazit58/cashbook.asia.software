<?php

namespace App\Http\Controllers;

use App\JobDepartmentEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobDepartmentEntryController extends Controller
{

    public function index()
    {
        $show = JobDepartmentEntry::orderBy('jobDepartmentEntryId','desc')->paginate(20);
        return ['show'=>$show];
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
          $request->validate([
              'jobDepartmentName' => 'required',
              'jobDepartmentStatus' => 'required',
          ],
          [
              'jobDepartmentName.required' => 'Enter Job Department Name',
              'jobDepartmentStatus.required' => 'Select Job Department Status',
          ]);

          if (JobDepartmentEntry::where('jobDepartmentName',$request->jobDepartmentName)->exists()){
              return ['changeJobDepartmentName'=>'Change Your Job Department Name'];
          }
          else {
              $data = new JobDepartmentEntry();
              $data->jobDepartmentName = $request->jobDepartmentName;
              $data->jobDepartmentStatus = $request->jobDepartmentStatus;
              $data->createBy = Auth::user()->id;
              $data->save();
              $data->created_at = Carbon::now();
          }
    }



    public function show($id)
    {
        $data=JobDepartmentEntry::where('jobDepartmentEntryId',$id)->first()->jobDepartmentStatus;

        if($data == 1){
            JobDepartmentEntry::where('jobDepartmentEntryId',$id)->update([
                'jobDepartmentStatus' => 0,
                'updateBy' => Auth::user()->id,
            ]);
        }
        else{
            JobDepartmentEntry::where('jobDepartmentEntryId',$id)->update([
                'jobDepartmentStatus' => 1,
                'updateBy' => Auth::user()->id,
            ]);
        }
    }


    public function edit($id)
    {
        $editData = JobDepartmentEntry::where('jobDepartmentEntryId',$id)->first();
        return ['editData'=>$editData];
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'jobDepartmentName' => 'required',
            'jobDepartmentStatus' => 'required',
        ],
        [
            'jobDepartmentName.required' => 'Enter Job Department Name',
            'jobDepartmentStatus.required' => 'Select Job Department Status',
        ]);
        $data = JobDepartmentEntry::where('jobDepartmentEntryId',$id)->update([
            'jobDepartmentName' => $request->jobDepartmentName,
            'jobDepartmentStatus'=> $request->jobDepartmentStatus,
            'updateBy'=> Auth::user()->id,
        ]);
    }


    public function destroy($id)
    {
        $dataDelete = JobDepartmentEntry::where('jobDepartmentEntryId',$id);
        $dataDelete->delete();
    }
}
