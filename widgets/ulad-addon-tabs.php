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
class ulad_addon_tabs extends Widget_Base {

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
		return 'advancedtabs';
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
		return esc_html__( 'Advanced Tabs', 'ultimate-addons' );
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
		return 'fa fa-id-card';
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
		  'tabs_content_settings',
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
			'image',
			[
				'label' => __( 'Choose Image', 'venus-wp' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'subtitle',
			array(
			  'label'       => esc_html__('Sub Title', 'unlimited-addonr'),
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
		  'tabs',
		  array(
			'label'     => esc_html__('Items', 'unlimited-addonr'),
			'type'      => Controls_Manager::REPEATER,
			'fields'    => $repeater->get_controls(),
			'default'   => array(
			  array(
				'title'   => esc_html__('first', 'unlimited-addonr'),
				'subtitle'   => esc_html__('subtitle', 'unlimited-addonr'),
				'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'unlimited-addonr'),
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			  ),
			  array(
				'title'   => esc_html__('second', 'unlimited-addonr'),
				'subtitle'   => esc_html__('subtitle', 'unlimited-addonr'),
				'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'unlimited-addonr'),
				'image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
			'active_color',
			[
				'label' => esc_html__( 'Active Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-tabs.fwp-style1 .fwp-tab-links li.active a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fwp-tabs.fwp-style1 .fwp-tab-links li a:before' => 'background-color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-tabs.fwp-style1 .fwp-tab-links li a'

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
			'subtitle_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-about-text.fwp-style2 h2' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Sub Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-about-text.fwp-style2 h2'
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
					'{{WRAPPER}} .fwp-about-text.fwp-style2 p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .fwp-about-text.fwp-style2 ul li' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-about-text.fwp-style2 p'
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
		$tabs     = $settings['tabs'];
		$active   = $settings['active'];
		if(is_array($tabs) && !empty($tabs)):
	?>
	<?php
    switch ($style) {
      case 'style1': default: ?>
	<div class="fwp-about fwp-style2">
        <div class="fwp-tabs fwp-fade-tabs fwp-style1">
          <div class="fwp-tab-links-wrap">
            <ul class="fwp-tab-links">
            <?php 
              foreach($tabs as $key => $tab): 
                $active_nav = (( $key + 1) == $active ) ? ' active ' : '';
                $anchor_id  = $style.'-'.$key.strtolower(str_replace(' ', '-', $tab['title']));
            ?>
              <li class="<?php echo esc_attr($active_nav); ?>"><a href="#<?php echo esc_attr($anchor_id); ?>"><?php echo esc_html($tab['title']); ?></a></li>
			  <?php endforeach; ?>
            </ul>
          </div>
          <div class="fwp-tabs-body">
		  <?php 
              foreach($tabs as $key => $tab): 
                $active_nav = (($key + 1) == $active) ? ' active ' : '';
                $anchor_id  = $style.'-'.$key.strtolower(str_replace(' ', '-', $tab['title']));
            ?>
            <div id="<?php echo esc_attr($anchor_id); ?>" class="<?php echo esc_attr($active_nav); ?> fwp-tab">
              <div class="container">
                <div class="row">

                  <div class="col-lg-6">
                    <div class="fwp-about-img fwp-style2 text-center">
                      <img src="<?php echo  esc_url($tab['image']['url']); ?>" alt="">
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="fwp-about-text fwp-style2">
                      <h2><?php echo esc_html($tab['subtitle']); ?></h2>
					  <?php echo do_shortcode($tab['content']); ?>
                    </div>
                  </div>

                </div>
              </div>
            </div>
			<?php endforeach; ?>
          </div>
        </div>
      </div>
	  <?php
        # code...
        break;

      case 'style2': ?>
	  	<div class="fwp-about fwp-style2">
        <div class="fwp-tabs fwp-fade-tabs fwp-style1">
          <div class="fwp-tab-links-wrap">
            <ul class="fwp-tab-links">
            <?php 
              foreach($tabs as $key => $tab): 
                $active_nav = (( $key + 1) == $active ) ? ' active ' : '';
                $anchor_id  = $style.'-'.$key.strtolower(str_replace(' ', '-', $tab['title']));
            ?>
              <li class="<?php echo esc_attr($active_nav); ?>"><a href="#<?php echo esc_attr($anchor_id); ?>"><?php echo esc_html($tab['title']); ?></a></li>
			  <?php endforeach; ?>
            </ul>
          </div>
          <div class="fwp-tabs-body">
		  <?php
              foreach($tabs as $key => $tab): 
                $active_nav = (($key + 1) == $active) ? ' active ' : '';
                $anchor_id  = $style.'-'.$key.strtolower(str_replace(' ', '-', $tab['title']));
            ?>
            <div id="<?php echo esc_attr($anchor_id); ?>" class="<?php echo esc_attr($active_nav); ?> fwp-tab">
              <div class="container">
                <div class="row">
				<div class="col-lg-6">
                    <div class="fwp-about-text fwp-style2">
                      <h2><?php echo esc_html($tab['subtitle']); ?></h2>
					  <?php echo do_shortcode($tab['content']); ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="fwp-about-img fwp-style2 text-center">
                      <img src="<?php echo  esc_url($tab['image']['url']); ?>" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php endforeach; ?>
          </div>
        </div>
      </div>
	<?php
	break;
    }
	 endif;
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
