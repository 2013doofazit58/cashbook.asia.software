<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Supplier Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form>
              <div class="form-group">
                 <label>Company Name</label>
                 <input type="text" name="" value=""   placeholder="Company Name" class="form_control">
              </div>
              <div class="form-group">
                 <label>Business Type</label>
                  <select class="form_control" name="">
                    <option>Select One</option>
                    <option value="">asdfsd</option>
                    <option value="">asdfsd</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Contant Person</label>
                <input type="text" name="" value="" placeholder="Contant Person" class="form_control">
              </div>
              <div class="form-group">
                <label>Designation</label>
                <input type="text" name="" value="" placeholder="Designation" class="form_control">
              </div>
              <div class="form-group">
                <label>Phone No</label>
                <input type="text" name="" value="" placeholder="Phone No" class="form_control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="" value="" placeholder="Email" class="form_control">
              </div>
              <div class="form-group">
                <label>Registered Address</label>
                <textarea name="" placeholder="Registered Address" class="form_control" col="5"></textarea>
              </div>
              <div class="form-group">
                <label>Corporate Address</label>
                <textarea name=""  placeholder="Corporate Address" class="form_control" col="5"></textarea>
              </div>
              <div class="form-group">
                <label>Country</label>
                <select class="form_control" name="">
                  <option value="">Select One</option>
                  <option value="">asdfsd</option>
                  <option value="">asdfsd</option>
                </select>
              </div>
              <div class="form_group">
                <label>Division</label>
                <select class="form_control" name="">
                  <option value="">Select One</option>
                  <option value="">asdfsd</option>
                  <option value="">asdfsd</option>
                </select>
              </div>
              <div class="text-right pt-3">
                <button type="button" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Supplier</button>
                <button type="button" class="btn-pill btn-hover-shine btn btn-light">Clear</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Supplier List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Company Name</th>
               <th>Business Type</th>
               <th>Contact Person</th>
               <th>Desination</th>
               <th>Phone No</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>jsadf</td>
                <td>jsadf</td>
                <td>jsadf</td>
                <td>jsadf</td>
                <td>jsadf</td>
                <td>
                    <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
                </td>
             </tr>

             <tr style="background:rgba(215, 228, 188, 0.23)">
                 <td>1</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
                 </td>
              </tr>
               <tr>
                 <td>1</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
                 </td>
              </tr>
              <tr style="background:rgba(215, 228, 188, 0.23)">
                 <td>1</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
                 </td>
              </tr>
               <tr>
                 <td>1</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
                 </td>
              </tr>
              <tr style="background:rgba(215, 228, 188, 0.23)">
                 <td>1</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
                 </td>
              </tr>
             <tr>
               <td>1</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">View</button>
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

    }
</script>
<style media="screen">
    .supplier-border{
      border: 1px solid rgba(0, 0, 0, 0.12);
      padding:20px 15px;
    }
   .btn{
     font-size:17px;
   }
   .text-sm-right{
     padding-top:30px;
   }
  .supplier-entry label{
    margin-right:40px;
  }
</style>
