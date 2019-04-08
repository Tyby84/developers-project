<template>
	<div>
		<p v-if="details">{{details.name}}</p>
	</div>
</template>


<script>
	import { EventBus } from '../EventBus';
	export default{
		data(){
			return {
				details:[]
			}
		},
		mounted(){
			EventBus.$on('sendingDetails', (item)=>{
				console.log(item);
			this.details=item;
		});
		}
		
	}

</script>