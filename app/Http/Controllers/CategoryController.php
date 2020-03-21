<?php

namespace App\Http\Controllers;

use Cassandra\Custom;
use Illuminate\Http\Request;
use App\Category;
use App\ShopTypeEntry;
use App\ShopInformation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $adminCategoryLists = Category::with('shopTypeName')->paginate(20);
        $shopCategoryLists = Category::with('shopTypeName')->where('createBy',Auth::user()->id)->paginate(20);
        return ['adminCategoryLists' => $adminCategoryLists,'shopCategoryLists' => $shopCategoryLists];
    }


    public function create()
    {
        $shopTypeNames = ShopTypeEntry::orderBy('shopTypeEntryId','desc')->get();
        $role = Auth::user();
        return  ['shopTypeNames' => $shopTypeNames,'role' => $role];
    }
    public function categorySelect()
    {
       $allcategory = Category::where('createBy',Auth::user()->id)->where('subCategoryStatus',1)->get();
       return ['allcategory' => $allcategory];
    }
    public function categoryIdCatch($categoryId)
    {
        $categorylabel = Category::where('categoryId',$categoryId)->first()->label;
        $incrementLabel = $categorylabel +1;
        $categorylabel = Category::where('previousId',$categoryId)->where('label',$incrementLabel)->count();
        $incrementLabels = $categorylabel + 1;
        return ['categorylabel' => $incrementLabels];
    }




    public function categoryPositions()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $categorycount = Category::where('label',1)->where('shopTypeId',$shopTypeId)->get()->count();
            $categoryIncrement =  $categorycount +1;

            return ['categoryIncrement' => $categoryIncrement];
        }
    }





    public function adminShopTypeIdSelect($shopTypeId)
    {
        $categorycount = Category::where('label',1)->where('shopTypeId',$shopTypeId)->get()->count();
        $categoryIncrement =  $categorycount +1;
        return ['categoryIncrement' => $categoryIncrement];
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryStatus' => 'required',
        ],
        [
           'categoryName.required' => 'Enter Category  Name',
           'categoryStatus.required' => 'Select Category Status',
        ]);

          if (isset($request->shopTypeId)) {
                if (Category::where('shopTypeId',$request->shopTypeId)->Where('previousId',$request->previousId)->where('categoryPosition',$request->categoryPosition)->exists()) {
                    return ['changePosition'=>'Change Your Category Postition'];
                }
                elseif (Category::where('shopTypeId',$request->shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
                     return ['changeCategoryName'=>'Change Your Category Name'];
                }
          else {
               $Category = new Category();
               $Category->categoryName = $request->categoryName;
               $Category->categoryStatus = $request->categoryStatus;
               $Category->categoryPosition = $request->categoryPosition;
               if (isset($request->subCategoryStatus)){
                   $Category->subCategoryStatus =  true;
               }
               else {
                   $Category->subCategoryStatus = false;
               }
                  $Category->shopTypeId =  $request->shopTypeId;
               if (isset($request->previousId)) {
                   $Category->previousId = $request->previousId;
               }
               if (isset($request->previousId)) {
                   $label = Category::where('categoryId',$request->previousId)->first()->label;
                   $incrementLabel = $label+1;
                   $Category->label = $incrementLabel;
               }
               $Category->createBy = Auth::user()->id;
               $Category->created_at = Carbon::now();
               $Category->save();
           }
        }

        else {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          if (Category::where('shopTypeId',$shopTypeId)->Where('previousId',$request->previousId)->where('categoryPosition',$request->categoryPosition)->exists()) {
              return ['changePosition'=>'Change Your Category Postition'];
          }
          elseif (Category::where('shopTypeId',$shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
               return ['changeCategoryName'=>'Change Your Category Name'];
          }
          else {
               $Category = new Category();
               $Category->categoryName = $request->categoryName;
               $Category->categoryStatus = $request->categoryStatus;
               $Category->categoryPosition = $request->categoryPosition;
               if (isset($request->subCategoryStatus)){
                   $Category->subCategoryStatus =  true;
               }
               else {
                   $Category->subCategoryStatus = false;
               }
                  $Category->shopTypeId =  $shopTypeId;
               if (isset($request->previousId)) {
                   $Category->previousId = $request->previousId;
               }
               if (isset($request->previousId)) {
                   $label = Category::where('categoryId',$request->previousId)->first()->label;
                   $incrementLabel = $label+1;
                   $Category->label = $incrementLabel;
               }
               $Category->createBy = Auth::user()->id;
               $Category->created_at = Carbon::now();
               $Category->save();
           }
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Category::where('categoryId',$id)->first();
        return ['data'=>$data];
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryStatus' => 'required',
        ],

            [
                'categoryName.required' => 'Enter Category  Name',
                'categoryStatus.required' => 'Select Category Status',
            ]);

        if (isset($request->shopTypeId)) {



            if (Category::where('shopTypeId',$request->shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
                return ['changeCategoryName'=>'Change Your Category Name'];
            }

            else {

                Category::where('categoryId',$id)->update([
                    'categoryName' =>$request->categoryName,
                'categoryStatus' => $request->categoryStatus,
                'categoryPosition' => $request->categoryPosition,
                'shopTypeId' => $request->shopTypeId,
                'createBy' =>  Auth::user()->id,
                'created_at' => Carbon::now(),
                ]);

                if (isset($request->subCategoryStatus)){

                    Category::where('categoryId',$id)->update([
                        'subCategoryStatus' =>  true,
                    ]);

                }
                else {
                    Category::where('categoryId',$id)->update([
                        'subCategoryStatus' =>  false,
                    ]);
                }

                if (isset($request->previousId)) {
                    Category::where('categoryId',$id)->update([
                        'previousId' =>  $request->previousId,
                    ]);
                }

            }
        }

        else {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

            if (Category::where('shopTypeId',$shopTypeId)->Where('previousId',$request->previousId)->where('categoryPosition',$request->categoryPosition)->exists()) {
                return ['changePosition'=>'Change Your Category Postition'];
            }
            elseif (Category::where('shopTypeId',$shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
                return ['changeCategoryName'=>'Change Your Category Name'];
            }
            else {

                Category::where('categoryId',$id)->update([
                    'categoryName' =>$request->categoryName,
                    'categoryStatus' => $request->categoryStatus,
                    'categoryPosition' => $request->categoryPosition,
                    'shopTypeId' => $request->shopTypeId,
                    'createBy' =>  Auth::user()->id,
                    'created_at' => Carbon::now(),
                ]);

                if (isset($request->subCategoryStatus)){

                    Category::where('categoryId',$id)->update([
                        'subCategoryStatus' =>  true,
                    ]);

                }
                else {
                    Category::where('categoryId',$id)->update([
                        'subCategoryStatus' =>  false,
                    ]);
                }

                if (isset($request->previousId)) {
                    Category::where('categoryId',$id)->update([
                        'previousId' =>  $request->previousId,
                    ]);
                }
            }
        }

    }

    public function destroy($categoryId)
    {
         Category::where('categoryId',$categoryId)->delete();
    }
}
