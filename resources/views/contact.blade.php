@extends('layouts.app')
@section('meta_title','contactus')
@section('meta_keywords','contactus')
@section('meta_description','contactus')
@section('content') 
<!-- Start Page Banner Area -->
<div class="page-banner-area bg-23 pt-100">
			<div class="container">
				<div class="page-banner-content">
					<h2>Contact Us</h2>
					<ul>
						<li>
							<a href="/">
								<i class="ri-home-8-line"></i>
								Home 
							</a>
						</li>
						<li>
							<span>Contact Us</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Banner Area -->

        <!-- Start Map Area -->
		<div class="map-area pt-100">
			<div class="container">
				<div class="map-content">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6862.485884144591!2d76.83358!3d30.68344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f95c039eb4099%3A0xe4da3f45c9993834!2sHuman%20Biolife%20-%20(11%20special%20segments%20)%20%2CMORE%20THAN%202500%2B%20PRODUCTS!5e0!3m2!1sen!2sin!4v1677223525850!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
		<!-- End Map Area -->

		<!-- Start Contact Informetion Area -->
		<div class="contact-informetion-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="left-informetion">
							<h2>Contact Information</h2>
							<ul>
								<li>
									<span>ADDRESS:</span>
									315, Industrial Area Phase 2, Panchkula, Haryana 134109
								</li>
								<li>
									<span>EMAIL US:</span>
									<a href="mailto:hblindia17@gmail.com">hblindia17@gmail.com</a>
								</li>
								<li>
									<span>PHONE:</span>
									<a href="tell:8727874222">8727874222</a>
								</li>
							</ul>
						</div>
					</div>
	
					<div class="col-lg-6 col-md-6">
						<div class="right-informetion">
							<h2>Opening Hours</h2>
	
							<ul>
								<li>
									Saturday– Thursday  
									<span>8.00 AM – 8.00 PM</span>
								</li>
								<li>
									Saturday– Thursday  
									<span>10.00 AM – 10.00 PM</span>
								</li>
								<li>
									Sunday
									<span>8.00 PM – 03.00 PM</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Contact Informetion Area -->

		<!-- Start Contact Area -->
		<div class="contact-area pb-100">
			<div class="container">
				<div class="contact-form">
					<h3>Send message</h3>

					<form id="contactForm">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>NAME</label>
									<input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Edgar">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>EMAIL</label>
									<input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="info@bexi.com">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>PHONE</label>
									<input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="***********">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>SUBJECT</label>
									<input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="write subject here...">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="form-group">
									<label>YOUR MESSAGE</label>
									<textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="write message here...."></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-check">
									<div class="form-group">
										<div class="form-check">
											<input
												name="gridCheck"
												value="I agree to the terms and privacy policy."
												class="form-check-input"
												type="checkbox"
												id="gridCheck"
												required
											>
									
											<label class="form-check-label" for="gridCheck">
												Accept <a href="terms-conditions.html">terms and conditions</a> and <a href="privacy-policy.html">privacy policy.</a>
											</label>
											<div class="help-block with-errors gridCheck-error"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 text-center">
								<button type="submit" class="default-btn active">
									Send message
								</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Contact Area -->

@endsection