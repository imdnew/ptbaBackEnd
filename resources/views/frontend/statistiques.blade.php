@extends('layouts.frontend')
@section('content')
@section('active-statistiques-link', 'active')

<div class="h2-top-service-area">
  <div class="container">
      <div class="row justify-content-left">
          <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="h2-top-single-service wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                  
                  <div id="confirmer" class="content" style="min-height: 450px">
                      
                  </div>
              </div>
          </div>
         {{--  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="h2-top-single-service wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                  
                  <div id="declarer" class="content" style="min-height: 450px">
                     
                  </div>
              </div>
          </div>
 --}}

          <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="h2-top-single-service wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                
                <div id="guerir" class="content" style="min-height: 450px">
                    
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="h2-top-single-service wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                
                <div id="deceder" class="content" style="min-height: 450px">
                   
                </div>
            </div>
        </div>
         
      </div>
  </div>
</div>
<!-- h2-top-service-area-end -->



<div class="h2-top-service-area">
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="h2-top-single-service wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    
                    <div id="stat2" class="content" style="min-height: 450px">
                       
                    </div>
                </div>
            </div>
           
        </div>
    </div>
  </div>
  <!-- h2-top-service-area-end -->



<!-- counter-area-start -->
<div class="counter-area bg-with-black">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                <div class="single-counter wow fadeIn" data-wow-delay="100ms" data-wow-duration="1500ms">
                    <div class="icon">
                        <span class="flaticon-newspaper-2"></span>
                    </div>
                    <div class="content badge-stat badge-nouveau">
                        <h2 class="ccid counter counter-up text-nouveau" data-counterup-time="1500" data-counterup-delay="30">{{$confrimes[0]->sum}}</h2>
                        <p class="name text-nouveau">Cas Confirmés</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                <div class="single-counter wow fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">

                    <div class="icon">
                        <span class="flaticon-like-1"></span>
                    </div>
                    <div class="content badge-stat badge-gueris">
                        <h2 class="cgid counter counter-up text-gueris" data-counterup-time="1500" data-counterup-delay="30">{{$gueris[0]->sum}}</h2>
                        <p class="name text-gueris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guéris&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                <div class="single-counter wow fadeIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="icon">
                        <span class="flaticon-eraser"></span>
                    </div>
                    <div class="content badge-stat badge-deces">
                        <h2 class="cdid counter counter-up text-deces" data-counterup-time="1500" data-counterup-delay="30">{{$deces[0]->sum}}</h2>
                        <p class="name text-deces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Décès&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                <div class="single-counter wow fadeIn" data-wow-delay="400ms" data-wow-duration="1500ms">

                    <div class="icon">
                        <span class="flaticon-pie-chart"></span>
                    </div>
                    <div class="content badge-stat badge-suivis">
                        <h2 class="csid counter counter-up text-suivis" data-counterup-time="1500" data-counterup-delay="30">{{$confrimes[0]->sum - $deces[0]->sum -$gueris[0]->sum}}</h2>
                        <p class="name text-suivis">Cas Actifs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- counter-area-end -->
<div id="map-id" style="display:none;"></div>



@endsection