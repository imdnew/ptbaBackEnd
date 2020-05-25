@extends('layouts.frontend')
@section('content')
@section('active-corus-link', 'active')

<div class="h2-top-close-to-menu-area">
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="h2-top-single-service wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    {{-- <div class="visible-lg-inline-block float-left mr-2" style="width:500px;height:300px;">
                        <img style="width:100%;height:100%;" src="{{ asset(Storage::disk('local')->url($article->link_image)) }}" alt="">
                    </div>  --}}   
                    <div class="content">
                        <h4 class="title text-success text-uppercase">Le CORUS </h4>
                        <hr>
                        <h4 class="title">Présentation de l'établissement </h4>
                        <p class="text text-justify mb-3">
                            Le Centre des Opérations de Réponse aux Urgences Sanitaires est une direction technique de l’Institut National de Santé Publique (INSP) crée par décret n°2018-0621/PRES/PM/MINEFID/MS/MESRSI du 18 juin 2018.
                            <br>
                        </p>
                        <h4 class="title">La vision </h4>
                        <div class="col-9">
                        <p class="text text-justify mb-3">
                            
                                <em class="text text-justify"> « Assurer le leadership dans la préparation collective, la coordination et la gestion des opérations liées aux risques et urgences sanitaires au Burkina Faso  à l’horizon 2023 »</em>
                            
                            <br>
                        </p>
                    </div>
                    <h4 class="title">Les Missions </h4>
                    <p class="text text-justify mb-3">
                        Les principales  missions assignées au CORUS sont :  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer la veille sanitaire pour détecter à temps les risques sanitaires et alerter en retour les autorités de santé pour une réponse précoce idoine ;                    
                    </p>
                    <p class="text text-justify pl-5">
                        -	organiser la collecte, l’analyse et l’interprétation des données relatives à la  gestion des urgences de santé publique ;                  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer la production et la diffusion de l’information relatives à la gestion  des urgences de santé publique ;                  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer la prise rapide de décisions opérationnelle et spécifique pour la gestion des événements de santé publique, en utilisant les meilleurs éléments disponibles : informations, politique, conseils techniques et plans ;                   
                    </p>
                    <p class="text text-justify pl-5">
                        -	coordonner les opérations de terrain ;                  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer la liaison entre les acteurs de la réponse d’urgence, le comité de coordination de la mise en œuvre du RSI (2005), les équipes d’intervention rapide à tous les niveaux du système de santé et les partenaires ;                  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer une communication et une coordination efficaces avec les partenaires de l’intervention pour favoriser la sensibilisation du public, les actions de proximité et la mobilisation sociale;                  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer la communication du risque ;                  
                    </p>
                    <p class="text text-justify pl-5">
                        -	assurer la mobilisation et le déploiement rapide des ressources (humaines, matérielles, financières) pour la gestion efficace des urgences de santé publique ;                  
                    </p>
                    <p class="text text-justify pl-5">
                        - assurer le suivi et l’évaluation de la mise en œuvre des différents plans entrant dans le cadre de la gestion du CORUS.	                  
                    </p>
                    <br>
                    <h4 class="title text-success text-uppercase">L'organisation du CORUS </h4>
                        <hr>
                        <h4 class="title">Les différentes sections de la Direction du CORUS :  </h4>
                        <p>
                            <img src="{{ asset('frontend/img/home2/orgacorus.png') }}" alt="" >
                        </p>
                        <p class="text text-justify mb-3">
                            Le CORUS est composé de six (06) sections qui sont :  
                        </p>
                        <p class="text text-justify pl-5">
                            - <strong>Surveillance des évènements sanitaires</strong> : Assure la veille sanitaire à travers l’organisation de la collecte, l’analyse et l’interprétation des données intra et intersectorielle en temps réél ;                 
                        </p>
                        <p class="text text-justify pl-5">
                            - <strong>Opérations</strong> : Coordonne et mets en œuvre la préparation, l’investigation et la réponse aux incidents ainsi que les exercices de simulation ;                   
                        </p>
                        <p class="text text-justify pl-5">
                            - <strong>Planning</strong> : Assure l’élaboration et la mise en œuvre des stratégies, des plans d’action et de ripostes, des directives ainsi que leur suivi et évaluation ;                  
                        </p>
                        <p class="text text-justify pl-5">
                            - <strong>Logistique</strong> : Coordonne la mobilisation et le déploiement du soutien logistique lors des interventions et de gestion d’incidents ainsi que les formalités de déploiement ;                   
                        </p>
                        <p class="text text-justify pl-5">
                            - <strong>Administration, finance et comptabilité</strong> : Assure la gestion des ressource humaines, matérielles et financières ;                  
                        </p>
                        <p class="text text-justify pl-5">
                            - <strong>Système d’information et communication</strong> : Coordonne l’élaboration et la mise en œuvre du schéma directeur du système d’information et pilote le système d'information ainsi que la communication sur les risques et  la surveillance des médias.                   
                        </p>
                        
<p mb-5>
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