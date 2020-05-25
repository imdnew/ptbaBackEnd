require('./bootstrap');
import Echo from 'laravel-echo'

let e = new Echo({
    broadcaster: 'socket.io',
    host: '//' + window.location.hostname + ':6001',
    cluster: 'mt1',
    encrypted: true
});

/**
 * Gestion de la carte et des diagrammes
 */

window._a = (function moduleApp(){
    var cnt = 0;
    var _url = '//' + window.location.hostname + ':' + window.location.port;
    var urlStatLocalites = _url + "/statsparlocalitecasconfirmes";
    var urlLastStatUpdateTime = _url + "/lus";
    var url_map = _url + '/ville/json';

    var villesG = null;
    var regionsG = null;
    var map = null;
    var lus = null;
    var lst = null;

    var colorN = '#ffc107' ;
    var colorG = '#2db756';
   // var colorD = '#a63f3d';
    var colorD = '#f03e3a';

    //if(document.getElementById('map-id')){
    map = L
        .map('map-id')
        .setView([
            12.3603119, -1.5163034
        ], 7);
    //}


    var createCustomIcon = function createCustomIcon(feature, latlng) {
        let myIcon = L.icon({
            iconUrl: _url + '/frontend/leaflet/images/map-icon.png',
            shadowUrl: _url + '/frontend/leaflet/images/marker-shadow.png',
            iconSize: [
                38, 40
            ], // width and height of the image in pixels
            shadowSize: [
                65, 30
            ], // width, height of optional shadow image
            iconAnchor: [
                12, 12
            ], // point of the icon which will correspond to marker's location
            shadowAnchor: [
                12, 6
            ], // anchor point of the shadow. should be offset
            popupAnchor: [10, 10] // point from which the popup should open relative to the iconAnchor
        })
        return L
            .marker(latlng, {icon: myIcon})
            .bindPopup('Ouagadougou')
            .openPopup();

    };

    var  onMapEachFeature = function onMapEachFeature(feature, layer) {

        layer.on({mouseover: oneMapMouseOver});
    };

    var oneMapMouseOver = function oneMapMouseOver(e) {
        var layer = e.target;

        var ville = layer.feature.properties.ville;
        var nouveau = layer.feature.properties.nouveaux;
        var deces = layer.feature.properties.deces;
        var guerison = layer.feature.properties.guerisons;
        var dated = layer.feature.properties.lastedate;

        var popupContent = "<b style='color:#000; font-size:1.5rem;'>" + ville + "</b></br>";
        if (parseInt(nouveau) > 0)
            popupContent += "<div><span class='' style='color:#ffc107; font-size:1.5rem;'>" + nouveau + "</span> cas confirmé(s)</div>";

        if (parseInt(guerison) > 0)
            popupContent += "<div><span class='' style='color:#2db756; font-size:1.5rem;'>" + guerison + "</span> guérison(s) </div>";

        if (parseInt(deces) > 0)
            popupContent += "<div><span class='' style='color:#a63f3d; font-size:1.5rem;'>" + deces + "</span> décès </div>";

        popupContent += "<p class='text-muted' style='text-align:center;font-style:italic'>A la date du <" +
            "em class='text-muted'>- <u>" + dated + "</u> -</p>";

        layer
            .bindPopup(popupContent)
            .openPopup();
    };

    var style = function style(feature) {
        return {
            weight: 1,
            opacity: 1,
            color: 'black',
            fillColor: 'green',
            dashArray: 3,
            fillOpacity: 0.2
        };
    };
// Radialize the colors
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    /** les variables de map et de stat */
    var stat2Chart = Highcharts.chart('stat2', {
        title: {
            text: 'Situations journalières (15 dern. jrs)'
        },
        xAxis: {
            categories: [],//TODO
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'nombre de cas'
            }
        },
        labels: {
            items: [
                {
                    html: 'Situation globale',
                    style: {
                        left: '50px',
                        top: '-18px',
                        color: (Highcharts.defaultOptions.title.style && Highcharts.defaultOptions.title.style.color) || 'black'
                    }
                }
            ]
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px;font-weight: bold;">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },

        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },

        },
        series: [
            {
                type: 'column',
                name: 'Cas confirmés',
                data: [], //TODO
                color: {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, colorN],
                        [1, Highcharts.color(colorN).brighten(-0.3).get('rgb')] // darken
                    ]
                },
            dataLabels: {
        enabled: true,
        inside: false,
                filter: {
                    property: 'y',
                    operator: '>',
                    value: 0
                }
    }
            }, {
                type: 'column',
                name: 'Guérisons',
                data: [], //TODO
                color: {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, colorG],
                        [1, Highcharts.color(colorG).brighten(-0.3).get('rgb')] // darken
                    ]
                },
                dataLabels: {
                    enabled: true,
                    inside: false,
                    filter: {
                        property: 'y',
                        operator: '>',
                        value: 0
                    }
                },
            }, {
                type: 'column',
                name: 'Décès',
                data: [], //TODO
                color: {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, colorD],
                        [1, Highcharts.color(colorD).brighten(-0.3).get('rgb')] // darken
                    ]
                },
                dataLabels: {
                    enabled: true,
                    inside: false,
                    filter: {
                        property: 'y',
                        operator: '>',
                        value: 0
                    }
                }
            }, {
                type: 'pie',
                name: 'Total ',
                data: [
                    {
                        name: 'Cas confirmés',
                        y: 0,
                        color: {
                            radialGradient: {
                                cx: 0.5,
                                cy: 0.3,
                                r: 0.7
                            },
                            stops: [
                                [0, colorN],
                                [1, Highcharts.color(colorN).brighten(-0.3).get('rgb')] // darken
                            ]
                        }

                    }, {
                        name: 'Guérisons',
                        y: 0,
                        color: {
                            radialGradient: {
                                cx: 0.5,
                                cy: 0.3,
                                r: 0.7
                            },
                            stops: [
                                [0, colorG],
                                [1, Highcharts.color(colorG).brighten(-0.3).get('rgb')] // darken
                            ]
                        }
                    }, {
                        name: 'Décès',
                        y: 0,
                        color: {
                            radialGradient: {
                                cx: 0.5,
                                cy: 0.3,
                                r: 0.7
                            },
                            stops: [
                                [0, colorD],
                                [1, Highcharts.color(colorD).brighten(-0.3).get('rgb')] // darken
                            ]
                        }
                    }
                ],
                center: [
                    40, 30
                ],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: true,
                    distance:-20,
                    formatter: function() {
                        return this.point.y;
                    }
                }
            }
        ]
    });

    var confirmeChart = Highcharts.chart('confirmer', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            options3d: {
                enabled: false,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Statistique des cas Confirmés par ville'
        },
        tooltip: {
            pointFormat: '{point.y:.f} cas confirmés '
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
               // innerSize: 30,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: <span style="color:'+colorN+'">{point.y:.f}</span> cas',
                    connectorColor: 'silver'
                }
            }
        },
        series: [
            {
                name: 'Cas',
                data: [] //TODO
            }
        ]
    });

    var guerirChart = Highcharts.chart('guerir', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            options3d: {
                enabled: false,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Statistique des cas guerisons par ville'
        },
        tooltip: {
            pointFormat: '{point.y:.f} guérisons '
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: <span style="color:'+colorG+'">{point.y:.f}</span> cas',
                    connectorColor: 'silver'
                }
            }
        },
        series: [
            {
                name: 'Cas',
                data: [] //TODO
            }
        ]
    });

    var decederChart = Highcharts.chart('deceder', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            options3d: {
                enabled: false,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Statistique des décès  par ville'
        },
        tooltip: {
            pointFormat: '{point.y:.f} décès '
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: <span style="color:'+colorD+'">{point.y:.f}</span> cas',
                    connectorColor: 'silver'
                }
            }
        },
        series: [
            {
                name: 'Cas',
                data: [] //TODO
            }
        ]
    });
    /** fin des variables de map et de stat */
    var getVillesG = function getVillesG(){
        return villesG;
    };

    var getRegionsG = function getRegionsG(){
        return RegionsG;
    };

    var updateMapWithGeoJson = function updateMap(geoJson){
        villesG.remove();
        villesG = L
            .geoJson(geoJson, {
                pointToLayer: createCustomIcon,
                onEachFeature: onMapEachFeature

            })
            .addTo(map);
    };

    var initMap = function initMap(data){
        let regions = JSON.parse(data.region);
        let villes = data.ville;

        regionsG = L
            .geoJson(regions, {style: style})
            .addTo(map);


        villesG = L
            .geoJson(villes, {
                pointToLayer: createCustomIcon,
                onEachFeature: onMapEachFeature
            })
            .addTo(map);

        let streets = L
            .tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
            .addTo(map);
    };

    var updateChartsWithGlobalStat = function updateCharts(donnee){
        processData(donnee);
    };

    var processData = function processData(donnee){
        let datas = donnee[0];

        stat2Chart
            .xAxis[0]
            .update({categories: datas.jourdates});
        stat2Chart
            .series[0]
            .update({data: datas.jourconfrimes});
        stat2Chart
            .series[1]
            .update({data: datas.jourgueris});
        stat2Chart
            .series[2]
            .update({data: datas.jourdeces});
        stat2Chart
            .series[3]
            .data[0]
            .update({
                y: parseInt(datas.sommeconfrimes)
            });
        stat2Chart
            .series[3]
            .data[1]
            .update({
                y: parseInt(datas.sommegueris)
            });
        stat2Chart
            .series[3]
            .data[2]
            .update({
                y: parseInt(datas.sommedeces)
            });

        var casconfirmesparville = new Array();
        for (var i = 0; i < datas.confrimes.length; i++) {
            casconfirmesparville.push({name: datas.confrimes[i].nom, y: datas.confrimes[i].casconfirmes})
        }
        confirmeChart
            .series[0]
            .update({data: casconfirmesparville});

        var casguerisparville = new Array();
        for (var i = 0; i < datas.gueris.length; i++) {
            casguerisparville.push({name: datas.gueris[i].nom, y: datas.gueris[i].guerisons})
        }
        guerirChart
            .series[0]
            .update({data: casguerisparville});

        var decesparville = new Array();
        for (var i = 0; i < datas.deces.length; i++) {
            decesparville.push({name: datas.deces[i].nom, y: datas.deces[i].deces})
        }
        decederChart
            .series[0]
            .update({data: decesparville});
    };

    var init = function init(){

        /** Recuperation de la derniere date de mise à jour*/
        $.ajax({
            url: urlLastStatUpdateTime,
            type: 'GET',
            dataType: 'json',
            error: function (data) {
                alert("Connexion instable...");
            },
            success: function (data) {
                lus = data.l;
                localStorage.setItem('lus',lus);

                /** construction des graphiques et map */

                var bl = localStorage.getItem('lus') > localStorage.getItem('lst');
                if(localStorage['mdata'] && !bl){
                    var mdata = JSON.parse(localStorage.getItem('mdata'));
                    var cdata = JSON.parse(localStorage.getItem('cdata'));
                    initMap(mdata);
                    processData(cdata);
                }else{/*Rehcerhce dans la BD*/
                    $.ajax({
                        url: url_map,
                        type: 'GET',
                        dataType: 'json',
                        error: function (data) {
                            alert("Connexion instable...");
                        },
                        success: function (data) {
                            localStorage.setItem('mdata',JSON.stringify(data));
                            localStorage.setItem('lst',lus);
                            initMap(data);
                        }
                    });

                    $.ajax({
                        url: urlStatLocalites,
                        type: 'GET',

                        dataType: 'json',
                        error: function (data) {
                            alert("Connexion instable !");
                        },
                        success: function (donnee) {
                            localStorage.setItem('cdata',JSON.stringify(donnee));
                            processData(donnee);

                            Highcharts.setOptions({
                                colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                    return {
                                        radialGradient: {
                                            cx: 0.5,
                                            cy: 0.3,
                                            r: 0.7
                                        },
                                        stops: [
                                            [
                                                0, color
                                            ],
                                            [
                                                1,
                                                Highcharts
                                                    .Color(color)
                                                    .brighten(-0.3)
                                                    .get('rgb')
                                            ] // darken
                                        ]
                                    };
                                })
                            });

                        }
                    });
                }

                /** fin construction des graphiques et map */

            }
        });
    };

    return {
        init:init,
        updateMapWithGeoJson:updateMapWithGeoJson,
        updateChartsWithGlobalStat:updateChartsWithGlobalStat,
        villesG:getVillesG,
        regionsG:getRegionsG,
        /* regionsG,
         map,
         _url,
         urlStatLocalites,
         url_map*/

    }

}());
//APPDATAS.init();
/**
 * Fin de Gestion de la carte et des diagrammes
 */


e
    .channel('covidstatChannel')
    .listen('.covidstat.newDeclaration', (e) => {
        var cc = parseInt($(".ccid").html());
        var cg = parseInt($(".cgid").html());
        var cd = parseInt($(".cdid").html());
        var cs = parseInt($(".csid").html());

        var _type = e.stat.typeenregistrement;
        var _nbc = parseInt(e.stat.nombrecas);
        switch (_type) {
            case 'nouveau':
                $(".ccid").html(_nbc + cc);
                $(".csid").html(_nbc + cs);
                break;
            case 'deces':
                $(".cdid").html(_nbc + cd);
                $(".csid").html(cs - _nbc);
                break;
            case 'guerison':
                $(".cgid").html(_nbc + cg);
                $(".csid").html(cs - _nbc);
                break;
            default:
        }

         var mapdata = JSON.parse(e.stat.mapdata);
         var statdata = JSON.parse(e.stat.statdata);

        _a.updateMapWithGeoJson(mapdata.ville);
        _a.updateChartsWithGlobalStat(statdata);

        // END START MAP
    })
