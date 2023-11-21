<?php
/**
* *Template Name: Front Page
*
*
* @package dm-psol
*/
BsWp::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php get_template_part('parts/home/banners-topo'); ?>

<?php get_template_part('parts/home/noticias'); ?>
		
<?php // get_template_part('parts/home/notas'); ?>

<?php get_template_part('parts/home/newsletter'); ?>

<?php get_template_part('parts/home/banner'); ?>

<?php get_template_part('parts/home/vereadores'); ?>
	

<?php BsWp::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
