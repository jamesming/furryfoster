<div class="span9">
			<div  class='clearfix subheader' >
		    	<div  class='pull-left '>
		    		<h3 >Edit Rescue Profile</h3> 
		    	</div>
		    	<div  class='pull-right'> <button class="btn btn-small btn-primary" type="button">View Profile</button>
		    	</div>    		
			</div>
			<div  class='right-side-containers clearfix well well-small ' >
				<div class='clearfix' >
					<div  class='pull-left'>
						<h5>Contact Information</h5>
					</div>
					<div  class='pull-right'>
						<a>Edit</a>
					</div>					
				</div>
				<div class='clearfix' >
					<div  class='pull-left span5' >
						<img src="js/libs/holder/holder.js/300x250" class="img-polaroid" />
					</div>
					<div  class='pull-left span7'>
						<label>Name</label>
						<input type="text" class="span4" placeholder="Your First Name" value='<?php  echo $db['rescues'][0]->name;   ?>'>
			
						<label>Email Address</label>
						<input type="text" class="span4" placeholder="Your email address">
						<label>Phone</label>
						<input type="text" class="span4" placeholder="Your phone">
						<label>Address</label>
						<input type="text" class="span4" placeholder="Your address">								
					</div>
									
				</div>
		
			</div>
			<div  class='right-side-containers clearfix well well-small ' >
				<div class='clearfix' >
					<div  class='pull-left'>
						<h5>Organization Detail</h5>
					</div>
					<div  class='pull-right'>
						<a>Edit</a>
					</div>					
				</div>
				<div class='clearfix' >

					<div  class='pull-left span8'>
						<label>EIN</label>
						<input type="text" class="span4" placeholder="Your EIN">
			
						<label>Website</label>
						<input type="text" class="span4" placeholder="Your website">
						<label>Facebook Page</label>
						<input type="text" class="span4" placeholder="Your Facebook page">
						
						
						
						<label>About Our Rescue</label>
						<textarea name="message" id="message" class="input-xlarge span8" rows="10"></textarea>
						
												
					</div>
									
				</div>
		
			</div>	
			<div  class='right-side-containers clearfix well well-small ' >
				<div class='clearfix' >
					<div  class='pull-left'>
						<h5>Your Foster Program</h5>
					</div>
					<div  class='pull-right'>
						<a>Edit</a>
					</div>					
				</div>
				<div class='clearfix' >

					<div  class='pull-left span8'>

						
						<label>Foster Requirements</label>
						<textarea name="message" id="message" class="input-xlarge span8" rows="10"></textarea>
						
												
					</div>
									
				</div>
		
			</div>				 
</div>
