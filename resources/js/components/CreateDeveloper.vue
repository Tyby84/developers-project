<template>
	<div class="container">
		<form method="post" >
			<div>
				<label>Name</label>
				<input type="text" v-model="name">
			</div>
			
			<div>
				<label>Position</label>
				<input type="text" v-model="position">
			</div>
			<button type="submit" @click.prevent="onSubmit">Create</button>
		</form>
		<p>{{message}}</p>
	</div>
</template>

<script>
export default {
	data(){
		return {
			name:'',
			position:'',
			message:''
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
				this.message = 'Sent!';
			})
			.catch(err => console.log(err));
		}
	}
}
</script>
<style>

</style>