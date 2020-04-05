<template id="">
  <span>
    <div class="card main-card  element-block-example mt-5" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Name With Price</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Entry Date</th>
               <th>Product Name</th>
               <th>Product QR Code</th>
               <th>MRP</th>
               <th>Sales Price</th>
               <th>Whole Sales Price</th>
               <th>Relative Sales Price</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(productPriceSetupListShow, index) in productPriceSetupListShows.data">
                <td>{{ index+1 }}</td>
                <td>{{ productPriceSetupListShow.created_at }}</td>
                <td v-if="productPriceSetupListShow.product_name">{{ productPriceSetupListShow.product_name.productName }} ({{ productPriceSetupListShow.product_name.productCode }})</td>
                <td v-if="productPriceSetupListShow.product_name">{{ productPriceSetupListShow.product_name.productQRNumber }}</td>
                <td>{{ productPriceSetupListShow.mrp }}</td>
                <td>{{ productPriceSetupListShow.salesPrice }}</td>
                <td>{{ productPriceSetupListShow.holeSalesPrice }}</td>
                <td>{{ productPriceSetupListShow.relativePrice }}</td>
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
            axios.get('/inventoryProductNameWithPrice').then(res =>{
                this.productPriceSetupListShows =  res.data.productPriceSetupList
            })
          },
          getPaginateList(page = 1){
            axios.get('/inventoryProductNameWithPrice?page=' + page)
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
