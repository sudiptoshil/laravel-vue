<template>
	<div>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Advanced Table</h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
            </span>
            </div>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                         <th><i class="icon-bullhorn"></i>serial</th>
                         <th><i class="icon-bullhorn"></i> category name</th>
                         <th><i class="icon-bullhorn"></i> user name</th>
                         <th><i class="icon-bullhorn"></i> post title</th>
                         <th><i class="icon-bullhorn"></i> post description</th>
                         <th><i class="icon-bullhorn"></i>post image</th>
                         <th><i class="icon-bullhorn"></i> created</th>
                          <th><i class="icon-bullhorn"></i> action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(post,index) in getallpost" :key="post.id">
                        <td>{{index++}}</td>
                        <td v-if="post.category">{{post.category.category_name}}</td>
                        <td v-if="post.user">{{post.user.name}}</td>
                        <td>{{post.post_title | shortlength(10,"...")}}</td>
                        <td>{{post.post_description | shortlength(15,"...")}}</td>
                        <td><img :src="`uploadimage/${post.post_image}`" height="70px" width="60px"></td>
                        <td>{{post.created_at|timeformat}}</td> 
                        
                        <td>
                            
                            <router-link :to ="`/edit-post/${post.id}`"><i class="icon-pencil"></i></router-link>
                            <button class="btn btn-danger" @click.prevent="deletepost(post.id)"><i class="icon-trash "></i></button>
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
        mounted(){
              this.$store.dispatch('getallpost')
        },
        computed:{
           getallpost(){
             return this.$store.getters.getpost

            }
        },
        methods:{
            deletepost(id){
                
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
                    axios.get('/delete-post/'+id)
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                this.$store.dispatch('getallpost')
                }
                else{
                    this.$store.dispatch('getallpost')
                }
                })
                
            }
        }
    }
</script>