<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Category Entry</h3>
      </div>
      <div class="py-5 category">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  category-border" >
            <form  action="" method="post" @submit.prevent="addCategory()">


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

<<<<<<< HEAD

=======
>>>>>>> d65c1b95eedc9e410c62194d7a9e5536b4809baa
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

                        <input type="text" disabled v-model="form.categoryPosition" name="categoryPosition" :class="{ 'is-invalid': form.errors.has('categoryPosition') }" class="form-control" placeholder="Category Position">
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
                  <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Category</button>
                </div>
              </form>
           </div>
         </div>
      </div>
    </div>

    <div class="card mt-5" v-if="role.role == 1 || role.role == 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Category List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Type Name</th>
               <th>Category name</th>
               <th>Category Position</th>
               <th>Category Type</th>
               <th>Sub Category Status	</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(adminCategoryList, index) in adminCategoryLists.data">
                <td>{{ index+1 }}</td>
                <td v-if="adminCategoryList.shop_type_name">{{ adminCategoryList.shop_type_name.shopTypeName }}</td>
                <td>{{ adminCategoryList.categoryName }}</td>
                <td>{{ adminCategoryList.categoryPosition }}</td>
                <td>
                  <div v-if="adminCategoryList.label == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 2">
                    <button type="button"   class="btn btn-hover-shine btn-success">Sub Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 3">
                    <button type="button"   class="btn btn-hover-shine btn-success">Third Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 4">
                    <button type="button"   class="btn btn-hover-shine btn-success">Four Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 5">
                    <button type="button"   class="btn btn-hover-shine btn-success">Five Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 6">
                    <button type="button"   class="btn btn-hover-shine btn-success">Six Category</button>
                  </div>
                </td>
                <td>
                  <div v-if="adminCategoryList.subCategoryStatus == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                  </div>
                  <div v-else>
                    <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                  </div>
                </td>
                <td>
                   <router-link :to="`/category@Edit${adminCategoryList.categoryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
<!--                   <button type="button" @click="distroy(adminCategoryList.categoryId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>-->
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="adminCategoryLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>


    <div class="card mt-5" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Category List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Type Name</th>
               <th>Category name</th>
               <th>Category Position</th>
               <th>Category Type</th>
               <th>Sub Category Status	</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(shopCategoryList, index) in shopCategoryLists.data">
                <td>{{ index+1 }}</td>
                <td v-if="shopCategoryList.shop_type_name">{{ shopCategoryList.shop_type_name.shopTypeName }}</td>
                <td>{{ shopCategoryList.categoryName }}</td>
                <td>{{ shopCategoryList.categoryPosition }}</td>
                <td>
                  <div v-if="shopCategoryList.label == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 2">
                    <button type="button"   class="btn btn-hover-shine btn-success">Sub Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 3">
                    <button type="button"   class="btn btn-hover-shine btn-success">Third Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 4">
                    <button type="button"   class="btn btn-hover-shine btn-success">Four Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 5">
                    <button type="button"   class="btn btn-hover-shine btn-success">Five Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 6">
                    <button type="button"   class="btn btn-hover-shine btn-success">Six Category</button>
                  </div>
                </td>
                <td>
                  <div v-if="shopCategoryList.subCategoryStatus == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                  </div>
                  <div v-else>
                    <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                  </div>
                </td>
                <td>
                   <router-link :to="`/category@Edit${shopCategoryList.categoryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
<!--                   <button type="button" @click="distroy(shopCategoryList.categoryId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>-->
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="shopCategoryLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
              form: new Form({
                  shopTypeId : '',
                  previousId : '',
                  categoryName : '',
                  categoryPosition: '',
                  categoryStatus: '',
                  subCategoryStatus: '',
              }),
              categorySelects:{},
              adminCategoryLists:{},
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
         this.categoryList();
         this.getPaginateList();
         this.categoryPositions();
         this.shopTypeNameShow();
      },
      methods:{
        addCategory() {
          this.form.post('/category').then(res => {
            if (res.data.changePosition) {
              Toast.fire({
                  icon: 'error',
                  title: 'Change Your Category Postition'
              })
            }
            else if (res.data.changeCategoryName) {
              Toast.fire({
                  icon: 'error',
                  title: 'Change Your Category Name'
              })
            }
            else {
                Toast.fire({
                    icon: 'success',
                    title: 'Category Create Successfully'
                })
                this.form.reset()
                this.categorySelect();
                this.categoryList();
                this.categoryPositions();
                console.log(res.data);
            }
           });
        },
        categoryList() {
          axios.get('/category').then(res => {
            this.adminCategoryLists = res.data.adminCategoryLists;
            this.shopCategoryLists = res.data.shopCategoryLists;
          });
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


        categoryPositions(){
            axios.get('/categoryPositions').then(res => {
                  this.form.categoryPosition = res.data.categoryIncrement;
             });
        },


        distroy(categoryId){
          axios.delete('/category/'+categoryId).then(res => {
                Toast.fire({
                    icon: 'success',
                    title: 'Category Delete Successfully'
                })
                this.categorySelect();
                this.categoryList();
           });
        },
      }
    }
</script>
