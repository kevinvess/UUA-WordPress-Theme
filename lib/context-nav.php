<?php
	
/**
	* Context sensitive left-side navigation
	*/

if ( ! function_exists('uuatheme_check_for_page_tree') ) {

    function uuatheme_check_for_page_tree() {
     
        //start by checking if we're on a page
        if( is_page() ) {
         
            global $post;
         
            // next check if the page has parents
            if ( $post->post_parent ){
             
                // fetch the list of ancestors
                $parents = array_reverse( get_post_ancestors( $post->ID ) );
                 
                // get the top level ancestor
                return $parents[0];
                 
            }
             
            // return the id  - this will be the topmost ancestor if there is one, or the current page if not
            return $post->ID;
             
        }
     
    }
}

if ( ! function_exists('uuatheme_list_subpages') ) {
 
    function uuatheme_list_subpages() {

      // don't run on the main blog page
      if ( is_page() ) {
       
        // run the uuatheme_check_for_page_tree function to fetch top level page
        $ancestor = uuatheme_check_for_page_tree();
     
        // set the arguments for children of the ancestor page
        $args = array(
            'child_of' => $ancestor,
            'depth'    => '4',
            'title_li' => '',
        );

        // include private pages for logged-in users
        if ( current_user_can('read_private_pages') ) {
            $args['post_status'] = 'publish,private';
        }
         
        // set a value for get_pages to check if it's empty
        $list_pages = get_pages( $args );
         
        // check if $list_pages has values
        if ( $list_pages ) {
     
            // open a list with the ancestor page at the top
            ?>
            <ul class="page-tree">
                <?php // list ancestor page ?>
                <li class="ancestor">
                    <a href="<?php echo get_permalink( $ancestor ); ?>"><?php echo get_the_title( $ancestor ); ?></a>
                </li>
                 
                <?php
                // use wp_list_pages to list subpages of ancestor or current page
                wp_list_pages( $args );;
             
     
            // close the page-tree list
            ?>
            </ul>
     
        <?php
        }
        
      }
         
    }
}