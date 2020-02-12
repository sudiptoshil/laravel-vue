export default{
	state:{
		category:[],
		post:[],
		aboutus:[],
		logo:[]
	},
	getters:{
		getcategory(state){
			return state.category
		},
		getpost(state){
			return state.post
		},
		getaboutus(state){
			return state.aboutus
		},
		getlogo(state){
			return state.logo
		}
	},
	actions:{
		getallcategory(context){
			axios.get('/get-category')
			.then((response)=>{
				context.commit('categories',response.data.categories)
			})
		},
		getallpost(context){
			axios.get('/get-post')
			.then((response)=>{
				context.commit('posts',response.data.posts)
			})
		},
		getallabout(context){
			axios.get('/get-aboutus')
			.then((response)=>{
				context.commit('aboutus',response.data.abouts)
			})
		},
		getalllogo(context){
			axios.get('/get-logo')
			.then((response)=>{
				context.commit('logos',response.data.logo)
			})
		},
	},
	mutations:{
		categories(state,data){
			return state.category = data
		},
		posts(state,data){
			return state.post = data
		},
		aboutus(state,data){
			return state.aboutus = data
		},
		logos(state,data){
			return state.logo = data
		},
	}
}






