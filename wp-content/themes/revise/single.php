<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Revise
 */

get_header();
?>




<div class="buildman-breadcum-area position-relative pt-200 pb-150" style=" background: #222;"> 
	<div class="buildman-breadcum-overlay"></div> 
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				 
				<div class="breadcum-title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>		
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

 <div class="site-page-internal-area position-relative pt-150 pb-200">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-8">
 				<div class="site-inner-content">  
						<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'revise' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'revise' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
 				</div>
 			</div>
 			<div class="col-lg-4">
 				<?php get_sidebar(); ?>
 			</div>
 		</div>
 	</div>
 </div>


 

<?php
 
get_footer();
