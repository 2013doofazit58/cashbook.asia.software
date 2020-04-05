<template>
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.46);border:1px solid rgba(0, 0, 0, 0.12)">
        <h3 style="color:black">Expired Date Over Product list</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>Product Name</th>
               <th>Product Brand</th>
               <th>Mfg Date</th>
               <th>Exp Date</th>
               <th>Expired Date Over</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="expireDateOverProductList in expireDateOverProductLists" v-show="expireDateOverProductList.expDate < nowData">
                 <td v-if="expireDateOverProductList.product_name">{{ expireDateOverProductList.product_name.productName }}</td>
                 <td v-if="expireDateOverProductList.product_brand_name">{{ expireDateOverProductList.product_brand_name.productBrandName }}</td>
                 <td>{{ expireDateOverProductList.mfgDate }}</td>
                 <td>{{ expireDateOverProductList.expDate }}</td>
                 <td>
                   <div v-if="expireDateOverProductList.expDate < nowData">
                       <button  class="border py-1 px-2 btn-hover-shine btn-danger">Date Expired</button>
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
      data () {
          return {
             expireDateOverProductLists:{},
             nowData:{},
             role:{},
          }
      },
      mounted(){
         this.expireDateOverProductList();
         this.conditon();
      },
      methods:{
          expireDateOverProductList(){
            axios.get('/expireDateOverProductList').then(res =>{
                this.expireDateOverProductLists =  res.data.expireDateOverProductList
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
