(function () {
  

  'use strict';
  googleMap();
}());

function googleMap() {
  var windowHeight = $(window).height();
  var myMap = [];
  var geocodingMap, markers = [], map = $('.map'), iterator = 1;
  var iteratorAddress = null;
  var routeLat = 51.50853, routeLng = -0.12574;
  map.each(function () {
    var mapStyle = [];
    if ($(this).data('map-height')) {
      $(this).css('height', $(this).data('map-height'));
      if ($(this).data('map-height') === '100%') {
        $(this).parent().css('height', windowHeight);
        $(this).css('height', windowHeight + 40);
        if ($('.section-fullmap .row').height() > windowHeight) {
          $(this).parent().css('height', $('.section-fullmap .row').height() + 120);
          $(this).css('height', $('.section-fullmap .row').height() + 160);
        }
      }
    }
    if ($(this).data('map-width')) {
      $(this).css('width', $(this).data('map-width'));
    }
    if ($(this).hasClass('map-header')) {
      $(this).css('height', $(this).parent().height());
    }
    if ($(this).data('map-style') === 'blue') {
      mapStyle = [
        {
          'featureType': 'water',
          'stylers': [
            { 'saturation': 43 },
            { 'lightness': -11 },
            { 'hue': '#0088ff' }
          ]
        },
        {
          'featureType': 'road',
          'elementType': 'geometry.fill',
          'stylers': [
            { 'hue': '#ff0000' },
            { 'saturation': -100 },
            { 'lightness': 99 }
          ]
        },
        {
          'featureType': 'road',
          'elementType': 'geometry.stroke',
          'stylers': [
            { 'color': '#808080' },
            { 'lightness': 54 }
          ]
        },
        {
          'featureType': 'landscape.man_made',
          'elementType': 'geometry.fill',
          'stylers': [{ 'color': '#ece2d9' }]
        },
        {
          'featureType': 'poi.park',
          'elementType': 'geometry.fill',
          'stylers': [{ 'color': '#ccdca1' }]
        },
        {
          'featureType': 'road',
          'elementType': 'labels.text.fill',
          'stylers': [{ 'color': '#767676' }]
        },
        {
          'featureType': 'road',
          'elementType': 'labels.text.stroke',
          'stylers': [{ 'color': '#ffffff' }]
        },
        {
          'featureType': 'poi',
          'stylers': [{ 'visibility': 'off' }]
        },
        {
          'featureType': 'landscape.natural',
          'elementType': 'geometry.fill',
          'stylers': [
            { 'visibility': 'on' },
            { 'color': '#b8cb93' }
          ]
        },
        {
          'featureType': 'poi.park',
          'stylers': [{ 'visibility': 'on' }]
        },
        {
          'featureType': 'poi.sports_complex',
          'stylers': [{ 'visibility': 'on' }]
        },
        {
          'featureType': 'poi.medical',
          'stylers': [{ 'visibility': 'on' }]
        },
        {
          'featureType': 'poi.business',
          'stylers': [{ 'visibility': 'simplified' }]
        }
      ];
    }
    if ($(this).data('map-style') === 'turquoise') {
      mapStyle = [
        {
          'featureType': 'landscape.natural',
          'elementType': 'geometry.fill',
          'stylers': [
            { 'visibility': 'on' },
            { 'color': '#e0efef' }
          ]
        },
        {
          'featureType': 'poi',
          'elementType': 'geometry.fill',
          'stylers': [
            { 'visibility': 'on' },
            { 'hue': '#1900ff' },
            { 'color': '#c0e8e8' }
          ]
        },
        {
          'featureType': 'road',
          'elementType': 'geometry',
          'stylers': [
            { 'lightness': 100 },
            { 'visibility': 'simplified' }
          ]
        },
        {
          'featureType': 'road',
          'elementType': 'labels',
          'stylers': [{ 'visibility': 'off' }]
        },
        {
          'featureType': 'transit.line',
          'elementType': 'geometry',
          'stylers': [
            { 'visibility': 'on' },
            { 'lightness': 700 }
          ]
        },
        {
          'featureType': 'water',
          'elementType': 'all',
          'stylers': [{ 'color': '#7dcdcd' }]
        }
      ];
    }
    if ($(this).data('map-style') === 'dark') {
      mapStyle = [
        {
          'featureType': 'all',
          'elementType': 'labels.text.fill',
          'stylers': [
            { 'saturation': 36 },
            { 'color': '#000000' },
            { 'lightness': 40 }
          ]
        },
        {
          'featureType': 'all',
          'elementType': 'labels.text.stroke',
          'stylers': [
            { 'visibility': 'on' },
            { 'color': '#000000' },
            { 'lightness': 16 }
          ]
        },
        {
          'featureType': 'all',
          'elementType': 'labels.icon',
          'stylers': [{ 'visibility': 'off' }]
        },
        {
          'featureType': 'administrative',
          'elementType': 'geometry.fill',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 20 }
          ]
        },
        {
          'featureType': 'administrative',
          'elementType': 'geometry.stroke',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 17 },
            { 'weight': 1.2 }
          ]
        },
        {
          'featureType': 'landscape',
          'elementType': 'geometry',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 20 }
          ]
        },
        {
          'featureType': 'poi',
          'elementType': 'geometry',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 21 }
          ]
        },
        {
          'featureType': 'road.highway',
          'elementType': 'geometry.fill',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 17 }
          ]
        },
        {
          'featureType': 'road.highway',
          'elementType': 'geometry.stroke',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 29 },
            { 'weight': 0.2 }
          ]
        },
        {
          'featureType': 'road.arterial',
          'elementType': 'geometry',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 18 }
          ]
        },
        {
          'featureType': 'road.local',
          'elementType': 'geometry',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 16 }
          ]
        },
        {
          'featureType': 'transit',
          'elementType': 'geometry',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 19 }
          ]
        },
        {
          'featureType': 'water',
          'elementType': 'geometry',
          'stylers': [
            { 'color': '#000000' },
            { 'lightness': 17 }
          ]
        }
      ];
    }
    if ($(this).data('map-style') === 'black-white') {
      mapStyle = [
        {
          'featureType': 'landscape',
          'stylers': [
            { 'saturation': -100 },
            { 'lightness': 65 },
            { 'visibility': 'on' }
          ]
        },
        {
          'featureType': 'poi',
          'stylers': [
            { 'saturation': -100 },
            { 'lightness': 51 },
            { 'visibility': 'simplified' }
          ]
        },
        {
          'featureType': 'road.highway',
          'stylers': [
            { 'saturation': -100 },
            { 'visibility': 'simplified' }
          ]
        },
        {
          'featureType': 'road.arterial',
          'stylers': [
            { 'saturation': -100 },
            { 'lightness': 30 },
            { 'visibility': 'on' }
          ]
        },
        {
          'featureType': 'road.local',
          'stylers': [
            { 'saturation': -100 },
            { 'lightness': 40 },
            { 'visibility': 'on' }
          ]
        },
        {
          'featureType': 'transit',
          'stylers': [
            { 'saturation': -100 },
            { 'visibility': 'simplified' }
          ]
        },
        {
          'featureType': 'administrative.province',
          'stylers': [{ 'visibility': 'off' }]
        },
        {
          'featureType': 'water',
          'elementType': 'labels',
          'stylers': [
            { 'visibility': 'on' },
            { 'lightness': -25 },
            { 'saturation': -100 }
          ]
        },
        {
          'featureType': 'water',
          'elementType': 'geometry',
          'stylers': [
            { 'hue': '#ffff00' },
            { 'lightness': -25 },
            { 'saturation': -97 }
          ]
        }
      ];
    }
    var currentMap = '#' + $(this).attr('id'), $this = $(this), opts = null, pluginOptions = $this.data('plugin-options'), defaults = {
        'div': currentMap,
        'lat': -12.043333,
        'lng': -77.028333,
        'zoom': 16,
        'panControl': true,
        'mapTypeControl': true,
        'zoomControl': true,
        'scrollwheel': false,
        'streetViewControl': false,
        'overviewMapControl': true,
        'styles': mapStyle
      };
    opts = $.extend({}, defaults, pluginOptions);
    if ($(this).attr('id') === 'map-route') {
      geocodingMap = new GMaps(opts);
      var routeLat = pluginOptions.lat;
      var routeLng = pluginOptions.lng;
      geocodingMap.addMarker({
        lat: routeLat,
        lng: routeLng,
        title: 'Our office',
        infoWindow: { content: '<p>Our office</p>' },
        icon: 'assets/img/map-markers/blue.png'
      });
      return;
    } else {
      myMap[iterator] = new GMaps(opts);
    }
    if (pluginOptions !== undefined && pluginOptions.address) {
      var iteratorAddress = iterator;
      GMaps.geocode({
        address: pluginOptions.address,
        callback: function (results, status) {
          if (status === 'OK') {
            var latlng = results[0].geometry.location;
            myMap[iteratorAddress].setCenter(latlng.lat(), latlng.lng());
            if (!$this.data('markers')) {
              myMap[iteratorAddress].addMarker({
                lat: pluginOptions.lat ? pluginOptions.lat : latlng.lat(),
                lng: pluginOptions.lng ? pluginOptions.lng : latlng.lng(),
                title: 'Here we are',
                infoWindow: { content: '<p>Find us here</p>' },
                icon: $this.data('marker-img') ? $this.data('marker-img') : 'assets/img/map-markers/dark.png'  // null = default icon
              });
            }
          }else{
            myMap[iteratorAddress].addMarker({
              lat: -37.814107,
              lng: 144.963280,
              title: 'Here we are',
              infoWindow: { content: '<p>Find us here</p>' },
              icon: 'assets/img/map-markers/dark.png'
            });
          }
        }
      });
    }
    if ($this.data('markers') && pluginOptions.lat && pluginOptions.lng) {
      var markersOptions = $this.data('markers');
      if (markersOptions === 'none') {
        return;
      }
      $.map(markersOptions, function (val, i) {
        myMap[iterator].addMarker({
          lat: val.lat ? val.lat : pluginOptions.lat,
          lng: val.lng ? val.lng : pluginOptions.lng,
          icon: val.icon ? val.icon : 'assets/img/map-markers/dark.png',
          title: val.title ? val.title : null,
          infoWindow: { content: val.title ? '<p>' + val.title + '</p>' : null }
        });
      });
    }  
    /* We add a default marker in the center of the map if there is no markers details */ 
    else if (pluginOptions !== undefined && pluginOptions.lat && pluginOptions.lng) {
      myMap[iterator].addMarker({
        lat: pluginOptions.lat ? pluginOptions.lat : latlng.lat(),
        lng: pluginOptions.lng ? pluginOptions.lng : latlng.lng(),
        title: 'Here we are',
        infoWindow: { content: '<p>Find us here</p>' },
        icon: $this.data('marker-img') ? $this.data('marker-img') : 'assets/img/map-markers/dark.png'  // null = default icon
      });
    }
    iterator++;
  });
  /* Get Address from text input */
  $('#geocoding_form').submit(function (e) {
    e.preventDefault();
    GMaps.geocode({
      address: $('#address').val().trim(),
      callback: function (results, status) {
        if (status === 'OK') {
          var latlng = results[0].geometry.location;
          geocodingMap.drawRoute({
            origin: [
              latlng.lat(),
              latlng.lng()
            ],
            destination: [
              routeLat,
              routeLng
            ],
            travelMode: 'driving',
            strokeColor: '#6AA1B8',
            strokeOpacity: 0.6,
            strokeWeight: 6
          });
          geocodingMap.addMarker({
            lat: latlng.lat(),
            lng: latlng.lng(),
            icon: 'assets/img/map-markers/dark.png',
            infoWindow: { content: '<p>You\'re here</p>' }
          });
        }
      }
    });
  });
}