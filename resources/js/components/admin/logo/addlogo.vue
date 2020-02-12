<template>
	<div>
<div class="row-fluid">
<div class="span12">
<!-- BEGIN SAMPLE FORMPORTLET-->
<div class="widget green">
<div class="widget-title">
    <h4><i class="icon-reorder"></i>add logo</h4>
    <span class="tools">
    <a href="javascript:;" class="icon-chevron-down"></a>
    <a href="javascript:;" class="icon-remove"></a>
    </span>
</div>
<div class="widget-body">
    <!-- BEGIN FORM-->
<form action="#" class="form-horizontal" @submit.prevent="addlogo()">

<div class="control-group">
    <label class="control-label"> logo title</label>
    <div class="controls">
        <input type="text"  v-model="form.logo_title" name="logo_title" class="input-xxlarge" />
        
    </div>
</div>

<div class="control-group">
    <label class="control-label">logo image</label>
    <div class="controls">
    	<input type="file" name="logo_image" @change="changephoto($event)"  class="input-xlarge" />
    	<img :src="form.logo_image" width="80px" height="80px">
       
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
    <button type="reset" class="btn"><i class=" icon-remove"></i> Cancel</button>
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
<script>
    export default{
        name:"",
        data(){
            return{
          form: new Form({
            logo_title: '',
            logo_image: '',
           })
            }
        },
        methods:{
            addlogo(){
                this.form.post('/add-logo')
                .then((response)=>{
                   Swal.fire({
                  title: 'logo saved successfully!!.',
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
                    this.$router.push('/manage-logo')
                })
            },
            changephoto(event){
                let file = event.target.files[0];
                 if (file.size > 1048576) {
                    alert('your image too long')
                 }
                 else{
                  let reader = new FileReader();
                  reader.onload = event => {
                    this.form.logo_image = event.target.result
                  };

                  reader.readAsDataURL(file);
                  }
                    }
        }
    }
</script>
