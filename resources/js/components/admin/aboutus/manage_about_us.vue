<template>
  <div class="row-fluid">
<div class="span12">
<!-- BEGIN BASIC PORTLET-->
<div class="widget orange">
<div class="widget-title">
    <h4><i class="icon-reorder"></i>manage about us</h4>
<span class="tools">
    <a href="javascript:;" class="icon-chevron-down"></a>
    <a href="javascript:;" class="icon-remove"></a>
</span>
</div>
<div class="widget-body">
    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
        <tr >
            <th><i class="icon-bullhorn"></i>serial</th>
            <th class="hidden-phone"><i class="icon-question-sign"></i> about title</th>
            <th class="hidden-phone"><i class="icon-question-sign"></i> about description</th>
            <th><i class=" icon-edit"></i> created at</th>
            <th><i class="icon-bookmark"></i> about image</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(about,index) in getallabout" :key="about.id">
            <td>{{index++}}</td>
            <td class="hidden-phone">{{about.aboutus_title | shortlength(10,"...")}}</td>
            <td class="hidden-phone">{{about.aboutus_description | shortlength(15,"...")}}</td>
             <td>{{about.created_at |timeformat}} </td>
            <td><img :src='`uploadimage/${about.about_us_image}`' height="70px" width="60px" ></td>

            <td>
                
                <router-link :to="`/edit-aboutus/${about.id}`" class="btn btn-primary"><i class="icon-pencil"></i></router-link>
                <button class="btn btn-danger" @click.prevent="deleteabout(about.id)"><i class="icon-trash "></i></button>
            </td>
        </tr>
       
        </tbody>
    </table>
</div>
</div>
<!-- END BASIC PORTLET-->
</div>
</div>
</template>

<script>
	export default{
		name:"aboutus",

		mounted(){
			this.$store.dispatch('getallabout')
		},
		computed:{
			getallabout(){
				return this.$store.getters.getaboutus
			}
		},
		
		methods:{
			deleteabout(id){
				// console.log(id)
				  Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                   axios.get('/delete-about/'+id)
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                this.$store.dispatch('getallabout')
                }
                else{
                    this.$store.dispatch('getallabout')
                }
                })
				
			}

		}
	}
</script>