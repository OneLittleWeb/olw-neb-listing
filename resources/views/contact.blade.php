@extends('layouts.master')
@section('title', "Contact Us - Nebraskalisting")
@section('meta_description', "To be added")
@section('content')
    <section>
        <div class="container" style="margin-top: 140px; margin-bottom: 70px">
            <h1 class="text-center">Contact US</h1>
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="surname" class="form-label">Your Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Your Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject">
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Your Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5"
                                              required></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit"
                                                    class="btn btn-dark w-100 fw-bold">Send
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
