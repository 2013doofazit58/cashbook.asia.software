<template id="">
  <span>
    <div class="card main-card  element-block-example" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Details</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Product Name</th>
               <th>Brand Name</th>
               <th>Batch No</th>
               <th>Model No</th>
               <th>Mfg Date</th>
               <th>ExpDate</th>
               <th>Warranty</th>
               <th>Guranty</th>
               <th>Notification</th>
               <th>Condition</th>
               <th>Advantage</th>
               <th>Details</th>
               <th>Use System</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(productPriceSetupListShow, index) in productPriceSetupListShows.data">
                <td>{{ index+1 }}</td>
                <td v-if="productPriceSetupListShow.product_name">{{ productPriceSetupListShow.product_name.productName }} ({{ productPriceSetupListShow.product_name.productCode }})</td>
                <td v-if="productPriceSetupListShow.product_brand_name">{{ productPriceSetupListShow.product_brand_name.productBrandName }}</td>
                <td>{{ productPriceSetupListShow.batchNo }}</td>
                <td>{{ productPriceSetupListShow.modelNo }}</td>
                <td>{{ productPriceSetupListShow.mfgDate }}</td>
                <td>{{ productPriceSetupListShow.expDate }}</td>
                <td>{{ productPriceSetupListShow.warranty }}</td>
                <td>{{ productPriceSetupListShow.guranty }}</td>
                <td>{{ productPriceSetupListShow.notification }}</td>
                <td>{{ productPriceSetupListShow.condition | shortlength(50,'...') }} </td>
                <td>{{ productPriceSetupListShow.advantage | shortlength(50,'...') }}</td>
                <td>{{ productPriceSetupListShow.detail    | shortlength(50,'...') }}</td>
                <td>{{ productPriceSetupListShow.useSystem | shortlength(50,'...') }}</td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="productPriceSetupListShows" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>
  </span>
</template>
<script>
    export default {
      data () {
          return {
             productPriceSetupListShows:{},
             role:{},
          }
      },
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.productPriceSetupList();
         this.getPaginateList();
         this.conditon();
      },
      methods:{
          productPriceSetupList(){
            axios.get('/inventoryProductPriceList').then(res =>{
                this.productPriceSetupListShows =  res.data.productPriceSetupList
            })
          },
          getPaginateList(page = 1){
            axios.get('/inventoryProductPriceList?page=' + page)
            .then(response => {
              this.productPriceSetupListShows = response.data.productPriceSetupList;
            });
          },
          conditon(){
              axios.get('/condition').then(res =>{
                 this.role = res.data.authInfo;
              })
          },
      }
    }
</script>
