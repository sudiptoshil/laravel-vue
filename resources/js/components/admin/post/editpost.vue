<template>
  <div>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>add post</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <!-- BEGIN FORM -->
                <form  @submit.prevent="updatepost()" >
                    
                    <div class="control-group">
                        <label class="control-label">post title</label>
                        <div class="controls">
                            <input type="text" v-model="form.post_title" name="post_title" class="input-xlarge" />
                            
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">category name</label>
                        <div class="controls">
                            <select class="input-medium m-wrap" tabindex="1" v-model="form.category_id" name="category_id">
                                <option v-for="category in getallcategory" :value="category.id">{{category.category_name}}</option>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">post description</label>
                        <div class="controls">
                            <textarea class="input-xxlarge" v-model="form.post_description" name="post_description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">post image</label>
                        <div class="controls">
                          <input type="file" name="post_image" @change="changephoto($event)"  class="input-xlarge" />
                          <img :src="updateimage()" width="80px" height="80px">
                           
                        </div>
                    </div>
                     
                    <div class="form-actions">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
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
<script>
  export default{
    name:"addpost",
      data () {
      return {
        form: new Form({
          post_title: '',
          post_description: '',
          category_id: '',
          post_image :  ''
        })
      }
  },
   created(){
      axios.get(`/edit-post/${this.$route.params.id}`)
      .then((response)=>{
        this.form.fill(response.data.post)
      })
    },

  mounted(){
    this.$store.dispatch("getallcategory")
  },
  computed:{
    getallcategory(){
      return this.$store.getters.getcategory
    }
  },

  methods:{
    updatepost(){
      
      // console.log(this.form.category_id)
      this.form.post(`update-post/${this.$route.params.id}`)
      .then((response)=>{
         Swal.fire({
          title: 'post updated successfully!!.',
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
        this.$router.push('/manage-post')

      })
    },
    updateimage(){
      let img = this.form.post_image
      if (img.length > 100) {
        return this.form.post_image
      }
      else{
        return `uploadimage/${this.form.post_image}`;
      }
    },

   
    changephoto(event){
       let file = event.target.files[0];
       if (file.size > 1048576) {
        alert('your image too long')
       }
       else{
      let reader = new FileReader();
      reader.onload = event => {
        this.form.post_image = event.target.result
      };

      reader.readAsDataURL(file);
      }
    }
  }


  }
</script>