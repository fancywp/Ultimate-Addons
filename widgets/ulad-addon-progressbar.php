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
class ulad_addon_progressBar extends Widget_Base {

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
		return 'uaProgressbar';
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
		return esc_html__( 'Progressbar', 'ultimate-addons' );
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
		return 'fa fa-spinner';
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
		return ['ulad-scripts'];
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
			'bar_label',
			[
				'label' => esc_html__( 'Label Text', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default'=>'Web Development'
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Fill Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'=>'#000000'
			]
		);

		$this->add_control(
			'bar_fill',
			[
				'label' => esc_html__( 'Fill Amount (0.1 To 1)', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default'=>'0.8'
			]
		);

		$this->add_control(
			'bar_height',
			[
				'label' => esc_html__( 'Bar Height', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default'=>'15px'
			]
		  );

		$this->end_controls_section();


		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Label Color', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_test_color',
			[
				'label' => esc_html__( 'Label Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'=>'#000000',
				'selectors' => [
					'{{WRAPPER}} .ulad-progress' => 'color: {{VALUE}};'
				  ],
			]
		);

	  $this->end_controls_section();

	   $this->start_controls_section(
			'counter_style',
			[
				'label' => esc_html__( 'Counter Color', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
	  );
	  $this->add_control(
		'counter_test_color',
		[
			'label' => esc_html__( 'Counter Color', 'ultimate-addons' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
			'default'=>'#000000',
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
		$bar_color = $this->get_settings('bar_color');
		$bar_fill = $this->get_settings('bar_fill');
		$bar_height = $this->get_settings('bar_height');
		$bar_top_counter = $this->get_settings('bar_top_counter');
		$bar_right_counter = $this->get_settings('bar_right_counter');
		$counter_test_color = $this->get_settings('counter_test_color');
	?>
	<div class="ulad-progress-bar">
		<div class="ulad-progress" data-counter-color="<?php echo esc_attr($counter_test_color); ?>" data-bar-height="<?php echo esc_attr($bar_height); ?>" data-bar-fill="<?php echo esc_attr($bar_fill); ?>" data-bar-color="<?php echo esc_attr($bar_color); ?>"><?php echo esc_html($settings['bar_label']); ?></div>
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
