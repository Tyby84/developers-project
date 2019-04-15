import VueRouter from 'vue-router';


let routes = [
	{
		path: '/',
		component: require('./components/Home.vue').default
	},
	{
		path: '/developers',
		component: require('./components/Developers.vue').default
	},
	{
		path: '/projects',
		component: require('./components/Projects.vue').default
	}
];

export default new VueRouter({
	routes
});