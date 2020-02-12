window.Vue = require('vue');
import moment from 'moment'
Vue.filter("timeformat",(arg)=>{
return moment(arg).format('MMMM Do YYYY, h:mm:ss a')
})

Vue.filter("shortlength",(text,length,suffix)=>{
 return text.substring(0,length) + suffix;
})