<?php
/**
 * Creates widget with events
 */

class Events_Widget extends WP_Widget
{

/**
 * Widget constructor
 *
 * @desc sets default options and controls for widget
 */
	function Events_Widget () {
		/* Widget settings */
		$widget_ops = array (
			'classname' => 'widget_events',
			'description' => __('Display upcoming events')
		);

		/* Create the widget */
		$this->WP_Widget('events-widget', __('Theme &rarr; All Events'), $widget_ops);
	}

/**
 * Displaying the widget
 *
 * Handle the display of the widget
 * @param array
 * @param array
 */
function widget ( $args, $instance ) {
    extract ($args);
    global $wp_query;

    /* Before widget(defined by theme)*/
    echo $before_widget;

    $now = new DateTime(date("Y-m-d"));
    $monthly_events = array();
    $months = array(1 => __("Jan", THEME_CODE_NAME), 2 => __("Feb", THEME_CODE_NAME), 3 => __("Mar", THEME_CODE_NAME), 4 => __("Apr", THEME_CODE_NAME), 5 => __("May", THEME_CODE_NAME), 6 => __("Jun", THEME_CODE_NAME), 7 => __("Jul", THEME_CODE_NAME), 8 => __("Aug", THEME_CODE_NAME), 9 => __("Sep", THEME_CODE_NAME), 10 => __("Oct", THEME_CODE_NAME), 11 => __("Nov", THEME_CODE_NAME), 12 => __("Dec", THEME_CODE_NAME));
    $current_month = (int)date("n");
    $selected_month = $current_month;

    $events = "";
    if($instance['widget_events'] != "0"){
        $events = query_posts( array( 'post_type' => 'ait-event', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'ait-event-category', 'field' => 'id', 'terms' => $instance['widget_events']) ) )  );
    } else {
        $events = query_posts( array( 'post_type' => 'ait-event', 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => -1 )  );
    }
    wp_reset_query();

    foreach($events as $i => $event){
        $meta = get_post_meta($event->ID);
        $event_meta = unserialize($meta['_ait-event'][0]);
        $event_date = new DateTime($event_meta['eventDate']);
        $event_link = get_permalink($event->ID);

        $render_event = array(
            "id" => $event->ID,
            "title" => $event->post_title,
            "desc" => $event_meta['eventDescription'],
            "link" => $event_link,
            "slug" => $event->post_name,
            "date" => date_format($event_date,'Y').'-'.date_format($event_date,'m').'-'.date_format($event_date,'d'),
            "date_day" => date_format($event_date,'d'),
            "date_month" => date_format($event_date,'m'),
            "date_year" => date_format($event_date,'Y')
        );
        if(intval($event_date->format("U")) >= intval($now->format("U"))){
            $monthly_events[intval($event_date->format("U")+$event->ID)] = $render_event;
        }
    }

    // sortovanie
    ksort($monthly_events, SORT_NUMERIC);

    if(empty($monthly_events)){
        if(!empty($instance['widget_title'])){
            echo($before_title.do_shortcode($instance['widget_title']).$after_title);
        } else {
            echo($before_title.__("Events",THEME_CODE_NAME).$after_title);
        }
        echo('<div class="events-container">');
            echo('<div class="event-container clear">');
                echo('<a href="'.$instance['widget_page'].'">');
                    echo('<span class="event-title">'.__('No Events found', THEME_CODE_NAME).'</span>');
                echo('</a>');
            echo('</div>');
        echo('</div>');
    } else {
        if(!empty($instance['widget_title'])){
            echo($before_title.do_shortcode($instance['widget_title']).$after_title);
        } else {
            echo($before_title.__("Events",THEME_CODE_NAME).$after_title);
        }
        echo('<div class="events-container">');
        if(count($monthly_events) > $instance['event_maximum']){
            // more
        }
        $i = 0;
        foreach($monthly_events as $mEvent){
            if($i < $instance['event_maximum']){
                echo('<div class="event-container clear">');
                    echo('<a href="'.$instance['widget_page'].'&amp;date='.$mEvent['date'].'&amp;event='.$mEvent['slug'].'">');
                        echo('<h3 class="event-date">'.$mEvent['date_day'].'</h3><span class="event-month">'.$months[intval($mEvent['date_month'])].'</span>');
                        echo('<span class="event-title">'.$mEvent['title'].'</span>');
                        echo('<span class="event-desc">'.$mEvent['desc'].'</span>');
                    echo('</a>');
                echo('</div>');
            }
            $i++;
        }
        echo('</div>');
    }

    /* After widget(defined by theme)*/
    echo $after_widget;
}

/**
 * Update and save widget
 *
 * @param array $new_instance
 * @param array $old_instance
 * @return array New widget values
 */
function update ( $new_instance, $old_instance ) {
    $old_instance['widget_title'] = strip_tags( $new_instance['widget_title'] );
    $old_instance['widget_page'] = strip_tags( $new_instance['widget_page'] );
    $old_instance['widget_events'] = strip_tags( $new_instance['widget_events'] );
    $old_instance['event_maximum'] = strip_tags( $new_instance['event_maximum'] );

    return $old_instance;
}


/**
 * Creates widget controls or settings
 *
 * @param array Return widget options form
 */

function form ( $instance ) {
    global $wpdb;
    $instance = wp_parse_args( (array) $instance, array(
        'widget_title' => '',
        'widget_page' => '',
        'widget_events' => '',
        'event_maximum' => 5
        ) );
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php echo __( 'Widget Title' ); ?>:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" value="<?php echo $instance['widget_title']; ?>"class="widefat" style="width:100%;" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'widget_page' ); ?>"><?php echo __( 'Page to display' ); ?>:</label>
        <select id="<?php echo $this->get_field_id( 'widget_page' ); ?>" name="<?php echo $this->get_field_name( 'widget_page' ); ?>">
            <?php
            $pages = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."postmeta WHERE `meta_key` = '_wp_page_template' AND `meta_value` = 'page-event.php'");
            foreach($pages as $page){
                $pageProps = get_post($page->post_id);
                if($instance['widget_page'] == $pageProps->guid){
                    echo('<option selected="selected" value="'.$pageProps->guid.'">'.$pageProps->post_title.'</option>');
                } else {
                    echo('<option value="'.$pageProps->guid.'">'.$pageProps->post_title.'</option>');
                }
            }
            ?>
        </select>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'widget_events' ); ?>"><?php echo __( 'Events category' ); ?>:</label>
        <select id="<?php echo $this->get_field_id( 'widget_events' ); ?>" name="<?php echo $this->get_field_name( 'widget_events' ); ?>">
            <?php
            $events = $wpdb->get_results("SELECT ".$wpdb->prefix."terms.* FROM ".$wpdb->prefix."terms LEFT JOIN (".$wpdb->prefix."term_taxonomy) ON (".$wpdb->prefix."terms.term_id = ".$wpdb->prefix."term_taxonomy.term_taxonomy_id) WHERE ".$wpdb->prefix."term_taxonomy.taxonomy='ait-event-category';");
            $all = array('term_id' => "0", "name" => "All", "slug" => "all", "term_group" => "0");
            array_unshift($events, (object)$all);
            foreach($events as $event){
                if($instance['widget_events'] == $event->term_id){
                    echo('<option selected="selected" value="'.$event->term_id.'">'.$event->name.'</option>');
                } else {
                    echo('<option value="'.$event->term_id.'">'.$event->name.'</option>');
                }
            }
            ?>
        </select>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'event_maximum' ); ?>"><?php echo __( 'Displayed events' ); ?>:</label>
        <select id="<?php echo $this->get_field_id( 'event_maximum' ); ?>" name="<?php echo $this->get_field_name( 'event_maximum' ); ?>">
            <?php
              for($i = 1; $i < 6; $i++){
                  if($instance['event_maximum'] == $i){
                      echo('<option selected="selected" value="'.$i.'">'.$i.'</option>');
                  } else {
                      echo('<option value="'.$i.'">'.$i.'</option>');
                  }
              }
            ?>
        </select>
    </p>
    <?php
    }
}

register_widget( 'Events_Widget' );
