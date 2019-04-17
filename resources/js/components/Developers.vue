 <template>
    <div class="container">
      <div class="row">
       	<div class="col-sm-10 col-md-5">
        	<h3 class="text-center">Developers</h3>
        	<div v-if="loading" class="spinner-border text-info"></div>
        	<p v-if="error">There has been an error..</p>
        	<ul class="list-group">
        		<li class="list-group-item" :key="index"
        		v-for="(item, index) in list" 
        		:class="{'activeIt':index === activeItem }">
			{{ item.name }}
			<button class="btn btn-info btn-sm" @click="sendDetail(item, index)">Details</button>
			<button class="btn btn-danger btn-sm" @click="onDelete(item.id)">Delete</button>
		</li>
        	
        	</ul>
        	
		</div>
        	<div class="col-sm-10 col-md-5">
        		<DeveloperDetails></DeveloperDetails>
        	</div>
        </div>
        
    <div class="row">
    	<create :fetcher="fetchDevList"></create>
    </div>
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
				activeItem: -1,
				message:''
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
			},
			onDelete(id){
			axios.delete(`api/developers/${id}`)
			.then(resp => {
				this.fetchDevList();
				this.message = 'Developer has been deleted'
			})
			.catch(err => {
				this.message = 'There is an issue..';
			});
		}	
		}
		
    }
</script>
<style scoped>

	.activeIt{
		color: #eee;
		background-color: #575757;
		transition: .2s ease-out;
	}
	

</style>

