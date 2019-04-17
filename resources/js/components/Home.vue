<template>
	<transition name="fade" appear>
		<div class="container">
			
			<h3 class="text-center">About the application</h3>
			<hr>
			<div class="col-md-6 center">
				<h4>
					The application is made with PHP's framework Laravel and Javascript's framework VUEjs.
				</h4>
				<p>
					The project is a Single Page Application.
				</p>
				<p>
					It lists developers from the database. We can chose among them by click to show
					more details of the chosen developer. We can also see if the chosen developer has
					any project.
				</p>
				<p>
					I used axios for creating requests to the back end.
					The relationship between the developers and the projects is many-many.
				</p>
				<p>
					You can find the source code on GitHub!
				</p>
			</div>
			
		</div>
	</transition>
</template>

<script>
	export default {
		
	}

</script>


<style scoped>
	.center{
		margin: 0 auto;
		text-align: center;
	}
	.fade-leave-active{
		transition: opacity 0s;
		opacity: 0;
	}
</style>