<template id="">
  <span>
    <div class="card main-card  element-block-example mt-5" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Name Without Price</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Entry Date</th>
               <th>Product Name</th>
               <th>Product Code</th>
               <th>Product QR Number</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(productNameList, index) in productNameLists.data">
                <td>{{ index+1 }}</td>
                <td>{{ productNameList.created_at }}</td>
                <td>{{ productNameList.productName }}</td>
                <td>{{ productNameList.productCode }}</td>
                <td>{{ productNameList.productQRNumber }}</td>
              </tr>
           </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="productNameLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
             productNameLists:{},
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
         this.productListShows();
         this.conditon();
      },
      methods:{
        productListShows(){
          axios.get('/inventoryProductNameWithoutPrice').then(res =>{
                this.productNameLists = res.data.productNameList;
          });
        },
        getPaginateList(page = 1){
          axios.get('/inventoryProductNameWithoutPrice?page=' + page)
          .then(response => {
            this.productNameLists = response.data.productNameList;
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
