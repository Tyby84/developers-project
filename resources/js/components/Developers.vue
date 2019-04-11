<template>
    <div class="container">
      <div class="row">
       	<div class="col-sm-10 col-md-5">
        	<h3>Developers</h3>
        	<div v-if="loading" class="spinner-border text-info"></div>
        	<p v-if="error">There has been an error..</p>
        	<ul class="list-group">
        		<li class="list-group-item" :key="item.id"
        		v-for="item in list" @click="sendDetail(item)" 
        		:class="link ? 'activeItem' : '' ">
			{{ item.name }}
			
		</li>
        	
        	</ul>
		</div>
        	<div class="col-sm-10 col-md-5">
        		<DeveloperDetails></DeveloperDetails>
        	</div>
        </div>
        
    <create></create>
    </div>
    
</template>

<script>
		import { EventBus } from '../EventBus';

    export default {
		
        data() {
			return {
				list:[],
				loading:true,
				error:false,
				link:false
			}
		},
		mounted() {
			this.fetchDevList();
			
		},
		methods: {
			sendDetail(elem){
				
				EventBus.$emit('sendingDetails', elem);
				this.link = true;
			},
			fetchDevList(){
				axios.get('api/developers').then(resp => {
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
<style scoped>

	.activeItem{
		color: red;
	}

</style>

