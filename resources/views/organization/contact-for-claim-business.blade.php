@extends('layouts.master')
@section('title', "Nebraskalisting THE Local Business Directory | Contact for Claim Your Business")
@section('meta_description', "nebraskalisting, best places in nebraska")
@section('content')
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="breadcrumb-content breadcrumb-content-2 d-flex flex-wrap align-items-end justify-content-between margin-bottom-30px">
                        <div class="section-heading">
                            <ul class="list-items bread-list bread-list-2 bg-transparent rounded-0 p-0 text-capitalize">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li>
                                    <a href="{{ route('claim.business', $organization->slug) }}">Claim Profile</a>
                                </li>
                                <li>
                                    Confirm Business Ownership
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Contact Us</h5>
                <div class="card-body text-dark">
                    <p class="card-text">Please contact us to confirm your ownership of <a
                            href="{{ route('city.wise.organization', ['city_slug' => $organization->city->slug, 'organization_slug' => $organization->slug]) }}">{{ $organization->organization_name }}</a>.
                        To help us confirm your business ownership as quick as possible, please upload a picture where
                        the signage of your business is clearly visible which maybe -</p>

                    <div class="pt-3">
                        <ul class="contact-for-claim-business-profile">
                            <li>Your store's front view</li>
                            <li>Sign on your office building</li>
                            <li>Your business card</li>
                            <li>A vehicle with your business logo</li>
                        </ul>
                    </div>

                    <form action="#" enctype="multipart/form-data">
                        <div class="form-group pt-3">
                            <label for="contact_email">Email address <span class="required">*</span></label>
                            <input type="email" class="form-control" name="contact_email" id="contact_email"
                                   aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label for="editable_information">What business information you want to edit? <span
                                    class="required">*</span></label>
                            <textarea class="form-control" name="editable_information" id="editable_information"
                                      rows="3" required></textarea>
                        </div>

                        <div>
                            <label for="exampleInputEmail1">Photo</label>
                            <div class="custom-file padding-top-40px">
                                <input type="file" class="custom-file-input" name="validation_images"
                                       id="validation_images">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
