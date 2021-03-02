<?php

namespace UltimateAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ulad_addon_filterable_gallery extends Widget_Base {

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
		return 'Filterable_Gallery';
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
		return esc_html__( 'Filterable Gallery', 'venus-wp' );
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
		return 'fa fa-th';
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
			'filterable_filters_settings',
			[
			  'label' => esc_html__('Filters Settings' , 'ultimate-addons')
			]
		  );

		  $this->add_control(
			'all_label',
			[
			  'label'       => esc_html__('"All" Label', 'ultimate-addons'),
			  'type'        => Controls_Manager::TEXT,
			  'label_block' => true,
			  'default'     => esc_html__('All', 'ultimate-addons')

			]
		  );

		  $repeater = new Repeater();

		  $repeater->add_control(
			'category_name',
			[
			  'label'       => esc_html__('Name', 'ultimate-addons'),
			  'type'        => Controls_Manager::TEXT,
			  'label_block' => true,

			]
		  );

		  $this->add_control(
			'categories_items',
			[
			  'label'   => esc_html__('Items', 'ultimate-addons'),
			  'type'    => Controls_Manager::REPEATER,
			  'fields'  => $repeater->get_controls(),
			  'default' => [
					[
					'category_name' => esc_html__('Category 1', 'ultimate-addons'),
					],
					[
					'category_name' => esc_html__('Category 2', 'ultimate-addons'),
					],
				],
			  'title_field' => '<span>{{ category_name }}</span>',
			]
		  );

		  $this->end_controls_section();

		  $this->start_controls_section(
			'filterable_gallery_settings',
			[
			  'label' => esc_html__('Images Settings' , 'ultimate-addons')
			]
		  );

		  $img_repeater = new Repeater();

		  $img_repeater->add_control(
			'image',
			[
			  'label'       => esc_html__('Upload Image', 'ultimate-addons'),
			  'type'        => Controls_Manager::MEDIA,
			  'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
			]
		  );

		  $img_repeater->add_control(
			'title',
			[
			  'label'       => esc_html__('Title', 'ultimate-addons'),
			  'type'        => Controls_Manager::TEXT,
			  'label_block' => true,
			  'default'     => esc_html__('Image #1', 'ultimate-addons')

			]
		  );

		  $img_repeater->add_control(
			'assigned_category',
			[
			  'label'       => esc_html__('Category', 'ultimate-addons'),
			  'type'        => Controls_Manager::TEXT,
			  'label_block' => true,
			  'description' => esc_html__('To assign for multiple categories, separate by a comma', 'ultimate-addons')

			]
		  );

		  $img_repeater->add_control(
			'external_url',
			[
			  'label'       => esc_html__('External URL', 'ultimate-addons'),
			  'type'        => Controls_Manager::URL,
			  'label_block' => true,
			  'default'     => array('url' => '#')
			]
		  );

		  $this->add_control(
			'images_item',
			[
			  'label'   => esc_html__('Items', 'ultimate-addons'),
			  'type'    => Controls_Manager::REPEATER,
			  'fields'  => $img_repeater->get_controls(),
			  'default' =>[
				[
				  'title'             => esc_html__('Image #1', 'ultimate-addons'),
				  'assigned_category' => esc_html__('Category 1', 'ultimate-addons'),
				],
				[
				  'title'             => esc_html__('Image #2', 'ultimate-addons'),
				  'assigned_category' => esc_html__('Category 2', 'ultimate-addons'),
				],
			],
			  'title_field' => '<span>{{ title }}</span>',
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
			'active_color',
			[
				'label' => esc_html__( 'Filter Active Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-isotop-filter.fwp-style1 li.active a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Filter Active Background', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-isotop-filter.fwp-style1 li.active a' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-isotop-filter.fwp-style1 li a'
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-isotop-filter.fwp-style1 li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$settings         = $this->get_settings();
		$all_label        = $settings['all_label'];
		$categories_items = $settings['categories_items'];
		$images_item      = $settings['images_item'];
	?>
		<?php if(!empty($images_item) && is_array($images_item)): ?>
			<?php if(count($categories_items) > 0 && is_array($categories_items)): ?>
				<div class="fwp-isotop-filter fwp-style1 text-center">
				<ul class="fwp-mp0 fwp-flex fwp-f16-lg fwp-black111-c ">
					<li class="active"><a href="#" data-filter="*"><?php echo esc_html($all_label); ?></a></li>
					<?php foreach ($categories_items as $item): ?>
					<li><a href="#" data-filter=".<?php echo $this->filter_name($item['category_name']); ?>"><?php echo esc_html($item['category_name']); ?></a></li>
					<?php endforeach; ?>
				</ul>
				</div>
			<?php endif; ?>
        <div class="fwp-isotop fwp-style1 fwp-port-col-3 fwp-has-gutter fwp-lightgallery">
          <div class="fwp-grid-sizer"></div>

		  <?php
			foreach($images_item as $item):
				$url    = (!empty($item['external_url']['url']) ) ? $item['external_url']['url'] : '#';
				$target = ($item['external_url']['is_external'] == 'on') ? '_blank' : '_self';
			?>
          <div class="fwp-isotop-item <?php echo esc_attr($this->filter_class($item['assigned_category'])); ?>">
            <a href="<?php echo esc_url($url); ?>" class="fwp-case-study fwp-style1 fwp-zoom-effect">
             <img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
              <div class="fwp-study-plus">
                <span></span>
              </div>
            </a>
          </div>
		 <?php endforeach; ?>

        </div>

		<?php endif; ?>
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

	public function filter_name($category_name) {
		if(empty($category_name)) { return; }
		$category_name = strtolower(str_replace(' ', '-', $category_name));
		return $category_name;
	  }

	  public function filter_class($category_name) {
		if(empty($category_name)) { return; }
		$category_name = strtolower(str_replace(',', ' ', $category_name));
		$category_name = str_replace(' ', '-', $category_name);
		return $category_name;
	  }

}
