<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					<h1>Blog</h1> 				
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
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
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
