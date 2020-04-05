<template>
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.46);border:1px solid rgba(0, 0, 0, 0.12)">
        <h3 style="color:black">Expired Date Soon Product list</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>Product Name</th>
               <th>Product Brand</th>
               <th>Mfg Date</th>
               <th>Exp Date</th>
               <th>Expired Date Soon</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="expireDateSoonProductList in expireDateSoonProductLists">
                 <td v-if="expireDateSoonProductList.product_name">{{ expireDateSoonProductList.product_name.productName }}</td>
                 <td v-if="expireDateSoonProductList.product_brand_name">{{ expireDateSoonProductList.product_brand_name.productBrandName }}</td>
                 <td>{{ expireDateSoonProductList.mfgDate }}</td>
                 <td>{{ expireDateSoonProductList.expDate }}</td>
                 <td>
                   <!-- <div v-if="expireDateSoonProductList.expDate < nowData">
                       <button  class="border py-1 px-2 btn-hover-shine btn-success">Date Expired</button>
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
             expireDateSoonProductLists:{},
             nowData:{},
             role:{},
          }
      },
      mounted(){
         this.expireDateSoonProductList();
         this.conditon();
      },
      methods:{
          expireDateSoonProductList(){
            axios.get('/expireDateSoonProductList').then(res =>{
                this.expireDateSoonProductLists =  res.data.expireDateSoonProductList
                this.nowData =  res.data.nowData
            })
          },
          conditon(){
              axios.get('/condition').then(res =>{
                 this.role = res.data.authInfo;
            })
          },
      }
    }
</script>
