<?php 
class MiPostOrderWidget extends WP_Widget {

	/**
	 * Registering widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'postorder_widget', // Base ID
			esc_html__( 'Mi Post Order Field', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'To show order field', 'text_domain' )) // Args
		);
		
	}

	/**
	 * To display widget on front-end.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		global $wp;
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
			 
		?>
			<label class="postorder"><?php _e( 'Order By.', 'textdomain' ); ?></label>
			<select class="postorder_options" id="changeorder">
				<option <?php if(isset($_GET['order']) && $_GET['order']=="desc"): ?> selected="selected" <?php endif; ?> value="<?php echo home_url( $wp->request.'/?order=desc' ); ?>"><?php _e( 'Newest First', 'textdomain' ); ?></option>
				<option <?php if(isset($_GET['order']) && $_GET['order']=="asc"): ?> selected="selected" <?php endif; ?> value="<?php echo home_url( $wp->request.'/?order=asc' ); ?>"><?php _e( 'Oldest First', 'textdomain' ); ?></option>
			</select>
			<script type="text/javascript">
				jQuery("document").ready(function($){
					$("#changeorder").change(function(){
						window.location = $(this).val();
					});
				});
			</script>
		<?php 
		echo $args['after_widget'];
	}
}
