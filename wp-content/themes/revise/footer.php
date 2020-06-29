<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Revise
 */
$enable_logo = cs_get_option('enable_logo');
$upload_logo = cs_get_option('upload_logo');
$upload_logo_array = wp_get_attachment_image_src( $upload_logo, 'large' );
$text_logo = cs_get_option('text_logo');

$footer_copyright_text = cs_get_option('footer_copyright_text');
$social_link = cs_get_option('social_link');
$footer_contact_info = cs_get_option('footer_contact_info');

$footer_copyright_text_support = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'img' => array(
        'src' => array(),
        'class' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);

?>



<!-- footer arae start  -->
<footer class="footer-area position-relative">
	<div class="footer-vectore">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-vectore.png" alt="footer-vectore">
	</div>
	<div class="container">
		<?php if (is_active_sidebar('footer-sidebar')): ?> 
		<div class="row align-items-center">
			<div class="col-lg-4 col-md-12">
				<div class="footer-site-logo">
					
                        <?php if (!empty($upload_logo)): ?> 
                             <a class="navbar-brand logo_h" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $upload_logo_array[0]); ?>" alt="Site Logo"></a>   
                            <?php else: ?>
                                <?php if (!empty($text_logo)): ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html($text_logo);; ?></a></h1> 
                                    <?php else: ?> 
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    
                                <?php endif; ?> 
                        <?php endif; ?>

				</div>
			</div>
			<div class="col-lg-8 col-md-12">
				<div class="row">

					<?php  dynamic_sidebar('footer-sidebar'); ?>
				 
					<div class="col-lg-4 col-md-6">
						<div class="footer-widget">
							<h2 class="footer-title">Contact</h2>
							<ul class="footer-cotnact-info">

								<?php if (!empty($footer_contact_info)): ?>
									<?php foreach ($footer_contact_info as $footer_contact_info): ?>
										<li><a href="<?php echo $footer_contact_info['info_link'] ?>"><i class="<?php echo $footer_contact_info['info_icon'] ?>"></i><?php echo $footer_contact_info['link_text'] ?></a></li>
									<?php endforeach ;?>
									
								<?php endif; ?>
								  
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php endif; ?>
		<div class="footer-copyright-outer-row mt-50 pt-40 pb-80">
			<div class="row">
				<div class="col-lg-6 col-md-6">

					<?php if (!empty($footer_copyright_text)): ?>	 
					<div class="copytext">
						<p class="Raleway"><?php echo wp_kses( $footer_copyright_text, $footer_copyright_text_support ); ?></p>
					</div>


					<?php endif; ?>


					
				</div>
				<div class="col-lg-6 col-md-6 text-right">
					<?php if (!empty($social_link)): ?> 
						<div class="footer-social-lis"> 
							<?php foreach ($social_link as $social_link): ?>
	                        		<a href="<?php echo esc_url( $social_link['social_link']); ?>" target="_blank"><i class="<?php echo esc_attr( $social_link['social_link_icon']); ?>"></i></a>
	                       <?php endforeach; ?>   
							 
						</div> 
					<?php endif ;?>

					
				</div>
			</div>
		</div>

	</div>
</footer>
<!-- footer arae end -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
