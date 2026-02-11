    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container custom_container">
            <div class="row align-items-center">
                <div class="col-lg-6 m-auto text-center">
                    <form id="newsletterForm" class="input-group">
                        <input type="email" name="email" class="bg-transparent border-0 form-control" placeholder="Enter your email address" required>
                        <button class="btn btn-danger rounded-0 fw-light" type="submit">Subscribe</button>
                    </form>
                    <p class="mb-0 mt-3" style="font-size: 24px;">Enter your email to get newsletter.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background-image:url(<?php echo esc_url(cjl_get_image_url('home_banner_top_color_gradient.png')); ?>);background-position: top; background-repeat: no-repeat;">
        <div class="container custom_container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4 mb-lg-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <img src="<?php echo esc_url(cjl_get_image_url('ctl_header_logo.png')); ?>" alt="<?php bloginfo('name'); ?>">
                            <?php
                        }
                        ?>
                    </a>
                    <p class="lead mt-4">© <?php echo date('Y'); ?>. CTLFS. All Rights Reserved.</p>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <?php
                    if (is_active_sidebar('footer-1')) {
                        dynamic_sidebar('footer-1');
                    } else {
                        ?>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#services" class="text-white text-decoration-none">Services</a></li>
                            <li class="mb-2"><a href="#investors" class="text-white text-decoration-none">Investors</a></li>
                            <li class="mb-2"><a href="#media" class="text-white text-decoration-none">Media</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <?php
                    if (is_active_sidebar('footer-2')) {
                        dynamic_sidebar('footer-2');
                    } else {
                        ?>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#about" class="text-white text-decoration-none">About Us</a></li>
                            <li class="mb-2"><a href="#faq" class="text-white text-decoration-none">FAQ</a></li>
                            <li class="mb-2"><a href="#contact" class="text-white text-decoration-none">Contact Us</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <?php
                    if (is_active_sidebar('footer-3')) {
                        dynamic_sidebar('footer-3');
                    } else {
                        ?>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Policy</a></li>
                            <li class="mb-2"><a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="text-white text-decoration-none">Privacy Policy</a></li>
                            <li class="mb-2"><a href="#" class="text-white text-decoration-none">Terms of Use</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-uppercase">Follow Us</h6>
                    <div class="social-links">
                        <?php
                            $facebook = get_theme_mod('cjl_facebook', '')? get_theme_mod('cjl_facebook', ''):"#";
                            $linkedin = get_theme_mod('cjl_linkedin', '') ? get_theme_mod('cjl_linkedin', ''):"#";
                            $twitter = get_theme_mod('cjl_twitter', '') ? get_theme_mod('cjl_twitter', ''):"#";
                            
                            if ($facebook) {
                                echo '<a href="' . esc_url($facebook) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer"><img src="' . esc_url(cjl_get_image_url('fb.png')) . '" alt="facebook"></a>';
                            }
                            if ($linkedin) {
                                echo '<a href="' . esc_url($linkedin) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer"><img src="' . esc_url(cjl_get_image_url('in.png')) . '" alt="linkedin"></a>';
                            }
                            if ($twitter) {
                                echo '<a href="' . esc_url($twitter) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer"><img src="' . esc_url(cjl_get_image_url('x.png')) . '" alt="x"></a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    
    <script>
        // Newsletter form submission
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.getElementById('newsletterForm');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData();
                    formData.append('action', 'cjl_newsletter');
                    formData.append('nonce', cjlAjax.nonce);
                    formData.append('email', this.querySelector('input[name="email"]').value);
                    
                    fetch(cjlAjax.ajaxurl, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log(data)
                            alert(data.data.message);
                            this.reset();
                        } else {
                            alert(data.data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    });
                });
            }
        });
    </script>
</body>
</html>
