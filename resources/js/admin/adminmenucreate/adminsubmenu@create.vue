<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Sub Menus</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="subMenuCreate()">

              <div class="form-group">
                 <label>Menu Name</label>
                  <select class="form-control"  v-model="form.adminMenuId " :class="{ 'is-invalid': form.errors.has('adminMenuId') }">
                    <option value="">Select One</option>
                    <option v-for="show in  menulistshows"  :value="show.adminMenuId">{{show.adminMenuName}}</option>
                  </select>
                  <has-error :form="form" field="adminMenuId"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Name</label>
                <input v-model="form.adminSubMenuName" type="text" name="adminSubMenuName"  :class="{ 'is-invalid': form.errors.has('adminSubMenuName') }" placeholder="Sub Menu Name" class="form-control">
                <has-error :form="form" field="adminSubMenuName"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Url</label>
                <input v-model="form.adminSubMenuUrl" type="text" name="adminSubMenuUrl"  :class="{ 'is-invalid': form.errors.has('adminSubMenuUrl') }" placeholder="Sub Menu Url" class="form-control">
                <has-error :form="form" field="adminSubMenuUrl"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Position</label>
                <input v-model="form.adminSubMenuePosition" type="text" name="adminSubMenuePosition" :class="{ 'is-invalid': form.errors.has('adminSubMenuePosition') }" placeholder="Sub Menu Position" class="form-control">
                <has-error :form="form" field="adminSubMenuePosition"></has-error>
              </div>
              <div class="form-group">
                <label>Sub Menu Status</label>
                <select v-model="form.adminSubMenueStatus" name="adminSubMenueStatus" :class="{ 'is-invalid': form.errors.has('adminSubMenueStatus') }" class="form-control">
                  <option value="">Select One</option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                 </select>
                 <has-error :form="form" field="adminSubMenueStatus"></has-error>
             </div>
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Sub Menu List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Menu</th>
               <th>Sub Menu Name</th>
               <th>Sub Menu Url</th>
               <th>Sub Menu Position</th>
               <th>Sub Menu Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(submenulist, index) in submenulistshows.data">
                  <td>{{ index+1 }}</td>
                  <td v-if="submenulist.admin_menu_relation">{{ submenulist.admin_menu_relation.adminMenuName }}</td>
                  <td v-else></td>
                  <td>{{ submenulist.adminSubMenuName }}</td>
                  <td >{{ submenulist.adminSubMenuUrl }}</td>
                  <td>{{ submenulist.adminSubMenuePosition  }}</td>
                  <td>
                      <div v-if="submenulist.adminSubMenueStatus == 1">
                        <button type="button"  @click="changeStatus(submenulist.adminSubMenuId)" class="btn btn-hover-shine btn-success">Published</button>
                      </div>
                      <div v-else>
                        <button type="button"  @click="changeStatus(submenulist.adminSubMenuId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                      </div>
                 </td>
                  <td>
                      <router-link :to="`/adminsubmenu@Edit${submenulist.adminSubMenuId}`"  class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                      <button  @click.prevent="adminSubMenuDelete(submenulist.adminSubMenuId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                  </td>
              </tr>
            </tbody>
          </table>
       </div>
       <span class="card_footer">
         <pagination :data="submenulistshows" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    adminMenuId : '',
                    adminSubMenuName: '',
                    adminSubMenuUrl: '',
                    adminSubMenuePosition: '',
                    adminSubMenueStatus: '',
                }),
                menulistshows:[],
                submenulistshows:{},

            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
          this.menuListShow();
          this.submenuListShow();
          this.getPaginateList();
        },
        methods:{
          subMenuCreate(){
              this.form.post('/adminSubMenu').then(res=>{
                if (res.data.inactive) {
                    Toast.fire({
                      icon: 'error',
                      title: 'Admin Menu SubMenuStatus Inactive'
                    })
                }

              else {
                  if (res.data.changePosition){
                      Toast.fire({
                        icon: 'error',
                        title: 'Change Your SubMenu Position'
                      })
                   }
                  else if (res.data.changeSubmenuName)
                  {
                      Toast.fire({
                          icon: 'error',
                          title: 'Change Your SubMenu Name'
                      })
                  }
                  else {
                      Toast.fire({
                        icon: 'success',
                        title: 'SubMenu Create Successfully'
                      })
                      this.form.reset();
                      this.submenuListShow();
                   }
                }
            })
          },
          menuListShow(){
            axios.get('/adminSubMenu/create').then(res =>{
              this.menulistshows = res.data.adminmenulist;
            })
          },
           submenuListShow(){
            axios.get('/adminSubMenu').then(res =>{
              this.submenulistshows = res.data.adminsubmenulist;
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminSubMenu?page=' + page)
            .then(response => {
               this.submenulistshows = response.data.adminsubmenulist;
            });
          },
          changeStatus(adminSubMenuId){
            axios.get('adminSubMenueStatus/'+adminSubMenuId).then(res =>{
                Toast.fire({
                  icon: 'success',
                  title: 'SubMenu Status Change Successfully'
                })
                this.submenuListShow();
            })
          },
          adminSubMenuDelete(adminSubMenuId){
            axios.delete('/adminSubMenu/'+adminSubMenuId).then(res =>{

              Toast.fire({
                icon: 'success',
                title: 'SubMenu Delete Successfully'
              })
                this.submenuListShow();
              this.submenuListShow();
                this.submenuListShow();
                this.submenuListShow()
                Toast.fire({
                  icon: 'success',
                  title: 'SubMenu Delete Successfully'
                })

            });
          },
        }

    }

</script>
