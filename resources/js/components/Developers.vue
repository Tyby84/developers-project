<template>
    <div class="container">
      <div class="row">
       	<div class="col-sm-10 col-md-5">
        	<h3>Developers</h3>
        	<div v-if="loading" class="spinner-border text-info"></div>
        	<p v-if="error">There has been an error..</p>
        	<ul class="list-group">
        		<li class="list-group-item" :key="index"
        		v-for="(item, index) in list" @click="sendDetail(item, index)" 
        		:class="{'activeIt':index === activeItem }">
			{{ item.name }}
			<!--<router-link to="developers/{item.id}"></router-link>-->
		</li>
        	
        	</ul>
		</div>
        	<div class="col-sm-10 col-md-5">
        		<DeveloperDetails></DeveloperDetails>
        	</div>
        </div>
        
    <create :fetcher="fetchDevList"></create>
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
				activeItem: -1
			}
		},
		created() {
			this.fetchDevList();
			
		},
		methods: {
			sendDetail(elem, index){
				EventBus.$emit('sendingDetails', elem);
				this.activeItem = index;
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

	.activeIt{
		color: red;
	}

</style>

