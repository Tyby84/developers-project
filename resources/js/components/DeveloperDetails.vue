<template>
	<div class="details">
		<div class="card" v-if="details.hasOwnProperty('name')">
			<div class="card-header">
			<p>The chosen developer is <span>{{details.name}}</span></p>
			
			</div>
			<div class="card-body">
			<p>{{details.name}}'s current position is {{details.position}}</p>
			
			</div>
		</div>
		<div v-else><p>Chose a developer for more details!</p></div>
		<p>project: {{ project.title }}</p>
		<p>project: {{ project.description }}</p>
	</div>
	
</template>


<script>
	import { EventBus } from '../EventBus';
	export default{
		data(){
			return {
				details:{},
				project:{}
			}
		},
		mounted(){
			EventBus.$on('sendingDetails', (item)=>{
			this.details = item;
			this.fetchProject();
		});
		},
		
		methods: {
			fetchProject(){
			axios.get(`api/projects/${this.details.id}`)
			.then(resp => {
				this.project = resp.data;
				/*console.log('resp.data: ', resp.data);*/
				this.project = resp.data;
				}).catch(err => {
				
				console.log(err);
					this.loading = false;
					this.error = true;
			});
		}
		}
		
	}

</script>


<style scoped>
	.details {
		margin-top: 1rem;
	}
</style>