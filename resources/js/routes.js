////////////////       Admin Menu Create
import AdminMenuTitle from'./admin/adminmenucreate/adminmenu@title'
import AdminMenuTitleEdit from'./admin/adminmenucreate/edit/adminmenu@titleEdit'
import AdminMenuCreate from'./admin/adminmenucreate/adminmenu@create'
import AdminMenuEdit from'./admin/adminmenucreate/edit/adminmenu@edit'
import AdminSubmenuCreate from'./admin/adminmenucreate/adminsubmenu@create'
import AdminSubmenuEdit from'./admin/adminmenucreate/edit/adminsubmenu@edit'
import AdminTypeCreate from'./admin/adminmenucreate/admintype@create'
import AdminTypeEdit from'./admin/adminmenucreate/edit/admintype@edit'
import AdminEntryCreate from'./admin/adminmenucreate/adminentry@create'
import AdminEntryEdit from'./admin/adminmenucreate/edit/adminentry@edit'
import AdminSetupCreate from'./admin/adminmenucreate/adminsetup@create'
import AdminMenuPermission from'./admin/adminmenucreate/adminmenu@permission'
import AdminMenuPermissionList from'./admin/adminmenucreate/adminmenu@permissionlist'
import AdminMenuPermissionEdit from'./admin/adminmenucreate/edit/adminmenu@permission@edit'


/////////////  Admin Configuration Setup
import AdminAssetBrandEntry from './admin/adminconfigurationsetup/assetbrand@entry'
import AdminAssetBrandEntryEdit from './admin/adminconfigurationsetup/edit/assetbrand@entryEdit'
import BankEntry from './admin/adminconfigurationsetup/bank@entry'
import BankEntryEdit from './admin/adminconfigurationsetup/edit/bank@entryEdit'
import BankTypeEntry from './admin/adminconfigurationsetup/banktype@entry'
import BankTypeEntryEdit from './admin/adminconfigurationsetup/edit/banktype@entryEdit'
import BussinessTypeCreate from './admin/adminconfigurationsetup/bussinesstype@create'
import BussinessTypeEdit from './admin/adminconfigurationsetup/edit/bussinesstype@edit'
import CommissionTypeEntry from './admin/adminconfigurationsetup/commissiontype@entry'
import CommissionTypeEntryEdit from './admin/adminconfigurationsetup/edit/commissiontype@entryEdit'
import AdminHolidaySetup from './admin/adminconfigurationsetup/holiday@setup'
import AdminHolidaySetupEdit from './admin/adminconfigurationsetup/edit/holidaysetup@edit'
import AdminHolidayEntry from './admin/adminconfigurationsetup/holiday@type'
import AdminHolidayTypeEdit from './admin/adminconfigurationsetup/edit/holidaytype@edit'
import JobDepartmentEntry from './admin/adminconfigurationsetup/jobdepartment@entry'
import JobDepartmentEntryEdit from './admin/adminconfigurationsetup/edit/jobdepartment@entryEdit'
import LicenceTypeEntry from './admin/adminconfigurationsetup/licencetype@entry'
import LicenceTypeEdit from './admin/adminconfigurationsetup/edit/licencetype@edit'
import MetakeyDescriptionEntry from './admin/adminconfigurationsetup/metakeydescription@entry'
import MetakeyDescriptionEntryEdit from './admin/adminconfigurationsetup/edit/metakeydescription@entryEdit'
import ProductBrandEntry from './admin/adminconfigurationsetup/productbrand@entry'
import ProductBrandEntryEdit from './admin/adminconfigurationsetup/edit/productbrand@entryEdit'
import ShopCustomerTypeEntry from './admin/adminconfigurationsetup/shopcustomertype@entry'
import ShopCustomerTypeEntryEdit from './admin/adminconfigurationsetup/edit/shopcustomertype@entryEdit'
import ShopTypeEntry from './admin/adminconfigurationsetup/shoptype@entry'
import ShopTypeEntryEdit from './admin/adminconfigurationsetup/edit/shoptype@entryEdit'
import UniteEntry from './admin/adminconfigurationsetup/unite@entry'
import UniteEntryEdit from './admin/adminconfigurationsetup/edit/unite@entryEdit'

///////////////        Admin Shop Information
import ShopAddressLocationList from './admin/shopInformation/shopaddress@locationlist'
import ShopInformationList from './admin/shopInformation/shopinformation@list'

/////////////////////   Sales Page
// Product Sale
import ProductSale from'./admin/page/sales/product@sale'
// Product Report
import SalesPrice from'./admin/page/sales/product@report/sales@price'
import DiscountPrice from'./admin/page/sales/product@report/discount@price'
import DiscountWishPrice from'./admin/page/sales/product@report/discountwish@price'
import ProductShortage from'./admin/page/sales/product@report/product@shortage'
import DamageProduct from'./admin/page/sales/product@report/damage@product'
import DateExpairedProduct from'./admin/page/sales/product@report/dataexpaired@product'
import DateExpairedNotifcation from'./admin/page/sales/product@report/dataexpaired@notification'

// Sales Report
import TodayCashSales from'./admin/page/sales/sales@report/todaycash@sales'
import TodayDueSales from'./admin/page/sales/sales@report/todaydue@sales'
import TodayCashReceive from'./admin/page/sales/sales@report/todaycash@receive'
import TodayDiscount from'./admin/page/sales/sales@report/today@discount'
import TotalDue from'./admin/page/sales/sales@report/total@due'
import TotalSale from'./admin/page/sales/sales@report/total@sale'
import TotalReceive from'./admin/page/sales/sales@report/total@receive'
import TotalDiscount from'./admin/page/sales/sales@report/total@discount'
import FixedCustomerList from'./admin/page/sales/sales@report/fixedcustomer@list'
import LocalCustomerList from'./admin/page/sales/sales@report/localcustomer@list'

////////////////    Purchase Page
// Purchase Entry
import BrandEntry from'./admin/page/purchase/purchase/brand@entry'
import BrandEntryEdit from './admin/page/purchase/purchase/edit/brand@entryEdit'
import PurchaseEntry from'./admin/page/purchase/purchase/purchase@entry'
import SupplierEntry from'./admin/page/purchase/purchase/supplier@entry'

// Purchase Report
import AllSupplierList from'./admin/page/purchase/purchase@report/allsupplier@list'
import LocalSupplierList from'./admin/page/purchase/purchase@report/localsupplier@list'
import ForenSupplierList from'./admin/page/purchase/purchase@report/forensupplier@list'
import DueSupplierList from'./admin/page/purchase/purchase@report/duesupplier@list'
import SupplierPayment from'./admin/page/purchase/purchase@report/supplier@payment'
import PurchaseReturn from'./admin/page/purchase/purchase@report/purchase@return'
import PurchasePrice from'./admin/page/purchase/purchase@report/purchase@price'
import LatestPurchaseItem from'./admin/page/purchase/purchase@report/latestpurchase@item'

////////////////   Inventory Page
// Inventory
import Category from'./admin/page/inventory/inventory/category'
import CategoryEdit from'./admin/page/inventory/inventory/edit/CategoryEdit'
import ProductCode from'./admin/page/inventory/inventory/product@code'
// Inventory Report
import StockReportAmount from'./admin/page/inventory/inventory@report/stockreport@amount'
// Inventory Shortage
import BrandWiseShortage from'./admin/page/inventory/inventory@shortage/brandwise@shortage'
import BrandWiseStorckeShortage from'./admin/page/inventory/inventory@shortage/brandwisestorcke@shortage'
import CompanyWiseShortage from'./admin/page/inventory/inventory@shortage/companywise@shortage'

//////////////// HR Management Page
// HR Management
import EmployeeEntry from'./admin/page/hrmanagement/hrmanagement/employee@entry'
import EmployeeSuspendEntry from'./admin/page/hrmanagement/hrmanagement/employeesuspend@entry'
import GradeEntry from'./admin/page/hrmanagement/hrmanagement/grade@entry'
import HolidayEntry from'./admin/page/hrmanagement/hrmanagement/holiday@entry'
import LeaveEntry from'./admin/page/hrmanagement/hrmanagement/leave@entry'
import JobdepartmentEntry from'./admin/page/hrmanagement/hrmanagement/jobdepartment@entry'
import SalaryIncrementEntry from'./admin/page/hrmanagement/hrmanagement/salaryincrement@entry'

//////////////// Asset Page
// Asset
import AssetEntry from'./admin/page/asset/asset/asset@entry'
import AssetBrandEntry from'./admin/page/asset/asset/assetbrand@entry'
import AssetCategoryEntry from'./admin/page/asset/asset/assetcategory@entry'
import AssetCodeEntry from'./admin/page/asset/asset/assetcode@entry'
import AssetSupplierEntry from'./admin/page/asset/asset/assetsupplier@entry'

// Asset Report
import AssetSupplierList from'./admin/page/asset/assetcode@list/assetsupplier@list'
import AssetSupplierInfom from'./admin/page/asset/assetcode@list/assetsupplier@information'
import AssetCategoryList from'./admin/page/asset/assetcode@list/assetcategory@list'
import AssetDepraciation from'./admin/page/asset/assetcode@list/asset@depraciation'
import AssetTotlaprice from'./admin/page/asset/assetcode@list/assettotal@price'

////////////////     Admin Page
// Admin Setup
import AccountingOnlyCompany from'./admin/adminpage/adminsetup/accountingonly@company'
import CreateBusinessType from'./admin/adminpage/adminsetup/createbusiness@type'
import CreateClient from'./admin/adminpage/adminsetup/create@client'
import CreateStaff from'./admin/adminpage/adminsetup/create@staff'
import CreateMenu from'./admin/adminpage/adminsetup/create@menu'
import CreateMarketingType from'./admin/adminpage/adminsetup/createmarketing@type'
import CreateCommission from'./admin/adminpage/adminsetup/create@commission'
import CreateAdmin from'./admin/adminpage/adminsetup/create@admin'
import CreateAgent from'./admin/adminpage/adminsetup/create@agent'
import CreateLianaType from'./admin/adminpage/adminsetup/createliana@type'
import ProcessShop from'./admin/adminpage/adminsetup/process@shop'
import SalesTargetCreate from'./admin/adminpage/adminsetup/salestarget@create'
import CreateclientIp from'./admin/adminpage/adminsetup/createclient@ip'
import Purchase from'./admin/adminpage/adminsetup/purchase'
import IpNotice from'./admin/adminpage/adminsetup/ip@notice'
import Sales from'./admin/adminpage/adminsetup/sales'
import DeliverySection from'./admin/adminpage/adminsetup/delivery@section'
import Inventory from'./admin/adminpage/adminsetup/inventory'
import ClientFollowp from'./admin/adminpage/adminsetup/client@followp'
import Asset from'./admin/adminpage/adminsetup/asset'
import Hr from'./admin/adminpage/adminsetup/hr'
import Reporting from'./admin/adminpage/adminsetup/reporting'
import Message from'./admin/adminpage/adminsetup/message'
import Notification from'./admin/adminpage/adminsetup/notification'
// Mother Page
import Setup from'./admin/adminpage/motheradmin/setup'
import SupportAdmin from'./admin/adminpage/motheradmin/support@admin'
import BillingAddress from'./admin/adminpage/motheradmin/billing@address'
import SubAdmin from'./admin/adminpage/motheradmin/sub@admin'
import SuspendUnsuspendAdmin from'./admin/adminpage/motheradmin/suspend@unsuspend@admin'
import MarketingAdmin from'./admin/adminpage/motheradmin/marketing@admin'
import CommissionBaseMan from'./admin/adminpage/motheradmin/commissionbase@man'
import DeliveryMohter from'./admin/adminpage/motheradmin/delivery@section'
import IpqueryBlockadmin from'./admin/adminpage/motheradmin/ipquery@blockadmin'
import InformationEdit from'./admin/adminpage/motheradmin/information@edit'
import SalesTeam from'./admin/adminpage/motheradmin/sales@team'
import ShopList from'./admin/adminpage/motheradmin/shop@list'
import Report from'./admin/adminpage/motheradmin/report'
import MenuPermission from'./admin/adminpage/motheradmin/menu@permission'
// Support Admin
import ProblemEntry from'./admin/adminpage/supportadmin/problem@entry'
import ClientUpdata from'./admin/adminpage/supportadmin/client@update'
import TodaySupportCalendar from'./admin/adminpage/supportadmin/todaysupport@calendar'
import Feedback from'./admin/adminpage/supportadmin/feedback'
import SupportMessage from'./admin/adminpage/supportadmin/support@message'
// Billing Admin
import BillingReportDaily from'./admin/adminpage/billingadmin/billingreport@daily'
import DueBill from'./admin/adminpage/billingadmin/due@bill'
import DueBillFeedback from'./admin/adminpage/billingadmin/duebill@feedback'
import BillingMessage from'./admin/adminpage/billingadmin/billing@message'
import OverDueBill from'./admin/adminpage/billingadmin/overdue@bill'
// Sub Admin
import SubadminMenuPermission from'./admin/adminpage/subadmin/subadmin@menu@permission'
import SubadminMenuNotification from'./admin/adminpage/subadmin/subadmin@menu@notification'
import SubadminMessage from'./admin/adminpage/subadmin/subadmin@message'
import SubadminReport from'./admin/adminpage/subadmin/subadmin@report'
// Suspend And Unsuspend
import BillingadminReport from'./admin/adminpage/suspend@unsuspend/billingadmin@report'
import SuspendList from'./admin/adminpage/suspend@unsuspend/suspend@list'
import UnsuspendList from'./admin/adminpage/suspend@unsuspend/unsuspend@list'
import SuspendUnsuspendMessage from'./admin/adminpage/suspend@unsuspend/suspend@unsuspend@message'
// Marketing Admin
import MarketingSalermanList from'./admin/adminpage/marketingadmin/marketing@salermanlist'
import MarketingSalerTarget from'./admin/adminpage/marketingadmin/marketing@salertarget'
import MarketingAchieve from'./admin/adminpage/marketingadmin/marketing@achieve'
import MarketingInactiveList from'./admin/adminpage/marketingadmin/marketing@inactivelist'
import MarketingPoposedClient from'./admin/adminpage/marketingadmin/marketing@poposedclient'
import MarketingPoposedFollowp from'./admin/adminpage/marketingadmin/marketing@poposedfollowp'
import MarketingMessage from'./admin/adminpage/marketingadmin/marketing@message'
import MarketingShopEntry from'./admin/adminpage/marketingadmin/marketing@shopentry'
// Saler Man
import SalermanShopEntry from'./admin/adminpage/salerman/salerman@shopentry'
import SalermanProposerShop from'./admin/adminpage/salerman/salerman@proposershop'
import SalermanInctiveList from'./admin/adminpage/salerman/salerman@inactivelist'
import SalermanProfile from'./admin/adminpage/salerman/salerman@profile'
import SalermanMessage from'./admin/adminpage/salerman/salerman@message'
import SalermanTotalEarning from'./admin/adminpage/salerman/salerman@totalearning'
import SalermanMonthlyEarning from'./admin/adminpage/salerman/salerman@monthlyearning'
// Delivery Section
import UpdateShopInformation from'./admin/adminpage/deliverysection/update@shopinformation'
import DeliveryReport from'./admin/adminpage/deliverysection/delivery@report'
import DeliveryCalender from'./admin/adminpage/deliverysection/delivery@calender'
import DeliveryRequest from'./admin/adminpage/deliverysection/delivery@request'
import DeliveryMessage from'./admin/adminpage/deliverysection/delivery@message'
import DeliverySupportadmin from'./admin/adminpage/deliverysection/delivery@supportadmin'
// IP Query
import IPAdd from'./admin/adminpage/ipquery/ip@add'
import IPLock from'./admin/adminpage/ipquery/ip@lock'
import IPUnblock from'./admin/adminpage/ipquery/ip@unblock'
import IpQueryMessage from'./admin/adminpage/ipquery/ipquery@message'
// Information Edit Admin
import SupportPanding from'./admin/adminpage/informationedit/support@panding'
import ComplateEdit from'./admin/adminpage/informationedit/complate@edit'
import EditadminSearch from'./admin/adminpage/informationedit/editadmin@search'
import EditadminMessage from'./admin/adminpage/informationedit/editadmin@message'


///////////       Setting
import Help from'./admin/generalpage/help'
import Password from'./admin/generalpage/password'
import Refer from'./admin/generalpage/refer'
import Profile from'./admin/generalpage/profile'
import Offer from'./admin/generalpage/offer'
import Setting from'./admin/generalpage/setting'

/////////////////     Shop Menu Permission
import ShopEmployeeTypeCreate from'./shopuser/shopInformation/shopemployee@typecreate'
import ShopEmployeeTypeEdit from'./shopuser/shopInformation/edit/shopemployee@typeEdit'
import ShopMenuPermission from'./shopuser/shopInformation/shopmenu@permission'
import ShopMenuPermissionList from'./shopuser/shopInformation/shopmenu@permissionlist'
import ShopMenuPermissionEdit from'./shopuser/shopInformation/edit/adminmenu@permission@edit'

//////////////////  Shop Admin Setting
import ShopAddCategory from'./shopuser/shopadminsetting/shopadd@category'
import ShopAddProductBrand from'./shopuser/shopadminsetting/shopaddproduct@brand'
import ShopAddAssetBrand from'./shopuser/shopadminsetting/shopaddasset@brand'
import ShopAddEmployee from'./shopuser/shopadminsetting/shopadd@employee'
import ShopAddProductSupplierEntry from'./shopuser/shopadminsetting/shopaddproductsupplier@entry'
import ShopProductSupplierEntryEdit from'./shopuser/shopadminsetting/edit/shopproductsupplier@entryEdit'
import ShopProductBrandEntryEdit from'./shopuser/shopadminsetting/edit/shopproductbrand@entryEdit'
import ShopAddAssetSupplierEntry from'./shopuser/shopadminsetting/shopaddassetsupplier@entry'
import ShopAddAssetSupplierEntryEdit from'./shopuser/shopadminsetting/edit/shopassetsupplier@entryEdit'
import ShopAddAssetCategory from'./shopuser/shopadminsetting/shopaddasset@category'
import ShopAddAsset from'./shopuser/shopadminsetting/shopadd@asset'
import ShopAddBank from './shopuser/shopadminsetting/shopadd@bank'
import ShopAddBankEdit from './shopuser/shopadminsetting/edit/shopadd@bankEdit'
import ShopProductCodeEntry from'./shopuser/productsetup/shopproductcode@entry'
import ShopSalesPriceSetup from'./shopuser/productsetup/shopsalesprice@setup'
import ShopDiscountSetup from'./shopuser/productsetup/shopdiscount@setup'
import ShopAssetBrandEntryEdit from'./shopuser/shopadminsetting/edit/shopAssetBrand@entryEdit'
import CategoryReport from'./shopuser/shopreport/category@report'
import ProductReport from'./shopuser/shopreport/product@report'


import ShopAddExpenceTypeEntry from './shopuser/productsetup/shopaddexpencetype@entry'
import ShopAddExpenceTypeEditEntry from './shopuser/productsetup/edit/shopaddexpencetype@Editentry'
import ShopLoanProviderEntry from './shopuser/productsetup/shoploanprovider@entry'
import ShopLoanProviderEditEntry from './shopuser/productsetup/edit/shoploanprovider@Editentry'
import ShopLoanEntry from './shopuser/productsetup/shoploan@entry'
import ShopLoanEditEntry from './shopuser/productsetup/edit/shoploan@Editentry'
import ShopIncomeTypeEntry from './shopuser/productsetup/shopaddincometype@entry'
import ShopIncomeTypeEntryEdit from './shopuser/productsetup/edit/shopaddincometype@entryEdit'
import ShopEmployeeeLoginTimeSetup from  './shopuser/productsetup/shopemployeelogintime@setup'
import ShopEmployeeeLoginTimeSetupEdit from './shopuser/productsetup/edit/shopemployeelogintime@setupEdit'

//////   ProductBrandReport
import AdminCategoryList from  './shopuser/shopreport/admincategory@list'
import CategoryOwnerList from  './shopuser/shopreport/category@ownerlist'
import CategoryGlobalList from  './shopuser/shopreport/category@globallist'
import ShopProductSupplierList from'./shopuser/shopreport/productsupplier@list'
import ShopAssetSupplierList from'./shopuser/shopreport/assetsupplier@list'
import IncomeTypeReport from'./shopuser/shopreport/incometype@report'
import ExpenceTypeReport from'./shopuser/shopreport/expencetype@report'
import ProductBrandReport from'./shopuser/shopreport/productbrand@report'



export const routes = [
    //////////////////   Start Admin Configuration Menu Route
    {
        path: '/adminmenu@title',
        component:AdminMenuTitle,
    },

    {
        path: '/adminmenu@titleEdit:adminMenuTitleId',
        component:AdminMenuTitleEdit,
    },

    {
        path: '/adminmenu@create',
        component:AdminMenuCreate,
    },
    {
        path: '/adminmenu@Edit:adminMenuId',
        component:AdminMenuEdit,
    },

    {
        path: '/adminsubmenu@create',
        component:AdminSubmenuCreate,
    },
    {
        path: '/adminsubmenu@Edit:adminSubMenuId',
        component:AdminSubmenuEdit,
    },
    {
        path: '/admintype@create',
        component:AdminTypeCreate,
    },

    {
        path: '/admintype@Edit:adminTypeId',
        component:AdminTypeEdit,
    },

    {
        path: '/adminentry@create',
        component:AdminEntryCreate,
    },
    {
        path: '/adminentry@Edit:adminId',
        component:AdminEntryEdit,
    },
    {
        path: '/adminsetup@create',
        component:AdminSetupCreate,
    },
    {
        path: '/adminmenu@permission',
        component:AdminMenuPermission,
    },
    {
        path: '/adminmenu@permissionlist',
        component:AdminMenuPermissionList,
    },
    {
        path: '/adminmenu@permission@edit:adminId:menuId',
        component:AdminMenuPermissionEdit,
    },





    /////////////////////   End Admin Configuration Menu Route

    /////////////////////    Start Admin Configuration Setup Route
    {
        path: '/adminassetbrand@entry',
        component: AdminAssetBrandEntry,
    },
    {
        path: '/assetBrand@entryEdit:assetBrandEntryId',
        component: AdminAssetBrandEntryEdit,
    },
    {
        path: '/bank@entry',
        component: BankEntry,
    },
    {
        path: '/bank@entryEdit:bankEntryId',
        component: BankEntryEdit,
    },
    {
        path: '/banktype@entry',
        component: BankTypeEntry,
    },
    {
        path: '/banktype@entryEdit:bankTypeEntryId',
        component: BankTypeEntryEdit,
    },
    {
        path: '/bussinesstype@create',
        component: BussinessTypeCreate,
    },
    {
        path: '/bussinesstype@edit:bussinessTypeId',
        component: BussinessTypeEdit,
    },

    {
        path: '/commissiontype@entry',
        component: CommissionTypeEntry,
    },

    {
        path: '/commissiontype@entryEdit:commissionTypeEntryId',
        component: CommissionTypeEntryEdit,
    },

    {
        path: '/adminholiday@setup',
        component: AdminHolidaySetup,
    },
    {
        path: '/adminholiday@setupedit:holidaySetupId',
        component: AdminHolidaySetupEdit,
    },
    {
        path: '/adminholiday@entry',
        component: AdminHolidayEntry,
    },
    {
        path: '/adminholidaytype@edit:holidayTypeId',
        component: AdminHolidayTypeEdit,
    },
    {
        path: '/jobdepartment@entry',
        component: JobDepartmentEntry,
    },
    {
        path: '/jobdepartment@entryEdit:jobDepartmentEntryId',
        component: JobDepartmentEntryEdit,
    },
    {
        path: '/licencetype@entry',
        component: LicenceTypeEntry,
    },
    {
        path: '/licencetype@edit:licenceTypesId',
        component: LicenceTypeEdit,
    },
    {
        path: '/metakeydescription@entry',
        component: MetakeyDescriptionEntry,
    },
    {
        path: '/metakeydescription@entryEdit:metaKeyId',
        component: MetakeyDescriptionEntryEdit,
    },
    {
        path: '/productbrand@entry',
        component: ProductBrandEntry,
    },
    {
        path: '/productbrand@entryEdit:productBrandEntryId',
        component: ProductBrandEntryEdit,
    },
    {
        path: '/shopcustomertype@entry',
        component: ShopCustomerTypeEntry,
    },
    {
        path: '/shopCustomerType@entryEdit:shopCustomerTypeEntryId',
        component: ShopCustomerTypeEntryEdit,
    },
    {
        path: '/shoptype@entry',
        component: ShopTypeEntry,
    },
    {
        path: '/shopType@entryEdit:shopTypeEntryId',
        component: ShopTypeEntryEdit,
    },
    {
        path: '/unite@entry',
        component: UniteEntry,
    },
    {
        path: '/unite@entryEdit:uniteEntryId',
        component: UniteEntryEdit,
    },

////////////////     Sales  Route
    // Product Sales
    {
        path: '/product@sales',
        component: ProductSale,
    },
    // Product Report
    {
        path: '/sales@price',
        component: SalesPrice,
    },
    {
        path: '/discount@price',
        component: DiscountPrice,
    },
    {
        path: '/discountwish@price',
        component: DiscountWishPrice,
    },
    {
        path: '/product@shortage',
        component: ProductShortage,
    },
    {
        path: '/damage@product',
        component: DamageProduct,
    },
    {
        path: '/dataexpaired@product',
        component: DateExpairedProduct,
    },
    {
        path: '/dataexpaired@notification',
        component: DateExpairedNotifcation,
    },
    // Sales Report
    {
        path: '/todaycash@sales',
        component: TodayCashSales,
    },
    {
        path: '/todaydue@sales',
        component: TodayDueSales,
    },
    {
        path: '/todaycash@receive',
        component: TodayCashReceive,
    },
    {
        path: '/today@discount',
        component: TodayDiscount,
    },
    {
        path: '/total@due',
        component: TotalDue,
    },
    {
        path: '/total@sales',
        component: TotalSale,
    },
    {
        path: '/total@receive',
        component: TotalReceive,
    },
    {
        path: '/total@discount',
        component: TotalDiscount,
    },
    {
        path: '/fixedcustomer@list',
        component: FixedCustomerList,
    },
    {
        path: '/localcustomer@list',
        component: LocalCustomerList,
    },


////////////////     Purchase Route
    //  Purchase Entry
    {
        path: '/brand@entry',
        component: BrandEntry,
    },
    {
        path: '/brand@entryEdit:brandId',
        component: BrandEntryEdit,
    },
    {
        path: '/purchase@entry',
        component: PurchaseEntry,
    },
    {
        path: '/supplier@entry',
        component: SupplierEntry,
    },
    //  Purchase Report
    {
        path: '/allsupplier@list',
        component: AllSupplierList,
    },
    {
        path: '/localsupplier@list',
        component: LocalSupplierList,
    },
    {
        path: '/forensupplier@list',
        component: ForenSupplierList,
    },
    {
        path: '/duesupplier@list',
        component: DueSupplierList,
    },
    {
        path: '/supplier@payment',
        component: SupplierPayment,
    },
    {
        path: '/purchase@return',
        component: PurchaseReturn,
    },
    {
        path: '/purchase@price',
        component: PurchasePrice,
    },
    {
        path: '/latestpurchase@item',
        component: LatestPurchaseItem,
    },

////////////////     Inventory Route
    // Inventory
    {
        path:'/add@category',
        component: Category,
    },

    {
        path:'/category@Edit:categoryId',
        component: CategoryEdit,
    },


    {
        path:'/productcode@entry',
        component: ProductCode,
    },
    // Inventory Report
    {
        path: '/stockreport@amount',
        component: StockReportAmount,
    },
    // Inventory Shortage
    {
        path: '/brandwise@shortage',
        component: BrandWiseShortage,
    },
    {
        path: '/brandwisestorcke@shortage',
        component: BrandWiseStorckeShortage,
    },
    {
        path: '/companywise@shortage',
        component: CompanyWiseShortage,
    },

////////////////    HR Management Route
    // HR Management
    {
        path: '/employee@entry',
        component: EmployeeEntry,
    },
    {
        path: '/employeesuspend@entry',
        component: EmployeeSuspendEntry,
    },
    {
        path: '/grade@entry',
        component: GradeEntry,
    },
    {
        path: '/holiday@entry',
        component: HolidayEntry,
    },
    {
        path: '/leave@entry',
        component: LeaveEntry,
    },
    {
        path: '/jobdepartment@entry',
        component: JobdepartmentEntry,
    },
    {
        path: '/salaryincrement@entry',
        component: SalaryIncrementEntry,
    },

////////////////    Asset Route
    // Asset entry
    {
        path: '/asset@entry',
        component: AssetEntry,
    },
    {
        path: '/assetbrand@entry',
        component: AssetBrandEntry,
    },
    {
        path: '/assetcategory@entry',
        component: AssetCategoryEntry,
    },
    {
        path: '/assetcode@entry',
        component: AssetCodeEntry,
    },
    {
        path: '/assetsupplier@entry',
        component: AssetSupplierEntry,
    },
    // Asset Report
    {
        path: '/assetsupplier@list',
        component: AssetSupplierList,
    },
    {
        path: '/assetsupplier@information',
        component: AssetSupplierInfom,
    },
    {
        path: '/assetcategory@list',
        component: AssetCategoryList,
    },
    {
        path: '/asset@depraciation',
        component: AssetDepraciation,
    },
    {
        path: '/assettotal@price',
        component: AssetTotlaprice,
    },

    ////////////////////////    Admin Route
    // Admin Setup
    {
        path: '/accountingonly@company',
        component: AccountingOnlyCompany,
    },
    {
        path: '/createbusiness@type',
        component: CreateBusinessType,
    },
    {
        path: '/create@client',
        component: CreateClient,
    },
    {
        path: '/create@staff',
        component: CreateStaff,
    },
    {
        path: '/create@menu',
        component: CreateMenu,
    },
    {
        path: '/createmarketing@type',
        component: CreateMarketingType,
    },
    {
        path: '/create@commission',
        component: CreateCommission,
    },
    {
        path: '/create@admin',
        component: CreateAdmin,
    },
    {
        path: '/create@agent',
        component: CreateAgent,
    },
    {
        path: '/createliana@type',
        component: CreateLianaType,
    },
    {
        path: '/process@shop',
        component: ProcessShop,
    },
    {
        path: '/salestarget@create',
        component: SalesTargetCreate,
    },
    {
        path: '/createclient@ip',
        component: CreateclientIp,
    },
    {
        path: '/purchase',
        component: Purchase,
    },
    {
        path: '/ip@notice',
        component: IpNotice,
    },
    {
        path: '/sales',
        component: Sales,
    },
    {
        path: '/delivery@section',
        component: DeliverySection,
    },
    {
        path: '/inventory',
        component: Inventory,
    },
    {
        path: '/client@followp',
        component: ClientFollowp,
    },
    {
        path: '/asset',
        component: Asset,
    },
    {
        path: '/hr',
        component: Hr,
    },
    {
        path: '/reporting',
        component: Reporting,
    },
    {
        path: '/message',
        component: Message,
    },
    {
        path: '/notification',
        component: Notification,
    },
    // Mother Admin
    {
        path: '/setup',
        component: Setup,
    },
    {
        path: '/support@admin',
        component: SupportAdmin,
    },
    {
        path: '/billing@address',
        component: BillingAddress,
    },
    {
        path: '/sub@admin',
        component: SubAdmin,
    },
    {
        path: '/suspend@unsuspend@admin',
        component: SuspendUnsuspendAdmin,
    },
    {
        path: '/marketing@admin',
        component: MarketingAdmin,
    },
    {
        path: '/commissionbase@man',
        component: CommissionBaseMan,
    },
    {
        path: '/delivery@section@',
        component: DeliveryMohter,
    },
    {
        path: '/ipquery@blockadmin',
        component: IpqueryBlockadmin,
    },
    {
        path: '/information@edit',
        component: InformationEdit,
    },
    {
        path: '/sales@team',
        component: SalesTeam,
    },
    {
        path: '/shop@list',
        component: ShopList,
    },
    {
        path: '/report',
        component: Report,
    },
    {
        path: '/menu@permission',
        component: MenuPermission,
    },
    // Support Admin
    {
        path: '/problem@entry',
        component: ProblemEntry,
    },
    {
        path: '/client@update',
        component: ClientUpdata,
    },
    {
        path: '/todaysupport@calendar',
        component: TodaySupportCalendar,
    },
    {
        path: '/feedback',
        component: Feedback,
    },
    {
        path: '/support@message',
        component: SupportMessage,
    },
    // Billing Admin
    {
        path: '/billingreport@daily',
        component: BillingReportDaily,
    },
    {
        path: '/due@bill',
        component: DueBill,
    },
    {
        path: '/duebill@feedback',
        component: DueBillFeedback,
    },
    {
        path: '/billing@message',
        component: BillingMessage,
    },
    {
        path: '/overdue@bill',
        component: OverDueBill,
    },
    // Sub Admin
    {
        path: '/subadmin@menu@permission',
        component: SubadminMenuPermission,
    },
    {
        path: '/subadmin@menu@notification',
        component: SubadminMenuNotification,
    },
    {
        path: '/subadmin@message',
        component: SubadminMessage,
    },
    {
        path: '/subadmin@report',
        component: SubadminReport,
    },
    // Suspend And Unsuspend
    {
        path: '/billingadmin@report',
        component: BillingadminReport,
    },
    {
        path: '/suspend@list',
        component: SuspendList,
    },
    {
        path: '/unsuspend@list',
        component: UnsuspendList,
    },
    {
        path: '/suspend@unsuspend@message',
        component: SuspendUnsuspendMessage,
    },
    // Marketing Admin
    {
        path: '/marketing@salermanlist',
        component: MarketingSalermanList,
    },
    {
        path: '/marketing@salertarget',
        component: MarketingSalerTarget,
    },
    {
        path: '/marketing@salertargetachieve',
        component: MarketingAchieve,
    },
    {
        path: '/marketing@inactivelist',
        component: MarketingInactiveList,
    },
    {
        path: '/marketing@proposedclient',
        component: MarketingPoposedClient,
    },
    {
        path: '/marketing@proposedfollowp',
        component: MarketingPoposedFollowp,
    },
    {
        path: '/marketing@message',
        component: MarketingMessage,
    },
    {
        path: '/marketing@shopentry',
        component: MarketingShopEntry,
    },
    // Saler Man
    {
        path: '/salerman@shopentry',
        component: SalermanShopEntry,
    },
    {
        path: '/salerman@proposershop',
        component: SalermanProposerShop,
    },
    {
        path: '/salerman@inactivelist',
        component: SalermanInctiveList,
    },
    {
        path: '/salerman@profile',
        component: SalermanProfile,
    },
    {
        path: '/salerman@message',
        component: SalermanMessage,
    },
    {
        path: '/salerman@totalearning',
        component: SalermanTotalEarning,
    },
    {
        path: '/salerman@monthlyearning',
        component: SalermanMonthlyEarning,
    },
    // Delivery Section
    {
        path: '/update@shopinformation',
        component: UpdateShopInformation,
    },
    {
        path: '/delivery@report',
        component: DeliveryReport,
    },
    {
        path: '/delivery@calendar',
        component: DeliveryCalender,
    },
    {
        path: '/delivery@request',
        component: DeliveryRequest,
    },
    {
        path: '/delivery@message',
        component: DeliveryMessage,
    },
    {
        path: '/delivery@supportadmin',
        component: DeliverySupportadmin,
    },
    // IP Query
    {
        path: '/ip@add',
        component: IPAdd,
    },
    {
        path: '/ip@lock',
        component: IPLock,
    },
    {
        path: '/ip@unblock',
        component: IPUnblock,
    },
    {
        path: '/ipquery@message',
        component: IpQueryMessage,
    },
    // Information Edit Admin
    {
        path: '/support@panding',
        component: SupportPanding,
    },
    {
        path: '/complete@edit',
        component: ComplateEdit,
    },
    {
        path: '/editadmin@search',
        component: EditadminSearch,
    },
    {
        path: '/editadmin@message',
        component: EditadminMessage,
    },

    ////////////////////////    Admin shop Information
    {
        path: '/shopinformation@list',
        component:ShopInformationList,
    },
    {
        path: '/shopaddress@locationlist',
        component:ShopAddressLocationList,
    },

    ////////////////     ShopUser  Route

    {
        path: '/shopemployee@typecreate',
        component:ShopEmployeeTypeCreate,
    },
    {
        path: '/shopemployee@typeEdit:shopEmployeeTypeId',
        component:ShopEmployeeTypeEdit,
    },
    {
        path: '/shopmenu@permission',
        component:ShopMenuPermission,
    },
    {
        path: '/shopmenu@permissionlist',
        component:ShopMenuPermissionList,
    },
    {
        path: '/adminmenu@permission@edit',
        component:ShopMenuPermissionEdit,
    },


    ////////////////////////   Setting Route
    {
        path: '/helps@support',
        component: Help,
    },
    {
        path: '/changepassword',
        component: Password,
    },
    {
        path: '/refer@taka',
        component: Refer,
    },
    {
        path: '/profile',
        component: Profile,
    },
    {
        path: '/offer',
        component: Offer,
    },
    {
        path: '/setting',
        component: Setting,
    },



    /////////////////////// Shop Admin Setting
    {
        path: '/shopadd@category',
        component: ShopAddCategory,
    },

    {
        path: '/shopaddproduct@brand',
        component: ShopAddProductBrand,
    },

    {
        path: '/shopaddasset@brand',
        component: ShopAddAssetBrand,
    },

    {
        path: '/shopadd@employee',
        component: ShopAddEmployee,
    },

    {
        path: '/shopaddproductsupplier@entry',
        component: ShopAddProductSupplierEntry,
    },

    {
        path: '/shopaddassetsupplier@entry',
        component: ShopAddAssetSupplierEntry,
    },

    {
        path: '/shopassetsupplier@entryEdit:assetSupplierId',
        component: ShopAddAssetSupplierEntryEdit,
    },

    {
        path: '/shopaddasset@category',
        component: ShopAddAssetCategory,
    },
    {
        path: '/shopadd@asset',
        component: ShopAddAsset,
    },

    // {
    //     path: '/shopproductsupplier@entry',
    //     component: ShopProductSupplierEntry,
    // },

    {
        path: '/shopproductsupplier@entryEdit:productSupplierId',
        component: ShopProductSupplierEntryEdit,
    },

    {
        path: '/shopadd@bank',
        component: ShopAddBank,
    },
    {
        path: '/shopadd@bankEdit:bankId',
        component: ShopAddBankEdit,
    },

    {
        path: '/shopproductcode@entry',
        component: ShopProductCodeEntry,
    },

    // {
    //     path: '/shopproduct@entry',
    //     component: ShopProductEntry,
    // },

    {
        path: '/shopsalesprice@setup',
        component: ShopSalesPriceSetup,
    },
    {
        path: '/shopdiscount@setup',
        component: ShopDiscountSetup,
    },

    {
        path: '/shopaddexpencetype@entry',
        component: ShopAddExpenceTypeEntry,
    },
    {
        path: '/shopaddexpencetype@Editentry:shopExpenceTypeId',
        component: ShopAddExpenceTypeEditEntry,
    },
    {
        path: '/shoploanprovider@entry',
        component: ShopLoanProviderEntry,
    },
    {
        path: '/shoploanprovider@Editentry:loanProviderId',
        component: ShopLoanProviderEditEntry,

    },
    {
        path: '/shoploan@entry',
        component: ShopLoanEntry,
    },
    {
        path: '/shoploan@Editentry:loanEntryId',
        component: ShopLoanEditEntry,
    },

    {
        path: '/shopaddincometype@entry',
        component: ShopIncomeTypeEntry,
    },
    {
        path:'/shopaddincometype@entryEdit:shopIncomeTypeId',
        component: ShopIncomeTypeEntryEdit,
    },

    {
        path: '/shopemployeelogintime@setup',
        component: ShopEmployeeeLoginTimeSetup,
    },
    {
        path: '/shopemployeelogintime@setupEdit:employeeLoginTimeId',
        component: ShopEmployeeeLoginTimeSetupEdit,
    },

    {
        path: '/shopproductbrand@entryEdit:productBrandEntryId',
        component: ShopProductBrandEntryEdit,
    },

    {
        path: '/shopAssetBrand@entryEdit:assetBrandEntryId',
        component: ShopAssetBrandEntryEdit,
    },

    {
        path: '/category@report',
        component: CategoryReport,
    },

    {
      path: '/adminCategory@list:shopType:labelId',
      component:AdminCategoryList,
    },
    {
      path: '/category@Ownerlist:categorylabelId',
      component:CategoryOwnerList,
    },
    {
      path: '/category@Globallist:categorylabelId',
      component:CategoryGlobalList,
    },
    {
        path: '/product@report',
        component: ProductReport,
    },
    {
        path: '/productsupplier@report',
        component: ShopProductSupplierList,
    },
    {
        path: '/assetsupplier@report',
        component: ShopAssetSupplierList,
    },
    {
        path: '/incometype@report',
        component: IncomeTypeReport,
    },
    {
        path: '/expencetype@report',
        component: ExpenceTypeReport,
    },
    {
        path: '/productbrand@report',
        component: ProductBrandReport,
    },


]