<?php
/**
 * Clean up the_excerpt()
 */
function uuatheme_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'uuatheme') . '</a>';
}
add_filter('excerpt_more', 'uuatheme_excerpt_more');



/**
 * Fix the woothemes testimonials use of the <!--more--> tag
 */

add_filter( 'woothemes_testimonials_content', 'uuatheme_wootestimonials_excerpts');

function uuatheme_wootestimonials_excerpts() {
    global $more;
    $real_more = $more;
    $more      = 0;
    $output    = wpautop( get_the_content('Read the full testimonial.') );
    $more      = $real_more;

    return $output;
}