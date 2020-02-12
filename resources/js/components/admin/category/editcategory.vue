<template>
<div class="addcategory">
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> edit category</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <!-- BEGIN FORM-->
                <form action= "" @submit.prevent='updatecategory()' class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">category name</label>
                        <div class="controls">
                            <input type="text" v-model="form.category_name" name="category_name"/>

                            
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> update</button>
                        <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
</div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return {
				form: new Form({
					category_name:'',

				})
			}
		},
        mounted(){
            axios.get(`/edit-category/${this.$route.params.id}`)
            .then((response)=>{
                this.form.fill(response.data.editcategory)
            })

        },
		
		methods:{
			updatecategory(){
				this.form.post(`/update-category/${this.$route.params.id}`)
				.then((response) => {
					  Swal.fire({
                  title: 'category update successfully!!.',
                  width: 600,
                  padding: '3em',
                  background: '#fff url(/images/trees.png)',
                  backdrop: `
                    rgba(0,0,123,0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                  `
                })
					this.$router.push('/manage-category')

					
				})
			}
		}
	
}
</script>
