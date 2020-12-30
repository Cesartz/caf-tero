function initMap() {
  //ubicaciones y direcciones aqui
  var locations = [
    [
      'Calle Liverpool 165, Col.Juarez CDMX',
      19.424040723530577,
      -99.16542395715213,
      4,
    ],
  ];

  window.map = new google.maps.Map(document.getElementById('map'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [
      { elementType: 'geometry', stylers: [{ color: '#f5f5f5' }] },
      { elementType: 'labels.icon', stylers: [{ visibility: 'off' }] },
      { elementType: 'labels.text.fill', stylers: [{ color: '#616161' }] },
      { elementType: 'labels.text.stroke', stylers: [{ color: '#f5f5f5' }] },
      {
        featureType: 'administrative.land_parcel',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#bdbdbd' }],
      },
      {
        featureType: 'poi',
        elementType: 'geometry',
        stylers: [{ color: '#eeeeee' }],
      },
      {
        featureType: 'poi',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#757575' }],
      },
      {
        featureType: 'poi.park',
        elementType: 'geometry',
        stylers: [{ color: '#e5e5e5' }],
      },
      {
        featureType: 'poi.park',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#9e9e9e' }],
      },
      {
        featureType: 'road',
        elementType: 'geometry',
        stylers: [{ color: '#ffffff' }],
      },
      {
        featureType: 'road.arterial',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#757575' }],
      },
      {
        featureType: 'road.highway',
        elementType: 'geometry',
        stylers: [{ color: '#dadada' }],
      },
      {
        featureType: 'road.highway',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#616161' }],
      },
      {
        featureType: 'road.local',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#9e9e9e' }],
      },
      {
        featureType: 'transit.line',
        elementType: 'geometry',
        stylers: [{ color: '#e5e5e5' }],
      },
      {
        featureType: 'transit.station',
        elementType: 'geometry',
        stylers: [{ color: '#eeeeee' }],
      },
      {
        featureType: 'water',
        elementType: 'geometry',
        stylers: [{ color: '#c9c9c9' }],
      },
      {
        featureType: 'water',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#9e9e9e' }],
      },
    ],
  });

  var infowindow = new google.maps.InfoWindow();
  var bounds = new google.maps.LatLngBounds();
  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map,
      icon: 'images/icon-andamos.png',
    });
    bounds.extend(marker.position);
    google.maps.event.addListener(
      marker,
      'click',
      (function (marker, i) {
        return function () {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        };
      })(marker, i)
    );
  }
  map.fitBounds(bounds);
  var listener = google.maps.event.addListener(map, 'idle', function () {
    map.setZoom(13);
    google.maps.event.removeListener(listener);
  });
}

$(document).ready(function () {
  //token de instagram aqui
  var token =
      'IGQVJYUmlrZATJDd0dwQlR1M1pPSHdaY3hQRG4wQUdmcU1QblFmd1V3anZAxSzJNaFJSNVgtTHpYenpPcjlCb3VCSWJmVVVCZA1d4eC1xa2tYMkFIY2FDbm1CZA2VIZAnNnQUhhMjRXSjIzYWRXRWF0ZAW5LRk16RXg0U05ZAejZAJ',
    num_photos = 10;
  $.ajax({
    url: 'https://graph.instagram.com/17841431079941278/media',
    dataType: 'jsonp',
    type: 'GET',
    data: { access_token: token, fields: 'id,media_type,media_url' },
    success: function (data) {
      console.log(data);
      for (x in data.data) {
        $('#instafeed').append(
          '<li><span><img src="' + data.data[x].media_url + '"></span></li>'
        );
      }
      $('#instafeed').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1099,
            settings: { slidesToShow: 4, slidesToScroll: 1 },
          },
          { breakpoint: 992, settings: { slidesToShow: 3, slidesToScroll: 1 } },
          { breakpoint: 530, settings: { slidesToShow: 2, slidesToScroll: 1 } },
        ],
      });
      $('#productsSlider').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1099,
            settings: { slidesToShow: 4, slidesToScroll: 1 },
          },
          { breakpoint: 992, settings: { slidesToShow: 3, slidesToScroll: 1 } },
          { breakpoint: 530, settings: { slidesToShow: 2, slidesToScroll: 1 } },
        ],
      });
    },
    error: function (data) {
      console.log(data);
    },
  });
});
