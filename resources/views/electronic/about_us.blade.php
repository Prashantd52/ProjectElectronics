@extends('layouts.master')
@section('title')
    <title>Electronics about us</title>
@endsection

@section('content')
<div class="page-content px-2">
    <!--description-->
    <div class="holder mt-0 py-3 py-sm-5 py-md-10 bg-cover lazyload" data-bgset="images/pages/about-bg.jpg">
      <div class="container">
        <div class="row">
          <div class="col-11 col-md-9 col-xl-9">
            <div class="page-title-bg py-md-3 py-xl-6">
              <h1>ABOUT US</h1>
              <p class="d-none d-md-block">Founded in 2010, Fox shop is the one stop shop for the barbering world.<br>
                We provide barbers with the necessary tools to progress their craft and push the industry as far forward as possible.</p>
              <p>Based in Cardiff, South Wales, Fox shop operates primarily in the UK, but international sales are welcomed and dispatched daily. We have a trade counter with a shop front and we encourage you to come in and see us!</p>
              <p class="d-none d-md-block"><i><b>Our support is available 10.00 – 18.00 GMT + 2 (Monday – Friday).<br>
                    We usually get back to you within 24 hours.</b></i></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/description-->
    <br>
    @include('layouts.about.why_shop_with_us')
    
    <!--about sales and reviews-->
    <div class="holder py-4 py-md-7 bgcolor">
      <div class="row fact-blocks-row lazyload">
        <div class="col-sm-6">
            <div class="fact-block">
              <div class="number"><span data-count="90">0</span>%</div>
              <div class="title">Of excellent reviews</div>
              <div class="text">Nor again is there anyone who loves or pursues or desires
                to obtain pain of itself, because it is pain, but because occasionally in which toil and pain can procure
              </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="fact-block">
              <div class="number js-count-to"><span data-count="1545">0</span></div>
              <div class="title">More sales</div>
              <div class="text">Nor again is there anyone who loves or pursues or desires
                to obtain pain of itself, because it is pain, but because occasionally in which toil and pain can procure
              </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="fact-block">
              <div class="number js-count-to"><span data-count="100">0</span>%</div>
              <div class="title">Happy customers</div>
              <div class="text">Nor again is there anyone who loves or pursues or desires
                to obtain pain of itself, because it is pain, but because occasionally in which toil and pain can procure
              </div>
            </div>
        </div>
      </div>
    </div>
    <!--/about sales and reviews-->

    <!--OurTeam-->
        @include('layouts.about.our_team')
    <!--/OurTeam-->

</div>
    @include('electronic.newsletter')
    
    @include('layouts.about.others')
@endsection

@section('footersticky')
    @include('layouts.payment_note')
@endsection


