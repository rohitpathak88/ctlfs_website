<?php
/**
 * CJL Financial Solutions Theme Functions
 *
 * @package CJL_Financial
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function cjl_financial_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cjl-financial'),
        'footer' => esc_html__('Footer Menu', 'cjl-financial'),
    ));
    
    // Set content width
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'cjl_financial_setup');

/**
 * Enqueue Styles and Scripts
 */
function cjl_financial_scripts() {
    // Get theme version for cache busting
    $theme_version = wp_get_theme()->get('Version');
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue Theme Styles
    wp_enqueue_style('cjl-main-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap-css'), $theme_version);
    wp_enqueue_style('cjl-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array('cjl-main-style'), $theme_version);
    
    // Enqueue Theme Scripts
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
    wp_enqueue_script('cjl-main-script', get_template_directory_uri() . '/assets/js/script.js', array('bootstrap-js'), $theme_version, true);
    
    // Localize script for AJAX
    wp_localize_script('cjl-main-script', 'cjlAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cjl_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'cjl_financial_scripts');

// enqueue media uploader
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_media();
});
/**
 * Enqueue Customizer Scripts
 */
function cjl_financial_customize_controls_enqueue() {
    wp_enqueue_script('cjl-customizer-script', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery', 'customize-controls'), '1.0.0', true);
    wp_enqueue_style('cjl-customizer-style', get_template_directory_uri() . '/assets/css/customizer.css', array(), '1.0.0');
}
add_action('customize_controls_enqueue_scripts', 'cjl_financial_customize_controls_enqueue');

/**
 * Register Widget Areas
 */
function cjl_financial_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 1', 'cjl-financial'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'cjl-financial'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 2', 'cjl-financial'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'cjl-financial'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 3', 'cjl-financial'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'cjl-financial'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));
    
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 4', 'cjl-financial'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'cjl-financial'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));
}
add_action('widgets_init', 'cjl_financial_widgets_init');

/**
 * Custom Post Types
 */
function cjl_financial_register_post_types() {
    // Services Post Type
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
            'add_new' => 'Add New Service',
            'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service',
            'new_item' => 'New Service',
            'view_item' => 'View Service',
            'search_items' => 'Search Services',
            'not_found' => 'No services found',
            'not_found_in_trash' => 'No services found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'),
        'menu_icon' => 'dashicons-businessman',
        'rewrite' => array('slug' => 'services'),
    ));
    
    // Alliances Post Type
    register_post_type('alliances', array(
        'labels' => array(
            'name' => 'Alliances',
            'singular_name' => 'Alliance',
            'add_new' => 'Add New Alliance',
            'add_new_item' => 'Add New Alliance',
            'edit_item' => 'Edit Alliance',
            'new_item' => 'New Alliance',
            'view_item' => 'View Alliance',
            'search_items' => 'Search Alliances',
            'not_found' => 'No alliances found',
            'not_found_in_trash' => 'No alliances found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'alliances'),
    ));
    
    // FAQ Post Type
    register_post_type('faq', array(
        'labels' => array(
            'name' => 'FAQs',
            'singular_name' => 'FAQ',
            'add_new' => 'Add New FAQ',
            'add_new_item' => 'Add New FAQ',
            'edit_item' => 'Edit FAQ',
            'new_item' => 'New FAQ',
            'view_item' => 'View FAQ',
            'search_items' => 'Search FAQs',
            'not_found' => 'No FAQs found',
            'not_found_in_trash' => 'No FAQs found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-editor-help',
        'rewrite' => array('slug' => 'faq'),
    ));

    // Marquee
    register_post_type('marquee', array(
        'labels' => array(
            'name' => 'Marquee Item',
            'singular_name' => 'Marquee',
            'add_new' => 'Add New Marquee',
            'add_new_item' => 'Add New Marquee',
            'edit_item' => 'Edit Marquee',
            'new_item' => 'New Marquee',
            'view_item' => 'View Marquee',
            'search_items' => 'Search Marquee Item',
            'not_found' => 'No marquee Item found',
            'not_found_in_trash' => 'No marquee item found in Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-businessman',
        'rewrite' => array('slug' => 'marquee'),
    ));

    
}
add_action('init', 'cjl_financial_register_post_types');

// Add Meta Box with Services Post Type
function service_meta_box($post) {
    $icon  = get_post_meta($post->ID, '_service_icon', true);
    $order = get_post_meta($post->ID, '_service_order', true);
    $button_url = get_post_meta($post->ID, '_service_button_url', true);
    ?>
    <div style="display:flex; gap:15px; align-items:flex-end;">
        <p style="margin:0;">
            <label>Service Icon</label><br>
            <input type="text" id="service_icon" name="_service_icon"
                value="<?php echo esc_attr($icon); ?>" style="width:800px;">
            <button type="button" class="button upload-icon">Upload</button>
        </p>

        <p style="margin:0;">
            <label>Service Order</label><br>
            <input type="number" name="_service_order"
                value="<?php echo esc_attr($order); ?>" style="width:100px;">
        </p>

        <p style="margin:0;">
            <label>Service Button URL</label><br>
            <input type="text" name="_service_button_url"
                value="<?php echo esc_attr($button_url); ?>" style="width:200px;"  placeholder="https://example.com">
        </p>

    </div>


    <script>
        jQuery(function($){
            $('.upload-icon').on('click', function(e){
                e.preventDefault();
                var media = wp.media({ multiple:false }).open()
                .on('select', function(){
                    var file = media.state().get('selection').first().toJSON();
                    $('#service_icon').val(file.url);
                });
            });
        });
    </script>
    <?php
}
add_action('add_meta_boxes', 'add_service_meta_box');
function add_service_meta_box() {
    add_meta_box(
        'service_extra',
        'Service Details',
        'service_meta_box',
        'services'
    );
}

add_action('save_post', 'save_service_meta');
function save_service_meta($post_id) {
    if (isset($_POST['_service_icon'])) {
        update_post_meta($post_id, '_service_icon', esc_url_raw($_POST['_service_icon']));
    }
    if (isset($_POST['_service_order'])) {
        update_post_meta($post_id, '_service_order', intval($_POST['_service_order']));
    }
    if (isset($_POST['_service_button_url'])) {
        update_post_meta($post_id, '_service_button_url', esc_url_raw($_POST['_service_button_url']));
    }
}


// Add Meta Box for alliance logo Post type
function alliance_logos_box($post) {
    $logos = get_post_meta($post->ID, '_alliance_logos', true);
    if (!is_array($logos)) $logos = [];
    ?>
    <div id="logos-wrap">

        <?php foreach ($logos as $i => $logo): ?>
        <div class="logo-row" data-index="<?php echo $i; ?>" style="display:flex; gap:10px; margin-bottom:10px;">
            <input type="text" name="logos[image][]" value="<?php echo esc_attr($logo['image']); ?>" placeholder="Image URL" style="width:200px;">
            <input type="text" name="logos[alt][]" value="<?php echo esc_attr($logo['alt']); ?>" placeholder="Alt text">
            <input type="number" name="logos[order][]" value="<?php echo esc_attr($logo['order']); ?>" placeholder="Order" style="width:70px;">
            <input type="text" name="logos[position][]" value="<?php echo esc_attr($logo['position']); ?>" placeholder="Position">
            <button class="button upload-logo">Upload</button>
            <button class="button remove-logo">X</button>
        </div>
        <?php endforeach; ?>

    </div>

    <button class="button" id="add-logo">Add Logo</button>

    <script>
    jQuery(function($){
        function bindUpload(btn){
            btn.on('click', function(e){
                e.preventDefault();
                let input = $(this).siblings('input').first();
                let media = wp.media({multiple:false}).open()
                .on('select', function(){
                    let file = media.state().get('selection').first().toJSON();
                    input.val(file.url);
                });
            });
        }

        bindUpload($('.upload-logo'));

        $('#add-logo').on('click', function(e){
            e.preventDefault();
            let row = $('<div class="logo-row" style="display:flex; gap:10px; margin-bottom:10px;">\
                <input type="text" name="logos[image][]" placeholder="Image URL" style="width:200px;">\
                <input type="text" name="logos[alt][]" placeholder="Alt text">\
                <input type="number" name="logos[order][]" placeholder="Order" style="width:70px;">\
                <input type="text" name="logos[position][]" placeholder="Position">\
                <button class="button upload-logo">Upload</button>\
                <button class="button remove-logo">X</button>\
            </div>');
            $('#logos-wrap').append(row);
            bindUpload(row.find('.upload-logo'));
        });

        $(document).on('click','.remove-logo',function(e){
            e.preventDefault();
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}

add_action('add_meta_boxes', function () {
    add_meta_box(
        'alliance_logos',
        'Alliance Logos',
        'alliance_logos_box',
        'alliances'
    );
});


add_action('save_post', function ($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['logos']) || !isset($_POST['logos']['image'])) {
        delete_post_meta($post_id, '_alliance_logos'); // ✅ important
        return;
    }

    $data = [];

    foreach ($_POST['logos']['image'] as $i => $img) {

        if (trim($img) === '') continue;

        $data[] = [
            'image'    => esc_url_raw($img),
            'alt'      => sanitize_text_field($_POST['logos']['alt'][$i] ?? ''),
            'order'    => intval($_POST['logos']['order'][$i] ?? 0),
            'position' => sanitize_text_field($_POST['logos']['position'][$i] ?? ''),
        ];
    }

    // ✅ if no logos left, delete meta completely
    if (empty($data)) {
        delete_post_meta($post_id, '_alliance_logos');
    } else {
        update_post_meta($post_id, '_alliance_logos', $data);
    }
});


add_action('wp_ajax_delete_alliance_logo', function () {

    $post_id = intval($_POST['post_id']);
    $index   = intval($_POST['index']);

    $logos = get_post_meta($post_id, '_alliance_logos', true);
    if (!is_array($logos)) wp_die();

    unset($logos[$index]);

    update_post_meta($post_id, '_alliance_logos', array_values($logos));
    wp_die();
    
    ?>

    <script>
        $(document).on('click', '.remove-logo', function(e){
            e.preventDefault();

            let row   = $(this).closest('.logo-row');
            let index = row.data('index');

            $.post(ajaxurl, {
                action: 'delete_alliance_logo',
                post_id: <?php echo $post_id; ?>,
                index: index
            }, function(){
                location.reload(); // ✅ important
            });
        });

    </script>

<?php });



/**
 * Handle Contact Form Submission
 */
function cjl_financial_handle_contact_form() {
    check_ajax_referer('cjl_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Get admin email
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission from ' . get_bloginfo('name');
    
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Company: $company\n";
    $body .= "Message:\n$message\n";
    
    $headers = array('Content-Type: text/html; charset=UTF-8', "From: $name <$email>");
    
    $sent = wp_mail($to, $subject, nl2br($body), $headers);
    
    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you for your message! We will get back to you soon.'));
    } else {
        wp_send_json_error(array('message' => 'Sorry, there was an error sending your message. Please try again.'));
    }
}
add_action('wp_ajax_cjl_contact_form', 'cjl_financial_handle_contact_form');
add_action('wp_ajax_nopriv_cjl_contact_form', 'cjl_financial_handle_contact_form');

/**
 * Handle Newsletter Subscription
 */
function cjl_financial_handle_newsletter() {
    check_ajax_referer('cjl_nonce', 'nonce');
    
    $email = sanitize_email($_POST['email']);
    
    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }
    
    // Here you can integrate with your email marketing service
    // For now, we'll just send an email notification
    $to = get_option('admin_email');
    $subject = 'New Newsletter Subscription';
    $body = "A new user subscribed to the newsletter:\n\nEmail: $email";
    
    wp_mail($to, $subject, $body);
    
    wp_send_json_success(array('message' => 'Thank you for subscribing!'));
}
add_action('wp_ajax_cjl_newsletter', 'cjl_financial_handle_newsletter');
add_action('wp_ajax_nopriv_cjl_newsletter', 'cjl_financial_handle_newsletter');

/**
 * Register Custom Collapsible Section Control when the Customizer is available.
 * Defining the class only during `customize_register` ensures the theme won't
 * trigger a fatal error on WP installs where the customizer classes aren't loaded.
 */
function cjl_register_customizer_controls() {
    if ( ! class_exists( 'WP_Customize_Control' ) ) {
        return;
    }

    class CJL_Collapsible_Section_Control extends WP_Customize_Control {
        public $type = 'collapsible_section';
        public $collapsible = true;

        public function render_content() {
            ?>
            <div class="cjl-collapsible-section">
                <button type="button" class="cjl-collapsible-toggle" aria-expanded="true">
                    <span class="dashicons dashicons-arrow-down-alt2"></span>
                    <strong><?php echo esc_html( $this->label ); ?></strong>
                </button>
                <!-- <div class="cjl-collapsible-content" style="display: block;">
                    <?php if ( ! empty( $this->description ) ): ?>
                        <span class="description customize-control-description"><?php echo $this->description; ?></span>
                    <?php endif; ?>
                </div> -->
            </div>
            <?php
        }

        public function enqueue() {
            wp_enqueue_script( 'jquery' );
        }
    }
}
add_action( 'customize_register', 'cjl_register_customizer_controls', 5 );

/**
 * Customizer Settings
 */
function cjl_financial_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('cjl_contact_info', array(
        'title' => __('Contact Information', 'cjl-financial'),
        'priority' => 30,
    ));
    
    // Phone
    $wp_customize->add_setting('cjl_phone', array(
        'default' => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_phone', array(
        'label' => __('Phone Number', 'cjl-financial'),
        'section' => 'cjl_contact_info',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('cjl_email', array(
        'default' => 'contactinformation@ctls.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('cjl_email', array(
        'label' => __('Email Address', 'cjl-financial'),
        'section' => 'cjl_contact_info',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('cjl_address', array(
        'default' => '7421, First Floor, Third Lane, East, India- 234532',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cjl_address', array(
        'label' => __('Service Area/Address', 'cjl-financial'),
        'section' => 'cjl_contact_info',
        'type' => 'textarea',
    ));
    
    // Contact Section Big Heading
    $wp_customize->add_setting('cjl_contact_big_heading', array(
        'default' => 'Let\'s connect',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_contact_big_heading', array(
        'label' => __('Big Heading Text', 'cjl-financial'),
        'section' => 'cjl_contact_info',
        'type' => 'text',
        'description' => __('The large background heading text (e.g., "Let\'s connect")', 'cjl-financial'),
    ));
    
    // Contact Section Title
    $wp_customize->add_setting('cjl_contact_title', array(
        'default' => 'Let\'s Chat. Reach Out To Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_contact_title', array(
        'label' => __('Contact Section Title', 'cjl-financial'),
        'section' => 'cjl_contact_info',
        'type' => 'text',
        'description' => __('The main heading text (e.g., "Let\'s Chat. Reach Out To Us")', 'cjl-financial'),
    ));
    
    // Contact Section Description
    $wp_customize->add_setting('cjl_contact_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cjl_contact_description', array(
        'label' => __('Contact Section Description', 'cjl-financial'),
        'section' => 'cjl_contact_info',
        'type' => 'textarea',
        'description' => __('The description text below the title', 'cjl-financial'),
    ));
    
    // Social Media Section
    $wp_customize->add_section('cjl_social_media', array(
        'title' => __('Social Media Links', 'cjl-financial'),
        'priority' => 35,
    ));
    
    // Facebook
    $wp_customize->add_setting('cjl_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_facebook', array(
        'label' => __('Facebook URL', 'cjl-financial'),
        'section' => 'cjl_social_media',
        'type' => 'url',
    ));
    
    // LinkedIn
    $wp_customize->add_setting('cjl_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_linkedin', array(
        'label' => __('LinkedIn URL', 'cjl-financial'),
        'section' => 'cjl_social_media',
        'type' => 'url',
    ));
    
    // Twitter/X
    $wp_customize->add_setting('cjl_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_twitter', array(
        'label' => __('Twitter/X URL', 'cjl-financial'),
        'section' => 'cjl_social_media',
        'type' => 'url',
    ));
    
    // Hero Section
    $wp_customize->add_section('cjl_hero_section', array(
        'title' => __('Hero Section', 'cjl-financial'),
        'priority' => 25,
    ));
    
    // Hero Title
    $wp_customize->add_setting('cjl_hero_title', array(
        'default' => 'Innovative & Intelligent <br> Financial Solutions',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('cjl_hero_title', array(
        'label' => __('Hero Title', 'cjl-financial'),
        'section' => 'cjl_hero_section',
        'type' => 'textarea',
        'description' => __('You can use HTML tags like &lt;br&gt; for line breaks.', 'cjl-financial'),
    ));
    
    // Hero Description
    $wp_customize->add_setting('cjl_hero_description', array(
        'default' => 'At CJL Client Success, Asset And Capital Focused Precision Delivering Superior Client Experiences In Accelerating Business Growth Through Research-Led Holistic Financial Capabilities.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cjl_hero_description', array(
        'label' => __('Hero Description', 'cjl-financial'),
        'section' => 'cjl_hero_section',
        'type' => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('cjl_hero_button_text', array(
        'default' => 'EXPLORE MORE',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_hero_button_text', array(
        'label' => __('Hero Button Text', 'cjl-financial'),
        'section' => 'cjl_hero_section',
        'type' => 'text',
    ));
    
    // Hero Button Link
    $wp_customize->add_setting('cjl_hero_button_link', array(
        'default' => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_hero_button_link', array(
        'label' => __('Hero Button Link', 'cjl-financial'),
        'section' => 'cjl_hero_section',
        'type' => 'url',
        'description' => __('Use #services, #about, #contact, etc. for anchor links or full URLs.', 'cjl-financial'),
    ));
    
    // Hero Image
    $wp_customize->add_setting('cjl_hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cjl_hero_image', array(
        'label' => __('Hero Image', 'cjl-financial'),
        'section' => 'cjl_hero_section',
        'description' => __('Upload a custom hero image. If not set, default image will be used.', 'cjl-financial'),
    )));
    
    // Our Fresh News Section
    $wp_customize->add_section('cjl_news_section', array(
        'title' => __('Our Fresh News', 'cjl-financial'),
        'priority' => 33,
    ));
    
    // News Section Title
    $wp_customize->add_setting('cjl_news_title', array(
        'default' => 'Our Fresh News',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_title', array(
        'label' => __('Section Title', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 1,
    ));
    
    // News Item 1 - Collapsible Header
    $wp_customize->add_setting('cjl_news_1_header', array(
        'default' => '',
        'sanitize_callback' => '__return_empty_string',
    ));
    $wp_customize->add_control(new CJL_Collapsible_Section_Control($wp_customize, 'cjl_news_1_header', array(
        'label' => __('News Item 1', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'priority' => 10,
    )));
    
    // News Item 1
    $wp_customize->add_setting('cjl_news_1_title', array(
        'default' => 'The Ultimate Guide To Staging Your Home For A Quick Sale',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_1_title', array(
        'label' => __('Title', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 11,
    ));
    
    $wp_customize->add_setting('cjl_news_1_date', array(
        'default' => 'Oct 23 2025',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_1_date', array(
        'label' => __('Published Date', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 12,
    ));
    
    $wp_customize->add_setting('cjl_news_1_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cjl_news_1_description', array(
        'label' => __('Description', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'textarea',
        'priority' => 13,
    ));
    
    $wp_customize->add_setting('cjl_news_1_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cjl_news_1_image', array(
        'label' => __('Image', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'priority' => 14,
    )));
    
    $wp_customize->add_setting('cjl_news_1_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_news_1_link', array(
        'label' => __('Link URL', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'url',
        'priority' => 15,
    ));
    
    // News Item 2 - Collapsible Header
    $wp_customize->add_setting('cjl_news_2_header', array(
        'default' => '',
        'sanitize_callback' => '__return_empty_string',
    ));
    $wp_customize->add_control(new CJL_Collapsible_Section_Control($wp_customize, 'cjl_news_2_header', array(
        'label' => __('News Item 2', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'priority' => 20,
    )));
    
    // News Item 2
    $wp_customize->add_setting('cjl_news_2_title', array(
        'default' => 'The Ultimate Guide To Staging Your Home For A Quick Sale',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_2_title', array(
        'label' => __('Title', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 21,
    ));
    
    $wp_customize->add_setting('cjl_news_2_date', array(
        'default' => 'Oct 23 2025',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_2_date', array(
        'label' => __('Published Date', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 22,
    ));
    
    $wp_customize->add_setting('cjl_news_2_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cjl_news_2_description', array(
        'label' => __('Description', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'textarea',
        'priority' => 23,
    ));
    
    $wp_customize->add_setting('cjl_news_2_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cjl_news_2_image', array(
        'label' => __('Image', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'priority' => 24,
    )));
    
    $wp_customize->add_setting('cjl_news_2_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_news_2_link', array(
        'label' => __('Link URL', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'url',
        'priority' => 25,
    ));
    
    // News Item 3 - Collapsible Header
    $wp_customize->add_setting('cjl_news_3_header', array(
        'default' => '',
        'sanitize_callback' => '__return_empty_string',
    ));
    $wp_customize->add_control(new CJL_Collapsible_Section_Control($wp_customize, 'cjl_news_3_header', array(
        'label' => __('News Item 3', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'priority' => 30,
    )));
    
    // News Item 3
    $wp_customize->add_setting('cjl_news_3_title', array(
        'default' => 'The ultimate guide to staging your home for a quick sale',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_3_title', array(
        'label' => __('Title', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 31,
    ));
    
    $wp_customize->add_setting('cjl_news_3_date', array(
        'default' => 'Oct 23 2025',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cjl_news_3_date', array(
        'label' => __('Published Date', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'text',
        'priority' => 32,
    ));
    
    $wp_customize->add_setting('cjl_news_3_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cjl_news_3_description', array(
        'label' => __('Description', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'textarea',
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('cjl_news_3_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cjl_news_3_image', array(
        'label' => __('Image', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'priority' => 34,
    )));
    
    $wp_customize->add_setting('cjl_news_3_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('cjl_news_3_link', array(
        'label' => __('Link URL', 'cjl-financial'),
        'section' => 'cjl_news_section',
        'type' => 'url',
        'priority' => 35,
    ));
    
}
add_action('customize_register', 'cjl_financial_customize_register');

/**
 * Helper function to get theme image URL
 */
function cjl_get_image_url($filename) {
    return get_template_directory_uri() . '/assets/img/' . $filename;
}


function custom_about_us_customize_register($wp_customize) {

    // Section
    $wp_customize->add_section('about_us_section', array(
        'title' => __('About Us Section', 'your-textdomain'),
        'priority' => 30,
    ));

    // Image
    $wp_customize->add_setting('about_us_image', array(
        'default' => get_template_directory_uri() . '/assets/images/about_us_img.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_us_image_control', array(
        'label' => __('About Us Image', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_image',
    )));

    // About Us Heading
    $wp_customize->add_setting('about_us_heading', array(
        'default' => 'About Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_us_heading_control', array(
        'label' => __('About Us Heading', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_heading',
        'type' => 'text',
    ));

    // About Us Content
    $wp_customize->add_setting('about_us_content', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur... Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('about_us_content_control', array(
        'label' => __('About Us Content', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_content',
        'type' => 'textarea',
    ));

    // Vision Heading & Content
    $wp_customize->add_setting('about_us_vision_heading', array(
        'default' => 'Our Vision',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_us_vision_heading_control', array(
        'label' => __('Vision Heading', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_vision_heading',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_us_vision_content', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur... Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_us_vision_content_control', array(
        'label' => __('Vision Content', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_vision_content',
        'type' => 'textarea',
    ));

    // Mission Heading & Content
    $wp_customize->add_setting('about_us_mission_heading', array(
        'default' => 'Our Mission',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_us_mission_heading_control', array(
        'label' => __('Mission Heading', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_mission_heading',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_us_mission_content', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur... Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_us_mission_content_control', array(
        'label' => __('Mission Content', 'your-textdomain'),
        'section' => 'about_us_section',
        'settings' => 'about_us_mission_content',
        'type' => 'textarea',
    ));

}
add_action('customize_register', 'custom_about_us_customize_register');



function cjl_customize_why_choose_section($wp_customize) {

    // Section
    $wp_customize->add_section('why_choose_section', array(
        'title'       => __('Why Choose Us Section', 'cjl'),
        'priority'    => 30,
        'description' => __('Customize the Why Choose Us section content.', 'cjl'),
    ));

    // Section Title
    $wp_customize->add_setting('why_choose_title', array(
        'default'           => 'Why Choose Us?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_title', array(
        'label'    => __('Section Title', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    // Section Description
    $wp_customize->add_setting('why_choose_desc', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('why_choose_desc', array(
        'label'    => __('Section Description', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'textarea',
    ));

    // Left Column Cards
    $wp_customize->add_setting('why_choose_card_1_number', array(
        'default'           => '1.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_1_number', array(
        'label'    => __('Left Card 1 Number', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('why_choose_card_1_title', array(
        'default'           => 'Scale Without Complexity',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_1_title', array(
        'label'    => __('Left Card 1 Title', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('why_choose_card_2_number', array(
        'default'           => '2.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_2_number', array(
        'label'    => __('Left Card 2 Number', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('why_choose_card_2_title', array(
        'default'           => 'Scale Without Complexity',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_2_title', array(
        'label'    => __('Left Card 2 Title', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    // Right Column Cards
    $wp_customize->add_setting('why_choose_card_3_number', array(
        'default'           => '3.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_3_number', array(
        'label'    => __('Right Card 1 Number', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('why_choose_card_3_title', array(
        'default'           => 'Scale Without Complexity',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_3_title', array(
        'label'    => __('Right Card 1 Title', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('why_choose_card_4_number', array(
        'default'           => '4.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_4_number', array(
        'label'    => __('Right Card 2 Number', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('why_choose_card_4_title', array(
        'default'           => 'Scale Without Complexity',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('why_choose_card_4_title', array(
        'label'    => __('Right Card 2 Title', 'cjl'),
        'section'  => 'why_choose_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'cjl_customize_why_choose_section');

