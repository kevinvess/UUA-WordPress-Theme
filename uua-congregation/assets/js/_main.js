/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var uuatheme = {
  // All pages
  common: {
    init: function() {
      /* Toggles for search and location */
      $('.location-toggle').click(function () {
        $('.slide-location').toggleClass('active');
      });
      $('.search-toggle').click(function () {
        $('.slide-search').toggleClass('active');
      });
      /* FITVIDS - Target your .container, .wrapper, .post, etc. */
      $(".wrap").fitVids();
    }
  },
  // Home page
  home: {
    init: function() {
      /* MatchHeights */
      $(function() {
        $('.widget .thumbnail, .match').matchHeight();
      });
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = uuatheme;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

// Shortcode - Google Maps
var uuatheme_maps = function() {

    var map = [];
    $( '.uuatheme_map_canvas' ).each(function( i ) {
        var lat = $(this).data('lat'),
            lng = $(this).data('lng'),
            options = $(this).data('options');

        var location = new google.maps.LatLng( lat, lng );

        map[i] = new google.maps.Map(document.getElementById(this.id), {
            zoom: options.zoom,
            center: location,
            scrollwheel: ( 'true' === options.enablescrollwheel.toLowerCase() ) ? 1 : 0,
            disableDefaultUI: ( 'true' === options.disablecontrols.toLowerCase() ) ? 1 : 0,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({
            content: options.label
        });

        var marker = new google.maps.Marker({
            position: location,
            animation: google.maps.Animation.DROP,
            title: options.label,
            map: map[i]
        });

        google.maps.event.addListenerOnce( map[i], 'tilesloaded', function() {
            infowindow.open( map[i], marker );
        });
    });
}

$(document)
    .ready(UTIL.loadEvents)
    .ready(uuatheme_maps);

})(jQuery); // Fully reference jQuery after this point.
