<?php 

add_action( 'widgets_init', 'uuais_init' );

function uuais_init() {
	register_widget( 'uuais_widget' );
}

class uuais_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 'uuais_widget',
            'description' => 'Creates a widget featuring UUA Bookstore items, with three options for types of content.'
        );

        parent::__construct( 'uuais_widget', 'UUA Bookstore Widget', $widget_details );
    }


	public function widget( $args, $instance )
	{
		echo $args['before_widget'];			
		
			extract( $args );
			$uuaselect = $instance['select']; 
		
			if ( $uuaselect == 'family' ) {
	 			$uuais_csvfile = "https://docs.google.com/spreadsheets/d/1gvYR_6AOnhXpO2JXZb5XrupDnIJQpQG_bMyszCwhQwQ/pub?output=csv";
			} elseif ( $uuaselect == 'socialjustice' ) {
	 			$uuais_csvfile = "https://docs.google.com/spreadsheets/d/118jOpMhTKZxyWbRe4R4iykXXOHXK_y5vQ_zPNcF_HQQ/pub?output=csv";
			} else {
	 			$uuais_csvfile = "https://docs.google.com/spreadsheets/d/1Al25HFRxZFTkrhwNf1blWkFDE7o5EF8HTfd-rQ3piiM/pub?output=csv";
			}

		
			$file_handle = fopen($uuais_csvfile, "r");
			$line_of_text = array();
			
			fgetcsv($file_handle, 1024, ",");
			while (!feof($file_handle) ) {
			    $line_of_text[] = fgetcsv($file_handle, 1024, ",");
			}
			fclose($file_handle);
			
			$random_row = array_rand($line_of_text);
			
			$uuais_title = $line_of_text[$random_row][0];
			$uuais_subtitle = $line_of_text[$random_row][1];
			$uuais_link = $line_of_text[$random_row][2];
			$uuais_author = $line_of_text[$random_row][3];
			$uuais_year = $line_of_text[$random_row][4];
			$uuais_imgurl = $line_of_text[$random_row][5];
			$uuais_publisher = $line_of_text[$random_row][6];
			?>
		    
			<div class="uuais-entry">
		    
		    <a href="<?php echo $uuais_link; ?>">
			    
			    <?php if (!empty($uuais_imgurl)) { ?>
				    <img src="<?php echo $uuais_imgurl; ?>" class="uuais-img"> 
					<?php } ?>
			    
			    <?php if (!empty($uuais_title)) { ?>
				    <h4 style="margin-top: 0;"><?php echo $uuais_title; ?>
			        <?php if (!empty($uuais_subtitle)) { ?>
								<br /><small><?php echo $uuais_subtitle; ?></small>
							<?php } ?>
						</h4>
					<?php } ?>

		    </a>	

				<p class="uuais-meta">
			    <?php if (!empty($uuais_author)) { ?><span class="uuais_author"><?php echo $uuais_author; ?></span><?php } ?><?php if (!empty($uuais_year)) { ?><span class="uuais-year">, <?php echo $uuais_year; ?></span><?php } ?><?php if (!empty($uuais_publisher)) { ?><span class="uuais-publisher"><br /><?php echo $uuais_publisher; ?></span><?php } ?>
				</p>		
			
		    <?php if (!empty($uuais_description)) { ?>
					<p class="uuais_description" style="margin: 0; font-size: 90%;"><?php echo $uuais_description; ?></p>
				<?php } ?>
				
				<div class="uuais-footer">
					<a href="<?php echo $uuais_link; ?>" class="uuais-buynow">Buy it now at<img src="<?php echo get_template_directory_uri();?>/assets/img/inspiritlogo.png"></a>
				</div>
			
			</div>
			
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {  
	    $instance = $old_instance;
		// Fields
		$instance['select'] = $new_instance['select'];
		return $instance;
	}

    public function form( $instance )
    {
		// Check values
		if( $instance) {
		     $uuaselect = $instance['select']; // Added
		} else {
		     $uuaselect = ''; // Added
		}
		?>

        <p>
			<label for="<?php echo $this->get_field_id('select'); ?>"><?php _e('List Type', 'uuatheme'); ?></label>
			<select name="<?php echo $this->get_field_name('select'); ?>" id="<?php echo $this->get_field_id('select'); ?>" class="widefat">
				<option <?php selected( $instance['select'], 'general'); ?> value="general">UU General</option> 
				<option <?php selected( $instance['select'], 'family'); ?> value="family">Family</option> 
				<option <?php selected( $instance['select'], 'socialjustice'); ?> value="socialjustice">Social Justice</option> 
			</select>
		</p>

    <?php
    }
}