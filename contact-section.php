<section class="contact-us-section mb-5">
    <h1 class="text-center">Contact us </h1>
    <p class="contact-us-p text-center">Fill out the form below to get your Free Proposal.</p>
    <div class="container">
        <div class="contact__wrapper shadow-lg mt-n9">
            <div class="row no-gutters m-0">
                <div class="col-lg-5 contact-info__wrapper gradient-brand-color   order-lg-2">
                    <h3 class="color--white mb-5">Get in Touch</h3>

                    <ul class="contact-info__list list-style--none position-relative z-index-101">
                        <a href="mailto:<?php echo SITE_EMAIL; ?>" style="color:white;">
                            <li class="mb-4 pl-4">
                                <span class="position-absolute"><i class="fas fa-envelope"></i></span>
                                <?php echo SITE_EMAIL;?>
                            </li>
                        </a>
                        <a href="tel:+91 874224523" style="color:white;">
                            <li class="mb-4 pl-4">
                                <span class="position-absolute"><i class="fas fa-phone"></i></span>
                                <?php echo SITE_CONTACT_NO;?>
                            </li>
                        </a>
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span> Barasat,
                            Kolkata, West Bengal, India, Pincode- 700125
                            <br> Barasat, koyra Kadambagachi
                            <br> Near Raceon Workshop, Barasat , Kolkata

                            <div class="mt-3">
                                <a href="https://www.google.com/maps" target="_blank"
                                    class="text-link link--right-icon text-white">Get directions <i
                                        class="link__icon fa fa-directions"></i></a>
                            </div>
                        </li>
                    </ul>
                    <!-- <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg"
                        id="svg2" viewBox="0 0 354 194" version="1.1">
                        <g id="layer1" fill="#ff7f50b3" transform="translate(-318 -550.36)">
                            <path id="path3757" stroke="#ff7f50b3" stroke-width="4" d="m320 742.36h350v-190z"/>
                        </g>
                    </svg> -->

                </div>

                <div class="col-lg-7 contact-form__wrapper pb-2  order-lg-1">
                    <form method="post" class="contact-form needs-validation" novalidate>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="firstname">First Name</label>
                                    <input type="text" minlength="4" class="form-control" id="firstname"
                                        name="firstname" placeholder="Your First Name" required>
                                    <div class="invalid-feedback">
                                        Please Enter your first Name!
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" minlength="4" class="form-control" id="lastName" name="lastName"
                                        placeholder="Your Last Name" required>
                                    <div class="invalid-feedback">
                                        Please Enter your last Name!
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="email">Email</label>
                                    <input type="email" inputmode="email"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email"
                                        name="email" placeholder="Your mail address" required>
                                    <div class="invalid-feedback">
                                        Please enter your email!
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                        minlength="10" pattern="[0-9]+" maxlength="10" class="form-control" id="phone"
                                        name="phone" placeholder="0123456789" required>
                                    <div class="invalid-feedback">
                                        Please enter valid phone Number!
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="message">How can we help?</label>
                                    <textarea class="form-control" minlength="255" id="message" name="message" rows="4"
                                        placeholder="Write here....." required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter your queries minimum 255 characters!
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3 submit-divclass">
                                <a href="/"><button class="my-buttons-hover bn21">Submit</button></a>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- End Contact Form Wrapper -->

            </div>
        </div>
    </div>
</section>