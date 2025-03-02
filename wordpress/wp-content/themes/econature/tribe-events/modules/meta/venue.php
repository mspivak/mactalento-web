<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 *
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.4.1
 *
 */


if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h2 class="tribe-events-single-section-title"><?php echo tribe_get_venue_label_singular(); ?></h2>
	<div class="cmsms_event_meta_info">
		<?php do_action('tribe_events_single_meta_venue_section_start'); ?>
		
		<div class="cmsms_event_meta_info_item">
			<span class="cmsms_event_meta_info_item_title"><?php esc_html_e('Venue Name:', 'econature'); ?></span>
			<span class="cmsms_event_meta_info_item_descr author fn org"><?php echo tribe_get_venue(); ?></span>
		</div>
		
		<?php if ( tribe_address_exists() ): ?> 
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php esc_html_e('Address:', 'econature'); ?></span>
				<span class="cmsms_event_meta_info_item_descr location tribe-events-address"><?php 
					echo tribe_get_full_address();
					
					if ( tribe_show_google_map_link() ) : 
						echo '<br />' . tribe_get_map_link_html();
					endif;
				?></span>
			</div>
		<?php
		endif;
		
		
		if (!empty($phone)): ?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php esc_html_e('Phone:', 'econature'); ?></span>
				<span class="cmsms_event_meta_info_item_descr tel"><?php echo wp_kses_post($phone); ?></span>
			</div>
		<?php endif;

		
		if (!empty($website)): ?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php esc_html_e('Website:', 'econature'); ?></span>
				<span class="cmsms_event_meta_info_item_descr url"><?php echo wp_kses_post($website); ?></span>
			</div>
		<?php endif;


		do_action('tribe_events_single_meta_venue_section_end'); ?>
	</div>
</div>