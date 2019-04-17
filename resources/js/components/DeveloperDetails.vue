<template>
	<div class="details">
		<transition name="fade" appear mode="out-in">
			<div class="card layout" v-if="details.hasOwnProperty('name')" key="one">
				
				<h5>The chosen developer is <span>{{details.name}}</span></h5>
				
				<p>{{details.name}}'s current position is {{details.position}}</p>
				
			
				<div v-if="project.hasOwnProperty('title')" key="two">
				<h5><span>{{details.name}}</span>'s projects</h5>
				
					<p> {{ project.title }}</p>
				
				
					<p> {{ project.description }}</p>
				
				</div>
			<div v-else key="three" class="small text-center"><span>{{details.name}}</span> has no project yet..</div>
			</div>
			
			<div v-else key="four" class="lead text-center"><p>Chose a developer for more details or create one!</p></div>
		</transition>
		
		
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
	.layout{
		margin: 2.3rem auto 0 auto;
		padding: 1rem;
		text-align: center;
	}
	
</style>