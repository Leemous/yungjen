<?php 
	class Milk_Widget_Social_Links extends WP_Widget{

		public $icons = array(
			    	'facebook' => 'fa-facebook',
					'instagram' => 'fa-instagram',
					'twitter' => 'fa-twitter',
					'google_plus' => 'fa-google-plus',
					'behance' => 'fa-behance',
					'dribbble' => 'fa-dribbble',
					'linked_in' => 'fa-linkedin',
					'pinterest' => 'fa-pinterest',
					'youtube' => 'fa-youtube-play',
					'tumblr' => 'fa-tumblr',
					'flickr' => 'fa-flickr',
					'rss' => 'fa-rss',
					'github' => 'fa-git',
					'skype' => 'fa-skype',
					'vkontakte' => 'fa-vk',
					'digg' => 'fa-digg',
					'dropbox' => 'fa-dropbox',
					'soundcloud' => 'fa-soundcloud');
		public $titles = array(
			    	'facebook' => 'Facebook',
					'instagram' => 'Instagram',
					'twitter' => 'Twitter',
					'google_plus' => 'Google+',
					'behance' => 'Behance',
					'dribbble' => 'Dribbble',
					'linked_in' => 'LinkedIn',
					'pinterest' => 'Pinterest',
					'youtube' => 'Youtube',
					'tumblr' => 'Tumblr',
					'flickr' => 'Flickr',
					'rss' => 'RSS',
					'github' => 'Github',
					'skype' => 'Skype',
					'vkontakte' => 'VK',
					'digg' => 'Digg',
					'dropbox' => 'Dropbox',
					'soundcloud' => 'SoundCloud');

	  	function Milk_Widget_Social_Links(){
	  		$textdomain = "milk";
	    	$widget_ops = array('classname' => 'widget_social', 'description' => __('Helps you to add you social accounts', $textdomain ) );
	    	parent::__construct('Milk_Widget_Social_Links', __('Social Links',$textdomain), $widget_ops);
	  	}
		 
	  	function form($instance){
	  		$textdomain = "milk";
	    	$instance = wp_parse_args( (array) $instance, array( 'title' => '',
	    													'facebook' => '',
	    													'instagram' => '',
	    													'twitter' => '',
	    													'google_plus' => '',
	    													'behance' => '',
	    													'dribbble' => '',
	    													'linked_in' => '',
	    													'pinterest' => '',
	    													'youtube' => '',
	    													'tumblr' => '',
	    													'flickr' => '',
	    													'rss' => '',
	    													'github' => '',
	    													'skype' => '',
	    													'vkontakte' => '',
	    													'digg' => '',
	    													'dropbox' => '',
	    													'soundcloud' => '',
	    													 ) );
	    	$title = $instance['title'];
	    	$values['facebook'] = $instance['facebook'];
	    	$values['instagram'] = $instance['instagram'];
	    	$values['twitter'] = $instance['twitter'];
	    	$values['google_plus'] = $instance['google_plus'];
	    	$values['behance'] = $instance['behance'];
	    	$values['dribbble'] = $instance['dribbble'];
	    	$values['linked_in'] = $instance['linked_in'];
	    	$values['pinterest'] = $instance['pinterest'];
	    	$values['youtube'] = $instance['youtube'];
	    	$values['tumblr'] = $instance['tumblr'];
	    	$values['flickr'] = $instance['flickr'];
	    	$values['rss'] = $instance['rss'];
	    	$values['github'] = $instance['github'];
	    	$values['skype'] = $instance['skype'];
	    	$values['vkontakte'] = $instance['vkontakte'];
	    	$values['digg'] = $instance['digg'];
	    	$values['dropbox'] = $instance['dropbox'];
	    	$values['soundcloud'] = $instance['soundcloud'];

	    	
			?>
		    <p>
			  	<label class="widefat" for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', $textdomain ) ?>
				  	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
				  	name="<?php echo esc_attr($this->get_field_name('title')); ?>" 
				  	type="text" 
				  	value="<?php echo esc_attr($title); ?>" />

			  	</label>
		  	</p>
		
		   	<?php foreach ($values as $arg => $value) { ?>
			    <p>
				  	<label class="widefat" for="<?php echo esc_attr($this->get_field_id($arg)); ?>"><?php echo esc_attr($this->titles[$arg]); ?> <?php _e('Link:', $textdomain ); ?> 
					  	<input class="widefat" id="<?php echo esc_attr($this->get_field_id($arg)); ?>" 
					  	name="<?php echo esc_attr($this->get_field_name($arg)); ?>" 
					  	type="text" 
					  	value="<?php echo esc_attr($value); ?>" />
					  	
				  	</label>
			  	</p>
		    <?php } 
		}
		 
	  	function update($new_instance, $old_instance){
	  		$textdomain = "milk";
		    $instance = $old_instance;
		    $instance['title'] = $new_instance['title'];
			
			$instance['facebook'] = $new_instance['facebook'];
	    	$instance['instagram'] = $new_instance['instagram'];
	    	$instance['twitter'] = $new_instance['twitter'];
	    	$instance['google_plus'] = $new_instance['google_plus'];
	    	$instance['behance'] = $new_instance['behance'];
	    	$instance['dribbble'] = $new_instance['dribbble'];
	    	$instance['linked_in'] = $new_instance['linked_in'];
	    	$instance['pinterest'] = $new_instance['pinterest'];
	    	$instance['youtube'] = $new_instance['youtube'];
	    	$instance['tumblr'] = $new_instance['tumblr'];
	    	$instance['flickr'] = $new_instance['flickr'];
	    	$instance['rss'] = $new_instance['rss'];
	    	$instance['github'] = $new_instance['github'];
	    	$instance['skype'] = $new_instance['skype'];
	    	$instance['vkontakte'] = $new_instance['vkontakte'];
	    	$instance['digg'] = $new_instance['digg'];
	    	$instance['dropbox'] = $new_instance['dropbox'];
	    	$instance['soundcloud'] = $new_instance['soundcloud'];
		    return $instance;
		}
		 
	  	function widget($args, $instance){
		    extract($args, EXTR_SKIP);
		 	$textdomain = "milk";
		    echo balanceTags($before_widget);
		    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		    if ( $title ) echo balanceTags($before_title)  . esc_attr($title)  . balanceTags($after_title);
		    $values['facebook'] = $instance['facebook'];
	    	$values['instagram'] = $instance['instagram'];
	    	$values['twitter'] = $instance['twitter'];
	    	$values['google_plus'] = $instance['google_plus'];
	    	$values['behance'] = $instance['behance'];
	    	$values['dribbble'] = $instance['dribbble'];
	    	$values['linked_in'] = $instance['linked_in'];
	    	$values['pinterest'] = $instance['pinterest'];
	    	$values['youtube'] = $instance['youtube'];
	    	$values['tumblr'] = $instance['tumblr'];
	    	$values['flickr'] = $instance['flickr'];
	    	$values['rss'] = $instance['rss'];
	    	$values['github'] = $instance['github'];
	    	$values['skype'] = $instance['skype'];
	    	$values['vkontakte'] = $instance['vkontakte'];
	    	$values['digg'] = $instance['digg'];
	    	$values['dropbox'] = $instance['dropbox'];
	    	$values['soundcloud'] = $instance['soundcloud'];

	    	echo "<ul class='list-inline'>";
		    foreach ($this->icons as $arg => $value) {
		    	if (!empty($values[$arg]))
		    		if (substr( $values[$arg], 0, 4 ) === "http" || substr( $values[$arg], 0, 7 ) === "http://")  {
		    			echo '<li><a href="' . $values[$arg] .'" title="' . $arg . '" target="_blank"><i class="fa '. $value .'"></i></a></li>';;
		    		}else{
		    			echo '<li><a href="http://' . $values[$arg] .'" title="' . $arg . '" target="_blank"><i class="fa '. $value .'"></i></a></li>';;
		    		}

		    }
		    echo "</ul>";
		    echo balanceTags($after_widget);
		}
	}

	class Milk_Widget_Recent_Posts extends WP_Widget {

		function __construct() {
			$textdomain = 'milk';
			$widget_ops = array('classname' => 'widget_recent_entries2', 'description' => __( "Your site&#8217;s most recent posts.", $textdomain ) );
			parent::__construct('recent-posts', __('Milk Recent Posts', $textdomain), $widget_ops);
			$this->alt_option_name = 'widget_recent_entries2';

			add_action( 'save_post', array($this, 'flush_widget_cache') );
			add_action( 'deleted_post', array($this, 'flush_widget_cache') );
			add_action( 'switch_theme', array($this, 'flush_widget_cache') );
		}

		function widget($args, $instance) {
			$textdomain = 'milk';
			$cache = array();
			if ( ! $this->is_preview() ) {
				$cache = wp_cache_get( 'milk_widget_recent_posts', 'widget' );
			}

			if ( ! is_array( $cache ) ) {
				$cache = array();
			}

			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			if ( isset( $cache[ $args['widget_id'] ] ) ) {
				echo esc_attr($cache[ $args['widget_id'] ]);
				return;
			}

			ob_start();
			extract($args);

			$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', $textdomain );

			/** This filter is documented in wp-includes/default-widgets.php */
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
			if ( ! $number )
				$number = 5;
			$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

			/**
			 * Filter the arguments for the Recent Posts widget.
			 *
			 * @since 3.4.0
			 *
			 * @see WP_Query::get_posts()
			 *
			 * @param array $args An array of arguments used to retrieve the recent posts.
			 */
			$r = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) ) );

			if ($r->have_posts()) :
		?>
			<?php echo balanceTags($before_widget); ?>
			<?php if ( $title ) echo balanceTags($before_title)  . esc_attr($title)  . balanceTags($after_title); ?>
			<div class="recent">
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<div class="small-post">
					<a href="<?php the_permalink(); ?>">
						<?php 
							$format = get_post_format(get_the_ID()); ?>
							<?php 
							switch ($format) {
							    case "0": ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
										<span class="img" style="background-color:#5ec593;font-family:'Times New Roman';font-size:16px;">T</span>
						         	<?php }
						         	break;
							    case "chat": ?>
							   		<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        	<span class="img" style="background-color:#a358ce;"><i class="fa fa-wechat"></i></span>
							        <?php }
							        break;
							    case "gallery":  ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							    	<span class="img" style="background-color:#f3344f;"><i class="fa fa-image"></i></span>
							        <?php }
							        break;
							    case "link":  ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        <span class="img" style="background-color:#ffa810;"><i class="fa fa-link"></i></span>
							        <?php }
							        break;
							    case "image": ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        <img src="<?php echo get_post_meta( get_the_ID(), 'image_url', true ); ?>" alt="post">
							        <?php }
							        break;
							    case "quote":  ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        <span class="img" style="background-color:#00c012;"><i class="fa fa-quote-left"></i></span>
							        <?php }
							        break;
							    case "status":  ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        <span class="img" style="background-color:#486fb0;"><i class="fa fa-bullhorn"></i></span>
							        <?php }
							        break;
							    case "video": ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        <span class="img" style="background-color:#e12727;"><i class="fa fa-play"></i></span>
							    	<?php }
							    	break;		
							    case "audio": ?>
							    	<?php 
										if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(array(45,45)); ?>
									<?php }else{ ?>
							        <span class="img" style="background-color:#49b4ff;"><i class="fa fa-music"></i></span>
							        <?php }
							        break;
							    }
						?>
						
					</a>
					<a href="<?php the_permalink(); ?>">
						<p><?php get_the_title() ? the_title() : the_ID(); ?>
						<?php if ( $show_date ) : ?>
							<br><span class="post-date"><?php echo get_the_date(); ?></span>
						<?php endif; ?>
						</p>
					</a>
				</div>
			<?php endwhile; ?>
			</div>
			<?php echo balanceTags($after_widget); ?>
		<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

			endif;

			if ( ! $this->is_preview() ) {
				$cache[ $args['widget_id'] ] = ob_get_flush();
				wp_cache_set( 'milk_widget_recent_posts', $cache, 'widget' );
			} else {
				ob_end_flush();
			}
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = (int) $new_instance['number'];
			$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
			$this->flush_widget_cache();

			$alloptions = wp_cache_get( 'alloptions', 'options' );
			if ( isset($alloptions['widget_recent_entries2']) )
				delete_option('widget_recent_entries2');

			return $instance;
		}

		function flush_widget_cache() {
			wp_cache_delete('milk_widget_recent_posts', 'widget');
		}

		function form( $instance ) {
			$textdomain = 'milk';
			$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
			$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( 'Number of posts to show:', $textdomain ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php _e( 'Display post date?', $textdomain ); ?></label></p>
		<?php
		}
	}

	class Milk_Widget_Recent_Comments extends WP_Widget {

		function __construct() {
			$textdomain = 'milk';
			$widget_ops = array('classname' => 'widget_recent_comments', 'description' => __( 'Your site&#8217;s most recent comments.' , $textdomain) );
			parent::__construct('recent-comments', __('Milk Recent Comments', $textdomain), $widget_ops);
			$this->alt_option_name = 'milk_widget_recent_comments';

			if ( is_active_widget(false, false, $this->id_base) )
				add_action( 'wp_enqueue_scripts', array($this, 'recent_comments_style') );

			add_action( 'comment_post', array($this, 'flush_widget_cache') );
			add_action( 'edit_comment', array($this, 'flush_widget_cache') );
			add_action( 'transition_comment_status', array($this, 'flush_widget_cache') );
		}

		function recent_comments_style() {

			/**
			 * Filter the Recent Comments default widget styles.
			 *
			 * @since 3.1.0
			 *
			 * @param bool   $active  Whether the widget is active. Default true.
			 * @param string $id_base The widget ID.
			 */
			if ( ! current_theme_supports( 'widgets' ) // Temp hack #14876
				|| ! apply_filters( 'show_recent_comments_widget_style', true, $this->id_base ) )
				return;
			?>
		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		<?php
		}

		function flush_widget_cache() {
			wp_cache_delete('milk_widget_recent_comments', 'widget');
		}

		function widget( $args, $instance ) {
			$textdomain = 'milk';
			global $comments, $comment;

			$cache = array();
			if ( ! $this->is_preview() ) {
				$cache = wp_cache_get('milk_widget_recent_comments', 'widget');
			}
			if ( ! is_array( $cache ) ) {
				$cache = array();
			}

			if ( ! isset( $args['widget_id'] ) )
				$args['widget_id'] = $this->id;

			if ( isset( $cache[ $args['widget_id'] ] ) ) {
				echo esc_attr($cache[ $args['widget_id'] ]);
				return;
			}

			extract($args, EXTR_SKIP);
			$output = '';

			$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments', $textdomain );

			/** This filter is documented in wp-includes/default-widgets.php */
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
			if ( ! $number )
				$number = 5;

			/**
			 * Filter the arguments for the Recent Comments widget.
			 *
			 * @since 3.4.0
			 *
			 * @see get_comments()
			 *
			 * @param array $comment_args An array of arguments used to retrieve the recent comments.
			 */
			$comments = get_comments( apply_filters( 'widget_comments_args', array(
				'number'      => $number,
				'status'      => 'approve',
				'post_status' => 'publish'
			) ) );

			$output .= $before_widget;
			if ( $title )
				$output .= $before_title . $title . $after_title;

			$output .= '<div class="recent">';
			if ( $comments ) {
				// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
				$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
				_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

				foreach ( (array) $comments as $comment) {
					$output .=  '<div class="small-post">' .  get_avatar( $comment, 45 ) . /* translators: comments widget: 1: comment author, 2: post link */ sprintf(_x('%1$s on %2$s', 'widgets', $textdomain), get_comment_author_link(), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</div>';
				}
			}
			$output .= '</div>';
			$output .= $after_widget;

			echo balanceTags($output);

			if ( ! $this->is_preview() ) {
				$cache[ $args['widget_id'] ] = $output;
				wp_cache_set( 'milk_widget_recent_comments', $cache, 'widget' );
			}
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = absint( $new_instance['number'] );
			$this->flush_widget_cache();

			$alloptions = wp_cache_get( 'alloptions', 'options' );
			if ( isset($alloptions['milk_widget_recent_comments']) )
				delete_option('milk_widget_recent_comments');

			return $instance;
		}

		function form( $instance ) {
			$textdomain = 'milk';
			$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:' , $textdomain); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( 'Number of comments to show:' , $textdomain); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
		<?php
		}
	}

	class Milk_Widget_Flickr extends WP_Widget{

		function Milk_Widget_Flickr(){
			$textdomain = 'milk';
	    	$widget_ops = array('classname' => 'widget_flickr', 'description' => __('Helps you to add Flickr Stream Widget', $textdomain) );
	    	parent::__construct('Milk_Widget_Flickr', __('Flickr Stream', $textdomain), $widget_ops);
	    	add_action('wp_enqueue_scripts', array(&$this, 'js'));
		}

		function js(){
		    if ( is_active_widget(false, false, $this->id_base, true) ) {
		       wp_enqueue_script( 'flickr-js', URI . '/js/flickrush.min.js', array('jquery'), '', true );
		    }
	  	}

	  	function form($instance){
	  		$textdomain = 'milk';
	  		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	  		$flickr_id     = isset( $instance['flickr_id'] ) ? esc_attr( $instance['flickr_id'] ) : '';
			$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 8;
			$show_random = isset( $instance['show_random'] ) ? (bool) $instance['show_random'] : false;
			?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'flickr_id' )); ?>"><?php _e( 'Flickr ID:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'flickr_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'flickr_id' )); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( 'Number of photos to show:' , $textdomain); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $show_random ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_random' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_random' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'show_random' )); ?>"><?php _e( 'Show random posts?', $textdomain ); ?></label></p>
			<?php
	  	}

	  	function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
			$instance['number'] = (int) $new_instance['number'];
			$instance['show_random'] = !empty($new_instance['show_random']) ? 1 : 0;

			return $instance;
		}

		function widget($args, $instance){
			$textdomain = 'milk';
		    extract($args, EXTR_SKIP);

		    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Flickr', $textdomain );

			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$flickr_id = ( ! empty( $instance['flickr_id'] ) ) ? $instance['flickr_id'] : __( '52617155@N08', $textdomain );

			$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 8;
			if ( ! $number )
				$number = 8;
			$show_random = ! empty( $instance['show_random'] ) ? '1' : '0';
		 
		    echo balanceTags($before_widget);
		    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		    if ( $title ) echo balanceTags($before_title)  . esc_attr($title)  . balanceTags($after_title);

	    	echo "<div class='flickr' data-limit='" . esc_attr($number) . "' data-flickrid='". esc_attr($flickr_id) ."' data-random='". esc_attr($show_random) ."'></div>";
	    	?>
	    	<?php 

		    echo balanceTags($after_widget);
		}
	}

	class Milk_Widget_Slider extends WP_Widget{

		function Milk_Widget_Slider(){
			$textdomain = 'milk';
	    	$widget_ops = array('classname' => 'widget_slider', 'description' => __('Add a custom banner slider to your sidebar', $textdomain ) );
	    	parent::__construct('Milk_Widget_Slider', __('Banner Slider', $textdomain ), $widget_ops);

	  	}

	  	function form($instance){
	  		$textdomain = 'milk';
	  		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	  		$captions     = isset( $instance['captions'] ) ? esc_attr( $instance['captions'] ) : '';
	  		$upload     = isset( $instance['upload'] ) ? esc_attr( $instance['upload'] ) : '';
	  		$mode     = isset( $instance['mode'] ) ? esc_attr( $instance['mode'] ) : 'horizontal';
	  		$speed    = isset( $instance['speed'] ) ? absint( $instance['speed'] ) : 500;
	  		$infinite = isset( $instance['infinite'] ) ? (bool) $instance['infinite'] : true;
	  		$auto = isset( $instance['auto'] ) ? (bool) $instance['auto'] : true;
	  		$pause    = isset( $instance['pause'] ) ? absint( $instance['pause'] ) : 3000;
			$adapt_height = isset( $instance['adapt_height'] ) ? (bool) $instance['adapt_height'] : false;
			$show_captions = isset( $instance['show_captions'] ) ? (bool) $instance['show_captions'] : false;
			?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<label for="<?php echo esc_attr($this->get_field_id( 'upload' )); ?>"><?php _e( 'Upload images:', $textdomain ); ?></label>
			<input 	id="<?php echo esc_attr($this->get_field_id( 'captions' )); ?>"
					class="img_captions" 
					name="<?php echo esc_attr($this->get_field_name( 'captions' )); ?>" 
					type="text"
					value="<?php echo esc_attr($captions); ?>"
					style="display:none" />
			<input 	id="<?php echo esc_attr($this->get_field_id( 'upload' )); ?>"
					class="img_urls" 
					name="<?php echo esc_attr($this->get_field_name( 'upload' )); ?>" 
					type="text"
					value="<?php echo esc_url($upload); ?>"
					style="display:none" />
			<input 	class="upload_multiple_image_button button button-primary right" 
					name="<?php echo esc_attr($this->get_field_name( 'upload' )); ?>" 
					type="button" 
					data-uploader_title=<?php _e("You can choose multiple images for slider by holding Ctrl (Cmd) button", $textdomain) ?>
					data-uploader_button_text=<?php _e("Select" , $textdomain)?>
					value=<?php _e("Select images", $textdomain) ?>/>
			<ul class="img-preview">
			<?php 
				if (!empty($captions)) { 
					$urls = substr($upload, 0, -1);
					$urls = explode(";", $urls);
					$titles = substr($captions, 0, -1);
					$titles = explode(";", $titles);

					$arr = array_combine($urls,$titles);
					foreach ($arr as $url => $title) { ?>
						<li><img src="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title) ?>" alt="banner"/></li>
					<?php }
			  	} 
			?>
			</ul>
			
			<p><label for="<?php echo esc_attr($this->get_field_id( 'mode' )); ?>"><strong><?php _e( 'Mode:', $textdomain ); ?></strong><br><?php _e( 'Type of transition between slides', $textdomain ); ?></label>

			<select id="<?php echo esc_attr($this->get_field_id( 'mode' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'mode' )); ?>" class="widefat">
		    	<option value="horizontal"<?php echo ($mode=='horizontal')?'selected':''; ?>><?php _e('Horizontal', $textdomain) ?></option>
		    	<option value="vertical"<?php echo ($mode=='vertical')?'selected':''; ?>><?php _e('Vertical', $textdomain) ?></option>
		    	<option value="fade"<?php echo ($mode=='fade')?'selected':''; ?>><?php _e('Fade', $textdomain) ?></option>
		   </select>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'speed' )); ?>"><strong><?php _e( 'Speed:', $textdomain ); ?></strong><br><?php _e( 'Slide transition duration (in ms)', $textdomain ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'speed' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'speed' )); ?>" type="text" value="<?php echo esc_attr($speed); ?>" size="5" /></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $infinite ); ?> id="<?php echo esc_attr($this->get_field_id( 'infinite' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'infinite' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'infinite' )); ?>"><strong><?php _e( 'Infinite Loop:', $textdomain ); ?></strong><br><?php _e( "Clicking 'Next' while on the last slide will transition to the first slide and vice-versa", $textdomain ); ?></label></p>	
			
			<p><input class="checkbox" type="checkbox" <?php checked( $show_captions ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_captions' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_captions' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'show_captions' )); ?>"><strong><?php _e( 'Include image captions:', $textdomain ); ?></strong><br><?php _e( "Captions are derived from the image's title attribute", $textdomain ); ?></label></p>	

			<p><input class="checkbox" type="checkbox" <?php checked( $adapt_height ); ?> id="<?php echo esc_attr($this->get_field_id( 'adapt_height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'adapt_height' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'adapt_height' )); ?>"><strong><?php _e( 'Adaptive Height:', $textdomain ); ?></strong><br><?php _e( "Dynamically adjust slider height based on each slide's height", $textdomain ); ?></label></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $auto ); ?> id="<?php echo esc_attr($this->get_field_id( 'auto' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'auto' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'auto' )); ?>"><strong><?php _e( 'Auto Slideshow:', $textdomain ); ?></strong><br><?php _e( "Slides will automatically transition", $textdomain ); ?></label></p>	

			<p><label for="<?php echo esc_attr($this->get_field_id( 'pause' )); ?>"><strong><?php _e( 'Pause:', $textdomain ); ?></strong><br><?php _e( 'The amount of time (in ms) between each auto transition', $textdomain ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'pause' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pause' )); ?>" type="text" value="<?php echo esc_attr($pause); ?>" size="5" /></p>
			<?php
	  	}

	  	function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['captions'] = strip_tags($new_instance['captions']);
			$instance['upload'] = strip_tags($new_instance['upload']);
			$instance['mode'] = strip_tags($new_instance['mode']);
			$instance['speed'] = strip_tags($new_instance['speed']);
			$instance['pause'] = strip_tags($new_instance['pause']);
			
			$instance['infinite'] = !empty($new_instance['infinite']) ? 1 : 0;
			$instance['auto'] = !empty($new_instance['auto']) ? 1 : 0;
			$instance['show_captions'] = !empty($new_instance['show_captions']) ? 1 : 0;
			$instance['adapt_height'] = !empty($new_instance['adapt_height']) ? 1 : 0;

			return $instance;
		}

		function widget($args, $instance){
		    extract($args, EXTR_SKIP);
		    $textdomain = 'milk';
		    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Banner Slider', $textdomain );

			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$captions = ( ! empty( $instance['captions'] ) ) ? $instance['captions'] : __( '', $textdomain );
			$mode = ( ! empty( $instance['mode'] ) ) ? $instance['mode'] : __( 'horizontal', $textdomain );
			$upload = ( ! empty( $instance['upload'] ) ) ? $instance['upload'] : __( '', $textdomain );
			$speed = ( ! empty( $instance['speed'] ) ) ? absint( $instance['speed'] ) : 500;
			if ( ! $speed )
				$speed = 500;
			$pause = ( ! empty( $instance['pause'] ) ) ? absint( $instance['pause'] ) : 2000;
			if ( ! $pause )
				$pause = 2000;

			$infinite = ! empty( $instance['infinite'] ) ? 'true' : 'false';
			$auto = ! empty( $instance['auto'] ) ? 'true' : 'false';
			$show_captions = ! empty( $instance['show_captions'] ) ? 'true' : 'false';
			$adapt_height = ! empty( $instance['adapt_height'] ) ? 'true' : 'false';
		 
		    echo balanceTags($before_widget);
		    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		    if ( $title ) echo balanceTags($before_title)  . esc_attr($title)  . balanceTags($after_title);

	    	echo "<div class='slider' data-loop='".esc_attr($infinite)."' data-auto='".esc_attr($auto)."' data-speed='".esc_attr($speed)."' data-pause='".esc_attr($pause)."' data-mode='".esc_attr($mode)."' data-height='".esc_attr($adapt_height)."' data-captions='".esc_attr($show_captions)."'><ul>";
	    		$urls = substr($upload, 0, -1);
				$urls = explode(";", $urls);
				$titles = substr($captions, 0, -1);
				$titles = explode(";", $titles);

				$arr = array_combine($urls,$titles);
				foreach ($arr as $url => $title) { ?>
					<li><img src="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title) ?>" alt="banner"/></li>
				<?php }
	    	echo "</ul></div>";
	    	?>

			<?php 
		    echo balanceTags($after_widget);
		}
	}

	class Milk_Widget_Banner extends WP_Widget{

		function Milk_Widget_Banner(){
			$textdomain = 'milk';
	    	$widget_ops = array('classname' => 'widget_banner', 'description' => __('Add a custom banner image to your sidebar', $textdomain) );
	    	parent::__construct('Milk_Widget_Banner', __('Banner Widget', $textdomain), $widget_ops);

	  	}

	  	function form($instance){
	  		$textdomain ='milk';
	  		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	  		$upload     = isset( $instance['upload'] ) ? esc_attr( $instance['upload'] ) : '';
			?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<label for="<?php echo esc_attr($this->get_field_id( 'upload' )); ?>"><?php _e( 'Upload image:', $textdomain ); ?></label>
			<input 	id="<?php echo esc_attr($this->get_field_id( 'upload' )); ?>"
					class="img_url" 
					name="<?php echo esc_attr($this->get_field_name( 'upload' )); ?>" 
					type="text"
					value="<?php echo esc_url($upload); ?>"
					style="display:none" />
			<input 	class="upload_image_button button button-primary right" 
					name="<?php echo esc_attr($this->get_field_name( 'upload' )); ?>" 
					type="button" 
					data-uploader_title=<?php _e("Choose image for banner", $textdomain) ?>
					data-uploader_button_text=<?php _e("Select" , $textdomain) ?>
					value=<?php _e("Select images", $textdomain) ?>/>
			<?php 
				if (!empty($upload)) { ?>
					<img class="banner" src="<?php echo esc_url($upload); ?>" alt="banner"/>
			  	<?php } 
	  	}

	  	function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['upload'] = strip_tags($new_instance['upload']);

			return $instance;
		}

		function widget($args, $instance){
		    extract($args, EXTR_SKIP);
		    $textdomain ='milk';

		    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Banner Widget', $textdomain );

			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$upload = ( ! empty( $instance['upload'] ) ) ? $instance['upload'] : __( '', $textdomain );
		 
		    echo balanceTags($before_widget);
		    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		    if ( $title ) echo balanceTags($before_title)  . esc_attr($title)  . balanceTags($after_title);

	    	?>
	    	<img class="banner" src="<?php echo esc_url($upload); ?>" alt="banner">

	    	<?php 
		    echo balanceTags($after_widget);
		}
	}

	class Milk_Widget_Twitter extends WP_Widget{

		function Milk_Widget_Twitter(){
			$textdomain = 'milk';
	    	$widget_ops = array('classname' => 'widget_twitter', 'description' => __('Add a twitter timeline widget', $textdomain ) );
	    	parent::__construct('Milk_Widget_Twitter', __('Twitter Widget', $textdomain ), $widget_ops);

	  	}

	  	function form($instance){
	  		$textdomain = 'milk';
	  		$title 		 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	  		$user     	 = isset( $instance['user'] ) ? esc_attr( $instance['user'] ) : '';
	  		$id     	 = isset( $instance['id'] ) ? esc_attr( $instance['id'] ) : '';
	  		$theme 		 = isset( $instance['theme'] ) ? esc_attr( $instance['theme'] ) : 'light';
	  		$color 		 = isset( $instance['color'] ) ? esc_attr( $instance['color'] ) : '#49b4ff';
	  		$header 	 = isset( $instance['header'] ) ? (bool) $instance['header'] : true;
	  		$footer 	 = isset( $instance['footer'] ) ? (bool) $instance['footer'] : true;
	  		$borders	 = isset( $instance['borders'] ) ? (bool) $instance['borders'] : true;
	  		//$scroll 	 = isset( $instance['scroll'] ) ? (bool) $instance['scroll'] : true;
	  		//$transparent = isset( $instance['transparent'] ) ? (bool) $instance['transparent'] : true;
	  		$limit 		 = isset( $instance['limit'] ) ? absint( $instance['limit'] ) : 3;

	  		
			?>
			<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'user' )); ?>"><?php _e( 'Twitter Username:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'user' )); ?>" type="text" value="<?php echo esc_attr($user); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'id' )); ?>"><?php _e( 'Widget ID:', $textdomain ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'id' )); ?>" type="text" value="<?php echo esc_attr($id); ?>" /></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'theme' )); ?>"><strong><?php _e( 'Color Theme:', $textdomain ); ?></strong><br><?php _e( 'Default Twitter color themes', $textdomain ); ?></label>

			<select id="<?php echo esc_attr($this->get_field_id( 'theme' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'theme' )); ?>" class="widefat">
		    	<option value="dark"<?php echo ($theme=='dark')?'selected':''; ?>><?php _e('Dark', $textdomain); ?></option>
		    	<option value="light"<?php echo ($theme=='light')?'selected':''; ?>><?php _e('Light', $textdomain); ?></option>
		    </select>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'color' )); ?>"><strong><?php _e( 'Links Color:', $textdomain ); ?></strong></label><br>
		    <input  name="<?php echo esc_attr($this->get_field_name( 'color' )); ?>" 
		    		class="twitter-color"
		    		type="text" 
		    		id="<?php echo esc_attr($this->get_field_id( 'color' )); ?>" 
		    		value="<?php echo esc_attr($color); ?>"
		    		data-default-color="<?php echo esc_attr($color); ?>">
			<p><input class="checkbox" type="checkbox" <?php checked( $header ); ?> id="<?php echo esc_attr($this->get_field_id( 'header' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'header' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'header' )); ?>"><strong><?php _e( 'No Header:', $textdomain ); ?></strong><br><?php _e( "Hides the timeline header", $textdomain ); ?></label></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $footer ); ?> id="<?php echo esc_attr($this->get_field_id( 'footer' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'footer' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'footer' )); ?>"><strong><?php _e( 'No Footer:', $textdomain ); ?></strong><br><?php _e( "Hides the timeline footer and Tweet box, if included", $textdomain ); ?></label></p>

			<p><input class="checkbox" type="checkbox" <?php checked( $borders ); ?> id="<?php echo esc_attr($this->get_field_id( 'borders' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'borders' )); ?>" />
			<label for="<?php echo esc_attr($this->get_field_id( 'borders' )); ?>"><strong><?php _e( 'No Borders:', $textdomain ); ?></strong><br><?php _e( "Removes all borders within the widget", $textdomain ); ?></label></p>

			<p><label for="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>"><strong><?php _e( 'Tweet limit:', $textdomain ); ?></strong><br><?php _e( 'Number of tweets to show', $textdomain ); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'limit' )); ?>" type="text" value="<?php echo esc_attr($limit); ?>" size="3" /></p>

			<?php 
	  	}

	  	function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['user'] = strip_tags($new_instance['user']);
			$instance['id'] = strip_tags($new_instance['id']);
			$instance['theme'] = strip_tags($new_instance['theme']);
			$instance['color'] = strip_tags($new_instance['color']);
			$instance['limit'] = strip_tags($new_instance['limit']);
			
			$instance['header'] = !empty($new_instance['header']) ? 1 : 0;
			$instance['footer'] = !empty($new_instance['footer']) ? 1 : 0;
			$instance['borders'] = !empty($new_instance['borders']) ? 1 : 0;
			//$instance['scroll'] = !empty($new_instance['scroll']) ? 1 : 0;
			//$instance['transparent'] = !empty($new_instance['transparent']) ? 1 : 0;
			
			return $instance;
		}

		function widget($args, $instance){
		    extract($args, EXTR_SKIP);
			$textdomain = 'milk';
		    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Twitter', $textdomain  );
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$user = ( ! empty( $instance['user'] ) ) ? $instance['user'] : '';
			$id = ( ! empty( $instance['id'] ) ) ? $instance['id'] : '';
			$theme = ( ! empty( $instance['theme'] ) ) ? $instance['theme'] : 'light';
			$color = ( ! empty( $instance['color'] ) ) ? $instance['color'] : '';
			
			$header = ! empty( $instance['header'] ) ? '1' : '0';
			$footer = ! empty( $instance['footer'] ) ? '1' : '0';
			$borders = ! empty( $instance['borders'] ) ? '1' : '0';
			//$scroll = ! empty( $instance['scroll'] ) ? '1' : '0';
			//$transparent = ! empty( $instance['transparent'] ) ? '1' : '0';

			$limit = ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 3;
			if ( ! $limit )
				$limit = 3;
			
		    echo balanceTags($before_widget);
		    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		    if ( $title ) echo balanceTags($before_title)  . esc_attr($title)  . balanceTags($after_title);

		    $chrome = 	($header ? "noheader " : " ") .
		    			($footer ? "nofooter " : " ") . 
		    			($borders ? "noborders " : " ");
		    			//($scroll ? "noscrollbar" : " ") .
		    			//($transparent ? "transparent" : " ");
	    	?>
			
			<a class="twitter-timeline" 
				href="https://twitter.com/<?php echo esc_attr($user); ?>"
				data-widget-id="<?php echo esc_attr($id); ?>"
				data-theme="<?php echo esc_attr($theme); ?>"
				data-link-color="<?php echo esc_attr($color); ?>"
				data-chrome="<?php echo esc_attr($chrome); ?>"
				data-tweet-limit="<?php echo esc_attr($limit); ?>">
				Tweets by @ <?php echo esc_attr($user); ?>
			</a>

	    	<?php 
		    echo balanceTags($after_widget);
		}


	}
?>