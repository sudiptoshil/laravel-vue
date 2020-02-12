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
                         <th><i class="icon-bullhorn"></i> created</th>
                          <th><i class="icon-bullhorn"></i> action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(category,index) in getallcategory" :key="category.id">
                        <td>{{index++}}</td>
                        <td>{{category.category_name}}</td>
                        <td>{{category.created_at|timeformat}}</td>
                        
                        <td>
                            
                            <router-link :to ="`/edit-category/${category.id}`" class="btn btn-primary"><i class="icon-pencil"></i></router-link>
                            <button class="btn btn-danger" @click.prevent="deletecategory(category.id)"><i class="icon-trash "></i></button>
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
              this.$store.dispatch('getallcategory')
        },
        computed:{
           getallcategory(){
             return this.$store.getters.getcategory

            }
        },
        methods:{
            deletecategory(id){
                
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

                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                    axios.get('/delete-category/'+id)
                  }
                  else{
                    this.$route.push('/manage-category')
                  }
                   this.$store.dispatch('getallcategory')
                })
            }
        }
    }
</script>