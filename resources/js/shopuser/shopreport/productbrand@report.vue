<template id="">
  <span>
    <div class="card main-card  element-block-example">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Product Brand Report</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered mb-0">
            <thead>
               <tr style="background:rgba(242, 242, 242, 0.47)">
                 <th>SN</th>
                 <th>Shop Type Name</th>
                 <th>Product Brand</th>
               </tr>
              </thead>
              <tbody>
                <tr>
                  <td> 1 </td>
                  <td>{{ shoptypeName }}  (Owner)</td>
                  <td>
                    <div  class="mr-1 float-left display-inline-css">
                      <router-link :to="`/productbrand@list${1}`" class="btn-hover-shine btn-success" >Product Brand ({{ owneProductBrandReport }})</router-link>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td> 2 </td>
                  <td>{{ shoptypeName }}  (Global)</td>
                  <td>
                    <div  class="mr-1 float-left display-inline-css">
                      <router-link :to="`/productbrand@list${2}`" class="btn-hover-shine btn-success" >Product Brand ({{ globalProductBrandReport }})</router-link>
                    </div>
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
        data(){
            return{
                shoptypeName:{},
                owneProductBrandReport:{},
                globalProductBrandReport:{},
            }
        },

        mounted(){
            this.shopIncomeTypeReport();
        },
        methods:{
            shopIncomeTypeReport(){
                axios.get('/shopProductBrandReport').then(res =>{
                    this.shoptypeName = res.data.shoptypeName;
                    this.owneProductBrandReport = res.data.owneProductBrandReport;
                    this.globalProductBrandReport = res.data.globalProductBrandReport;
                })
            },

        }
    }

</script>
