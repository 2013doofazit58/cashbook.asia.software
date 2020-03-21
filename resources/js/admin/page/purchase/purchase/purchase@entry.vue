<template id="">
  <span>
      <div class="card">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">New Purchase Entry</h3>
        </div>

        <div class="purchase-entery purchase-border p-3 ">
          <div class="row m-0" >
            <div class="col-auto pl-lg-auto purcha-border p-3">
              <div class="table-responsive bg-white">
                <table class=" table-hover  mb-0">
                  <tr>
                    <td class="title-name">Data</td>
                    <td>
                        <div class="input-group">
                         <div class="input-group-prepend datepicker-trigger">
                             <div class="input-group-text">
                                 <i class="fa fa-calendar-alt"></i>
                             </div>
                         </div>
                         <input type="text" class="form-control" data-toggle="datepicker-icon" placeholder="Data"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Purchase Invoice No</td>
                    <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Invoice No">
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Supplier Name</td>
                    <td>
                        <div>
                          <select class="form_control" name="">
                            <option value="">Select One</option>
                            <option value="">asdfsd</option>
                            <option value="">asdfsd</option>
                          </select>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Moblie No</td>
                    <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Moblie No">
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Address</td>
                    <td >
                        <div>
                          <textarea name=""  placeholder="Address" class="form_control" style="height:80px"></textarea>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Product Type</td>
                    <td>
                        <div>
                          <select class="form_control" name="">
                            <option value="">Select One</option>
                            <option value="">asdfsd</option>
                            <option value="">asdfsd</option>
                          </select>
                        </div>
                     </td>
                  </tr>
                 </table>
               </div>
            </div>
          </div>
        </div>

        <div class="product-page px-3 purcha-border" style="background:#E7F1E8">
             <form action="" method="">
               <div class="form-row">
                 <div class="form-group mb-0 col-md-3 col-sm-4 col-6">
                   <label>Product Name</label>
                     <select class="form_control" name="product_id">
                       <optgroup label="Select One">
                            <option value="">Alaska</option>
                            <option value="">Hawaii</option>
                        </optgroup>
                     </select>
                 </div>
                 <div class="form-group mb-0 col-md-2 col-sm-4 col-6">
                   <label>Quantity</label>
                   <input type="text" class="form_control">
                 </div>
                 <div class="form-group mb-0 col-md-2 col-sm-4 col-6">
                   <label>Unit</label>
                   <select class="form_control" name="product_id">
                      <option value="">Select One</option>
                      <option value="">Alaska</option>
                      <option value="">Hawaii</option>
                   </select>
                 </div>
                 <div class="form-group mb-0 col-md-2 col-sm-4 col-6">
                   <label>Unit Price</label>
                   <input type="text" class="form_control">
                 </div>
                 <div class="form-group col-md-2 col-sm-4 col-6">
                   <label>Total Price</label>
                   <input type="text" class="form_control">
                 </div>
                 <div class="btn-mr">
                    <label></label>
                    <button type="submit" class="btn btn-info btn-padding">Add</button>
                 </div>
               </div>
             </form>
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
                         <input type="text" class="form_control" placeholder="Total Purchase Value">
                       </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Carriage Inward</td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Carriage Inward">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Total Amount</td>
                     <td>
                       <div>
                         <input type="text" class="form_control" placeholder="Total Amount">
                       </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Discount </td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Discount">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Supplier Payable </td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Supplier Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Other Cost </td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Other Cost">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Damage &amp; Warranty</td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Other Cost">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Total Product Cost</td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Total Product Cost">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Previous Payable</td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Previous Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Current Payable </td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Current Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Payable</td>
                     <td>
                         <div>
                           <input type="text" class="form_control" placeholder="Payable ">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td>
                     </td>
                     <td>
                       <button type="button" class="mt-3 mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
                       <button type="button" class="mt-3 btn-pill btn-hover-shine btn btn-light">Clear</button>
                     </td>
                   </tr>
                  </table>
                </div>
             </div>
           </div>
         </div>

      </div>
  </span>
</template>
<script>
    export default {

    }
</script>
<style media="screen">
   .purchase-entery label{
     margin-right:20px;
   }
   .title-name{
     font-size:17px;
     padding:13px 0;
     padding-right:25px;
   }
   .purchase-border{
     border-left: 1px solid rgb(0,0,0,0.15);
     border-right: 1px solid rgb(0,0,0,0.15);
   }
   .purcha-border{
     border: 1px solid rgb(0,0,0,0.10);
   }
   .btn-padding{
      padding: 4px 11px;
   }
</style>
