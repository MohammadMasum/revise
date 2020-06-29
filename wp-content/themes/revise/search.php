<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'revise' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
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
		<?php if ( have_posts() ) : ?>

			

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
