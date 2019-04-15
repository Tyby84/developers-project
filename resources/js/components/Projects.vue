<!--<template>
	<div class="container">
	<h3>Projects</h3>
	<p>list: {{ list }}</p>
		
	</div>
</template>


<script>
export default {
	data() {
		return {
			list:[],
			loading: true,
			error: false
		}
	},
	mounted(){
		this.fetchProjects();
	},
	methods: {
		fetchProjects(){
			axios.get('api/projects')
			.then(resp => {
				this.list = resp.data;
				console.log(resp.data.name);
				this.loading = false;
				}).catch(err => {
				
				console.log(err);
					this.loading = false;
					this.error = true;
			});
		}
	}
}

</script>
<style></style>-->