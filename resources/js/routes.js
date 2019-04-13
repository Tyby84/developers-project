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
		path: '/developers/:id',
		component: require('./components/DeveloperDetails.vue').default
	}
];

export default new VueRouter({
	routes
});