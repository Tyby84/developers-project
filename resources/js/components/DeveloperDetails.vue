<template>
	<div>
		<h3>Details of {{ developer.name }}</h3>
	</div>
</template>


<script>
	export default{
		data(){
			return {
				developer: {
					name:'',
					position: ''
				},
				error:false
			}
		},
		/*mounted() {
			this.fetchDeveloper();
		},*/
		methods: {
			fetchDeveloper(id) {
				axios.get(`api/developer/${id}`)
				.then(resp => {
					this.name = resp.data.name;
					this.position = resp.data.position;
				}).catch(err => {
					console.log(err);
					this.error = true;
				});
			}
		}
	}

</script>