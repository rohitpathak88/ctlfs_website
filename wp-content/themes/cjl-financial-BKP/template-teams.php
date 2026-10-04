<?php
/**
 * Template Name: Teams
 *
 * Full Teams page: intro, expertise, experts grid, impact, and CTA.
 *
 * @package CTL_Financial_Child
 */

get_header(); 
?>
<div class="container custom_container mt-5 pt-5 pb-5">
    <div class="d-flex mb-2 mt-5 pt-5">
            <h1 class="accent-gradient display-4 fw-light mb-3">Institutional Discipline. Operational Precision.</h1>
        </div>
        <div class="service-content">
            <p class="fw-light">We are a next-generation fund services firm delivering institutional-grade solutions to investment managers, asset managers, and global financial platforms. Operating at the intersection of financial governance and advanced technology, we provide the operational infrastructure that modern investment organizations require to scale with confidence.</p>
            <p class="fw-light">Our model is built on a foundation of precision, accountability, and regulatory discipline. By integrating fund accounting expertise, investor servicing capabilities, and compliance intelligence, we enable our clients to focus on what matters most—generating performance and delivering value to their investors.</p>
            <p class="fw-light">In an increasingly complex regulatory and operational landscape, we act as a trusted partner—bringing clarity, control, and transparency to every stage of the fund lifecycle.</p>
            <h2 class="mt-5 mb-3 back_white_text_gradient title fw-light fs-1">Expertise that drives confidence</h2>
            <p class="fw-light">Our team is composed of highly experienced professionals from fund administration, financial accounting, compliance advisory, and financial technology backgrounds. Each member brings deep industry knowledge and a commitment to operational excellence.</p>
            <p class="fw-light">Working as a strategic extension of our clients’ organizations, our specialists deliver disciplined execution across accounting, investor services, compliance, and fund operations.</p>
            <p class="fw-light">What distinguishes our team is not only technical expertise but also a culture of accountability, discretion, and partnership. We approach every client relationship with a long-term perspective—ensuring operational stability, regulatory alignment, and consistent service quality.</p>
        </div>
    </div>

    <section class="team-section" style="background-image: 
    url('<?php echo esc_url(cjl_get_image_url('home_banner_top_color_gradient.png')); ?>'), 
    url(<?php echo esc_url(cjl_get_image_url('home_banner_bottom_color_gradient.png')); ?>'); 
    background-position: top center, bottom center; 
    background-repeat: no-repeat, no-repeat; 
    background-size: 100% auto, 100% auto;">
        <div class="container custom_container">
            <h2 class="back_white_text_gradient title fw-light fs-1">Expertise that drives confidence</h2>
            <p class="fw-light">Driven by expertise, focused on building your vision.</p>
            <div class="row g-4">
                <!-- Person 1 -->
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(cjl_get_image_url('team1.png')); ?>" class="img-fluid w-100">
                            <div class="card-overlay bg-light p-4 position-absolute shadow small start-50 text-dark translate-middle-x">
                                <a class="text-dark text-decoration-none" href="https://www.linkedin.com/in/dilip-dixit-ba4104370/">
                                    <strong>Dilip Dixit</strong>
                                </a>
                                <br>
                                <span class="text-muted">Founder at CTL</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Person 2 -->
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(cjl_get_image_url('team2.png')); ?>" class="img-fluid w-100">
                            <div class="card-overlay bg-light p-4 position-absolute shadow small start-50 text-dark translate-middle-x">
                                <a class="text-dark text-decoration-none" href="https://www.linkedin.com/in/umesh-salvi-ba8b1628/">
                                    <strong>Umesh Salvi</strong>
                                </a>
                                <br>
                                <span class="text-muted">Managing Director at CTL</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Person 3 -->
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(cjl_get_image_url('team3.png')); ?>" class="img-fluid w-100">
                            <div class="card-overlay bg-light p-4 position-absolute shadow small start-50 text-dark translate-middle-x">
                                <a class="text-dark text-decoration-none" href="https://www.linkedin.com/in/jayesh-khaitan-4284963b/">
                                    <strong>Jayesh Khaitan</strong>
                                </a>
                                <br>
                                <span class="text-muted">Managing Director</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Person 4 -->
                <div class="col-sm-6 col-lg-3 col-md-6">
                    <div class="team-card">
                        <div class="position-relative">
                            <img src="<?php echo esc_url(cjl_get_image_url('team4.png')); ?>" class="img-fluid w-100">
                            <div class="card-overlay bg-light p-4 position-absolute shadow small start-50 text-dark translate-middle-x">
                                <a class="text-dark text-decoration-none" href="https://www.linkedin.com/in/yogeshh-darji-79420325/">
                                    <strong>Yogeshh Darji</strong>
                                </a>
                                <br>
                                <span class="text-muted">4D Under 40 | Head Of Sales</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section mb-5 pb-5 pt-4">
        <div class="container custom_container text-center">
            <h2 class="back_white_text_gradient title fw-light fs-1">Our Impact</h2>
            <p class="fw-light mb-5">Performance Backed by Results</p>
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-lg-4 col-xl-2 col-md-4 col-sm-6">
                    <div class="card border-0 text-start h-100">
                        <img src="<?php echo esc_url(cjl_get_image_url('counter-card-corner.png')); ?>" class="img-img-fuild ms-5">
                        <div class="card-body ps-3 ps-4">
                            <h2 class="accent-gradient mb-1">75+</h2>
                            <p class="fw-light mb-0">AIFs Onboarded</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-4 col-xl-2 col-md-4 col-sm-6">
                    <div class="card border-0 text-start h-100">
                        <img src="<?php echo esc_url(cjl_get_image_url('counter-card-corner.png')); ?>" class="img-img-fuild ms-5">
                        <div class="card-body ps-3 ps-4">
                            <h2 class="accent-gradient mb-1">252+</h2>
                            <p class="fw-light mb-0">Team Of Employees</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-4 col-xl-2 col-md-4 col-sm-6">
                    <div class="card border-0 text-start h-100">
                        <img src="<?php echo esc_url(cjl_get_image_url('counter-card-corner.png')); ?>" class="img-img-fuild ms-5"> 
                        <div class="card-body ps-3 ps-4">
                            <h2 class="accent-gradient mb-1">~60%</h2>
                            <p class="fw-light mb-0">Share In Securitisation At PAN India</p>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-lg-4 col-xl-2 col-md-4 col-sm-6">
                    <div class="card border-0 text-start h-100">
                        <img src="<?php echo esc_url(cjl_get_image_url('counter-card-corner.png')); ?>" class="img-img-fuild ms-5">
                        <div class="card-body ps-3 ps-4">
                            <h2 class="accent-gradient mb-1">~29%</h2>
                            <p class="fw-light mb-0">Share In NCDs At PAN India</p>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-lg-4 col-xl-2 col-md-4 col-sm-6">
                    <div class="card border-0 text-start h-100">
                        <img src="<?php echo esc_url(cjl_get_image_url('counter-card-corner.png')); ?>" class="img-img-fuild ms-5">
                        <div class="card-body ps-3 ps-4">
                            <h2 class="accent-gradient mb-1">1000+</h2>
                            <p class="fw-light mb-0">Security Trustee</p>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-lg-4 col-xl-2 col-md-4 col-sm-6">
                    <div class="card border-0 text-start h-100">
                        <img src="<?php echo esc_url(cjl_get_image_url('counter-card-corner.png')); ?>" class="img-img-fuild ms-5">
                        <div class="card-body ps-3 ps-4">
                            <h2 class="accent-gradient mb-1">AUM</h2>
                            <p class="fw-light mb-0">~INR 30 Lakh Crores</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-center text-white"
        style="background: linear-gradient(90deg, rgba(255,112,76,0.05) 0%, rgba(255,112,76,0.5) 51.92%, rgba(255,112,76,0.05) 100%);">

        <div class="container custom_container py-4">
            <h2 class="back_white_text_gradient title fw-normal fs-2">Powering The Next Generation Of Investment Platforms </h2>
            <p class="fw-light mb-4"> Discover how our institutional-grade fund services can strengthen your operational infrastructure and enhance investor confidence.</p>

            <div class="d-flex justify-content-center gap-5 flex-wrap">

                <a href="#" class="btn-explore btn-explore-white">
                START A CONVERSATION
                </a>

                <a href="#" class="btn-explore">
                EXPLORE OUR SERVICES
                </a>

            </div>

        </div>
    </section>

	<?php get_template_part( 'template-parts/contact-section' ); ?>
 
<div>
<?php
get_footer();
