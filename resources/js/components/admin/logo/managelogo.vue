<template>
	<div>
<div class="row-fluid">
<div class="span12">
<!-- BEGIN BASIC PORTLET-->
<div class="widget orange">
<div class="widget-title">
    <h4><i class="icon-reorder"></i> manage logo</h4>
<span class="tools">
    <a href="javascript:;" class="icon-chevron-down"></a>
    <a href="javascript:;" class="icon-remove"></a>
</span>
</div>
<div class="widget-body">
    <table class="table table-striped table-bordered table-advance table-hover">
        <thead>
        <tr>
            <th><i class="icon-bullhorn"></i> serial</th>
            <th class="hidden-phone"><i class="icon-question-sign"></i> logo title</th>
            <th><i class="icon-bookmark"></i> created at</th>
            <th><i class="icon-bookmark"></i> logo image</th>
            <th><i class=" icon-edit"></i> action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(logo,index) in getalllogo" :key="logo.id">
            <td>{{index++}}</a></td>
            <td class="hidden-phone">{{logo.logo_title|shortlength(5,"...")}}</td>
            <td>{{logo.created_at|timeformat}}</td>
            <td><img :src="`uploadimage/${logo.logo_image}`" height="80px" width="80px"></td>
            <td>
                <button class="btn btn-primary"><i class="icon-pencil"></i></button>
                <button class="btn btn-danger" @click.prevent="deletelogo(logo.id)"><i class="icon-trash "></i></button>
            </td>
        </tr>
       
        </tbody>
    </table>
</div>
</div>
<!-- END BASIC PORTLET-->
</div>
</div>
</div>
</template>
<script>
	export default{
		name:"managelogo",
		
		mounted(){
			this.$store.dispatch("getalllogo")
		},
		computed:{
			getalllogo(){
				return this.$store.getters.getlogo
			}
		},
		methods:{
			deletelogo(id){
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
                    axios.get('/delete-logo/'+id)
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                this.$store.dispatch('getalllogo')
                }
                else{
                    this.$store.dispatch('getalllogo')
                }
                })
			}
		}
	}
</script>