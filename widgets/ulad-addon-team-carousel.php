<?php
namespace UltimateAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ulad_addon_team_carousel extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'team-carousel';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Team Carousel', 'ultimate-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-user-circle-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ultimate-addons' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'logo-slider-js' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ultimate-addons' ),
			]
		);

		$this->add_control(
			'style',
			array(
			  'label'       => esc_html__('Style', 'unlimited-addonr'),
			  'type'        => \Elementor\Controls_Manager::SELECT,
			  'default'     => 'style1',
			  'label_block' => true,
			  'options' => array(
				'style1' => esc_html__('Style 1', 'unlimited-addonr'),
				'style2' => esc_html__('Style 2', 'unlimited-addonr'),
				'style3' => esc_html__('Style 3', 'unlimited-addonr'),
			  )
			)
		  );

       $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Jhony Vino', 'ultimate-addons' ),
			]
		);

		$repeater->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO & Founder', 'ultimate-addons' ),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Content', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'condition' => [
					'style' => 'style2'
				]
			]
		);

		$this->add_control(
			'team_slider',
			[
				'label' => esc_html__( 'Team Slider', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					]
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Title Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-member.fwp-style1 .fwp-member-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-member.fwp-style1 .fwp-member-name'
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'designation_style',
			[
				'label' => esc_html__( 'Designation', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'designation_color',
			[
				'label' => esc_html__( 'Designation Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-member.fwp-style1 .fwp-member-designation' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-member.fwp-style1 .fwp-member-designation'
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$style    = $settings['style'];
		$img =  $settings['image'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
      	<div class="fwp-slider">
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['team_slider'] as $teams){
            			$image = $teams['image'];
            		?>
            		<div class="swiper-slide">
                		<div class="fwp-member fwp-style1">
                			<div class="fwp-member-img"><img src="<?php echo esc_url($image['url'],'thumbnail'); ?>" alt=""></div>
                			<h2 class="fwp-member-name"><?php echo esc_html($teams['title']); ?></h2>
                			<div class="fwp-member-designation"><?php echo esc_html($teams['designation']); ?></div>
                         </div>
                    </div><!-- .swiper-slide -->
                     <?php } ?>
                    </div>
                </div><!-- .swiper-container -->
            </div><!-- .fwp-slider -->
		 <?php
        # code...
        break;

      case 'style2': ?>

      	<div class="fwp-slider">
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['team_slider'] as $teams){
            			$image = $teams['image'];
            		?>
            		<div class="swiper-slide">

                		<div class="fwp-member fwp-style1">
                			<div class="fwp-member-img2"><img src="<?php echo esc_url($image['url']); ?>" alt=""></div>
                			<h2 class="fwp-member-name"><?php echo  esc_html($teams['title']); ?></h2>
                			<div class="fwp-member-designation"><?php echo  esc_html($teams['designation']); ?></div>
                			<p> <?php echo do_shortcode($teams['description']); ?></p>

                		 </div>
                     </div><!-- .swiper-slide -->
                     <?php } ?>
                    </div>
                </div><!-- .swiper-container -->
            </div><!-- .fwp-slider -->

		 <?php
        # code...
        break;

	  case 'style3': ?>
      	<div class="fwp-slider">
            <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="600" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3" data-add-slides="3"  >
                <div class="swiper-wrapper">
                   <?php
            			foreach($settings['team_slider'] as $teams){
            			$image = $teams['image'];
            		?>
            		<div class="swiper-slide">

                	  <div class="text-center">
                		<div class="team-section">
                			<div class="avatar mx-auto">
                			<img src="<?php echo esc_url($image['url']); ?>" class="rounded z-depth-1-half" alt="Sample avatar">
                			</div>
                			<h4 class="font-weight-bold dark-grey-text mb-2 mt-4"><?php echo  esc_html($teams['title']); ?></h4>
                			<h6 class="text-uppercase grey-text mb-3"><strong><?php echo  esc_html($teams['designation']); ?></strong></h6>
                		</div>
                      </div>

                     </div><!-- .swiper-slide -->
                     <?php } ?>
                    </div>
                </div><!-- .swiper-container -->
            </div><!-- .fwp-slider -->
	<?php
		break;
    }
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {}

}
