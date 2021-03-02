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
class ulad_addon_heading extends Widget_Base {

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
		return 'ulad-heading';
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
		return esc_html__( 'Heading', 'ultimate-addons' );
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
		return 'fa fa-header';
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
				'style4' => esc_html__('Style 4', 'unlimited-addonr'),
			  )
			)
		  );

		$this->add_control(
			'ulad_head_title',
			[
				'label' => esc_html__( 'Title', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'ultimate-addons' ),
			]
		);

		$this->add_control(
			'ulad_head_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => 10,
				'default' => esc_html__( 'Default Sub Title', 'ultimate-addons' ),
				'condition' => [
					'style' => 'style2'
				]
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' =>[
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'style' => ['style4']
				]
			]
		);

		$this->add_control(
			'ulad_head_description',
			[
				'label' => esc_html__( 'Sub Title', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'rows' => 10,
				'default' => esc_html__( 'Default Sub Title', 'ultimate-addons' ),
				'condition' => [
					'style' => ['style1','style4']
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'alignment_style',
			[
				'label' => esc_html__( 'Alignment', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'display_alignment', [
			'label'   => esc_html__( 'Alignment ', 'ultimate-addons' ),
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
					'{{WRAPPER}} .ulad-section-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ulad-section-title'
			]
		);

		$this->add_control('stroke_text_color',
		[
		  'label'     => esc_html__('Stroke Text Color', 'ultimate-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			'{{WRAPPER}} .ulad-section-title' => '-webkit-text-stroke-color: {{VALUE}};',
			],
		]
	  );

	  $this->add_control('stroke_fill_color',
		[
		  'label'     => esc_html__('Stroke Fill Color', 'ultimate-addons'),
		  'type'      => Controls_Manager::COLOR,
		  'selectors' => [
			'{{WRAPPER}} .ulad-section-title' => '-webkit-text-fill-color: {{VALUE}};',
			],
		]
	  );

	  $this->add_control('stroke_fill_width',
		[
		  'label'     => esc_html__('Stroke Fill Width', 'ultimate-addons'),
		  'type'      => Controls_Manager::SLIDER,
		  'selectors' => [
			'{{WRAPPER}} .ulad-section-title' => '-webkit-text-stroke-width: {{SIZE}}px;',
		  ],
		]
	  );

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ulad-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => esc_html__( 'Sub Title', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ulad-section-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Sub Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ulad-section-subtitle'
			]
		);

		$this->add_control(
			'sub_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ulad-section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'dcontent_style',
			[
				'label' => esc_html__( 'Description', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Description Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ulad-section-subtitle' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'label' => esc_html__( 'Description Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ulad-section-subtitle'
			]
		);

		$this->add_control(
			'des_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ulad-section-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' =>[
					'style' => 'style4'
				],
			]
		);

		$this->add_control(
			'iconline_color',
			[
				'label' => esc_html__( 'Icon Line Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ulad-left-line, {{WRAPPER}} .ulad-right-line' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ulad-section-divider-icon' => 'color: {{VALUE}}',
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
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
	  		<div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
			<h2 class="ulad-section-title"><?php echo esc_html($settings['ulad_head_title']); ?></h2>
			<div class="ulad-section-subtitle"><?php echo do_shortcode($settings['ulad_head_description']); ?></div>
		</div>
	<?php
        # code...
        break;
	  case 'style2': ?>
	       <div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
		   <p class="ulad-section-subtitle">
			   <?php echo esc_html($settings['ulad_head_subtitle']); ?></p>
			<h2 class="ulad-section-title"><?php echo esc_html($settings['ulad_head_title']); ?></h2>
		</div>
       <?php break;
      case 'style3': ?>
	       <div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
			<h2 class="ulad-section-title"><?php echo esc_html($settings['ulad_head_title']); ?></h2>
		</div>

			<?php break;
      case 'style4': ?>
		<div class="heading-area <?php echo esc_attr($settings['display_alignment']); ?>">
			<h2 class="ulad-section-title"><?php echo esc_html($settings['ulad_head_title']); ?></h2>
			<div class="ulad-section-divider">
              <div class="ulad-left-line"></div>
              <div class="ulad-section-divider-icon"><i class="<?php echo $settings['icon']['value'] ?>"></i></div>
              <div class="ulad-right-line"></div>
            </div>
			<div class="ulad-section-subtitle"><?php echo do_shortcode($settings['ulad_head_description']); ?></div>
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
