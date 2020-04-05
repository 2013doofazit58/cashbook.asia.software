<template id="">
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/productbrand@report">Product Report</router-link></li>
      </ol>
    </nav>
    <div class="card main-card  element-block-example">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Product Brand Report List</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered mb-0">
            <thead>
               <tr style="background:rgba(242, 242, 242, 0.47)">
                 <th>SN </th>
                 <th>Product Brand</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(productBrandReportList, index) in productBrandReportLists">
                   <td>{{ index+1 }}</td>
                   <td>{{ productBrandReportList.productBrandName }}</td>
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
                productBrandReportLists:{},
            }
        },

        mounted(){
            this.shopIncomeTypeReportList();
        },
        methods:{
            shopIncomeTypeReportList(){
                axios.get('/shopProductBrandReportList/'+this.$route.params.uniqueId).then(res =>{
                  if (this.$route.params.uniqueId == 1) {
                    this.productBrandReportLists = res.data.owneProductBrandReport;

                  }
                  else {
                    this.productBrandReportLists = res.data.globalProductBrandReport;
                  }
                })
            },

        }
    }

</script>
