<template>
	<div>
		
		<form method="post" class="form">
			<div class="form-goup">
				
				<input class="form-control" type="text" v-model="name" placeholder="Add a name">
	</div>
			<div class="form-goup">	
				<input class="form-control" type="text" v-model="position" placeholder="Add a position">
			</div>
			
			<button class="btn btn-primary btn-sm mg-top" type="submit" @click.prevent="onSubmit">Create</button>
			
		</form>
		<transition name="fade">
			<div class="mg-top" v-if="message">
				<p>{{msg}} <button class="btn btn-outline-danger btn-sm" @click="onmessage">Hide</button></p>
				
			</div>
		</transition>
	</div>
</template>

<script>
export default {
	props:[
		'fetcher'
	],
	data(){
		return {
			name:'',
			position:'',
			message:false,
			msg:''
		}
	},
	mounted(){
		this.onSubmit();
	},
	methods: {
		onSubmit(){
			axios.post('api/developers',{
				name: this.name,
				position: this.position
			}).then(resp => {
				
				console.log(resp.data);
				this.message = true;
				this.msg = 'Developer has been created!';
				this.name = '';
				this.position = '';
				this.fetcher();
			})
			.catch(err => console.log(err));
		},
		onmessage(){
			this.message = false;
		}
	}
}
</script>
<style scoped>
	.form{
		margin: 1rem 0 0 0.9rem;
	}
	.mg-top{
		margin-top: 1rem
	}
	
	
	
</style>


































