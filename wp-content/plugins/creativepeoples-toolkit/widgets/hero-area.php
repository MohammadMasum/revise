<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Hero_Area_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'hero-area';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Hero Area', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'creative-peoples' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'hero_area_content_section',
			[
				'label' => __( 'Hero Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'hero_title_1',
			[
				'label' => __( 'Hero Title 1', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true, 
			]
		);

		$this->add_control(
			'hero_title_2',
			[
				'label' => __( 'Hero Title 2', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true, 
			]
		);
		$this->add_control(
			'hero_title_3',
			[
				'label' => __( 'Hero Title 3', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true, 
			]
		);

		 

		$this->add_control(
			'hero_background',
			[
				'label' => __( 'Hero area background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_thumbnail',
			[
				'label' => __( 'Hero area thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_footer_thumb',
			[
				'label' => __( 'Hero area footer thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
 

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {


		$settings = $this->get_settings_for_display();

		 $hero_title_1 = $this->get_settings('hero_title_1'); 
		 $hero_title_2 = $this->get_settings('hero_title_2'); 
		 $hero_title_3 = $this->get_settings('hero_title_3'); 
		 $hero_background = $this->get_settings('hero_background'); 
		 $hero_thumbnail = $this->get_settings('hero_thumbnail'); 
		 $hero_footer_thumb = $this->get_settings('hero_footer_thumb'); 
		


?>
	
<section class="hero-area position-relative d-flex align-items-center" data-background="<?php echo $hero_background['url']; ?>">
	  <div class="container">
	  	<div class="row">
	  		<div class="col-lg-12 text-center">
	  			<div class="hero-area-inner-content">
	  				<h4 class="text-uppercase mb-30"><?php echo $hero_title_1; ?></h4>
					<h1 class="text-uppercase mb-30"><?php echo $hero_title_2; ?></h1>
					<h2 class="text-uppercase"><?php echo $hero_title_3; ?></h2>
					<div class="hero-area-thumbnail">
						<img src="<?php echo $hero_thumbnail['url']; ?>" alt="">
					</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	  <div class="hero-area-shape">
	  	<img src="<?php echo $hero_footer_thumb['url']; ?>" alt="">
	  </div>
</section>
<?php

	}

}