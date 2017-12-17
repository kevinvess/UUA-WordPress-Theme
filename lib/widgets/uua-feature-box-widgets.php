<?php 

add_action( 'widgets_init', 'uuafbw_init' );

function uuafbw_init() {
	register_widget( 'uuafbw_widget' );
}

class uuafbw_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 'uuafbw_widget',
            'description' => 'Creates a featured item consisting of a title, image, description and link.'
        );

        parent::__construct( 'uuafbw_widget', 'UUA Feature Box Widget', $widget_details );

        add_action('admin_enqueue_scripts', array($this, 'uuafbw_assets'));
    }


public function uuafbw_assets()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('uuafbw-media-upload', get_template_directory_uri() . '/lib/widgets/uuafbw-media-upload.js', array('jquery'));
    wp_enqueue_style('thickbox');
}


  public function widget( $args, $instance )
  {
		echo $args['before_widget'];
		?>
		
		<a href='<?php echo esc_url( $instance['link_url'] ) ?>'>
	    <div class="thumbnail">
				<div class="box image">
		      <img src='<?php echo $instance['image'] ?>' alt="<?php echo esc_html( $instance['title'] ) ?>" class="img-responsive">
				</div>
	      <div class="caption">
	        <h4><?php echo esc_html( $instance['title'] ) ?></h4>
	        <p><?php echo esc_html( $instance['description'] ) ?></p>
	        <p class="box-link"><?php echo esc_html( $instance['link_title'] ) ?></p>
	      </div>
	    </div>
		</a>
	
		<?php
		echo $args['after_widget'];
  }

	public function update( $new_instance, $old_instance ) {  
	    return $new_instance;
	}

    public function form( $instance )
    {

		$title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }

	    $description = '';
	    if( !empty( $instance['description'] ) ) {
	        $description = $instance['description'];
	    }

	    $link_url = '';
	    if( !empty( $instance['link_url'] ) ) {
	        $link_url = $instance['link_url'];
	    }

	    $link_title = '';
	    if( !empty( $instance['link_title'] ) ) {
	        $link_title = $instance['link_title'];
	    }

		$image = '';
		if(isset($instance['image']))
		{
		    $image = $instance['image'];
		}
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'uuatheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php _e( 'Description:', 'uuatheme' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" ><?php echo esc_attr( $description ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link_url' ); ?>"><?php _e( 'Link URL:', 'uuatheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link_title' ); ?>"><?php _e( 'Link Title:', 'uuatheme' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" type="text" value="<?php echo esc_attr( $link_title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'uuatheme' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>
    <?php
    }
}