﻿<div class="container">
	<div class="row">
		<div class="span4 offset4 well">
			<legend>Please Sign In</legend>

			<form method="POST" action="<?php  echo base_url()   ?>myaccount/validate" accept-charset="UTF-8">
				<input type="text" id="username" class="span4" name="username" placeholder="Username">
				<input type="password" id="password" class="span4" name="password" placeholder="Password">

			<button type="submit" class="btn btn-info btn-block">Sign in</button>
			</form>    
		</div>
	</div>
</div>


