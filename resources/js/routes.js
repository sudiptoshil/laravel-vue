// for admin-------------
import adminHome from './components/admin/adminhome.vue'
// for category-------------
import addCategory from './components/admin/category/addcategory.vue'
import manageCategory from './components/admin/category/managecategory.vue'
import editcategory from './components/admin/category/editcategory.vue'
// for post-----------------
import addPost from './components/admin/post/addpost.vue'
import managepost from './components/admin/post/managepost.vue'
import editpost from './components/admin/post/editpost.vue'
// for about us
import aboutus from './components/admin/aboutus/add_about_us.vue'
import manageaboutus from './components/admin/aboutus/manage_about_us.vue'
import editaboutus from './components/admin/aboutus/edit_about_us.vue'
// for logo --------------
import addlogo from './components/admin/logo/addlogo.vue'
import managelogo from './components/admin/logo/managelogo.vue'

// for frontend--------------
 import about from './components/public/about.vue'

export const routes = [

    { 
   	path: '/home',
    component: adminHome 

	},
	 { 
   	path: '/add-category',
    component: addCategory 

	},
     { 
   	path: '/manage-category',
    component: manageCategory 

	},
    { 
    path: '/edit-category/:id',
    component: editcategory 

  },
  // route for post------------
  { 
    path: '/add-post',
    component: addPost 

  },
  { 
    path: '/manage-post',
    component: managepost 

  },
  { 
    path: '/edit-post/:id',
    component: editpost 

  },
  // route for about us related
 
   { 
    path: '/add-aboutus',
    component: aboutus 

  },
  { 
    path: '/manage-aboutus',
    component: manageaboutus 

  },
  { 
    path: '/edit-aboutus/:id',
    component: editaboutus 

  },
  { 
    path: '/add-logo',
    component: addlogo 

  },
   { 
    path: '/manage-logo',
    component: managelogo 

  },
  // for frontend---------

  { 
    path: '/about',
    component: about 

  },
 
]