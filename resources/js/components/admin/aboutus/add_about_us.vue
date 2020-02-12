<template>
	<div>
<div class="row-fluid">
<div class="span12">
<!-- BEGIN SAMPLE FORMPORTLET-->
<div class="widget green">
<div class="widget-title">
    <h4><i class="icon-reorder"></i>about us</h4>
    <span class="tools">
    <a href="javascript:;" class="icon-chevron-down"></a>
    <a href="javascript:;" class="icon-remove"></a>
    </span>
</div>
<div class="widget-body">
    <!-- BEGIN FORM-->
<form action="#" class="form-horizontal" @submit.prevent="addabout()">

<div class="control-group">
    <label class="control-label">write title</label>
    <div class="controls">
        <input type="text"  v-model="form.aboutus_title" name="aboutus_title" class="input-xxlarge" />
        
    </div>
</div>

<div class="control-group">
    <label class="control-label">describe about us</label>
    <div class="controls">
        <textarea class="input-xxlarge"  v-model="form.aboutus_description"name="aboutus_description" rows="3"></textarea>
    </div>
</div>

<div class="control-group">
    <label class="control-label">about us image</label>
    <div class="controls">
    	<input type="file" name="about_us_image" @change="changephoto($event)"  class="input-xlarge" />
    	<img :src="form.about_us_image" width="80px" height="80px">
       
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
		name:"aboutus",
		  data () {
    return {
      form: new Form({
        aboutus_title: '',
        aboutus_description: '',
        about_us_image: '',
      })
    }
  },

  methods:{
  	addabout(){
  		this.form.post('/add-about-us')
  		.then((response)=>{
  			this.$router.push('/manage-aboutus')
         Swal.fire({
          title: 'about saved successfully!!.',
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
		    this.form.about_us_image = event.target.result
		  };

		  reader.readAsDataURL(file);
		  }
  	}
  }
	}
</script>