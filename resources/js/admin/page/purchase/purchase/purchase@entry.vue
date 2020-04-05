<template id="">
  <span>
      <div class="card">
        <form action="" @submit.prevent="addPurchaseInvoice()">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">New Purchase Entry</h3>
        </div>
        <div class="purchase-entery purchase-border p-3 ">
          <div class="row m-0" >
            <div class="col-auto pl-lg-auto purcha-border p-3">
              <div class="table-responsive bg-white">
                <table class=" table-hover  mb-0">
                  <tr>
                    <td class="title-name">Purchase Date</td>
                    <td>
                        <div class="input-group">
                         <div class="input-group-prepend datepicker-trigger">
                             <div class="input-group-text">
                                 <i class="fa fa-calendar-alt"></i>
                             </div>
                         </div>
                         <input type="text" v-model="form.purchaseDate" name="purchaseDate" class="form-control" data-toggle="datepicker-icon" placeholder="Data"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Purchase Invoice No</td>
                    <td>
                        <div>
                          <input disabled type="text"  v-model="form.purchaseInvoiceNo" name="purchaseInvoiceNo" class="form-control" placeholder="Invoice No">
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Product Supplier Name</td>
                    <td>
                        <div>
                          <select class="form-control" v-model="form.productSupplierId" :class="{ 'is-invalid': form.errors.has('productSupplierId') }" @change.prevent="productSupplierId()" name="productSupplierId">
                            <option value="">Select One</option>
                            <option v-for="productSupplierList in productSupplierLists" :value="productSupplierList.productSupplierId">{{ productSupplierList.productSupplierName }}</option>
                          </select>
                          <has-error :form="form" field="productSupplierId"></has-error>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Moblie No</td>
                    <td>
                        <div>
                          <input disabled type="text"  v-model="form.moblieNo" name="moblieNo" class="form-control" placeholder="Moblie No">
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Address</td>
                    <td >
                        <div>
                          <textarea disabled v-model="form.address" name="address"  placeholder="Address" class="form-control" style="height:80px"></textarea>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Purchase Type</td>
                     <td>
                        <div v-for="purchaseType in purchaseTypes" style="float: left;margin-right: 10px;" >
                          <input type="checkbox" v-model="form.purchaseTypeId"  name="purchaseTypeId" :value="purchaseType.purchaseTypeId">
                          {{ purchaseType.purchaseTypeName }}
                        </div>
                          <has-error :form="form" field="purchaseTypeId"></has-error>
                     </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="product-page px-3 purcha-border" style="background:#E7F1E8">
             <form action="" @submit.prevent="addProduct()">
               <div class="form-row">
                 <div class="form-group mb-0 col-md-3 col-sm-4 col-6">
                   <label>Product Name</label>
                     <select class="form-control" v-model="form.productId" name="productId">
                        <option value="">Select One</option>
                        <option v-for="productNameList in productNameLists" :value="productNameList.productNameId">
                            {{ productNameList.productName }}  ({{ productNameList.productCode }})
                        </option>
                     </select>
                 </div>
                 <div class="form-group mb-0 col-md-2 col-sm-4 col-6">
                   <label>Quantity</label>
                   <input type="text" v-model="form.quantity" name="quantity" placeholder="Quantity" class="form-control">
                 </div>
                 <div class="form-group mb-0 col-md-2 col-sm-4 col-6">
                   <label>Unit</label>
                   <select  v-model="form.unitId" name="unitId" class="form-control">
                      <option value="">Select One</option>
                      <option  v-for="unitNameShow in unitNameShows" :value="unitNameShow.uniteEntryId">{{ unitNameShow.uniteEntryName }}</option>
                   </select>
                 </div>
                 <div class="form-group mb-0 col-md-2 col-sm-4 col-6">
                   <label>Unit Price</label>
                   <input type="text" v-model="form.unitPrice"  @keyup.prevent="unitPrice()" name="unitPrice" placeholder="Unit Price" class="form-control">
                 </div>
                 <div class="form-group col-md-2 col-sm-4 col-6">
                   <label>Total Price</label>
                   <input type="text" v-model="form.totalPrice"  name="totalPrice" placeholder="Total Price" class="form-control">
                 </div>
                 <div class="btn-mr">
                    <label></label>
                    <button type="submit" class="btn btn-info btn-padding">Add</button>
                 </div>
               </div>
             </form>
         </div>
         <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                    <th>SN</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                 <tr v-for="(purchaseProductList, index) in purchaseProductLists" v-if="cusPurchaseInvoice == purchaseProductList.purchaseInvoiceNo">
                   <td>{{ index+1 }}</td>
                   <td v-if="purchaseProductList.product_name">{{ purchaseProductList.product_name.productName }} ({{ purchaseProductList.product_name.productCode }})</td>
                   <td>{{ purchaseProductList.quantity }}</td>
                   <td v-if="purchaseProductList.unit_name">{{ purchaseProductList.unit_name.uniteEntryName }}</td>
                   <td>{{ purchaseProductList.unitPrice }}</td>
                   <td>{{ purchaseProductList.totalPrice }}</td>
                   <td>
                      <button type="button" @click="distroy(purchaseProductList.purchaseProductId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                   </td>
                 </tr>
               </tbody>
            </table>
          </div>
         <div class="purchase-entery purchase-border p-3">
           <div class="row m-0">
             <div class="col-auto ml-auto purcha-border p-3">
               <div class="table-responsive bg-white">
                 <table class=" table-hover  mb-0">
                   <tr>
                     <td class="title-name">Total Purchase Value</td>
                     <td>
                       <div>
                         <input type="text" disabled v-model="form.totalPurchaseValue" name="totalPurchaseValue" class="form-control"  placeholder="Total Purchase Value">
                       </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Carriage Inward</td>
                     <td>
                         <div>
                           <input type="text"  v-model="form.carriageInward" @keyup.prevent="carriageInward()" name="carriageInward"  class="form-control" placeholder="Carriage Inward">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Total Amount</td>
                     <td>
                       <div>
                         <input type="text" disabled v-model="form.totalAmount" name="totalAmount" class="form-control" placeholder="Total Amount">
                       </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Discount </td>
                     <td>
                         <div>
                           <input type="text" v-model="form.discount" @keyup.prevent="discount()" name="discount" class="form-control" placeholder="Discount">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Supplier Payable </td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.supplierPayable"  name="supplierPayable" class="form-control" placeholder="Supplier Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Other Cost </td>
                     <td>
                         <div>
                           <input type="text" v-model="form.otherCost" @click.prevent="otherCosts()" name="otherCost" class="form-control" placeholder="Other Cost">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Damage &amp; Warranty</td>
                     <td>
                         <div>
                           <input type="text" v-model="form.damageAndWarranty" @click.prevent="damageAndWarrantys()" name="damageAndWarranty" class="form-control" placeholder="Damage And Warranty">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Total Product Cost</td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.totalProductCost" name="totalProductCost" class="form-control" placeholder="Total Product Cost">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Previous Payable</td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.previousPayable" name="previousPayable" class="form-control" placeholder="Previous Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Current Payable </td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.currentPayable" name="currentPayable" class="form-control" placeholder="Current Payable">
                         </div>
                      </td>
                   </tr>
                   <!-- <tr>
                     <td class="title-name">Payable</td>
                     <td>
                         <div>
                           <input type="text" v-model="form.payable" name="payable" class="form-control" placeholder="Payable ">
                         </div>
                      </td>
                   </tr> -->
                   <tr>
                     <td>
                     </td>
                     <td>
                       <button type="submit" class="mt-3 mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
                     </td>
                   </tr>
                  </table>
                </div>
             </div>
           </div>
         </div>
       </form>
      </div>

      <div class="card main-card  element-block-example mt-5">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Purchase Invoice List</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered mb-0">
            <thead>
               <tr style="background:rgba(242, 242, 242, 0.47)">
                 <th>SN</th>
                 <th>Purchase Date</th>
                 <th>Purchase Invoice No</th>
                 <th>Supplier Name</th>
                 <th>Purchase Type</th>
                 <th>Total Purcase</th>
                 <th>Action</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(purchaseInvoiceList, index) in purchaseInvoiceLists">
                  <td>{{ index+1 }}</td>
                  <td>{{ purchaseInvoiceList.purchaseDate }}</td>
                  <td>{{ purchaseInvoiceList.purchaseInvoiceNo }}</td>
                  <td v-if="purchaseInvoiceList.product_supplier_name">{{ purchaseInvoiceList.product_supplier_name.productSupplierName }}</td>
                  <td>
                    <span v-for="purchaseTypeId in purchaseInvoiceList.purchaseTypeId">
                       <span v-for="adminPurchaseTypeList in adminPurchaseTypeLists" v-if="purchaseTypeId == adminPurchaseTypeList.purchaseTypeId">
                         {{ adminPurchaseTypeList.purchaseTypeName }}
                       </span>
                    </span>
                  </td>
                  <td>{{ purchaseInvoiceList.totalPurchaseValue }}</td>
                  <td>
                     <!-- <div v-if="2 == 2">
                       <button type="button"   class="btn btn-hover-shine btn-success">Sub Category</button>
                    </div> -->
                  </td>
                </tr>
              </tbody>
           </table>
         </div>
       </div>

  </span>
</template>
<script>
    export default {
      data () {
          return {
              form: new Form({
                  purchaseDate : '',
                  purchaseInvoiceNo : '',
                  productSupplierId : '',
                  moblieNo : '',
                  address : '',
                  // Product Field
                  purchaseTypeId : [],
                  productId : '',
                  quantity : '',
                  unitId : '',
                  unitPrice : '',
                  totalPrice : '',
                  // Total calculation
                  totalPurchaseValue : '',
                  carriageInward : '',
                  totalAmount : '',
                  discount : '',
                  supplierPayable : '',
                  otherCost : '',
                  damageAndWarranty : '',
                  totalProductCost : '',
                  previousPayable : '',
                  currentPayable : '',
                  // payable : '',
              }),
                productSupplierLists:{},
                purchaseTypes:{},
                unitNameShows:{},
                productNameLists:{},
                purchaseProductLists:{},
                purchaseInvoiceNumber:{},
                cusPurchaseInvoice:{},
                cusPreviousPayable:{},
                purchaseInvoiceLists:{},
                adminPurchaseTypeLists:{},
          }
      },
      mounted(){
         this.purchaseInvoiceNo();
         this.productSupplierList();
         this.purchaseTypeShow();
         this.unitNameShow();
         this.productNameShow();
         this.productList();
         this.totalPurchaseValue()
         this.purchaseInvoiceList()
      },

      methods:{
          purchaseInvoiceNo(){
            axios.get('/purchaseInvoiceShow').then(res => {
                 this.form.purchaseInvoiceNo = res.data.purchaseInvoiceIncrement;
                 this.cusPurchaseInvoice = res.data.purchaseInvoiceIncrement;
                 this.form.purchaseDate = res.data.date;
            });
          },
          productSupplierList(){
              axios.get('/shopWishProductSupplier').then(res => {
                 this.productSupplierLists = res.data.productSupplierList;
              });
          },
          productSupplierId(){
             axios.get('/shopWishProductSupplierId/'+this.form.productSupplierId).then(res => {
                this.form.moblieNo = res.data.productSupplierPhone;
                this.form.address = res.data.productSupplierAddress;
                if (res.data.previousBill != '') {
                    this.form.previousPayable = res.data.previousBill;
                    this.cusPreviousPayable = res.data.previousBill;
                }
             });
             this.totalPurchaseValue()
          },
          purchaseTypeShow(){
             axios.get('/purchaseTypeShow').then(res => {
                  this.purchaseTypes = res.data.purchaseType;
             });
          },
          unitNameShow(){
             axios.get('/unitNameShow').then(res => {
                  this.unitNameShows = res.data.unitNameShow;
             });
          },
          productNameShow(){
             axios.get('/productNameShow').then(res => {
                  this.productNameLists = res.data.productNameList;
             });
          },
          unitPrice(){
              let quantity = this.form.quantity;
              let unitPrice = this.form.unitPrice;
              let totalPrice = quantity * unitPrice;
              this.form.totalPrice = totalPrice;
          },
         addProduct(){
           this.form.post('/productEntry').then(res => {
                Toast.fire({
                    icon: 'success',
                    title: 'Product Entry Successfully'
                })

                this.form.productId = [];
                this.form.quantity = [];
                this.form.unitId = [];
                this.form.unitPrice = [];
                this.form.totalPrice = [];
                this.productList();
            });

         },
         productList(){
           axios.get('/productList').then(res => {
                this.purchaseProductLists = res.data.purchaseProductList;
                this.totalPurchaseValue()
           });
         },
         totalPurchaseValue(){
           axios.get('/totalPurchaseValue/'+this.cusPurchaseInvoice).then(res => {
               let sum = 0;
               res.data.purchaseProductList.forEach(productPrice => {
                 sum += productPrice.quantity * productPrice.unitPrice
               })
                 this.form.totalPurchaseValue = sum;
                 this.form.totalAmount = sum;
                 this.form.supplierPayable = sum;
                 this.form.totalProductCost = sum;
                 this.form.currentPayable = sum;
                 if (this.cusPreviousPayable > 0) {
                   let totalcurrant =  (this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                   this.form.currentPayable = totalcurrant;
                 }
           })
         },
         carriageInward(){
           if (this.form.carriageInward == "") {
                this.totalPurchaseValue();
           }
           else{
                let totalAmount = parseFloat(this.form.carriageInward) + parseFloat(this.form.totalPurchaseValue);
                this.form.totalAmount  = totalAmount;
                this.form.supplierPayable = totalAmount;
                this.form.totalProductCost = totalAmount;
                this.form.currentPayable = totalAmount;
                if (this.cusPreviousPayable > 0) {
                  let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                  this.form.currentPayable = totalcurrant;
                }
           }
         },
         discount(){
             if (this.form.discount == "") {
                this.carriageInward();
             }
             else{
                let discount = parseFloat(this.form.totalAmount) - parseFloat(this.form.discount);
                this.form.supplierPayable = discount;
                this.form.totalProductCost = discount;
                this.form.currentPayable = discount;
                if (this.cusPreviousPayable > 0) {
                  let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                  this.form.currentPayable = totalcurrant;
                }
             }
         },
         otherCosts(){
            if(this.form.otherCost == ""){
              if (this.form.otherCost == "" && this.form.damageAndWarranty =="") {
                 this.discount();
              }
            }
            else{
               let otherCost = parseFloat(this.form.totalProductCost) + parseFloat(this.form.otherCost);
               this.form.totalProductCost = otherCost;
               this.form.currentPayable = otherCost;
               if (this.cusPreviousPayable > 0) {
                 let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                 this.form.currentPayable = totalcurrant;
               }
            }
         },
         damageAndWarrantys(){
            if(this.form.damageAndWarranty == ""){
              if (this.form.otherCost == "" && this.form.damageAndWarranty == "") {
                 this.discount();
              }
            }
            else{
               let damageAndWarranty = parseFloat(this.form.totalProductCost) + parseFloat(this.form.damageAndWarranty);
               this.form.totalProductCost = damageAndWarranty;
               this.form.currentPayable = damageAndWarranty;
               if (this.cusPreviousPayable > 0) {
                 let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                 this.form.currentPayable = totalcurrant;
               }
            }
         },
         addPurchaseInvoice(){
           this.form.post('/purchaseInvoice').then(res =>{
               Toast.fire({
                   icon: 'success',
                   title: 'Purchase Invoice Add Successfully'
               })
               this.form.productSupplierId = [],
               this.form.moblieNo = [],
               this.form.address = [],
               this.form.purchaseTypeId = [],
               this.form.totalPurchaseValue = [];
               this.form.totalAmount = [];
               this.form.supplierPayable = [];
               this.form.totalProductCost = [];
               this.form.currentPayable = [];
               this.form.reset();
               this.purchaseInvoiceNo();
               this.purchaseInvoiceList();
           });
         },
         purchaseInvoiceList(){
            axios.get('/purchaseInvoice').then(res =>{
                this.purchaseInvoiceLists = res.data.purchaseInvoiceList;
                this.adminPurchaseTypeLists = res.data.adminPurchaseTypeList;
            });
         },
         distroy(purchaseProductId){
           axios.delete('/purchaseInvoice/'+purchaseProductId).then(res => {
               Toast.fire({
                   icon: 'success',
                   title: 'Product Delete Successfully'
               })
               this.productList();
           });
         },

      },

  }
</script>
