<?php
    if ( ! defined( 'ABSPATH' ) ) exit; 
    $plugin_url = plugin_dir_url(__DIR__);
?>
<div id="divi-global-popup">
        <div class="popup-main-container">
            <div class="popup-content-container">
                <span class="popup-close" onclick="hideDiviPopup()" title="Close">×</span>
                <div class="row g-1">
                    <div class="col-lg-6">
                        <div class="testimonial-section h-100">
                           
                        <?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
                            
                            <div class="testimonial-content">
                                <h5 class=" fw-bold mb-1" style="color:#ff7c00;">Leaving already?</h5>
                                <p class="mb-4 text-muted">Hear from our clients and why 3000+ businesses trust us</p>

                                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testimonial-card">
                                                <div class="testimonial-img-container">
                                                    <img src="<?php echo esc_url($plugin_url . 'assets/images/Lou Carpenter_profile.png'); ?>" class="testimonial-img" alt="Client 1">
                                                </div>
                                                
                                                <div class="testimonial-quote">
                                                    <h6 class="mb-1">Lou Carpenter</h6>
                                                    <small class="text-muted d-block mb-2">Product Strategy, Digital Karma, LLC</small>
                                                    <p class="text-muted fst-italic">
                                                    "We have been engaging with this team for a year now, and we are about to launch soon! This team is knowledgeable, reliable, and easy to work with. Project management has been on point and with all actions being made. They are very polite, and easy to collaborate with. I highly recommend!"                                                    </p>
                                                    <div class="stars">
                                                        <img src="<?php echo esc_url($plugin_url . 'assets/images/rating__star.png'); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="testimonial-card">
                                                <div class="testimonial-img-container">
                                                    <img src="<?php echo esc_url($plugin_url . 'assets/images/Priya Vrat Misra profile.png'); ?>" class="testimonial-img" alt="Client 2">
                                                </div>
                                                
                                                <div class="testimonial-quote">
                                                    <h6 class="mb-1">Priya Vrat Misra</h6>
                                                    <small class="text-muted d-block mb-2">Founder, at reckoon</small>
                                                    <p class="text-muted fst-italic">
                                                    “Exceptional quality of service, a great team. They developed the iOS version for Reckon & did a super job at it. Excellent suggestions were provided to improve the app & customer experience. Their expertise and dedication stood out. I am already ready to hire them again for the hybrid app for Reckoon.”
                                                    </p>
                                                    <div class="stars">
                                                        <img src="<?php echo esc_url($plugin_url . 'assets/images/rating__star.png'); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="testimonial-card">
                                                <div class="testimonial-img-container">
                                                    <img src="<?php echo esc_url($plugin_url . 'assets/images/Mathew Ho profile.png'); ?>" class="testimonial-img" alt="Client 3">
                                                </div>
                                                <div class="testimonial-quote">
                                                    <h6 class="mb-1">Mathew Ho</h6>
                                                    <small class="text-muted d-block mb-2">Founder & Director, at FlagCart</small>
                                                    <p class="text-muted fst-italic">
                                                    IPH Technologies has a skilled team delivering results. They developed an iPhone version of a larger project within a tight timeline, with significant design enhancements. Cost-effective, responsive, and experienced with Apple submissions, they resolved issues quickly. I will work with them again!                                                    </p>
                                                    <div class="stars">
                                                        <img src="<?php echo esc_url($plugin_url . 'assets/images/rating__star.png'); ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="col-lg-6">
                        <div class="form-section h-100" >
                            <h3 class="fw-bold mb-1">Tell us about your project</h3>
                            <p class="text-muted mb-2">We'll provide a free consultation with cost and timeline estimates</p>
                            <?php echo do_shortcode('[contact-form-7 id="7db8993" title="Untitled"]'); ?>
                            <div class="text-start">
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-shield-lock me-2"></i>Your information is 100% protected by our <strong>NDA</strong>
                                </p>
                                <p class="text-muted small">
                                    <i class="bi bi-lightning-charge me-2"></i>Typical response time: <strong>under 2 minutes</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bottom-bar">
                <div class="bottom-bar-content">
                    <div class="stats-section">
                        <p><b style="color:#2874fc">1600+</b> transform engineers delivered</p>
                        <p><b style="color:#2874fc">3000+</b> game changing products</p>
                    </div>
                    
                    <div class="marquee-container">
                        <div class="marquee-content">
                           
                            <div class="award-card">
                                <img src="<?php echo esc_url($plugin_url . 'assets/images/bussinesfirm.png'); ?>" alt="Award 1">
                                <span>Businesses Firms</span>
                            </div>
                            <div class="award-card">
                                <img src="<?php echo esc_url($plugin_url . 'assets/images/mobile_app_daily_award.png'); ?>" alt="Award 2">
                                <span>Mobile App Daily</span>
                            </div>
                            <div class="award-card">
                                <img src="<?php echo esc_url($plugin_url . 'assets/images/design-rush 1 (1).png'); ?>" alt="Award 3">
                                <span>DesignRush</span>
                            </div>
                            <div class="award-card">
                                <img src="<?php echo esc_url($plugin_url . 'assets/images/itfirms_award.png'); ?>" alt="Award 4">
                                <span>IT Firms</span>
                            </div>
                            <div class="award-card">
                                <img src="<?php echo esc_url($plugin_url . 'assets/images/goodfirms.png'); ?>" alt="Award 1">
                                <span>GoodFirms</span>
                            </div>
                            <div class="award-card">
                                <img src="<?php echo esc_url($plugin_url . 'assets/images/appfutura.png'); ?>" alt="Award 2">
                                <span>AppFutura</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>