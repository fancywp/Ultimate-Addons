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
class ulad_addon_interactive_banner extends Widget_Base {

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
		return 'interactive-banner';
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
		return esc_html__( 'Interactive Banner', 'ultimate-addons' );
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
		return 'eicon-banner';
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
		return [ 'venus-carosle' ];
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

		  $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'ultimate-addons' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Provide all kind of seo services and help to improve seo ranking.', 'ultimate-addons' ),
			]
		);

		$this->add_control( 'button_title', [
			'label'   => esc_html__( 'Button Title', 'ultimate-addons' ),
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Learn More', 'ultimate-addons' )
		] );

		$this->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'ultimate-addons' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'background_style',
			[
				'label' => esc_html__( 'Background', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'plugin-domain' ),
				'types' => [ 'gradient','video','classic'],
				'default'=>'#4054B2',
				'selector' => '{{WRAPPER}} .fwp-hero-slide.fwp-style1',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'alignment_style',
			[
				'label' => esc_html__( 'Text Alignment', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'display_alignment', [
			'label'   => esc_html__( 'Text Alignment ', 'ultimate-addons' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'text-center'    => esc_html__( 'Center', 'ultimate-addons' ),
				'text-left'   => esc_html__( 'Left', 'ultimate-addons' ),
				'text-right'   => esc_html__( 'Right', 'ultimate-addons' ),

			],
			'default' => 'text-center'
		] );

		$this->end_controls_section();

		$this->start_controls_section(
			'text_bg_style',
			[
				'label' => esc_html__( 'Text Background Color', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => 'style3'
				]
			]
		);

		$this->add_control(
			'banner_text_bg',
			[
				'label' => esc_html__( 'Text Background Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bannaer-style-bg' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'height_style',
			[
				'label' => esc_html__( 'Height', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sec_height',
			[
				'label' => esc_html__( 'Height', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '700', 'ultimate-addons' ),
				'selectors' => [
					'{{WRAPPER}} .fwp-hero-slide.fwp-style1' => 'height: {{VALUE}}px',
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
					'{{WRAPPER}} .fwp-hero-text.fwp-style1 .fwp-hero-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-hero-text.fwp-style1 .fwp-hero-title'
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-hero-text.fwp-style1 .fwp-hero-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'dcontent_style',
			[
				'label' => esc_html__( 'Content', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Content Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-hero-text.fwp-style1 .fwp-hero-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-hero-text.fwp-style1 .fwp-hero-subtitle'
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-hero-text.fwp-style1 .fwp-hero-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-btn.fwp-style1' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-btn.fwp-style1' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_border_color',
			[
				'label' => esc_html__( 'Border Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-btn.fwp-style1' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => esc_html__( 'Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-btn.fwp-style1'
			]
		);

		$this->add_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-btn.fwp-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
		$img = $settings['image'];
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
		<div class="fwp-hero fwp-style1">
			<div class="fwp-hero-slide fwp-style1 fwp-flex">
				<div class="container">
				<div class="fwp-hero-text fwp-style1">
					<h1 class="fwp-hero-title"><?php echo wp_kses_post($settings['title']); ?></h1>
					<div class="fwp-hero-subtitle"><?php echo wp_kses_post($settings['description']); ?></div>
					<div class="fwp-btn-group">
					<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="fwp-btn fwp-style1 fwp-size-large fwp-color1"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a>
					</div>
				</div>
				<div class="fwp-hero-img"> <img src="<?php echo esc_url($img['url']); ?>" alt=""></div>
				</div>
			</div>
		</div>
	<?php
        # code...
        break;
      case 'style2': ?>
		<div class="fwp-hero fwp-style1">
			<div class="fwp-hero-slide fwp-style1 fwp-flex">
				<div class="container">

				<div class="fwp-hero-text fwp-style1 <?php echo esc_attr($settings['display_alignment']); ?>">
					<h1 class="fwp-hero-title"><?php echo wp_kses_post($settings['title']); ?></h1>
					<div class="fwp-hero-subtitle"><?php echo wp_kses_post($settings['description']); ?></div>
					<div class="fwp-btn-group">
					<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="fwp-btn fwp-style1 fwp-size-large fwp-color1"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a>
					</div>
				</div>

				</div>
			</div>
		</div>
		<?php
        # code...
        break;
      case 'style3': ?>
		<div class="fwp-hero fwp-style1">
			<div class="fwp-hero-slide fwp-style1 fwp-flex">
				<div class="container">
				<div class="fwp-hero-text fwp-style1 bannaer-style-bg <?php echo esc_attr($settings['display_alignment']); ?>">
					<h1 class="fwp-hero-title"><?php echo wp_kses_post($settings['title']); ?></h1>
					<div class="fwp-hero-subtitle"><?php echo wp_kses_post($settings['description']); ?></div>
					<div class="fwp-btn-group">
					<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="fwp-btn fwp-style1 fwp-size-large fwp-color1"><?php echo esc_html( $settings['button_title'] ) ?><i class="fas fa-angle-right"></i></a>
					</div>
				</div>

				</div>
			</div>
		</div>
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
