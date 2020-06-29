<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Revise
 */

get_header();


if (get_post_meta( get_the_ID(), 'revise_page_option', true )) {
	$page_meta = get_post_meta( get_the_ID(), 'revise_page_option', true );
}else{
	$page_meta = array();
}

if (array_key_exists('enable_breadcum', $page_meta)) {
	$enable_breadcum = $page_meta['enable_breadcum'];
}else{
	$enable_breadcum = false; 
}

if (array_key_exists('custom_page_title', $page_meta)) {
	$custom_page_title = $page_meta['custom_page_title'];
}else{
	$custom_page_title = ''; 
}

if (array_key_exists('overlay_perchanetage', $page_meta)) {
	$overlay_perchanetage = $page_meta['overlay_perchanetage'];
}else{
	$overlay_perchanetage = '.6'; 
}
if (array_key_exists('bradcum_overlay_color', $page_meta)) {
	$bradcum_overlay_color = $page_meta['bradcum_overlay_color'];
}else{
	$bradcum_overlay_color = '#0E3E68'; 
}
 


while ( have_posts() ) :
?>
<?php if ($enable_breadcum == true): ?>
	<!-- breadcum area -->


	 
			<div class="buildman-breadcum-area pt-200 pb-150" <?php if (has_post_thumbnail(  )): ?> style="background-image: url( <?php echo the_post_thumbnail_url() ; ?> ); " <?php endif; ?> >
				<?php if (has_post_thumbnail(  )): ?>
					<div class="buildman-breadcum-overlay" style=" background: <?php echo esc_attr( $bradcum_overlay_color ); ?>; opacity: <?php echo esc_attr( $overlay_perchanetage ); ?>;"></div>
				<?php endif; ?>				
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							 
							<div class="breadcum-title">
								<?php if (!empty($custom_page_title)): ?>
									<h1><?php echo esc_attr( $custom_page_title ); ?></h1>
									<?php else: ?>
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								<?php endif ;?>					
							</div>
							<div class="breadcum-nav-xt">
								<?php if(function_exists('bcn_display'))
							    {
							        bcn_display();
							    }?>
							</div>
						</div>
					</div>
				</div>

			</div>
		 
	<!-- breadcum area end -->		
	<?php endif; ?>

 <div class="site-page-internal-area position-relative">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12">
 				<div class="site-inner-content"> 
					<?php
					
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					 
					?>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

<?php
endwhile;
get_footer();
