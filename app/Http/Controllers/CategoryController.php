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
          $adminCategoryLists = Category::with('shopTypeName')->where('createBy',Auth::user()->id)->paginate(20);
          $shopCategoryLists = Category::with('shopTypeName')->where('createBy',Auth::user()->id)->paginate(20);
          return ['adminCategoryLists' => $adminCategoryLists,'shopCategoryLists' => $shopCategoryLists];
    }


    public function create()
    {
          $role = Auth::User();
          $shopTypeNames = ShopTypeEntry::orderBy('shopTypeEntryId','desc')->get();
          return  ['shopTypeNames' => $shopTypeNames,'role' => $role];
    }

    public function cateorySelectList()
    {
        if (isset(Auth::user()->shopId)) {
            $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;
            $categoryList =  Category::where('label',1)->where('shopTypeId',$shopTypeId)->get();

            $categorylabel = Category::where('label',1)->where('shopTypeId',$shopTypeId)->get()->count();
            $categoryPositionIncre = $categorylabel +1;
            return ['categoryList' => $categoryList,'categoryPositionIncre' => $categoryPositionIncre];
        }
    }
    public function adminShopTypeIdSelect($shopTypeId)
    {
          $categoryList =  Category::where('label',1)->where('shopTypeId',$shopTypeId)->get();

          $categorylabel = Category::where('label',1)->where('shopTypeId',$shopTypeId)->get()->count();
          $categoryPositionIncre = $categorylabel +1;
          return ['categoryList' => $categoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }

    public function  categoryId($categoryId)
    {
          $subCategoryList =  Category::where('label',2)->where('previousId',$categoryId)->get();

          $categorylabel = Category::where('categoryId',$categoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$categoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['subCategoryList' => $subCategoryList,'categoryPositionIncre' => $categoryPositionIncre];

    }
    public function  subCategoryId($subCategoryId)
    {
          $thirdCategoryList =  Category::where('label',3)->where('previousId',$subCategoryId)->get();

          $categorylabel = Category::where('categoryId',$subCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$subCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['thirdCategoryList' => $thirdCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  thirdCategoryId($thirdCategoryId)
    {
          $fourCategoryList =  Category::where('label',4)->where('previousId',$thirdCategoryId)->get();

          $categorylabel = Category::where('categoryId',$thirdCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$thirdCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['fourCategoryList' => $fourCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  fourCategoryId($fourCategoryId)
    {
          $fiveCategoryList =  Category::where('label',5)->where('previousId',$fourCategoryId)->get();

          $categorylabel = Category::where('categoryId',$fourCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$fourCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['fiveCategoryList' => $fiveCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function fiveCategoryId($fiveCategoryId)
    {
          $sixCategoryList =  Category::where('label',6)->where('previousId',$fiveCategoryId)->get();

          $categorylabel = Category::where('categoryId',$fiveCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$fiveCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['sixCategoryList' => $sixCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  sixCategoryId($sixCategoryId)
    {
          $sevenCategoryList =  Category::where('label',7)->where('previousId',$sixCategoryId)->get();

          $categorylabel = Category::where('categoryId',$sixCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$sixCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['sevenCategoryList' => $sevenCategoryList,'categoryPositionIncre' => $categoryPositionIncre];
    }
    public function  sevenCategoryId($sevenCategoryId)
    {
          $categorylabel = Category::where('categoryId',$sevenCategoryId)->first()->label;
          $incrementLabel = $categorylabel +1;
          $categorylabel = Category::where('previousId',$sevenCategoryId)->where('label',$incrementLabel)->count();
          $categoryPositionIncre = $categorylabel + 1;

          return ['categoryPositionIncre' => $categoryPositionIncre];
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

              if (Category::where('shopTypeId',$request->shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
                   return ['changeCategoryName'=>'Change Your Category Name'];
              }
              else {

                if (isset($request->sevenCategory)) {
                  $Category = new Category();
                  $Category->categoryName = $request->categoryName;
                  $Category->categoryPosition = $request->categoryPosition;
                  $Category->categoryStatus = $request->categoryStatus;
                  if (isset($request->subCategoryStatus)){
                    $Category->subCategoryStatus =  true;
                  }
                  else {
                    $Category->subCategoryStatus = false;
                  }
                  if (isset($request->sevenCategory)) {
                    $Category->previousId = $request->sevenCategory;
                  }
                  if (isset($request->sevenCategory)) {
                    $label = Category::where('categoryId',$request->sevenCategory)->first()->label;
                    $incrementLabel = $label+1;
                    $Category->label = $incrementLabel;
                  }
                  $Category->shopTypeId = $request->shopTypeId;
                  $Category->createBy = Auth::User()->id;
                  $Category->created_at = Carbon::now();
                  $Category->save();
                  return ;
                }

                if (isset($request->sixCategory)) {
                    $Category = new Category();
                    $Category->categoryName = $request->categoryName;
                    $Category->categoryPosition = $request->categoryPosition;
                    $Category->categoryStatus = $request->categoryStatus;
                    if (isset($request->subCategoryStatus)){
                      $Category->subCategoryStatus =  true;
                    }
                    else {
                      $Category->subCategoryStatus = false;
                    }
                    if (isset($request->sixCategory)) {
                      $Category->previousId = $request->sixCategory;
                    }
                    if (isset($request->sixCategory)) {
                      $label = Category::where('categoryId',$request->sixCategory)->first()->label;
                      $incrementLabel = $label+1;
                      $Category->label = $incrementLabel;
                    }
                    $Category->shopTypeId = $request->shopTypeId;
                    $Category->createBy = Auth::User()->id;
                    $Category->created_at = Carbon::now();
                    $Category->save();
                    return ;
                 }

                 if (isset($request->fiveCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fiveCategory)) {
                     $Category->previousId = $request->fiveCategory;
                   }
                   if (isset($request->fiveCategory)) {
                     $label = Category::where('categoryId',$request->fiveCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $request->shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                 }

               if (isset($request->fourCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fourCategory)) {
                     $Category->previousId = $request->fourCategory;
                   }
                   if (isset($request->fourCategory)) {
                     $label = Category::where('categoryId',$request->fourCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $request->shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                }


               if (isset($request->thirdCategory)) {
                     $Category = new Category();
                     $Category->categoryName = $request->categoryName;
                     $Category->categoryPosition = $request->categoryPosition;
                     $Category->categoryStatus = $request->categoryStatus;
                     if (isset($request->subCategoryStatus)){
                       $Category->subCategoryStatus =  true;
                     }
                     else {
                       $Category->subCategoryStatus = false;
                     }
                     if (isset($request->thirdCategory)) {
                       $Category->previousId = $request->thirdCategory;
                     }
                     if (isset($request->thirdCategory)) {
                       $label = Category::where('categoryId',$request->thirdCategory)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                     }
                     $Category->shopTypeId = $request->shopTypeId;
                     $Category->createBy = Auth::User()->id;
                     $Category->created_at = Carbon::now();
                     $Category->save();
                     return ;
                }

               if (isset($request->subCategory)) {
                 $Category = new Category();
                 $Category->categoryName = $request->categoryName;
                 $Category->categoryPosition = $request->categoryPosition;
                 $Category->categoryStatus = $request->categoryStatus;
                 if (isset($request->subCategoryStatus)){
                   $Category->subCategoryStatus =  true;
                 }
                 else {
                   $Category->subCategoryStatus = false;
                 }
                 if (isset($request->category)) {
                   $Category->previousId = $request->subCategory;
                 }
                 if (isset($request->subCategory)) {
                   $label = Category::where('categoryId',$request->subCategory)->first()->label;
                   $incrementLabel = $label+1;
                   $Category->label = $incrementLabel;
                 }
                 $Category->shopTypeId = $request->shopTypeId;
                 $Category->createBy = Auth::User()->id;
                 $Category->created_at = Carbon::now();
                 $Category->save();
                 return ;
               }


               if (isset($request->category)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->category)) {
                       $Category->previousId = $request->category;
                   }
                   if (isset($request->category)) {
                       $label = Category::where('categoryId',$request->category)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $request->shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
               }

               $Category = new Category();
               $Category->categoryName = $request->categoryName;
               $Category->categoryPosition = $request->categoryPosition;
               $Category->categoryStatus = $request->categoryStatus;
               if (isset($request->subCategoryStatus)){
                 $Category->subCategoryStatus =  true;
               }
               else {
                 $Category->subCategoryStatus = false;
               }
               $Category->shopTypeId = $request->shopTypeId;
               $Category->createBy = Auth::User()->id;
               $Category->created_at = Carbon::now();
               $Category->save();

             }
         }

        else {
          $shopTypeId = ShopInformation::where('shopInfoId',Auth::user()->shopId)->first()->shopTypeId;

          if (Category::where('shopTypeId',$shopTypeId)->where('categoryName',$request->categoryName)->exists()) {
               return ['changeCategoryName'=>'Change Your Category Name'];
          }
          else {
                if (isset($request->sevenCategory)) {
                  $Category = new Category();
                  $Category->categoryName = $request->categoryName;
                  $Category->categoryPosition = $request->categoryPosition;
                  $Category->categoryStatus = $request->categoryStatus;
                  if (isset($request->subCategoryStatus)){
                    $Category->subCategoryStatus =  true;
                  }
                  else {
                    $Category->subCategoryStatus = false;
                  }
                  if (isset($request->sevenCategory)) {
                    $Category->previousId = $request->sevenCategory;
                  }
                  if (isset($request->sevenCategory)) {
                    $label = Category::where('categoryId',$request->sevenCategory)->first()->label;
                    $incrementLabel = $label+1;
                    $Category->label = $incrementLabel;
                  }
                  $Category->shopTypeId = $shopTypeId;
                  $Category->createBy = Auth::User()->id;
                  $Category->created_at = Carbon::now();
                  $Category->save();
                  return ;
                }

                if (isset($request->sixCategory)) {
                    $Category = new Category();
                    $Category->categoryName = $request->categoryName;
                    $Category->categoryPosition = $request->categoryPosition;
                    $Category->categoryStatus = $request->categoryStatus;
                    if (isset($request->subCategoryStatus)){
                      $Category->subCategoryStatus =  true;
                    }
                    else {
                      $Category->subCategoryStatus = false;
                    }
                    if (isset($request->sixCategory)) {
                      $Category->previousId = $request->sixCategory;
                    }
                    if (isset($request->sixCategory)) {
                      $label = Category::where('categoryId',$request->sixCategory)->first()->label;
                      $incrementLabel = $label+1;
                      $Category->label = $incrementLabel;
                    }
                    $Category->shopTypeId = $shopTypeId;
                    $Category->createBy = Auth::User()->id;
                    $Category->created_at = Carbon::now();
                    $Category->save();
                    return ;
                 }

                 if (isset($request->fiveCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fiveCategory)) {
                     $Category->previousId = $request->fiveCategory;
                   }
                   if (isset($request->fiveCategory)) {
                     $label = Category::where('categoryId',$request->fiveCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                 }

               if (isset($request->fourCategory)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->fourCategory)) {
                     $Category->previousId = $request->fourCategory;
                   }
                   if (isset($request->fourCategory)) {
                     $label = Category::where('categoryId',$request->fourCategory)->first()->label;
                     $incrementLabel = $label+1;
                     $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
                }


               if (isset($request->thirdCategory)) {
                     $Category = new Category();
                     $Category->categoryName = $request->categoryName;
                     $Category->categoryPosition = $request->categoryPosition;
                     $Category->categoryStatus = $request->categoryStatus;
                     if (isset($request->subCategoryStatus)){
                       $Category->subCategoryStatus =  true;
                     }
                     else {
                       $Category->subCategoryStatus = false;
                     }
                     if (isset($request->thirdCategory)) {
                       $Category->previousId = $request->thirdCategory;
                     }
                     if (isset($request->thirdCategory)) {
                       $label = Category::where('categoryId',$request->thirdCategory)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                     }
                     $Category->shopTypeId = $shopTypeId;
                     $Category->createBy = Auth::User()->id;
                     $Category->created_at = Carbon::now();
                     $Category->save();
                     return ;
                }

               if (isset($request->subCategory)) {
                 $Category = new Category();
                 $Category->categoryName = $request->categoryName;
                 $Category->categoryPosition = $request->categoryPosition;
                 $Category->categoryStatus = $request->categoryStatus;
                 if (isset($request->subCategoryStatus)){
                   $Category->subCategoryStatus =  true;
                 }
                 else {
                   $Category->subCategoryStatus = false;
                 }
                 if (isset($request->category)) {
                   $Category->previousId = $request->subCategory;
                 }
                 if (isset($request->subCategory)) {
                   $label = Category::where('categoryId',$request->subCategory)->first()->label;
                   $incrementLabel = $label+1;
                   $Category->label = $incrementLabel;
                 }
                 $Category->shopTypeId = $shopTypeId;
                 $Category->createBy = Auth::User()->id;
                 $Category->created_at = Carbon::now();
                 $Category->save();
                 return ;
               }


               if (isset($request->category)) {
                   $Category = new Category();
                   $Category->categoryName = $request->categoryName;
                   $Category->categoryPosition = $request->categoryPosition;
                   $Category->categoryStatus = $request->categoryStatus;
                   if (isset($request->subCategoryStatus)){
                     $Category->subCategoryStatus =  true;
                   }
                   else {
                     $Category->subCategoryStatus = false;
                   }
                   if (isset($request->category)) {
                       $Category->previousId = $request->category;
                   }
                   if (isset($request->category)) {
                       $label = Category::where('categoryId',$request->category)->first()->label;
                       $incrementLabel = $label+1;
                       $Category->label = $incrementLabel;
                   }
                   $Category->shopTypeId = $shopTypeId;
                   $Category->createBy = Auth::User()->id;
                   $Category->created_at = Carbon::now();
                   $Category->save();
                   return ;
               }

               $Category = new Category();
               $Category->categoryName = $request->categoryName;
               $Category->categoryPosition = $request->categoryPosition;
               $Category->categoryStatus = $request->categoryStatus;
               if (isset($request->subCategoryStatus)){
                 $Category->subCategoryStatus =  true;
               }
               else {
                 $Category->subCategoryStatus = false;
               }
               $Category->shopTypeId = $shopTypeId;
               $Category->createBy = Auth::User()->id;
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
