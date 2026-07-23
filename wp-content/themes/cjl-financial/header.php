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
                 wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav ms-auto',
                    'fallback_cb'    => '__return_false',
                    'walker'         => new class extends Walker_Nav_Menu {

                        // Start Submenu
                        public function start_lvl(&$output, $depth = 0, $args = null) {
                            $output .= '<ul class="dropdown-menu">';
                        }

                        // End Submenu
                        public function end_lvl(&$output, $depth = 0, $args = null) {
                            $output .= '</ul>';
                        }

                        // Start Menu Item
                        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {

                            $classes = empty($item->classes) ? [] : (array) $item->classes;

                            $has_children = in_array('menu-item-has-children', $classes);

                            if ($has_children && $depth == 0) {
                                $classes[] = 'dropdown';
                            }

                            if ($depth == 0) {
                                $classes[] = 'nav-item';
                            }

                            $class_names = implode(' ', array_filter($classes));

                            $output .= '<li class="' . esc_attr($class_names) . '">';

                            $attributes  = '';
                            $attributes .= !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
                            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
                            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';

                            // Parent menu
                            if ($has_children && $depth == 0) {
                                $attributes .= ' class="nav-link dropdown-toggle"';
                                $attributes .= ' data-bs-toggle="dropdown"';
                                $attributes .= ' role="button"';
                                $attributes .= ' aria-expanded="false"';
                            }
                            // Top-level menu
                            elseif ($depth == 0) {
                                $attributes .= ' class="nav-link"';
                            }
                            // Submenu item
                            else {
                                $attributes .= ' class="dropdown-item"';
                            }

                            $output .= '<a' . $attributes . '>';
                            $output .= esc_html($item->title);
                            $output .= '</a>';
                        }

                        // End Menu Item
                        public function end_el(&$output, $item, $depth = 0, $args = null) {
                            $output .= '</li>';
                        }
                    }
                ]);
                
                // Fallback menu if no menu is set
                if (!has_nav_menu('primary')) { ?>
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#services-section">Services</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.html#about-us" data-bs-toggle="dropdown">
                                About Us
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.html#about-us">About Us</a></li>
                                <li><a class="dropdown-item" href="team.html">Team</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#why_choose_us">Why Choose Us</a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>

                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
