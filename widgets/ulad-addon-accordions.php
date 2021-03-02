<?php
namespace UltimateAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ulad_addon_accordions extends Widget_Base {

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
		return 'accordions';
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
		return esc_html__( 'Advanced Accordion', 'ultimate-addons' );
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
		return 'fa fa-bars';
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
		return [ 'ultimate-addons' ];
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
			'tabs_general_settings',
			array(
			  'label' => esc_html__('General Settings' , 'unlimited-addonr')
			)
		  );

		  $this->add_control(
			'style',
			array(
			  'label'       => esc_html__('Style', 'unlimited-addonr'),
			  'type'        => Controls_Manager::SELECT,
			  'default'     => 'style1',
			  'label_block' => true,
			  'options' => array(
				'style1' => esc_html__('Style 1', 'unlimited-addonr'),
				'style2' => esc_html__('Style 2', 'unlimited-addonr'),
			  )
			)
		  );

		  $this->add_control(
			'active',
			array(
			  'label'       => esc_html__('Active Tab', 'unlimited-addonr'),
			  'label_block' => true,
			  'default'     => esc_html__('1', 'unlimited-addonr'),
			  'type'        => Controls_Manager::TEXT,
			)
		  );

		$this->end_controls_section();

		$this->start_controls_section(
		  'accordions_content_settings',
		  array(
			'label' => esc_html__('Content Settings' , 'unlimited-addonr')
		  )
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
		  'title',
		  array(
			'label'       => esc_html__('Title', 'unlimited-addonr'),
			'label_block' => true,
			'type'        => Controls_Manager::TEXT,
		  )
		);

		$repeater->add_control(
		  'content',
		  array(
			'label'       => esc_html__('Content', 'unlimited-addonr'),
			'label_block' => true,
			'type'        => Controls_Manager::WYSIWYG,
		  )
		);

		$this->add_control(
		  'accordions',
		  array(
			'label'     => esc_html__('Items', 'unlimited-addonr'),
			'type'      => Controls_Manager::REPEATER,
			'fields'    => $repeater->get_controls(),
			'default'   => array(
			  array(
				'title'   => esc_html__('first', 'unlimited-addonr'),
				'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'unlimited-addonr'),
			  ),
			  array(
				'title'   => esc_html__('second', 'unlimited-addonr'),
				'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'unlimited-addonr'),
			  ),
			),
			'title_field' => '<span>{{ title }}</span>',
		  )
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Tab Title', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'active_bg',
			[
				'label' => esc_html__( 'Active Background', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-accordian-wrap.fwp-style1 .fwp-accordian.active .fwp-accordian-title' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'active_border_color',
			[
				'label' => esc_html__( 'Sctive Border Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-accordian-wrap.fwp-style1 .fwp-accordian.active .fwp-accordian-title' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'active_color',
			[
				'label' => esc_html__( 'Active Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-accordian-wrap.fwp-style1 .fwp-accordian.active .fwp-accordian-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-accordian-wrap.fwp-style1 .fwp-accordian-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-accordian-wrap.fwp-style1 .fwp-accordian-title' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-accordian-wrap.fwp-style1 .fwp-accordian-title'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style',
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
					'{{WRAPPER}} .fwp-accordian-wrap.fwp-style1.tb-type1 .fwp-accordian-body' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-accordian-wrap.fwp-style1.tb-type1 .fwp-accordian-body'
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
		$accordions     = $settings['accordions'];
		$active_item   = $settings['active'];
	?>

		<div class="fwp-accordian-wrap fwp-style1 tb-type1">
		<?php
            foreach($accordions as $key => $item):
              $active = ( ( $key + 1 ) == $active_item ) ? ' active ' : '';
          ?>
            <div class="fwp-accordian <?php echo esc_attr($active); ?> ">

                <div class="fwp-accordian-title">
				<?php echo esc_html($item['title']); ?> <span class="fwp-accordian-toggle fas fa-angle-down"></span>
                </div>

                <div class="fwp-accordian-body"><?php echo do_shortcode($item['content']); ?></div>

              </div><!-- .fwp-accordian -->
			  <?php endforeach; ?>
        </div><!-- .fwp-accordian-wrap -->


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
