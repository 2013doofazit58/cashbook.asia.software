<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Category Update</h3>
      </div>
      <div class="py-5 category">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  category-border" >
            <form  action="" method="post" @submit.prevent="updateCategory()">


                <div class="form-row" v-if="role.role == 1 || role.role == 2">
                   <div class="col-md-4 col-12">
                      <label>Select Shop Type </label>
                    </div>
                    <div class="col-md-8 col-12">
                       <select class="form-control" v-model="form.shopTypeId" name="shopTypeId" @change.prevent="adminShopTypeIdSelect()">
                         <option value="">Select One </option>
                         <option  v-for="shopTypeName in shopTypeNames" :value="shopTypeName.shopTypeEntryId">{{ shopTypeName.shopTypeName }} </option>
                       </select>
                     </div>
                 </div>

                <div class="form-row">
                   <div class="col-md-4 col-12">
                      <label>Select Category</label>
                    </div>
                    <div class="col-md-8 col-12">
                       <select class="form-control" v-model="form.previousId" name="previousId" @change.prevent="categoryIdCatch()">
                         <option value="">Select One </option>
                         <option  v-for="categorySelect in categorySelects" :value="categorySelect.categoryId">{{ categorySelect.categoryName }} </option>
                       </select>
                     </div>
                 </div>


                 <div class="form-row">
                   <div class="col-md-4 col-12">
                      <label>Category Name</label>
                    </div>
                    <div class="col-md-8 col-12">
                        <input type="text" v-model="form.categoryName" name="categoryName" :class="{ 'is-invalid': form.errors.has('categoryName') }" class="form-control" placeholder="Category Name" >
                        <has-error :form="form" field="categoryName"></has-error>
                    </div>
                 </div>


                 <div class="form-row">
                    <div class="col-md-4 col-12">
                      <label>Category Position</label>
                    </div>
                    <div class="col-md-8 col-12">
                        <input type="text"  v-model="form.categoryPosition" name="categoryPosition" :class="{ 'is-invalid': form.errors.has('categoryPosition') }" class="form-control" placeholder="Category Position">
                        <has-error :form="form" field="categoryPosition"></has-error>
                    </div>
                 </div>


                 <div class="form-row">
                    <div class="col-md-4 col-12">
                      <label>Category Status</label>
                    </div>
                    <div class="col-md-8 col-12">
                       <select v-model="form.categoryStatus" name="categoryStatus"  class="form-control" :class="{ 'is-invalid': form.errors.has('categoryStatus') }">
                          <option value="">Select One</option>
                          <option value="1">Publish</option>
                          <option value="0">Unpublish</option>
                       </select>
                         <has-error :form="form" field="categoryStatus"></has-error>
                    </div>
                 </div>


                 <div class="form-row">
                    <div class="col-md-4 col-12">
                    </div>
                    <div class="col-md-8 col-12">
                         <input type="checkbox" v-model="form.subCategoryStatus" name="subCategoryStatus" value="1" class="form-check-input" >
                         <label class="form-check-label">Sub Category Status</label>
                    </div>
                 </div>


                 <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                  <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update Category</button>
                </div>
              </form>
           </div>
         </div>
      </div>
    </div>






  </span>
</template>
<script>
    export default {
      data () {
          return {
              form: new Form({
                  shopTypeId : '',
                  previousId : '',
                  categoryName : '',
                  categoryPosition: '',
                  categoryStatus: '',
                  subCategoryStatus: '',
              }),
              categorySelects:{},
              // adminCategoryLists:{},
              shopCategoryLists:{},
              shopTypeNames:{},
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
         this.categorySelect();
         this.getData();
         this.getPaginateList();
         // this.categoryPositions();
         this.shopTypeNameShow();

      },
      methods:{

          getData(){
              axios.get('/category/'+this.$route.params.categoryId+'/edit').then(res=>{
                  this.form.fill(res.data.data)
              })
          },
          //
          // update(){
          //     this.form.put('/adminEntry/'+this.$route.params.adminId)
          //         .then(res=>{
          //             Toast.fire({
          //                 icon: 'success',
          //                 title: 'Admin  Update Successfully'
          //             })
          //             this.$router.push('/adminentry@create')
          //         })
          // }




          updateCategory(){
              this.form.put('/category/'+this.$route.params.categoryId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Update Successfully'
                  })
                  this.$router.push('/add@category')
              })
          },


        shopTypeNameShow() {
          axios.get('/category/create').then(res => {
             this.shopTypeNames = res.data.shopTypeNames;
             this.role = res.data.role;
          });
        },
        getPaginateList(page = 1){
          axios.get('/category?page=' + page)
          .then(response => {
            this.categoryLists = response.data.categoryLists;
          });
        },
        categorySelect() {
          axios.get('/categorySelect').then(res => {
                this.categorySelects = res.data.allcategory;
           });
        },
        categoryIdCatch(){
            axios.get('/categoryIdCatch/'+this.form.previousId).then(res => {
                  this.form.categoryPosition = res.data.categorylabel;
                  console.log(res.data);
             });
        },
        adminShopTypeIdSelect(){
          axios.get('/adminShopTypeIdSelect/'+this.form.shopTypeId).then(res => {
                this.form.categoryPosition = res.data.categoryIncrement;
           });
        },

        // categoryPositions(){
        //     axios.get('/categoryPositions').then(res => {
        //           this.form.categoryPosition = res.data.categoryIncrement;
        //      });
        // },
        // distroy(categoryId){
        //   axios.delete('/category/'+categoryId).then(res => {
        //         Toast.fire({
        //             icon: 'success',
        //             title: 'Category Delete Successfully'
        //         })
        //         this.categorySelect();
        //         this.categoryList();
        //    });
        // },
      }
    }
</script>
