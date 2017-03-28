/* eslint-env browser */
(function() {
  'use strict';

  // Check to make sure service workers are supported in the current browser,
  // and that the current page is accessed from a secure origin. Using a
  // service worker from an insecure origin will trigger JS console errors. See
  // http://www.chromium.org/Home/chromium-security/prefer-secure-origins-for-powerful-new-features
  var isLocalhost = Boolean(window.location.hostname === 'localhost' ||
      // [::1] is the IPv6 localhost address.
      window.location.hostname === '[::1]' ||
      // 127.0.0.1/8 is considered localhost for IPv4.
      window.location.hostname.match(
        /^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/
      )
    );

  if ('serviceWorker' in navigator &&
      (window.location.protocol === 'https:' || isLocalhost)) {
    navigator.serviceWorker.register('service-worker.js')
    .then(function(registration) {
      // updatefound is fired if service-worker.js changes.
      registration.onupdatefound = function() {
        // updatefound is also fired the very first time the SW is installed,
        // and there's no need to prompt for a reload at that point.
        // So check here to see if the page is already controlled,
        // i.e. whether there's an existing service worker.
        if (navigator.serviceWorker.controller) {
          // The updatefound event implies that registration.installing is set:
          // https://slightlyoff.github.io/ServiceWorker/spec/service_worker/index.html#service-worker-container-updatefound-event
          var installingWorker = registration.installing;

          installingWorker.onstatechange = function() {
            switch (installingWorker.state) {
              case 'installed':
                // At this point, the old content will have been purged and the
                // fresh content will have been added to the cache.
                // It's the perfect time to display a "New content is
                // available; please refresh." message in the page's interface.
                break;

              case 'redundant':
                throw new Error('The installing ' +
                                'service worker became redundant.');

              default:
                // Ignore
            }
          };
        }
      };
    }).catch(function(e) {
      console.error('Error during service worker registration:', e);
    });
  }

  // Inicio del JS



  /**
   * OBTIENE LOS VIDEOS
   */
  $("#enviar").on('click', function(e) {
    e.preventDefault();
    var video_id = $("#video_id").val();
    $("#respuesta").html("Buscando video...")
    $.post('/ajax.php',{
      'codigo_youtube'  : video_id,
      'accion' : 'buscar_video'
      }, function(response){
        $("#respuesta").html(response)
      });
  })

  /*
    guarda el video
   */
  $("#respuesta").delegate('#guardar-video','click', function(e) {
    e.preventDefault();
    var video_id = $(this).data("videoid");
    var video_title = $(this).data("videotitle");
    var video_desc = $(this).data("videodescripcion");
    $("#respuesta").html("Guardando video...")
    $.post('/ajax.php',{
      'codigo_youtube'  : video_id,
      'titulo_video'  : video_title,
      'descripcion_video' : video_desc,
      'accion' : 'guardar_video'
      }, function(response){
        $("#respuesta").html(response)
      });
  })



})();
