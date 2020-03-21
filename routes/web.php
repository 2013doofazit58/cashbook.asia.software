<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/////////////////  Admin  configuration Route    //////////////////
//  AdminMenuTitle
Route::resource('/adminMenuTitle','AdminMenuTitleController');
Route::get('/statusChangeEvent/{adminMenuTitleId}','AdminMenuTitleController@changeStatuas');
//  AdminMenu
Route::resource('/adminMenu','AdminMenuController');
Route::get('/statusChangeEventMenu/{id}','AdminMenuController@changeStatus');
Route::get('/adminMenuTitlelist','AdminMenuController@adminMenuTitlelist');
//  AdminSubMenu
Route::resource('/adminSubMenu','AdminSubMenuController');
Route::get('/adminSubMenueStatus/{adminSubMenuId}','AdminSubMenuController@adminSubMenueStatus');
//  AdminTypeName
Route::resource('/adminTypeName','AdminTypeNameController');
//  AdminEntry
Route::resource('/adminEntry','AdminEntryController');
Route::get('/adminEntryUserId','AdminEntryController@adminEntryUserId');
//  AdminSetup
Route::resource('/adminSetup','AdminSetupController');
Route::get('/admintypename','AdminSetupController@admintypename');
// AdminMenuPermission
Route::resource('/adminMenuPermission','AdminMenuPermissionController');
Route::get('/permissionmenushow','AdminMenuPermissionController@permissionmenushow');
Route::get('/adminTypeShow/{adminId}','AdminMenuPermissionController@adminTypeShow');
Route::get('/adminSubMenuShow','AdminMenuPermissionController@adminSubMenuShow');
Route::get('/adminMenuShow/{adminId}/{menuId}','AdminMenuPermissionController@adminMenuShow');
Route::get('/adminSingleSubMenuShow/{adminId}/{menuId}','AdminMenuPermissionController@adminSubMenuEditShow');
Route::get('/adminPermissionMenus/{adminId}/{adminType}','AdminMenuPermissionController@adminPermissionMenus');
Route::get('/adminPermissionSubMenus/{adminId}/{adminType}','AdminMenuPermissionController@adminPermissionSubMenus');
Route::get('/adminMenuPermissionChange/{adminId}/{adminType}/{menuId}','AdminMenuPermissionController@adminMenuPermissionChange');
Route::get('/adminSubMenuPermissionChange/{adminId}/{adminType}/{subMenuId}','AdminMenuPermissionController@adminSubMenuPermissionChange');
/////////////////   Admin  Configuration  Setup Route        //////////////////
Route::resource('/adminBussinessType','AdminBussinessTypeController');
Route::resource('/uniteEntry','UniteEntryController');
Route::resource('/assetBrandEntry','AssetEntryController');
Route::resource('/shopCustomerTypeEntry','ShopCustomerTypeEntryController');
Route::resource('/shopTypeEntry','ShopTypeEntryController');
Route::resource('/bankTypeEntry','BankTypeEntryController');
Route::resource('/bankEntry','BankEntryController');
Route::resource('/adminHolidayType','AdminHolidayTypeController');
Route::resource('/adminHolidaySetup','AdminHolidaySetupController');
Route::resource('/commissionTypeEntry','CommissionTypeEntryController');
Route::resource('/productBrandEntry','ProductBrandEntryController');



Route::resource('/adminLicenceType','AdminlicenceTypeController');
Route::resource('/jobDepartmentEntry','JobDepartmentEntryController');
Route::resource('/adminMetaKeyDescription','AdminMetaKeyDescriptionController');
////////////////  Admin Shop Information Route    //////////////////
Route::get('/shop/login','AdminShopInformationController@shoplogin');
Route::resource('/adminshopInformation','AdminShopInformationController');
/////////////////     Category Route        //////////////////
Route::resource('/category','CategoryController');
Route::get('/categorySelect','CategoryController@categorySelect');
Route::get('/categoryIdCatch/{categoryId}','CategoryController@categoryIdCatch');
Route::get('/categoryPositions','CategoryController@categoryPositions');



Route::get('/adminShopTypeIdSelect/{shopTypeId}','CategoryController@adminShopTypeIdSelect');


/////////////////      Purchase Route        //////////////////
//  Purchase Brand
Route::resource('/brandEntry','BrandEntryController');


/////////////////     Setting Route         //////////////////
//change Password
Route::resource('/changePassword','PasswordChangeController');
//profile setting
Route::resource('/settingsProfile','SettingsController');


/////////////////        Shop User Route         //////////////////
// ShopUser Menu Permission
Route::resource('/shopEmployeeType','ShopEmployeeTypeController');
Route::resource('/shopEmployeeEntry','ShopEmployeeEntryController');

Route::resource('/shopMenuPermission','ShopMenuPermissionController');
Route::get('/shopEmployeeEntryLists','ShopMenuPermissionController@shopEmployeeEntryLists');
Route::get('/shopEmployeeTypeName/{shopEmployeeEntryId}','ShopMenuPermissionController@shopEmployeeTypeName');
Route::get('/shopMenuTittleShow','ShopMenuPermissionController@shopMenuTittleShow');
Route::get('/shopMenuShow','ShopMenuPermissionController@shopMenuShow');
Route::get('/shopSubMenuShow','ShopMenuPermissionController@shopSubMenuShow');
Route::get('/shopPermissionMenuShows/{employeeEntryId}/{employeeTypeId}','ShopMenuPermissionController@shopPermissionMenuShows');
Route::get('/shopPermissionSubMenuShows/{employeeEntryId}/{employeeTypeId}','ShopMenuPermissionController@shopPermissionSubMenuShows');
Route::get('/shopMenuPermissionChange/{employeeEntryId}/{employeeTypeId}/{menuId}','ShopMenuPermissionController@shopMenuPermissionChange');
Route::get('/shopSubMenuStatusDeactive/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusDeactive');
Route::get('/shopSubMenuStatusActiveFullAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveFullAccess');
Route::get('/shopSubMenuStatusActiveViewAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveViewAccess');
Route::get('/shopSubMenuStatusActiveAddAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveAddAccess');
Route::get('/shopSubMenuStatusActiveEditAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveEditAccess');



Route::resource('/shopproductBrandEntry','ShopProductBrandController');
Route::get('/productBrandPosition/{shopTypeId}','ShopProductBrandController@productBrandPositions');
Route::get('/shopproductbrandposition','ShopProductBrandController@brandPositions');

Route::resource('/shopAssetBrandEntry','ShopAssetBrandController');

////////////////////////////// shop admin setting ////////////////////////////////////
Route::resource('/addProductSupplier','ShopAddProductSupplierController');
Route::get('/productSupplierList','ShopAddProductSupplierController@productSupplierList');

Route::resource('/addAssetSupplier','ShopAddAssetSupplierController');
Route::get('/assetSupplierList','ShopAddAssetSupplierController@assetSupplierList');

Route::resource('/addBank','ShopAddBankController');
Route::get('/bankTypeEntryList','ShopAddBankController@bankTypeEntryList');
Route::get('/bankNameList','ShopAddBankController@bankNameList');

// Product Setup
Route::resource('/shopLoanProviderEntry','ShopLoanProviderEntryController');
Route::resource('/shopLoanEntry','ShopLoanEntryController');
Route::resource('/shopIncomeTypeEntry','ShopIncomeTypeEntryController');
Route::get('/shopIncomeTypeReport','ShopIncomeTypeEntryController@shopIncomeTypeReport');
Route::resource('/shopExpenceTypeEntry','ShopExpenceTypeEntryController');
Route::get('/shopExpenceTypeReport','ShopExpenceTypeEntryController@shopExpenceTypeReport');
Route::resource('/ShopEmployeeLoginTimeEntry','ShopEmployeeLoginTimeEntryController');
// Shop Report
Route::get('/shopTypeNameList','ShopReportController@shoptype');
Route::get('/categoryNameList','ShopReportController@categorydata');
Route::get('/categoryOwnerShow/{categoryLabel}','ShopReportController@categoryOwnerShow');
Route::get('/categoryGlobalShow/{categoryLabel}','ShopReportController@categoryGlobalShow');
Route::get('/condition','ShopReportController@condition');
Route::get('/shopTypeTable','ShopReportController@shopTypeTable');
Route::get('/adminCategoryListShow/{shopTypeId}/{labelId}','ShopReportController@adminCategoryListShow');
Route::get('/categoryGlobalCount','ShopReportController@categoryGlobalCount');



Route::get('{anypath}','HomeController@index')->where( 'path', '([A-z\d-\/_.]+)? ');
