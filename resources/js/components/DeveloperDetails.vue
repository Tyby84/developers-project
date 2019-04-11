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
	</div>
	
</template>


<script>
	import { EventBus } from '../EventBus';
	export default{
		data(){
			return {
				details:{}
			}
		},
		mounted(){
			EventBus.$on('sendingDetails', (item)=>{
				console.log(this.details);
			this.details = item;
		});
		}
		
	}

</script>


<style scoped>
	.details {
		margin-top: 1rem;
	}
</style>