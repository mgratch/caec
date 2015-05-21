<?php if(is_page('testimonials')){
     $page_type = ' gv-testimonials';
 }
 else {
     $page_type = '';
 }?>
<?php gravityview_before(); ?>
<div class="gv-list-container gv-container<?php echo $page_type; ?>">
	<?php gravityview_header(); ?>
