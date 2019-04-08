<template>
    <div>
      
        	<h3>Developers</h3>
        	<p v-if="loading">Loading</p>
        	<p v-if="error">There has been an error..</p>
        	<ul>
        		<li v-for="dev in list"><a v-bind:href="'developer/'+dev.id">{{ dev.name }}</a>
        			<button class="tn-btn-info" @click="sendDetail(dev)">Detail</button>
        			</li>
        		
        	</ul>
        	<<div>
        		<DeveloperDetails></DeveloperDetails>
        	</div>
    </div>
</template>

<script>
	import { EventBus } from '../EventBus';
    export default {
		
        data() {
			return {
				list:[],
				developer: {
					id:'',
					name: '',
					position:''
				},
				loading:true,
				error:false
			}
		},
		mounted() {
			this.fetchDevList();
			
		},
		methods: {
			
			sendDetail(elem){
				EventBus.$emit('sendingDetails', elem);
			},
			
			fetchDevList(){
				axios.get('developers').then(resp => {
					this.list = resp.data;
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


