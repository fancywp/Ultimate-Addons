<?php

namespace UltimateAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Counterdown Clock Elementor Addon
 *
 * Elementor widget for Counterdown Clock
 *
 * @since 1.0.0
 */

class ulad_counterdown_Widget extends Widget_Base {

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
		return "counterdown";
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
		return esc_html__( "Counterdown", 'ultimate-addons' );
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
		return 'fa fa-clock-o';
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
		return ['ulad-counterdown'];
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
			'counter_head_section',
			[
				'label' => esc_html__( 'Haeder', 'ultimate-addons' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'header_title',
			[
				'label' => esc_html__( 'Header Title', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'ultimate-addons' ),
				'placeholder' => esc_html__( 'Type your title here', 'ultimate-addons' ),
			]
		);

		$this->add_control(
			'head_description',
			[
				'label' => esc_html__( 'Header Description', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Default description', 'ultimate-addons' ),
				'placeholder' => esc_html__( 'Type your description here', 'ultimate-addons' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'counter_section',
			[
				'label' => esc_html__( 'CounterDown Type', 'ultimate-addons' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'target_clock_time',
			[
				'label' => esc_html__( 'Target Time', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'default'=>'2020-12-15 12:00',
				'label_block'=>false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'footer_section',
			[
				'label' => esc_html__( 'Fotter', 'ultimate-addons' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'copyright_content',
			[
				'label' => esc_html__( 'Footer Content', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Copyright © 2020. All Rights Reserved By Counterdown.
				', 'ultimate-addons' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);

		$repeater->add_control( 'button_url', [
			'label' => esc_html__( 'Button URL', 'ultimate-addons' ),
			'type'  => \Elementor\Controls_Manager::URL,
		] );

		$this->add_control(
			'social_icons',
			[
				'label' => esc_html__( 'Social Icon', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'header_style',
			[
				'label' => esc_html__( 'Header Style', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'header_alignment', [
			'label'   => esc_html__( 'Alignment ', 'ultimate-addons' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'center'    => esc_html__( 'Center', 'ultimate-addons' ),
				'left'   => esc_html__( 'Left', 'ultimate-addons' ),
				'right'   => esc_html__( 'Right', 'ultimate-addons' ),

			],
			'default' => 'left'
		] );

		$this->add_control(
			'head_title_color',
			[
				'label' => esc_html__( 'Header Title Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .header-content h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'head_title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .header-content h2'
			]
		);

		$this->add_control(
			'head_content_color',
			[
				'label' => esc_html__( 'Header description Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .header-content p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'head_con_typography',
				'label' => esc_html__( 'Description Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .header-content p'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'color_style',
			[
				'label' => esc_html__( 'Counterdown Color', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'=>'#000000',
				'selectors' => [
					'{{WRAPPER}} .flip-clock-wrapper ul li a div div.inn' => 'background: {{VALUE}}',
					'{{WRAPPER}} .flip-clock-dot' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'test_color',
			[
				'label' => esc_html__( 'Test Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'=>'#ffffff',
				'selectors' => [
					'{{WRAPPER}} .flip-clock-wrapper ul li a div div.inn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Label Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flip-clock-divider .flip-clock-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'clock_color',
			[
				'label' => esc_html__( 'Clock AM/PM Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .flip-clock-meridium a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'box_style',
			[
				'label' => esc_html__( 'Counterdown Width', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'width',
			[
				'label' => esc_html__( 'Counterdown Width', 'ultimate-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 60,
						'max' => 100,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .flip-clock-wrapper ul' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'padding_style',
			[
				'label' => esc_html__( 'Counterdown Padding', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Counterdown Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .flip-clock-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'label_padding',
			[
				'label' => esc_html__( 'Label Margin', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .flip-clock-divider .flip-clock-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'typography_style',
			[
				'label' => esc_html__( 'Counterdown Typography', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Label Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .flip-clock-divider .flip-clock-label'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .flip-clock-wrapper ul li a div div.inn'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'footer_style',
			[
				'label' => esc_html__( 'Footer Style', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'footer_alignment', [
			'label'   => esc_html__( 'Alignment ', 'ultimate-addons' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				'center'    => esc_html__( 'Center', 'ultimate-addons' ),
				'left'   => esc_html__( 'Left', 'ultimate-addons' ),
				'right'   => esc_html__( 'Right', 'ultimate-addons' ),

			],
			'default' => 'left'
		] );

		$this->add_control(
			'footer_title_color',
			[
				'label' => esc_html__( 'Footer Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .copyright-area p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'footer_title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .copyright-area p'
			]
		);

		$this->add_control(
			'footer_social_color',
			[
				'label' => esc_html__( 'Social Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default'=>'#1868dd',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ce-share-btns li a' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .ce-share-btns li a' => 'color: {{VALUE}}',				],
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

		$target_time = $this->get_settings('target_clock_time');

		$social_icons = $settings['social_icons'];
		?>
		<div style="text-align:<?php echo esc_attr($settings['header_alignment']); ?>" class="header-area">
			<div class="header-content">
				<h2><?php echo esc_html($settings['header_title']); ?></h2>
				<p><?php echo wp_kses_post($settings['head_description']); ?></p>
			</div>
		</div>
        <div class="clock"
             data-target-time="<?php echo esc_attr($target_time); ?>"
        >
		</div>
		<div style="text-align:<?php echo esc_attr($settings['footer_alignment']); ?>" class="social-area">
			<div class="copyright-area">
				<p><?php echo esc_html($settings['copyright_content']); ?></p>
			</div>
			<ul class="ce-share-btns">
				<?php foreach($social_icons as $social_icon){ ?>
				<li><a href="<?php echo esc_url( $social_icon['button_url']['url'] ); ?>"><i class="<?php echo esc_attr($social_icon['icon']['value']); ?>"></i></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php
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