<div class="span2 left-side-containers well well-small">
	<ul  id='left-nav-menu'  >
		
		<?php foreach( $left_menu_items  as  $left_menu_item){ ?>
		
			<li id='<?php echo $left_menu_item['name'];   ?>'   
				class=' <?php if( $left_menu_item['active']== true )echo ' active ';     ?>' >
					<a href='<?php  echo base_url() ?>myaccount/main/<?php echo $left_menu_item['name']    ?>'>
						<?php  echo $left_menu_item['label']   ?>
					</a>
			</li>
		
		<?php } ?>    
	</ul>
</div>