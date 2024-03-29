<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="css/app.css">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
       
    </head>
    <body>
                <div id="app">
                  <header class="header">
			<nav class="main-nav">
				  <li>
				  	<router-link to="/" exact>Home</router-link>
				  </li>
                  <li>
                  	<router-link to="/developers">Developers</router-link>
                  </li>
			</nav>
		</header>
                  	<router-view></router-view>
                    
                </div>
                
	<script src="js/app.js"></script>
    </body>
</html>