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
                                <li class="mb-2"><a class="text-white text-decoration-none" href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                                  <li class="mb-2"><a href="#why_choose_us" class="text-white text-decoration-none">Why Choose Us</a></li>  
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
                                 <li class="mb-2"><a href="#about_us" class="text-white text-decoration-none">About Us</a></li>
                                <li class="mb-2"><a href="https://ctlfs.in/teams/" class="text-white text-decoration-none">Our Team</a></li>
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
                            <li class="mb-2"><a href="#services-section" class="text-white text-decoration-none">Services</a></li>
                            <li class="mb-2"><a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="text-white text-decoration-none">Privacy Policy</a></li> 
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <h6 class="text-uppercase">Follow Us</h6>
                    <div class="social-links">
                        <?php
                            //$facebook = get_theme_mod('cjl_facebook', '')? get_theme_mod('cjl_facebook', ''):"#";
                            $linkedin = get_theme_mod('cjl_linkedin', '') ? get_theme_mod('cjl_linkedin', ''):"#";
                            //$twitter = get_theme_mod('cjl_twitter', '') ? get_theme_mod('cjl_twitter', ''):"#";
                            
                            // if ($facebook) {
                            //     echo '<a href="' . esc_url($facebook) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer"><img src="' . esc_url(cjl_get_image_url('fb.png')) . '" alt="facebook"></a>';
                            // }

                            if ($linkedin) {
                                echo '<a href="' . esc_url($linkedin) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer"><img src="' . esc_url(cjl_get_image_url('in.png')) . '" alt="linkedin"></a>';
                            }

                            // if ($twitter) {
                            //     echo '<a href="' . esc_url($twitter) . '" class="text-white me-3" target="_blank" rel="noopener noreferrer"><img src="' . esc_url(cjl_get_image_url('x.png')) . '" alt="x"></a>';
                            // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script>
            // India bounds
            var indiaBounds = [
                [6.5, 68],   // Southwest
                [37.5, 97]   // Northeast
            ];

            var map = L.map('map', {
                center: [22.9734, 78.6569],
                zoom: 5,
                minZoom: 5,
                maxBounds: indiaBounds,
                maxBoundsViscosity: 1.0
            });

            // Dark theme tile layer (similar to amCharts dark style)
            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap &copy; CARTO'
            }).addTo(map);

            // City locations
            var locations = [
            {
                name: "Mumbai Office",
                lat: 19.0005,
                lng: 72.8258,
                address: `Unit No-901, 9th Floor, Tower-B, Peninsula Business Park,
                Senapati Bapat Marg, Lower Parel (W), Mumbai-400013`
            },
            {
                name: "Pune Office",
                lat: 18.5074,
                lng: 73.8077,
                address: `GDA House, Plot No. 85, Bhusari Colony (Right),
                Paud Road, Kothrud, Pune – 411038`
            },
            {
                name: "New Delhi Office",
                lat: 28.6289,
                lng: 77.2195,
                address: `9th Floor, Office No. 910-911, Kailash Building,
                26, Kasturba Gandhi Marg, New Delhi – 110001`
            },
            {
                name: "Bengaluru Office",
                lat: 12.9352,
                lng: 77.6146,
                address: `Cabin 5, 3rd Floor, Bhive Workspace,
                Koramangala 5th Block, Bengaluru – 560095`
            },
            {
                name: "Chennai Office",
                lat: 13.0400,
                lng: 80.1430,
                address: `Plot No 5A, Bharathiar Street,
                Karpagambal Nagar, Madhanandapuram,
                Chennai – 600125`
            },
            {
                name: "GIFT City Office",
                lat: 23.1645,
                lng: 72.6830,
                address: `627, Hiranandani Signature, 6th Floor,
                Block 13B, Zone 1, SEZ,
                GIFT City, Gandhinagar – 382355`
            },
            {
                name: "Kolkata Office",
                lat: 22.5534,
                lng: 88.3526,
                address: `COSPACIO, 24 Park Street,
                8th Floor, Park Center, Kolkata`
            },
            {
                name: "Hyderabad Office",
                lat: 17.4156,
                lng: 78.4347,
                address: `NSL Icon, 3rd floor, Road No.12,
                Banjara Hills, Hyderabad – 500034`
            },
            {
                name: "Dubai Office",
                lat: 25.2115,
                lng: 55.2796,
                address: `Unit 409, Level 4, Damac Park Tower A,
                DIFC, Dubai, UAE`
            }
        ];


            // Custom styled circle markers (like amCharts)
            locations.forEach(function(city) {
                L.circleMarker([city.lat, city.lng], {
                    radius: 8,
                    fillColor: "#ff704c",
                    color: "#ffffff",
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.9
                })
                .addTo(map)
                .bindPopup("<b>" + city.name +  "</b><br>" + city.address);
            });
        </script>
    
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
