<?php
	
	/*
	 *
	 * Module Name: Cycle Slideshow Modul
	 * Module Author: Adrian Lambertz
	 * Module Version: 0.1
	 * Dependencies: 
	 *		- Genesis Theme
	 *		- ACF Gallery Field (named as 'start_slideshow') 
	 *		- add_image_size('start_slide',XXX,XXX);
	 *		- Cycle2
	 * 		- jQuery
	 *		- Icon Font with 'icon-arrow-XXXX' class
	 * 
	 * Notes:
	 * This Modules creates a function that echoes the whole content. To use it, use start_slideshow().
	 * If you are using Genesis, use a Hook to integrate the slideshow in the project. 
	 * You can use the commented 'genesis_before_entry_content' add_action hook from this module.
	 */
	
	
	/* 	CONFIGURATION */
	$use_with_hook	 	=	true;
	$hook_name			=	'genesis_before_entry_content';
	$gallery_field_name	=	'start_slideshow';
	$image_size_name	=	'start_slide';
	
	
	
	
	/******************************************************************************************/
	/************************* DO NOT CHANGE ANYTHING AFTER THIS LINE *************************/
	
	if($use_with_hook ):
		add_action( $hook_name, 'start_slideshow' );
	endif;
	function start_slideshow() { ?>
		
		<?php
		
			global $use_with_hook, $hook_name, $gallery_field_name, $image_size_name;
		
		?>
		
		<?php if(get_field($gallery_field_name)): ?>
			<div class="home-slider">
			<?php $images = get_field($gallery_field_name); ?>
			<?php if(count($images) > 1): ?>
				<div 
					class="cycle-slideshow"
					data-cycle-fx=scrollHorz
					data-cycle-timeout=0
					data-cycle-prev="#prev"
					data-cycle-next="#next"
				>
			<?php endif; ?>
			
			<?php foreach($images as $image): ?>
				<img 
					src="<?php echo $image['sizes'][$image_size_name]; ?>" 
					width="<?php echo $image['sizes'][$image_size_name.'-width']; ?>" 
					height="<?php echo $image['sizes'][$image_size_name.'-height']; ?>" 
					alt="Suite 36 - Smart Lodging" 
				/>
			<?php endforeach; ?>
			
			<?php if(count($images) > 1): ?>
				</div>
				<div class="pager">
				    <a href=# id="prev"><span class="icon-arrow-left"></span></a> 
				    <a href=# id="next"><span class="icon-arrow-right"></span></a>
				</div>
			<?php endif; ?>
			</div>
		<?php endif; ?>
	
	<?php }
?>