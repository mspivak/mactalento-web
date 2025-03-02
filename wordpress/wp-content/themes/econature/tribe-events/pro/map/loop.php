<?php
/**
 * Day View Loop
 * This file sets up the structure for the map loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/map/loop.php
 *
 * @package TribeEventsCalendar
 *
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.4.1
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $more, $post, $wp_query;
$more = false;
$current_timeslot = null;

?>

<div class="tribe-events-loop">
	<div class="tribe-events-day-time-slot">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<?php if ( $current_timeslot != $post->timeslot ) :
		$current_timeslot = $post->timeslot; ?>
	</div>
	<!-- .tribe-events-day-time-slot -->

	<div class="tribe-events-day-time-slot">
		<h5><?php echo cmsms_return_content($current_timeslot); ?></h5>
		<?php endif; ?>

		<!-- Event  -->
		<div id="post-<?php the_ID() ?>" class="vevent <?php tribe_events_event_classes() ?>">
			<?php tribe_get_template_part( 'day/single', 'event' ) ?>
		</div>

		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

	</div>
	<!-- .tribe-events-day-time-slot -->
</div><!-- .tribe-events-loop -->
