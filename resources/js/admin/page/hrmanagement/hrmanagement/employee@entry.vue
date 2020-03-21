<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Employee Information Entry</h3>
      </div>

       <div class="employee-entery p-3">
         <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
               <h6>Identification Information</h6>
           </div>
            <form  method="post" @submit.prevent="employeeInformationEntry()">
              <div class="row m-0 border">
                <div class="col-lg-6  col-md-6  p-3">
                   <div class="table-responsive-custom bg-white">
                     <table class="table-hover col-lg-12  col-md-12 mb-0">
                       <tr>
                          <td class="title-name">Employee Type</td>
                          <td>
                             <div>
                               <select class="form-control" v-model="form.employeeTypeId" :class="{ 'is-invalid': form.errors.has('employeeTypeId') }" name="employeeTypeId">
                                  <option value="">Select One</option>
                                  <option  v-for="employeeTypeList in employeeTypeLists" :value="employeeTypeList.shopEmployeeTypeId">{{ employeeTypeList.shopEmployeeTypeName }}</option>
                               </select>
                              <has-error :form="form" field="employeeTypeId"></has-error>
                             </div>
                          </td>
                       </tr>
                       <tr>
                        <td class="title-name">User Name</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.userName" name="userName" :class="{ 'is-invalid': form.errors.has('userName') }" class="form-control" placeholder="User Name">
                            <has-error :form="form" field="userName"></has-error>
                          </div>
                         </td>
                       </tr>
                       <tr>
                        <td class="title-name">Password</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.password" name="password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" placeholder="password">
                            <has-error :form="form" field="password"></has-error>
                          </div>
                         </td>
                       </tr>
                       <tr>
                        <td class="title-name">Full Name</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.fullName" name="fullName" :class="{ 'is-invalid': form.errors.has('fullName') }" class="form-control" placeholder="Full Name">
                            <has-error :form="form" field="fullName"></has-error>
                          </div>
                         </td>
                       </tr>
                      <tr>
                        <td class="title-name">Father Name</td>
                        <td>
                            <div>
                              <input type="text" v-model="form.fatherName" name="fatherName" :class="{ 'is-invalid': form.errors.has('fatherName') }" class="form-control" placeholder="Father Name">
                              <has-error :form="form" field="fatherName"></has-error>
                            </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Mother Name</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.motherName" name="motherName" :class="{ 'is-invalid': form.errors.has('motherName') }" class="form-control" placeholder="Mother Name">
                            <has-error :form="form" field="motherName"></has-error>
                          </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Date of Birth</td>
                        <td>
                          <div>
                             <input type="date" v-model="form.dateOfBirth" name="dateOfBirth" :class="{ 'is-invalid': form.errors.has('dateOfBirth') }" class="form-control"  placeholder="Date of Birth">
                             <has-error :form="form" field="dateOfBirth"></has-error>
                          </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Phone Number</td>
                        <td>
                          <div>
                             <input type="text" v-model="form.phoneNumber" name="phoneNumber" :class="{ 'is-invalid': form.errors.has('phoneNumber') }" class="form-control"  placeholder="Phone Number">
                             <has-error :form="form" field="phoneNumber"></has-error>
                          </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Religion</td>
                        <td>
                            <div>
                              <select class="form-control" v-model="form.religion" :class="{ 'is-invalid': form.errors.has('religion') }" name="religion">
                                <option value="">Select One</option>
                                <option value="1">Islam</option>
                                <option value="2">Hindu</option>
                                <option value="3">Ohter</option>
                              </select>
                              <has-error :form="form" field="religion"></has-error>
                            </div>
                         </td>
                      </tr>
                    </table>
                  </div>
               </div>

                <div class="col-lg-6 col-md-6 p-3">
                  <div class="table-responsive  bg-white">
                    <table class="table-hover col-lg-12  col-md-12 mb-0">
                      <tr>
                        <td class="title-name">Sex</td>
                        <td>
                          <div>
                            <select class="form-control" v-model="form.sex" :class="{ 'is-invalid': form.errors.has('sex') }" name="sex">
                              <option value="">Select One</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                            </select>
                            <has-error :form="form" field="sex"></has-error>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="title-name">Marital Status</td>
                        <td>
                          <div>
                            <select class="form-control" v-model="form.maritalStatus" :class="{ 'is-invalid': form.errors.has('maritalStatus') }" name="maritalStatus">
                              <option value="">Select One</option>
                              <option value="1">Single</option>
                              <option value="2">Married</option>
                            </select>
                            <has-error :form="form" field="maritalStatus"></has-error>
                          </div>
                        </td>
                      </tr>
                      <tr>
                         <td class="title-name">NID Number</td>
                         <td>
                           <div>
                             <input type="text" v-model="form.nidNumber" name="nidNumber" :class="{ 'is-invalid': form.errors.has('nidNumber') }" class="form-control" placeholder="NID Number">
                             <has-error :form="form" field="maritalStatus"></has-error>
                           </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Nationality</td>
                         <td>
                           <div>
                              <input type="text" v-model="form.nationality" name="nationality" :class="{ 'is-invalid': form.errors.has('nationality') }" class="form-control" placeholder="Nationality">
                              <has-error :form="form" field="maritalStatus"></has-error>
                           </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Present Address</td>
                        <td >
                            <div>
                              <textarea v-model="form.presentAddress" name="presentAddress" :class="{ 'is-invalid': form.errors.has('presentAddress') }" class="form-control" placeholder="Present Address"  style="height:110px;margin-top:2px"></textarea>
                              <has-error :form="form" field="presentAddress"></has-error>
                            </div>
                         </td>
                      </tr>
                      <tr>
                          <td class="title-name">Permanent Address</td>
                          <td >
                          <div>
                            <textarea v-model="form.permanentAddress" name="permanentAddress" :class="{ 'is-invalid': form.errors.has('permanentAddress') }"  class="form-control" placeholder="Permanent Address" style="height:110px;margin-top:5px"></textarea>
                            <has-error :form="form" field="permanentAddress"></has-error>
                          </div>
                       </td>
                    </tr>
                   </table>
                 </div>
                 <div class="pt-3 text-right">
                   <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Add Information</button>
                 </div>
              </div>
           </div>
        </form>
       </div>

        <div class="row m-0 pb-3"  v-if="show">
          <div class="col-lg-6 col-md-6">
            <div class="education-entery">
              <div class="border">
                <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                  <h6>Education Information</h6>
                </div>
                <div class="table-responsive bg-white p-3">
                  <table class=" table-hover  col-lg-12  col-md-12 mb-0">
                    <tr>
                      <td class="title-name">Name Of Degree</td>
                      <td>
                        <div>
                          <select class="form_control" name="">
                            <option value="">Select One</option>
                            <option value="">Islam</option>
                            <option value="">Islam</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Name Of Institute</td>
                      <td>
                        <div>
                          <input type="text" name="" class="form_control" placeholder="Name Of Institute">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Duration Of Education</td>
                      <td>
                        <div>
                          <input type="text" name="" class="form_control" placeholder="Duration Of Education">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Grade</td>
                      <td>
                        <div>
                          <select class="form_control" name="">
                            <option value="">Select One</option>
                            <option value="">Islam</option>
                            <option value="">Islam</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="p text-right">
                  <button type="button" class="btn-pill btn-hover-shine btn btn-primary">Add Information</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="education-entery">
              <div class="border">
                <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                  <h6>Profesional Information</h6>
                </div>
                <div class="table-responsive bg-white p-3">
                  <table class=" table-hover col-lg-12  col-md-12  mb-0">
                    <tr>
                      <td class="title-name">Organization Name</td>
                      <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Organization Name">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Designation</td>
                      <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Designation">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Year Of Exprience</td>
                      <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Year Of Exprience">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Address</td>
                      <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Address">
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="p text-right">
                  <button type="button" class="btn-pill btn-hover-shine btn btn-primary">Add Information</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row m-0 pb-3" v-if="show">
          <div class="col-lg-6 col-md-6">
            <div class="education-entery">
              <div class="border">
                <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                  <h6>Skill Information</h6>
                </div>
                <div class="table-responsive bg-white p-3">
                  <table class=" table-hover col-lg-12  col-md-12  mb-0">
                    <tr>
                      <td class="title-name">Skill Type</td>
                      <td>
                        <div>
                          <input type="text" name="" class="form_control" placeholder="Skill Type">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Name Of Institute</td>
                      <td>
                        <div>
                          <input type="text" name="" class="form_control"  placeholder="Name Of Institute">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Duration Of Skill</td>
                      <td>
                        <div>
                          <input type="text" name="" class="form_control" placeholder="Duration Of Skill">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Skill Grade</td>
                      <td>
                        <div>
                          <select class="form_control" name="">
                            <option value="">Select One</option>
                            <option value="">Islam</option>
                            <option value="">Islam</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="p text-right">
                  <button type="button" class="btn-pill btn-hover-shine btn btn-primary">Add Information</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="education-entery">
              <div class="border">
                <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                  <h6>Banking Information</h6>
                </div>
                <div class="table-responsive bg-white p-3">
                  <table class=" table-hover col-lg-12  col-md-12 mb-0">
                    <tr>
                      <td class="title-name">Bank Name</td>
                      <td>
                        <div>
                          <select class="form_control" name="">
                            <option value="">Select One</option>
                            <option value="">Ducth</option>
                            <option value="">Brack</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">Branch Name</td>
                      <td>
                        <select class="form_control" name="">
                          <option value="">Select One</option>
                          <option value="">Ducth</option>
                          <option value="">Brack</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">A/C Name</td>
                      <td>
                        <div>
                          <input type="text" class="form_control" placeholder="A/C Name">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="title-name">A/C Number</td>
                      <td>
                        <div>
                          <input type="text" class="form_control" placeholder="Mother Name">
                        </div>
                      </td>
                    </tr>

                  </table>
                </div>
                <div class="p text-right">
                  <button type="button" class="btn-pill btn-hover-shine btn btn-primary">Add Information</button>
                </div>
              </div>
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
                  employeeTypeId : '',
                  userName : '',
                  password : '',
                  fullName : '',
                  fatherName: '',
                  motherName: '',
                  dateOfBirth: '',
                  phoneNumber: '',
                  religion: '',
                  sex: '',
                  maritalStatus: '',
                  nidNumber: '',
                  nationality: '',
                  presentAddress: '',
                  permanentAddress: '',
              }),
              employeeTypeLists:[],
              show:false,
          }
      },
      mounted() {
          this.employeeTypeList();
      },
      methods:{
        employeeInformationEntry(){
            this.form.post('/shopEmployeeEntry').then(res =>{
              Toast.fire({
                  icon: 'success',
                  title: 'Shop Employee Entry Successfully'
              })
              this.show = true;
              this.form.reset();
            })
         },
         employeeTypeList(){
            axios.get('/shopEmployeeEntry/create').then(res =>{
              this.employeeTypeLists = res.data.employeeTypeList;
           })
        },
       },
    }
</script>
