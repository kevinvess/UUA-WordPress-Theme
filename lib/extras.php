<?php
/**
 * Allow html in the excerpt
 */

if ( ! function_exists('uua_html_excerpt') ) {

    function uua_html_excerpt($text) { // Fakes an excerpt if needed
        global $post;
        if ( '' == $text ) {
            $text = get_the_content('');
            $text = apply_filters('the_content', $text);
            $text = str_replace('\]\]\>', ']]&gt;', $text);
            /*just add all the tags you want to appear in the excerpt --
            be sure there are no white spaces in the string of allowed tags */
            $text = strip_tags($text,'<p><br><b><a><em><strong>');
            /* you can also change the length of the excerpt here, if you want */
            $excerpt_length = 45;
            $words = explode(' ', $text, $excerpt_length + 1);
            if (count($words)> $excerpt_length) {
                array_pop($words);
                array_push($words, '<a href="' . get_permalink() . '">'.'<strong>... read more</strong>.</a>');
                $text = implode(' ', $words);
            }
        }
        return $text;
    }
    /* remove the default filter */
    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
    /* now, add our filter */
    add_filter('get_the_excerpt', 'uua_html_excerpt');

}


/**
 * Clean up the_excerpt()
 */

if ( ! function_exists('uuatheme_excerpt_more') ) {

    function uuatheme_excerpt_more() {
      return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'uuatheme') . '</a>';
    }
    add_filter('excerpt_more', 'uuatheme_excerpt_more');

}

/**
 * Fix the woothemes testimonials use of the <!--more--> tag
 */

if ( ! function_exists('uuatheme_wootestimonials_excerpts') ) {

    function uuatheme_wootestimonials_excerpts() {
        global $more;
        $real_more = $more;
        $more      = 0;
        $output    = wpautop( get_the_content('Read the full testimonial.') );
        $more      = $real_more;

        return $output;
    }
    add_filter( 'woothemes_testimonials_content', 'uuatheme_wootestimonials_excerpts');

}