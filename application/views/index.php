<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php $this->load->view($header); ?>
<body>
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<?php
	if( $loggedIn){
		$this->load->view($nav); 
	};?>	
	<div  class='mid-section ' >
		<div   style='padding-top:10px'  >
			
			
			<?php if( $body == 'myaccount'){?>
			
					<div class="container-fluid">
						
						<div class="row-fluid">
							<h2>My Account</h2>
						</div>
						<div class="row-fluid">
							<a>Rescue Name</a>
						</div>	
						<br />
						<div class="row-fluid">
					
						<?php if( isset( $left) ) $this->load->view($left) ?>
						<?php $this->load->view($right); ?>
					
						</div> <!-- End Row -->
					</div> <!-- End Container -->			
			
			<?php }elseif ( $body == 'login'){ ?>
				
					<?php $this->load->view($right); ?>
				
			<?php } ?>
			
			
		</div>
	</div>
<?php
	if( isset($hidden) ){
		$this->load->view($hidden); 
	};
?>	
<?php $this->load->view($company);?>
</body>
<?php $this->load->view($footer); ?>

