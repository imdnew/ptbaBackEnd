@extends('layouts.frontend')
@section('content')
@section('active-telechargement-link', 'active')

<div class="h2-top-close-to-menu-area">
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="h2-top-single-service wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                   <div class="content">
                        <h4 class="title">Espace de téléchargement des documents officiels sur le Coronavirus COVID19 au Burkina Faso </h4>
                        <hr>
                        
                        <p class="text text-justify mb-3">
                            <table>
								<tr>
									<td>Communiqué sur le point de la situation de Covid-19 au Burkina_Faso du 31-mars_2020 </td>
									<td>
									{{-- <a href="{{ asset('frontend/img/Communiqué_point_-Covid-19_Burkina_Faso_31-mars_2020.pdf') }}"> <img src="{{ asset('frontend/img/pdf.jpg') }}" alt="" style="height:25px;width:25px;">
									</a> --}}
									<a href="#"> <img src="{{ asset('frontend/img/pdf.jpg') }}" alt="" style="height:25px;width:25px;">
									</a>
								</td>
								</tr>
								<tr>
									<td>Communiqué sur le point de la situation de Covid-19 au Burkina_Faso du 31-mars_2020 </td>
									<td><a href="#"> <img src="{{ asset('frontend/img/pdf.jpg') }}" alt="" style="height:25px;width:25px;">
									</a>
								</td>
								</tr>
								<tr>
									<td>
										Communiqué sur le point de la situation de Covid-19 au Burkina_Faso du 31-mars_2020 </td>
									<td>
										<a href="#"> <img src="{{ asset('frontend/img/pdf.jpg') }}" alt="" style="height:25px;width:25px;">
									</a>
								</td>
								</tr>
							</table>
					   </p> 
					   <p mb-5>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
						   <br>
					   </p>
					</div> 
                </div>
            </div>
        </div>  
    </div>
    </div>
  </div>
  <!-- h2-top-service-area-end -->




@endsection