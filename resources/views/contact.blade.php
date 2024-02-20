<x-layoults.main>
    <x-slot:title>
        {{ __("Contacts") }}
    </x-slot:title>

    <x-page-header>
        {{ __("Contacts") }}
    </x-page-header>

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Contact Us</h6>
                    <h1 class="section-title mb-3">Contact Us For Cleaning Services</h1>
                </div>
                <div class="col-lg-6">
                    <h4 class="font-weight-normal text-muted mb-3">Eirmod kasd duo eos et magna, diam dolore stet sea
                        clita sit ea erat lorem. Ipsum eos ipsum magna lorem stet</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <form action="{{ route('sendcontact') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <input type="text" name="name" class="form-control p-4" placeholder="Your Name"
                                           data-validation-required-message="Please enter your name"/>
                                    @error('name')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6 control-group">
                                    <input type="email" name="email" class="form-control p-4"  placeholder="Your Email"
                                           data-validation-required-message="Please enter your email"/>
                                    @error('email')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" name="subject" class="form-control p-4 mb-2 mt-2" placeholder="Subject"
                                       data-validation-required-message="Please enter a subject"/>
                                @error('subject')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group">
                                <textarea name="message" class="form-control p-4 mb-2" rows="6" placeholder="Message"
                                          data-validation-required-message="Please enter your message"></textarea>
                                @error('message')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit"
                                        >Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <iframe style="width: 100%; height: 100%; object-fit: cover;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


</x-layoults.main>
