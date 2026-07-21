<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <a class="visually-hidden-focusable skip-link" href="#site-content"><?php esc_html_e('Skip to content', 'cjl-financial'); ?></a>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container custom_container">
            <a class="navbar-brand fs-4" href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else { ?>
                        <img src="<?php echo esc_url(cjl_get_image_url('ctl_header_logo.png')); ?>" alt="<?php bloginfo('name'); ?>">
                <?php   }  ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'navbar-nav ms-auto',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul class="navbar-nav ms-auto">%3$s</ul>',
                    'walker' => new class extends Walker_Nav_Menu {
                        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                            $classes = empty($item->classes) ? array() : (array) $item->classes;
                            $classes[] = 'nav-item';
                            
                            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
                            
                            $output .= '<li' . $class_names . '>';
                            
                            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
                            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
                            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
                            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
                            
                            $item_output = isset($args->before) ? $args->before : '';
                            $item_output .= '<a class="nav-link"' . $attributes . '>';
                            $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
                            $item_output .= '</a>';
                            $item_output .= isset($args->after) ? $args->after : '';
                            
                            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
                        }
                        
                        function end_el(&$output, $item, $depth = 0, $args = null) {
                            $output .= '</li>';
                        }
                    }
                ));
                
                // Fallback menu if no menu is set
                if (!has_nav_menu('primary')) { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link<?php echo is_front_page() ? ' active' : ''; ?>" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#investors">Investors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#media">Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>

    <main id="site-content">
