<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Code Entry</h3>
      </div>
      <div class="product-entry">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-8 col-12 offset-lg-2 brand-border" >
              <form  action="#" method="post">
                <div class="form-row">
                    <div class="pro-mr-one">
                      <label >Product Category</label>
                    </div>
                    <div class="col-sm-8 col-12">
                      <select class="form_control" name="">
                        <option value="">Select One</option>
                        <option value="">ajksd</option>
                        <option value="">ajksd</option>
                      </select>
                    </div>
                </div>
                <div class="form-row pt-2">
                  <div class="pro-mr-two">
                    <label >Product Sub Category</label>
                  </div>
                    <div class="col-sm-8 col-12">
                        <select class="form_control" name="">
                          <option value="">Select One</option>
                          <option value="">ajksd</option>
                          <option value="">ajksd</option>
                        </select>
                     </div>
                  </div>
                <div class="form-row pt-2">
                    <label class="p-0">Product Third Category</label>
                    <div class="col-sm-8 col-12">
                      <select class="form_control" name="">
                        <option value="">Select One</option>
                        <option value="">ajksd</option>
                        <option value="">ajksd</option>
                      </select>
                    </div>
                </div>
                <div class="form-row pt-2">
                  <div class="mr">
                    <label class="p-0 ">Product Name</label>
                  </div>
                    <div class="col-sm-8 col-12">
                        <input type="text" class="form_control" placeholder="Product Name">
                    </div>
                </div>
                <div class="form-row pt-2">
                  <div class="mr">
                    <label class="p-0 ">Product Code</label>
                  </div>
                    <div class="col-sm-8 col-12">
                        <input type="text" class="form_control" placeholder="Product Code">
                    </div>
                </div>
                <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                  <button type="button" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Category</button>
                  <button type="button" class="btn-pill btn-hover-shine btn btn-light">Clear</button>
                </div>
              </form>
           </div>
          </div>
      </div>
    </div>

    <div class="card mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Code List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Category Name</th>
               <th>Sub Category Name</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>jsadf</td>
                <td>jsadf</td>
                <td>
                    <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                    <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
                </td>
             </tr>

             <tr style="background:rgba(215, 228, 188, 0.23)">
               <td>1</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
               </td>
             </tr>
             <tr>
               <td>1</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
               </td>
             </tr>
             <tr style="background:rgba(215, 228, 188, 0.23)">
               <td>1</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
               </td>
             </tr>
             <tr>
               <td>1</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
               </td>
             </tr>
             <tr style="background:rgba(215, 228, 188, 0.23)">
               <td>1</td>
               <td>jsadf</td>
               <td>jsadf</td>
               <td>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                   <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
               </td>
             </tr>
             <tr>
                 <td>1</td>
                 <td>jsadf</td>
                 <td>jsadf</td>
                 <td>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button>
                     <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
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
   .product-entry{
     padding:50px 0px;
   }
   .brand-border{
     border: 1px solid rgba(0, 0, 0, 0.12);
     padding:55px 30px;
   }
   .btn{
     font-size:17px;
   }
   .text-sm-right{
     padding-top:30px;
   }
  .product-entry label{
    margin-right:25px;
    font-size:17px;
  }
  .pro-mr-one{
    margin-right:45px;
  }
  .pro-mr-two{
    margin-right:11px;
  }
  .mr{
    margin-right: 66px;
  }
</style>
