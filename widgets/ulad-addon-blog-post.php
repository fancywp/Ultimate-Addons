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
class ulad_addon_blog_post extends Widget_Base {

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
		return 'blog-post';
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
		return esc_html__( 'Posts', 'ultimate-addons' );
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
		return 'eicon-gallery-masonry';
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
			'section_content',
			[
				'label' => esc_html__( 'Content', 'ultimate-addons' ),
			]
		);
		$this->add_control(
			'cats',
			[
			  'label'       => esc_html__('Filter By Categories', 'ultimate-addons'),
			  'description' => esc_html__('Specifies a category that you want to show posts from it.', 'ultimate-addons' ),
			  'type'        => Controls_Manager::SELECT2,
			  'multiple'    => true,
			  'label_block' => true,
			  'options'     => array_flip($this->get_custom_term_values('category')),
			  'default'     => array(''),
			]
		  );

		  $this->add_control(
			'tags',
			[
			  'label'       => esc_html__('Filter By Tags', 'ultimate-addons'),
			  'description' => esc_html__('Specifies a tag that you want to show posts from it.', 'ultimate-addons' ),
			  'type'        => Controls_Manager::SELECT2,
			  'multiple'    => true,
			  'label_block' => true,
			  'options'     => array_flip($this->get_custom_term_values('post_tag')),
			  'default'     => array(''),
			]
		  );

		  $this->add_control(
			'limit',
			[
			  'label'       => esc_html__('Limit', 'ultimate-addons'),
			  'type'        => Controls_Manager::TEXT,
			  'label_block' => true,
			  'default'     => 8,
			]
		  );

		  $this->add_control(
			'orderby',
			[
			  'label'       => esc_html__( 'Order By', 'ultimate-addons' ),
			  'type'        => Controls_Manager::SELECT,
			  'default'     => 'ID',
			  'options'     => array_flip([
				'ID'            => 'ID',
				'Author'        => 'author',
				'Post Title'    => 'title',
				'Date'          => 'date',
				'Last Modified' => 'modified',
				'Random Order'  => 'rand',
				'Comment Count' => 'comment_count',
				'Menu Order'    => 'menu_order',
			  ]),
			  'label_block' => true,
			]
		  );

		  $this->add_control(
			'order',
			[
			  'label'       => esc_html__('Order', 'ultimate-addons' ),
			  'type'        => Controls_Manager::SELECT,
			  'options'     => [
				'DESC' => esc_html__('Descending', 'ultimate-addons'),
				'ASC'  => esc_html__('Ascending', 'ultimate-addons'),
			  ],
			  'default' => 'DESC',
			  'label_block' => true,
			]
		  );

		  $this->end_controls_section();

		  $this->start_controls_section(
			'meta_settings',
			[
			  'label' => esc_html__('Meta Options' , 'ultimate-addons')
			]
		  );

		  $this->add_control(
			'author',
			[
			  'label'     => esc_html__('Author', 'ultimate-addons'),
			  'type'      => Controls_Manager::SWITCHER,
			  'default'   => 'yes',
			]
		  );

		  $this->add_control(
			'category',
			[
			  'label'     => esc_html__('Category', 'ultimate-addons'),
			  'type'      => Controls_Manager::SWITCHER,
			  'default'   => 'yes',
			]
		  );

		  $this->add_control(
			'date',
			[
			  'label'     => esc_html__('Date', 'ultimate-addons'),
			  'type'      => Controls_Manager::SWITCHER,
			  'default'   => 'yes',
			]
		  );

		  $this->add_control(
			'excerpt_length',
			[
			  'label'     => esc_html__('Excerpt Length', 'ultimate-addons'),
			  'type'      => Controls_Manager::TEXT,
			  'default'   => 20,
			]
		  );

		  $this->add_control(
			'btn_text',
			[
			  'label'     => esc_html__('Button Text', 'ultimate-addons'),
			  'type'      => Controls_Manager::TEXT,
			  'default'   => ' Read More',
			]
		  );
		$this->end_controls_section();

		$this->start_controls_section(
			'col_style',
			[
				'label' => esc_html__( 'Style', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'post_coulmn',
			[
				'label' => esc_html__( 'Post Coulmn', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-lg-4',
				'options' => [
					'col-lg-4'  => esc_html__( 'Gird 4', 'ultimate-addons' ),
					'col-lg-6'  => esc_html__( 'Gird 6', 'ultimate-addons' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'Title_style',
			[
				'label' => esc_html__( 'Post Title', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Post Title Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-post.fwp-style1 h2.fwp-post-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-post.fwp-style1 h2.fwp-post-title a'
			]
		);

		$this->add_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-post.fwp-style1 h2.fwp-post-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'Content_style',
			[
				'label' => esc_html__( 'Post Content', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Post Content Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-post.fwp-style1 .fwp-post-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'Content_typography',
				'label' => esc_html__( 'Content Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-post.fwp-style1 .fwp-post-text'
			]
		);

		$this->add_control(
			'Content_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-post.fwp-style1 .fwp-post-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'read_more_style',
			[
				'label' => esc_html__( 'Button', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fwp-post-btn a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => esc_html__( 'Button Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fwp-post-btn a'
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .fwp-post-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'meta_style',
			[
				'label' => esc_html__( 'Meta', 'ultimate-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => esc_html__( 'Meta Color', 'ultimate-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .meta-common-area' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => esc_html__( 'Typography', 'ultimate-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .meta-common-area'
			]
		);

		$this->add_control(
			'meta_padding',
			[
				'label' => esc_html__( 'Padding', 'ultimate-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .meta-common-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$settings       = $this->get_settings();
		$style          = $settings['style'];
		$cats           = $settings['cats'];
		$tags           = $settings['tags'];
		$limit          = $settings['limit'];
		$orderby        = $settings['orderby'];
		$order          = $settings['order'];
		$category       = $settings['category'];
		$author         = $settings['author'];
		$date           = $settings['date'];
		$excerpt_length = $settings['excerpt_length'];
		$post_col = $settings['post_coulmn'];

		if (get_query_var('paged')) {
		  $paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
		  $paged = get_query_var('page');
		} else {
		  $paged = 1;
		}

		$args = array(
		  'posts_per_page' => $limit,
		  'orderby'        => $orderby,
		  'order'          => $order,
		  'paged'          => $paged,
		  'order'          => 'ID',
		);

		if(!empty($tags[0]) && is_array($tags)) {
		  $args['tag_slug__in'] = $tags;
		}

		if(!empty($cats[0])) {
		  $args['tax_query'] = array(
			array(
			  'taxonomy' => 'category',
			  'field'    => 'slug',
			  'terms'    => $cats,
			),
		  );
		}

		$the_query = new \WP_Query($args);
	?>
	<div class="row">
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
		<div class="<?php echo esc_attr($post_col); ?>">
            <div class="fwp-post fwp-style1">
              <div class="fwp-post-thumb fwp-zoom-effect">
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="fwp-post-thumb-in" >
				<img src="<?php echo esc_url($this->get_image_src(get_post_thumbnail_id())); ?>" alt="">
				</a>
              </div>
              <div class="fwp-post-info">
			  	<div class="category-area">
				  <?php if($category == 'yes'): ?>
					<span class="blog-category-name meta-common-area"><?php echo get_the_category_list(); ?></span>
					<?php endif; ?>
					<?php if($author == 'yes'): ?>
					<span class="float-right blog-author-name meta-common-area"><?php echo get_the_author(); ?></span>
					<?php endif; ?>
				  </div>
                <h2 class="fwp-post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                <div class="fwp-post-text">
				<?php echo wp_trim_words( get_the_content(), $excerpt_length, '&hellip;' ); ?>
				</div>
				<?php if($date == 'yes'): ?>
					<div class="post-date meta-common-area"><?php echo get_the_date(get_option('date_format')); ?></div>
                <?php endif; ?>
                <div class="fwp-post-btn text-right">
                  <a href="<?php echo esc_url(get_the_permalink()); ?>" class="fwp-btn fwp-style2 fwp-color2"><?php echo esc_html($settings['btn_text']); ?><i class="fas fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
		  <?php endwhile; wp_reset_postdata(); ?>
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

	public function get_custom_term_values($type) {
    $items = array();
    $terms = get_terms($type, array('orderby' => 'name'));
    if (is_array($terms) && !is_wp_error($terms)) {
      foreach ($terms as $term) {
        $items[$term ->name] = $term->slug;
      }
    }
    return $items;
  }

  public function get_image_src($id) {
    if(empty($id)) { return ; }
    $image_src = (is_numeric($id)) ? wp_get_attachment_url($id):$id;
    return $image_src;
  }

}
