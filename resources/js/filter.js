import Vue from 'vue'

// Vue.filter('timeformat',(ags)=>{
//   return moment(ags).format('MMMM Do YYYY, h:mm:ss a');
// })

Vue.filter('shortlength',(text,length,suffix)=>{
  return text.substr(0,length)+suffix;
})
