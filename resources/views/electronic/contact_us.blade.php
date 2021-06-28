@extends('layouts.master')
@section('title')
    <title>electronic Coontact us page</title>
@endsection

@section('content')
<div class="page-content px-2">
    @include('layouts.contact.description')

    @include('layouts.contact.our_information')
    <div class="holder">
        <div class="container">
            <div class="row vert-margin">
                @include('layouts.contact.message_form')
                <!--map-->
                <div class="col-sm-9">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2201.3258493677126!2d-74.01291322172017!3d40.70657451080482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sua!4v1492962272380"></iframe>
                    </div>
                </div>
                <!--/map-->
            </div>
        </div>
    </div>
</div>
 @include('electronic.newsletter')
@endsection

@section('footersticky')
    @include('layouts.payment_note')
@endsection