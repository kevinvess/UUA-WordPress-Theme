(function( $ ) {
    "use strict";
    
    wp.customize( 'uuatheme_layout', function( value ) {
        value.bind( function( to ) {
            $( '#content' ).removeClass().addClass( to + ' clearfix' );
        } );
    });
    
 
})( jQuery );