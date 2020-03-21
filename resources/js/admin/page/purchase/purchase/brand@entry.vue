<template id="">
  <span>
      <div class="card">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">New Brand Entry</h3>
         </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="create()">
               <div class="form-group">
                 <label>Brand Name</label>
                 <input type="text" v-model="form.brandName" name="brandName"  placeholder="Brand Name" class="form-control" :class="{ 'is-invalid': form.errors.has('brandName') }">
                   <has-error :form="form" field="brandName"></has-error>
               </div>

              <div class="form-group">
                 <label>Brand Status</label>
                 <select v-model="form.brandStatus" name="brandStatus" :class="{ 'is-invalid': form.errors.has('brandStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                 </select>
                  <has-error :form="form" field="brandStatus"></has-error>
              </div>
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
     </div>

      <div class="card mt-5">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
            <h3 style="color:black">Brand List</h3>
          </div>
          <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Brand Name</th>
                   <th>Brand Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  <tr v-for="(showDatas, index) in showDataentry">
                    <td>{{ index+1 }}</td>
                    <td>{{ showDatas.brandName }}</td>
                    <td>{{ showDatas.brandStatus }}</td>
                    <td>
                     <router-link :to="`/brand@entryEdit${showDatas.brandId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                     <button @click.prevent="deleteBrandProduct(showDatas.brandId)"  class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                showDataentry:[],
                form: new Form({
                    brandName:'',
                    brandStatus: '',
                }),
            }
        },

        mounted() {
            this.ShowDataList()
        },

        methods: {

            create() {
                this.form.post('brandEntry')
                    .then(res => {
                        this.form.reset()
                        Toast.fire({
                            icon: 'success',
                            title: 'Saved BrandEntry successfully'
                        })
                        this.ShowDataList()
                    });

            },

            ShowDataList() {
                axios.get('/brandEntry')
                    .then(res => {
                        this.showDataentry = res.data.showdata
                    })
            },
            deleteBrandProduct($brandId){
                axios.delete('/brandEntry/'+$brandId)
                    .then( res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Deleted BrandEntry successfully'
                        })
                        this.ShowDataList();
                    })
            }
        }
    }
</script>
