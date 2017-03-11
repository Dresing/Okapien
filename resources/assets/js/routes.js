import VueRouter from 'vue-router'


let routes = [
	{
		path: '/',
		componet: require('./views/Example')
	}
];



export default new VueRouter({
	routes
});