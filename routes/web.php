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
Route::resource('/adminPurchaseType','AdminPurchaseTypeController');

////////////////  Admin Shop Login Route    //////////////////
Route::get('/shop/login','AdminShopInformationController@shoplogin');
Route::resource('/adminshopInformation','AdminShopInformationController');

/////////////////     Inventory Route        //////////////////
// Category
Route::resource('/category','CategoryController');
Route::get('/cateorySelectList','CategoryController@cateorySelectList');
Route::get('/categoryId/{categoryId}','CategoryController@categoryId');
Route::get('/subCategoryId/{subCategoryId}','CategoryController@subCategoryId');
Route::get('/thirdCategoryId/{thirdCategoryId}','CategoryController@thirdCategoryId');
Route::get('/fourCategoryId/{fourCategoryId}','CategoryController@fourCategoryId');
Route::get('/fiveCategoryId/{fiveCategoryId}','CategoryController@fiveCategoryId');
Route::get('/sixCategoryId/{sixCategoryId}','CategoryController@sixCategoryId');
Route::get('/sevenCategoryId/{sevenCategory}','CategoryController@sevenCategoryId');
Route::get('/adminShopTypeIdSelect/{shopTypeId}','CategoryController@adminShopTypeIdSelect');
// Product
Route::resource('/productName','ProductNameController');
Route::get('/productCateorySelectList','ProductNameController@productCateorySelectList');
Route::get('/productCategoryId/{categoryId}','ProductNameController@productCategoryId');
Route::get('/productSubCategoryId/{subCategoryId}','ProductNameController@productSubCategoryId');
Route::get('/productThirdCategoryId/{thirdCategoryId}','ProductNameController@productThirdCategoryId');
Route::get('/productFourCategoryId/{fourCategoryId}','ProductNameController@productFourCategoryId');
Route::get('/productFiveCategoryId/{fiveCategoryId}','ProductNameController@productFiveCategoryId');
Route::get('/productSixCategoryId/{sixCategoryId}','ProductNameController@productSixCategoryId');

// InventoryReport
Route::get('/inventoryProductNameWithoutPrice','InventoryReportController@inventoryProductNameWithoutPrice');
Route::get('/inventoryProductNameWithPrice','InventoryReportController@inventoryProductNameWithPrice');
Route::get('/invetoryCategoryWithoutPriceList','InventoryReportController@invetoryCategoryWithoutPriceList');
Route::get('/invetoryCategoryWithPriceList','InventoryReportController@invetoryCategoryWithPriceList');
Route::get('/lowQuantityProductList','InventoryReportController@lowQuantityProductList');
Route::get('/expireDateOverProductList','InventoryReportController@expireDateOverProductList');
Route::get('/expireDateSoonProductList','InventoryReportController@expireDateSoonProductList');


/////////////////      Purchase Route        //////////////////
//  Brand
Route::resource('/brandEntry','BrandEntryController');
//  Purchase
Route::resource('/purchaseInvoice','PurchaseController');
Route::get('/shopWishProductSupplier','PurchaseController@shopWishProductSupplier');
Route::get('/shopWishProductSupplierId/{ProductSupplierId}','PurchaseController@shopWishProductSupplierId');
Route::get('/purchaseInvoiceShow','PurchaseController@purchaseInvoiceShow');
Route::get('/purchaseTypeShow','PurchaseController@purchaseTypeShow');
Route::get('/unitNameShow','PurchaseController@unitNameShow');
Route::get('/productNameShow','PurchaseController@productNameShow');
Route::post('/productEntry','PurchaseController@productEntry');
Route::get('/productList','PurchaseController@productList');
Route::get('/totalPurchaseValue/{purchaseInvoiceNo}','PurchaseController@totalPurchaseValue');


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
Route::get('/adminProductBrandPosition/{shopTypeId}','ShopProductBrandController@adminProductBrandPosition');
Route::get('/shopProductBrandPosition','ShopProductBrandController@shopProductBrandPosition');
Route::get('/shopProductBrandReport','ShopProductBrandController@productBrandReport');
Route::get('/shopProductBrandReportList/{uniqueId}','ShopProductBrandController@shopProductBrandReportList');
Route::resource('/shopAssetBrandEntry','ShopAssetBrandController');
Route::get('/shopAssetBrandReport','ShopAssetBrandController@shopAssetBrandReport');

////////////////////////////// Shop Admin Setting ////////////////////////////////////
Route::resource('/addProductSupplier','ShopAddProductSupplierController');
Route::get('/productSupplierList','ShopAddProductSupplierController@productSupplierList');

Route::resource('/addAssetSupplier','ShopAddAssetSupplierController');
Route::get('/assetSupplierList','ShopAddAssetSupplierController@assetSupplierList');

Route::resource('/shopAssetCategory','ShopAssetCategoryController');
Route::get('/assetCateorySelectList','ShopAssetCategoryController@assetCateorySelectList');
Route::get('/assetCategoryId/{assetCategoryId}','ShopAssetCategoryController@assetCategoryId');
Route::get('/assetSubCategoryId/{assetSubCategoryId}','ShopAssetCategoryController@assetSubCategoryId');
Route::get('/assetThirdCategoryId/{assetThirdCategoryId}','ShopAssetCategoryController@assetThirdCategoryId');
Route::get('/assetFourCategoryId/{assetFourCategoryId}','ShopAssetCategoryController@assetFourCategoryId');
Route::get('/assetFiveCategoryId/{assetFiveCategoryId}','ShopAssetCategoryController@assetFiveCategoryId');
Route::get('/assetSixCategoryId/{assetSixCategoryId}','ShopAssetCategoryController@assetSixCategoryId');
Route::get('/assetSevenCategoryId/{assetSevenCategoryId}','ShopAssetCategoryController@assetSevenCategoryId');


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
// Product Price Setup
Route::resource('/productPriceSetup','ProductPriceSetupController');
Route::get('/productCategoryLists','ProductPriceSetupController@productCategoryLists');
Route::get('/productCategoryIdCatch/{categoryId}','ProductPriceSetupController@productCategoryIdCatch');
Route::get('/productNameIdCatch/{productNameId}','ProductPriceSetupController@productNameIdCatch');

// Shop Report
Route::get('/shopTypeNameList','ShopReportController@shoptype');
Route::get('/categoryNameList','ShopReportController@categorydata');
Route::get('/categoryOwnerShow/{categoryLabel}','ShopReportController@categoryOwnerShow');
Route::get('/categoryGlobalShow/{categoryLabel}','ShopReportController@categoryGlobalShow');
Route::get('/condition','ShopReportController@condition');
Route::get('/shopTypeTable','ShopReportController@shopTypeTable');
Route::get('/adminCategoryListShow/{shopTypeId}/{labelId}','ShopReportController@adminCategoryListShow');
Route::get('/categoryGlobalCount','ShopReportController@categoryGlobalCount');
Route::get('/shopAssetCategoryReportOwner','ShopReportController@shopAssetCategoryReportOwner');
Route::get('/shopAssetCategoryReportOwnerShow/{labelId}','ShopReportController@shopAssetCategoryReportOwnerShow');
Route::get('/shopAssetCategoryReportGlobal','ShopReportController@shopAssetCategoryReportGlobal');
Route::get('/shopAssetCategoryReportGlobalShow/{labelId}','ShopReportController@shopAssetCategoryReportGlobalShow');

/////////////////     Setting Route         //////////////////
//change Password
Route::resource('/changePassword','PasswordChangeController');
//profile setting
Route::resource('/settingsProfile','SettingsController');


Route::get('{anypath}','HomeController@index')->where( 'path', '([A-z\d-\/_.]+)? ');
