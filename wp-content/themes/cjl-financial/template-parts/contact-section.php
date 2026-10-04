<?php
/**
 * Contact Section Template Part
 *
 * @package CJL_Financial
 */

$phone = get_theme_mod('cjl_phone', '+1 (555) 123-4567');
$email = get_theme_mod('cjl_email', 'contactinformation@ctls.com');
$address = get_theme_mod('cjl_address', '7421, First Floor, Third Lane, East, India- 234532');
$contact_big_heading = get_theme_mod('cjl_contact_big_heading', 'Let\'s connect');
$contact_title = get_theme_mod('cjl_contact_title', 'Let\'s Chat. Reach Out To Us');
$contact_description = get_theme_mod('cjl_contact_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, um dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur...');
?>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container custom_container">
        <h2 class="text-center text-uppercase mb-0 big_heading"><?php echo esc_html($contact_big_heading); ?></h2>
        <div class="reach_out" style="background-image:url(<?php echo esc_url(cjl_get_image_url('let_connect.png')); ?>);background-position: left top; background-repeat: no-repeat;">
            <h2 class="mb-4 back_white_text_gradient fw-light title"><?php echo esc_html($contact_title); ?></h2>
            <p class="lead"><?php echo esc_html($contact_description); ?></p>
            
            <div class="row align-items-start mt-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <form id="contactForm">
                        <div class="mb-4">
                            <label class="mb-1 fw-medium">Your Name:</label>
                            <input type="text" name="name" class="form-control bg-secondary border-0 text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="mb-1 fw-medium">Email Address:</label>
                            <input type="email" name="email" class="form-control bg-secondary border-0 text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="mb-1 fw-medium">Company Name:</label>
                            <input type="text" name="company" class="form-control bg-secondary border-0 text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="mb-1 fw-medium">Message:</label>
                            <textarea name="message" class="form-control bg-secondary border-0 text-white" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger btn-lg rounded-0">Submit</button>
                    </form>
                </div>
                
                <div class="col-lg-6">
                    <div class="contact-info ps-lg-5 mt-4">
                        <h3 class="mb-4 text-uppercase">contact info</h3>
                        <hr>
                        
                        <div class="mb-4">
                            <small class="lead text-uppercase mb-2">Phone</small>
                            <p><?php echo esc_html($phone); ?></p>
                        </div>
                        <div class="mb-4">
                            <small class="lead text-uppercase mb-2">Email Address</small>
                            <p><?php echo esc_html($email); ?></p>
                        </div>
                        <div>
                            <small class="lead text-uppercase mb-2">Service Area</small>
                            <p><?php echo wp_kses_post( $address ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Contact form submission
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('action', 'cjl_contact_form');
            formData.append('nonce', cjlAjax.nonce);
            formData.append('name', this.querySelector('input[name="name"]').value);
            formData.append('email', this.querySelector('input[name="email"]').value);
            formData.append('company', this.querySelector('input[name="company"]').value);
            formData.append('message', this.querySelector('textarea[name="message"]').value);
            
            fetch(cjlAjax.ajaxurl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
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
