@extends('layouts.frontend')
@section('content')
@section('active-contact-link', 'active')
<!-- h2-top-service-area-start -->
<div class="h2-top-close-to-menu-area">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-8 col-sm-8 col-12">
              {{-- <div class="h2-top-single-service wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms" style="padding: 0; margin: 0px">
                 
                  <div  class="content" >
				   <p style="font-size:20px">
				  Centre des opération de réponse aux urgences sanitaires (CORUS) </p>
                    
                      
                  </div>
              </div> --}}
			  <div id="googleMap" style="margin-top:3px"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3897.0367506512257!2d-1.511651285700752!3d12.380470530923864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebf02f361462d%3A0x8156e2ba496a7010!2sCentre%20des%20op%C3%A9ration%20de%20r%C3%A9ponse%20aux%20urgences%20sanitaires%20CORUS!5e0!3m2!1sfr!2sbf!4v1585775855015!5m2!1sfr!2sbf" width="750" height="510" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
 
          </div>
         
          <div class="col-lg-4 col-md-4 col-sm-4 col-12">
              
                      <!--<h2 class="title">Information preventive</h2>
                      h3-testimonial-area-start -->
    <div class="h3-testimonial-area" style="min-height: 100%;">
        <div class="container" style="background-color:#efe8e891 !important;">
            <br>
            <h4 class="title text-center text-capitalize">NOUS CONTACTER</h4>
            <hr>
            <img src="{{ asset('frontend/img/corsconta.jpeg') }}" alt="" style="width:320px; height:287px">
            <div class="text text-center">
            <p>Boite postal : 03 BP 7009 Ouagadougou 03</p>
            <p>Tél : +226 25 33 51 83/52 19 53 94
</p>
            <p>Email : secretariat@corus-insp.gov.bf
</p>
            <p>Site WEB : www.corus-insp.gov.bf
</p>
            <p>Facebook : https://www.facebook.com/corus-insp
</p>
                

            </div>
        </div>
        
    </div>
    <!-- h3-testimonial-area-end -->
                      
          </div>
      </div>
  </div>
</div>


  



@endsection