<template>
	<div class="details">
		<div class="card" v-if="details.hasOwnProperty('name')">
			<div class="card-header">
			<p>The chosen developer is <span>{{details.name}}</span></p>
			
			</div>
			<div class="card-body">
			<p>{{details.name}}'s current position is {{details.position}}</p>
			
			</div>

			<div v-if="project.hasOwnProperty('title')" class="card">
			<div class="card-header"><h3><span>{{details.name}}</span>'s projects</h3></div>
			<div class="card-body">
				<p> {{ project.title }}</p>
			</div>
			<div class="card-footer">
				<p> {{ project.description }}</p>
			</div>
		</div>
		<div v-else class="small"><span>{{details.name}}</span> has no project yet..</div>
		</div>
		<div v-else class="lead text-center"><p>Chose a developer for more details!</p></div>
		
	</div>
	
</template>


<script>
	import { EventBus } from '../EventBus';
	export default{
		data(){
			return {
				details:{},
				project:{},
				loading:true
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
				this.loading = false;
				}).catch(err => {
				
				console.log(err);
					this.loading = false;
					
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