<?php
/**
 * Related Events Template
 * The template for displaying related events on the single event page.
 * 
 * You can recreate an ENTIRELY new related events view by doing a template override, and placing
 * a related-events.php file in a tribe-events/pro/ directory within your theme directory, which
 * will override the /views/related-events.php. 
 *
 * You can use any or all filters included in this file or create your own filters in 
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters
 *
 * @package TribeEventsCalendarPro
 *
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.4.1
 *
 */
 

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$posts = tribe_get_related_posts();

if ( is_array( $posts ) && ! empty( $posts ) ) : ?>

<h2 class="tribe-events-related-events-title"><?php printf( __( 'Related %s', 'econature' ), tribe_get_event_label_plural() ); ?></h2>

<ul class="tribe-related-events tribe-clearfix hfeed vcalendar clearfix">
	<?php foreach ( $posts as $post ) : ?>
	<li>
		<?php $thumb = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'project-thumb') : '<span class="cmsms_events_img_placeholder cmsms_theme_icon_calendar"></span>'; ?>
		<div class="tribe-related-events-thumbnail">
			<a href="<?php echo esc_url( tribe_get_event_link( $post ) ); ?>" class="url" rel="bookmark"><?php echo cmsms_return_content($thumb); ?></a>
		</div>
		<div class="tribe-related-event-info">
			<h3 class="tribe-related-events-title summary"><a href="<?php echo tribe_get_event_link( $post ); ?>" class="url" rel="bookmark"><?php echo get_the_title( $post->ID ); ?></a></h3>
			<?php
				if ( $post->post_type == Tribe__Events__Main::POSTTYPE ) {
					echo tribe_events_event_schedule_details( $post );
				}
			?>
		</div>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>