<?php
namespace UltimateAddons;

use UltimateAddons\Widgets\ulad_addon_animation_box;
use UltimateAddons\Widgets\ulad_addon_info_box;
use UltimateAddons\Widgets\ulad_addon_counter;
use UltimateAddons\Widgets\ulad_addon_logo_slider;
use UltimateAddons\Widgets\ulad_addon_call_to_action;
use UltimateAddons\Widgets\ulad_addon_pricing_table;
use UltimateAddons\Widgets\ulad_addon_tabs;
use UltimateAddons\Widgets\ulad_addon_accordions;
use UltimateAddons\Widgets\ulad_addon_team_member;
use UltimateAddons\Widgets\ulad_addon_testimonial;
use UltimateAddons\Widgets\ulad_addon_business_hour;
use UltimateAddons\Widgets\ulad_addon_card;
use UltimateAddons\Widgets\ulad_addon_heading;
use UltimateAddons\Widgets\ulad_addon_progressBar;
use UltimateAddons\Widgets\ulad_addon_flipbox;
use UltimateAddons\Widgets\ulad_addon_table;
use UltimateAddons\Widgets\ulad_addon_timeline;
use UltimateAddons\Widgets\ulad_addon_image_carousel;
use UltimateAddons\Widgets\ulad_addon_testimonial_carousel;
use UltimateAddons\Widgets\ulad_addon_interactive_banner;
use UltimateAddons\Widgets\ulad_addon_blog_post;
use UltimateAddons\Widgets\ulad_addon_contact_form;
use UltimateAddons\Widgets\ulad_addon_filterable_gallery;
use UltimateAddons\Widgets\ulad_addon_ninja_form;
use UltimateAddons\Widgets\ulad_addon_duel_heading;
use UltimateAddons\Widgets\ulad_counterdown_Widget;
use UltimateAddons\Widgets\ulad_Clock_Widget;
use UltimateAddons\Widgets\ulad_addon_icon_box;
use UltimateAddons\Widgets\ulad_addon_duel_button;
use UltimateAddons\Widgets\ulad_addon_logo_gird;
use UltimateAddons\Widgets\ulad_addon_team_carousel;
use UltimateAddons\Widgets\ulad_addon_card_carousel;
use UltimateAddons\Widgets\ulad_addon_service_box;
use UltimateAddons\Widgets\ulad_addon_service_carousel;
use UltimateAddons\Widgets\ulad_addon_icon_carousel;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class ULAD_UltimateAddons {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {

		wp_enqueue_script('jquery');

        wp_register_script( 'swiper-js', plugins_url( '/assets/js/swiper.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'swiper-js' );

		 wp_register_script( 'parallax-js', plugins_url( '/assets/js/parallax.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'parallax-js' );

		 wp_register_script( 'ulad-isotope', plugins_url( '/assets/js/isotope.pkg.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'ulad-isotope' );

		 wp_register_script( 'ultimate-addons-js', plugins_url( '/assets/js/ultimate-addons.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'ultimate-addons' );

		 wp_register_script( 'logo-slider-js', plugins_url( '/assets/js/logo-slider.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'logo-slider-js' );

		 wp_register_script( 'ulad-progressbar', plugins_url( '/assets/js/progressbar.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'ulad-progressbar' );

		 wp_register_script( 'ulad-flipclock', plugins_url( '/assets/js/flipclock.min.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'ulad-flipclock' );

		 wp_register_script( 'ulad-scripts', plugins_url( '/assets/js/scripts.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'ulad-scripts' );

		 wp_register_script( 'ulad-counterdown', plugins_url( '/assets/js/ulad-counterdown-script.js', __FILE__ ), [ 'jquery' ], false, true );
		 wp_enqueue_script( 'ulad-counterdown' );

	}

	/**
	 * widget_styles
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_styles(){

		wp_register_style("ulad-fontawesome",plugins_url("/assets/css/fontawesome.min.css",__FILE__));
		wp_enqueue_style( 'ulad-fontawesome' );

		wp_register_style("ulad-swiper",plugins_url("/assets/css/swiper.min.css",__FILE__));
		wp_enqueue_style( 'ulad-swiper' );

		wp_register_style("ulad-laticon",plugins_url("/assets/css/flaticon.css",__FILE__));
		wp_enqueue_style( 'ulad-laticon' );

		wp_register_style("ulad-flipclock",plugins_url("/assets/css/flipclock.css",__FILE__));
		wp_enqueue_style( 'ulad-flipclock' );

		wp_register_style("ulad-style",plugins_url("/assets/css/style.css",__FILE__));
		wp_enqueue_style( 'ulad-style' );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/ulad-addon-animation-box.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-info-box.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-counter.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-logo-slider.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-call-to-action.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-pricing-table.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-tabs.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-accordions.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-team-member.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-testimonials.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-business-hour.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-card.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-heading.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-progressbar.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-flipbox.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-table.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-timeline.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-image-carousel.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-testimonial-carousel.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-interactive-banner.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-blog-post.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-contact-form-7.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-filterable-gallery.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-ninja-form.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-duel-heading.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-counterdown.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-clock.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-icon-box.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-duel-button.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-logo-gird.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-team-carousel.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-card-carousel.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-service-box.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-service-carousel.php' );
		require_once( __DIR__ . '/widgets/ulad-addon-icon-carousel.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		require_once plugin_dir_path( __FILE__ ) . 'inc/ulad-helper.php';

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_animation_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_info_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_logo_slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_call_to_action() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_pricing_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_accordions() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_team_member() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_business_hour() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_progressBar() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_flipbox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_timeline() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_image_carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_testimonial_carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_interactive_banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_blog_post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_contact_form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_filterable_gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_ninja_form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_duel_heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_counterdown_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_Clock_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_icon_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_duel_button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_logo_gird() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_team_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_card_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_service_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_service_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ulad_addon_icon_carousel() );
	}

	//category registered
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'ultimate-addons',
			[
				'title' => __( 'Ultimate Addons', 'ultimate-addons' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Enqueue widget styles
        add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] , 100 );
        add_action( 'admin_enqueue_scripts', [ $this, 'widget_styles' ] , 100 );

		// Enqueue widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ], 100 );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		//category registered
		add_action( 'elementor/elements/categories_registered',  [ $this,'add_elementor_widget_categories' ]);

	}
}

// Instantiate Plugin Class
ULAD_UltimateAddons::instance();
