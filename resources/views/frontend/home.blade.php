@extends('layouts.frontend')
@section('content')
@section('active-home-link', 'active')
<!-- h2-top-service-area-start -->
<div class="h2-top-map-area">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-8 col-sm-8 col-12">
              <div class="h2-top-single-service wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms" style="padding: 0; margin: 0px">
                 
                  <div id="map-id" class="content" style="min-height: 500px">
                    
                      
                  </div>
              </div>
          </div>
         
          <div class="col-lg-4 col-md-4 col-sm-4 col-12">
              
                      <!--<h2 class="title">Information preventive</h2>
                      h3-testimonial-area-start -->
    <div class="h3-testimonial-area bg-with-black" style="min-height: 100%;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-12">
                    <div class="h3-section-title color-white">
                        <h2 class="title">Communiqués</h2>
                                            </div>
                </div>
            </div>
            <div class="h3-testimonial-carousel owl-carousel">
                @foreach($communiques as $communique)
                <div class="h3-single-testimonial">
                    <p style="color:#fff" class="text-justify"><b> {{ $communique->title}} </b> <br>
                        {{ strip_tags($communique->description) }}
                    </p>
                </div>
                @endforeach

                <div class="h3-single-testimonial">
                    <p style="color:#fff" class="text-justify"> <b> Covid-19 au Burkina : Des précisions sur la mise en quarantaine des villes</b><br>


                        "Depuis le 27 mars, personne ne rentre et personne ne sort des villes où il y au moins un cas de contagion au covid-19. Cette décision vise à rompre la chaîne de contamination, parce que c'est le premier foyer, Ouagadougou qui a distribué le virus aux autres villes", a indiqué le ministre de la Communication, Remis Fulgance Dandjinou.</p>
                   
                </div>
                <div class="h3-single-testimonial">
                    <p style="color:#fff" class="text-justify"><b> Fermeture des marchés depuis le 26 mars </b> <br>
                        Le gouverneur de la région du centre Sibiri de Issa Ouédraogo et le maire de la commune de Ouagadougou Armand Pierre Béouindé ont conjointement animé dans la soirée du mardi, 24 mars 2020 à Ouagadougou, un point de presse sur les mesures prises pour lutter contre le covid-19. De ces mesures, 36 marchés et des marchés itinérants seront fermés depuis le 26 mars 2020.
                    </p>
                </div>
               
                
            </div>
            <div class="h2ss-social" >
                <ul>
                   - <li class="facebook"><a href="https://web.facebook.com/sigbf226" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="twitter"><a href="https://twitter.com/sigbf" target="_blank"><i class="fab fa-twitter"></i></a></li> -
                 </ul>
            </div>
            
        </div>
        
    </div>
    <!-- h3-testimonial-area-end -->
                      
          </div>
      </div>
  </div>
</div>



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


<!-- h2-service-area-start -->
<div class="h2-service-area">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
              <div class="h2-section-title">
                  <h2 class="title">Les services</h2>
                  
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-3 col-md-6 col-12">
              <div class="h2-single-service wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                  <div class="icon">
                      <span class="flaticon-project"></span>
                  </div>
                  <div class="content">
                    <a href="http://www.secka.gov.bf" target="_blank"><h2 class="title">Conférence</h2></a>
                      <p class="text">Une solution de communication unifiée à travers l’intégration d’un système web de visioconférence.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
              <div class="h2-single-service wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                  <div class="icon">
                      <span class="flaticon-diamond"></span>
                  </div>
                  <div class="content">
                    <a href="https://maladiecoronavirus.fr/se-tester" target="_blank"><h2 class="title">Se tester</h2></a>
                      <p class="text">Il s'agit de formulaire de simulation de test de corona virus. </p>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
              <div class="h2-single-service wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                <div class="icon">
                    <span class="flaticon-support-1"></span>
                </div>
                  <div class="content">
                      <a href="https://api.whatsapp.com/send?phone=22671950419" target="_blank">
                      <h2 class="title">Whatsapp</h2></a>
                      <p class="text">Il s'agit d'un système de contact du Corus par message whatsapp en ligne.</p>
                  </div>
              </div>
          </div> 
          <div class="col-lg-3 col-md-6 col-12">
            <div class="h2-single-service wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
              <div class="icon">
                  <span class="flaticon-chat-1"></span>
              </div>
                <div class="content">
                    <a href="https://discuss.gov.bf/c/covid19-BF/" target="_blank">
                    <h2 class="title">Forum</h2></a>
                    <p class="text">Il s'agit d'un espace d'echanges sur des sujets données en ligne. </p>
                </div>
            </div>
        </div> 
         
      </div>
  </div>
</div>
<!-- h2-service-area-end -->
<!-- covid-prseentation-area-end -->
<div class="h2-top-stat-area">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="h2-section-title">
{{--                     <h2 class="title">Covid19</h2>
 --}}                    <h2 class="title">Rumeurs Covid19</h2>
                    
                </div>
           
                <div class="h2-top-single-stat wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms" style="padding: 12px">
                    
                    <div  class="content" style="height: 320px">
                        <div class="h2-testimonial-carousel owl-carousel">
                            {{-- <div class="h2-single-testimonial" style="height: 300px">
                                <p > <b> Qu'est-ce que la COVID 19 ?</b><br> 
                                    La COVID-19 est une maladie infectieuse de la famille des coronavirus. Elle découle d’un nouveau virus, le SRAS-CoV-2, apparu à Wuhan, en Chine, en décembre 2019. Au moins deux souches du virus ont jusqu’ici été identifiées.</p>
                           </div>
                            <div class="h2-single-testimonial" style="height: 300px">
                                <p ><b> Comment se protéger contre la COVID19 ?</b> <br>
                                    Le moyen le plus efficace est le lavage des mains avec une solution hydroalcoolique ou avec de l’eau et du savon, et ce, plusieurs fois par jour pendant au moins 20 secondes. Ne portez pas vos mains à votre visage. En étant en contact avec des surfaces contaminées, vos mains peuvent exposer le virus à votre organisme par les muqueuses de votre bouche, de votre nez ou de vos yeux. Évitez de toucher les surfaces publiques. Nettoyez et désinfectez les objets touchés fréquemment, comme votre téléphone.</p>
                            </div>
                            <div class="h2-single-testimonial" style="height: 300px">
                                <p ><b> Les Masques peuvent-ils nous protéger contre le coronavirus ?</b> <br>
                                    Seules les personnes infectées ou celles qui s’occupent d’une personne malade devraient porter un masque. Son usage doit être unique. Le masque évite d’exposer les autres à la maladie, mais ne vous protège pas davantage puisque le virus voyage plus souvent par vos mains. Un lavage fréquent demeure plus efficace. Les gants ne protègent pas plus du virus, puisque celui-ci peut s’y trouver et ainsi poser un risque si vous touchez votre visage.</p>
                            </div>
                            <div class="h2-single-testimonial" style="height: 300px">
                                <p >
                                    <b> Que faire si je pense être atteint du coronavirus ?</b> 
                                    <br>
                                    Restez à la maison! Vous ne voudriez pas contaminer quelqu’un d’autre. Lorsque vous toussez ou éternuez, couvrez votre bouche et votre nez avec le pli du coude. Si vous vous mouchez, jetez immédiatement le mouchoir. La majorité des personnes infectées n’ont que des symptômes bénins et guérissent. Communiquez toutefois avec l’autorité de santé publique de votre département pour l’en informer et obtenir la marche à suivre.</p>
                            </div>

                            <div class="h2-single-testimonial" style="height: 300px">
                                <p ><b> Suis-je à risque de l'attraper? </b> <br>
                                    Le risque de contracter le coronavirus au pays varie selon les départements. Il se transmettrait toutefois aussi vite que la grippe saisonnière. Si vous revenez de l’étranger, ou côtoyez quelqu’un qui revient d’un pays où sévit l’épidémie de coronavirus, surveillez votre état de santé.</p>
                            </div> --}}
                            <div class="h2-single-testimonial" style="height: 300px">
                                <p ><b> FAIT ÉTABLI : Boire de l'alcool ne protège pas contre la COVID-19 et peut être dangereux</b> <br>
                                    Une consommation fréquente ou excessive d'alcool peut augmenter les risques pour votre santé.  </p>                           
                             </div>
                            <div class="h2-single-testimonial" style="height: 300px">
                                <p ><b> FAIT ÉTABLI : S'exposer au soleil ou à des températures supérieures à 25 °C n'empêche pas de contracter la maladie à coronavirus 2019 (COVID-19)</b> <br>
                                    Vous pouvez contracter la COVID-19 sous n'importe quel climat, même par temps chaud ou ensoleillé. Les pays où le climat est chaud ont rapporté des cas de COVID-19. Pour vous protéger, veillez à vous laver les mains fréquemment et soigneusement et évitez de vous toucher les yeux, la bouche et le nez.        </p>                       
                             </div>
                            <div class="h2-single-testimonial" style="height: 300px">
                                <p ><b> FAIT ÉTABLI : On peut guérir de la maladie à coronavirus 2019 (COVID-19). Attraper ce nouveau coronavirus ne signifie pas qu'on va le garder toute la vie.</b> <br>
                                    La majorité des personnes qui contractent la COVID-19 peuvent guérir et éliminer le virus de leur organisme. Si vous contractez la maladie, assurez-vous de traiter vos symptômes. Si vous avez de la toux, de la fièvre et des difficultés respiratoires, consultez rapidement un médecin. La majorité des patients guérissent grâce à un traitement de soutien.
                                    Le virus de la COVID-19 peut se transmettre sous les climats chauds et humides. </p>
                               </div>
                            
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                
                <div class="h2-section-title">
{{--                     <h2 class="title">Sensibilisations</h2>
 --}}                    <h2 class="title">Message Ministère de la Santé</h2>
                    
                </div>
                <div class="h2-portfolio-area wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    
                    <div  class="content" style="height: 320px">
                        {{-- <div class="h2-portfolio-carousel owl-carousel">
                            
                            <div class="h2-portfolio-box portfolio-box" >
                                <a href="{{ asset('frontend/img/home2/c5.png') }}" data-fancybox="images" style="width: 100%; max-height: 350px">
                                    <i class="flaticon-add-circular-outlined-button" style="width: 100px; height: 100px"></i>
                                    <img src="{{ asset('frontend/img/home2/c5.png') }}" alt="" />
                                </a>
                                <div class="content">
                                    <h4 class="title">Affiche</h4>
                                   </div>     
                            </div>
                            <div class="h2-portfolio-box portfolio-box" >
                                <a href="{{ asset('frontend/img/home2/c4.png') }}" data-fancybox="images" style="width: 100%; max-height: 350px">
                                    <i class="flaticon-add-circular-outlined-button" style="width: 100px; height: 100px"></i>
                                    <img src="{{ asset('frontend/img/home2/c4.png') }}" alt="" />
                                </a>
                                <div class="content">
                                    <h4 class="title">Affiche</h4>
                                   </div>
                                </div>
                            <div class="h2-portfolio-box portfolio-box" >
                                <a href="{{ asset('frontend/img/home2/c3.png') }}" data-fancybox="images" style="width: 100%; max-height: 350px">
                                    <i class="flaticon-add-circular-outlined-button" style="width: 100px; height: 100px"></i>
                                    <img src="{{ asset('frontend/img/home2/c3.png') }}" alt="" />
                                </a>
                                <div class="content">
                                    <h4 class="title">Affiche</h4>
                                   </div> </div>
                            
                        </div> --}}
                             <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jtxFXUeysHo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>
                </div>
            </div>
           
        </div>
    </div>
  </div>
  <!-- covid19-presentation-area-end -->


<!-- h2-blog-area-start -->
<div class="h2-blog-area">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
              <div class="h2-section-title">
                  <h2 class="title">Actualités/Activités</h2>
                  
              </div>
          </div>
      </div>
      <div class="row justify-content-left">
          @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 col-sm-8 col-12">
                <div class="h2-single-blog">
                    <div class="img bg-with-black m-2" style="width:327px;height:174px;overflow:hidden;">
                        <a href="{{ route('article.read', $article->alias) }}">
                            <img src="{{ asset(Storage::disk('local')->url($article->link_image)) }}" alt="" style="width:100%;height:auto;" class="img-fluid">
                        </a>
                    </div>
                    <div class="content">
                        <h4 class="title">{{ $article->title }}
                            <em class="text-secondary publicationdate"><u>({{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }})</u></em>
                        </h4>
                        <p class="text">{{ \Illuminate\Support\Str::words(strip_tags($article->description),60) }} <a href="{{ route('article.read', $article->alias) }}" class="lirelasuite">Lire la suite  </a></p>
                        
                    </div>
                </div>
          </div>
          @endforeach
          
      </div>
  </div>
</div>
<!-- h2-blog-area-end -->

<!-- counter-stats-area-end -->
<div class="h2-top-stat-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
                <div class="h2-section-title">
                    <h2 class="title">Quelques Statistiques</h2>
                    
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="h2-top-single-stat wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms" style="padding: 12px">
                    
                    <div id="confirmer" class="content" style="min-height: 450px">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="h2-top-single-stat wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    
                    <div id="stat2" class="content" style="min-height: 450px">
                       
                    </div>
                </div>
            </div>
           
        </div>
    </div>
  </div>
  <!-- h2-top-stat-area-end -->


<!-- h2-get-start-area-start -->
<div class="h2-get-start-area">
  <div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
            <div class="h2-section-title">
                <h2 class="title text-white" >Mesures de prévention individuelles et collectives</h2>
                
            </div>
        </div>
    </div>
      <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
              <div class="h2gsa-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="height:100%;">
               <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7aLM4Goa5K4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
              <div class="h2gsa-link wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" style="height:100%;width:100%;">
<!--                <img src="{{ asset('frontend/img/covidhygiene.jpeg') }}" alt="" style="height:100%;width:100%;">
-->                <img src="{{ asset('frontend/img/gestesbarrieres/femme-enceinte-1.jpeg') }}" alt="" style="height:100%;width:100%;">
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
            <div class="h2gsa-link wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                <img src="{{ asset('frontend/img/gestesbarrieres/femme-enceinte-2.jpeg') }}" alt="" style="height:100%;width:100%;">
            </div>
        </div>


          <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
              <div class="h2gsa-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="height:100%;">
                  <img src="{{ asset('frontend/img/gestesbarrieres/femme-allaitante.jpeg') }}" alt="" style="height:100%;width:100%;">
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
              <div class="h2gsa-link wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" style="height:100%;width:100%;">
                  <img src="{{ asset('frontend/img/gestesbarrieres/couple-1.jpeg') }}" alt="" style="height:100%;width:100%;">
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
              <div class="h2gsa-link wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                  <img src="{{ asset('frontend/img/gestesbarrieres/couple-2.jpeg') }}" alt="" style="height:100%;width:100%;">

              </div>
          </div>


          <div class="col-lg-4 col-md-6 col-sm-12 col-12">
              <div class="h2gsa-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms" style="height:100%;">
                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7aLM4Goa5K4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12">
              <div class="h2gsa-link wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" style="height:100%;width:100%;">
                  <img src="{{ asset('frontend/img/covidhygiene.jpeg') }}" alt="" style="height:100%;width:100%;">
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 col-12">
              <div class="h2gsa-link wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                  <p style="color:#fff"><b> Quels sont les symptômes?</b> <br>

                      Les symptômes du coronavirus se développent en 2 à 14 jours. Les plus courants s’apparentent à ceux de la grippe ou à un mauvais rhume : de la fièvre, de la fatigue, de la toux et des difficultés respiratoires. Certaines personnes éprouvent également

                      des douleurs, de la congestion, un écoulement nasal, des maux de gorge ou ont la diarrhée.</p>
              </div>
          </div>

  </div>
</div>
<!-- h2-get-start-area-end -->
    <div id="deceder" style="display:none;"></div>
    <div id="guerir" style="display:none;"></div>

@endsection