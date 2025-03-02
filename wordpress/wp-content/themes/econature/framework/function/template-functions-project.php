<?php 
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version		1.4.1
 * 
 * Template Functions for Portfolio & Project
 * Created by CMSMasters
 * 
 */


/* Get Projects Heading Function */
function cmsms_project_heading($cmsms_id, $tag = 'h1', $show = true, $link_redirect = false, $link_url = false, $link_target = false) { 
	$h1_tag_class = '';
	
	
	if ($tag == 'h1') {
		$tag = 'h3';
		
		$h1_tag_class = ' cmsms_h1_font_style';
	}
	
	
	$out = '<header class="cmsms_project_header entry-header">' . 
		'<' . $tag . ' class="cmsms_project_title entry-title' . $h1_tag_class . '">' . 
			'<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink())) . '"' . ($link_target == 'true' ? ' target="_blank"' : '') . '>' . cmsms_title($cmsms_id, false) . '</a>' . 
		'</' . $tag . '>' . 
	'</header>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Heading Without Link Function */
function cmsms_project_title_nolink($cmsms_id, $tag = 'h1', $show = true) { 
	$h1_tag_class = '';
	
	
	if ($tag == 'h1') {
		$tag = 'h3';
		
		$h1_tag_class = ' cmsms_h1_font_style';
	}
	
	
	$out = '<' . $tag . ' class="cmsms_project_title entry-title' . $h1_tag_class . '">' . 
		cmsms_title($cmsms_id, false) . 
	'</' . $tag . '>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Content/Excerpt Function */
function cmsms_project_exc_cont($show = true) {
	$out = cmsms_divpdel('<div class="cmsms_project_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(25, false)) . 
	'</div>' . "\n");
	
	
	if ($show) {
		echo cmsms_return_content($out);
	} else {
		return $out;
	}
}



/* Get Projects Category Function */
function cmsms_project_category($cmsms_id, $taxonomy, $template_type = 'page', $show = true) {
	if (get_the_terms($cmsms_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsms_project_category">' . 
				get_the_term_list($cmsms_id, $taxonomy, '', ', ', '') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsms_option = cmsms_get_global_options();
			$out = '';
			
			if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_cat']) {
				$out = '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . __('Categories', 'econature') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<span class="cmsms_project_category">' . 
							get_the_term_list($cmsms_id, $taxonomy, '', ', ', '') . 
						'</span>' . 
					'</div>' . 
				'</div>';
			}
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Projects Like Function */
function cmsms_project_like($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = cmsmsLike(false);
	} elseif ($template_type == 'post') {
		$cmsms_option = cmsms_get_global_options();
		$out = '';
		
		if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_like']) {
			$out = '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . __('Like', 'econature') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					cmsmsLike(false) . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo cmsms_return_content($out);
	} else {
		return $out;
	}
}



/* Get Projects Comments Function */
function cmsms_project_comments($template_type = 'page', $show = true) {
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = '<a class="cmsms_project_comments cmsms-icon-comment-6" href="' . get_comments_link() . '" title="' . __('Comment on', 'econature') . ' ' . get_the_title() . '">' . get_comments_number() . '</a>';
		} elseif ($template_type == 'post') {
			$cmsms_option = cmsms_get_global_options();
			
			$out = '';
			
			if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_comment']) {
				$out .= '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . __('Comments', 'econature') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<a class="cmsms_project_comments cmsms-icon-comment-6" href="' . get_comments_link() . '" title="' . __('Comment on', 'econature') . ' ' . get_the_title() . '">' . get_comments_number() . '</a>' . 
					'</div>' . 
				'</div>';
			}
		}
		
		
		if ($show) {
			echo cmsms_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Projects Date Function */
function cmsms_project_date($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<abbr class="published cmsms_project_date" title="' . get_the_date() . '">' . 
			get_the_date() . 
		'</abbr>' . 
		'<abbr class="dn date updated" title="' . get_the_modified_date() . '">' . 
			get_the_modified_date() . 
		'</abbr>';
	} elseif ($template_type == 'post') {
		$cmsms_option = cmsms_get_global_options();
		
		$out = '';
		
		if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_date']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . __('Date', 'econature') . ':' . '</div>' . 
				'<div class="project_details_item_desc">' . 
					'<abbr class="published cmsms_project_date" title="' . get_the_date() . '">' . 
						get_the_date() . 
					'</abbr>' . 
					'<abbr class="dn date updated" title="' . get_the_modified_date() . '">' . 
						get_the_modified_date() . 
					'</abbr>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Author Function */
function cmsms_project_author($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsms_project_author">' . 
			__('By', 'econature') . ' ' . 
			'<a href="' . get_author_posts_url(get_the_author_meta('ID')) . '" title="' . __('Projects by', 'econature') . ' ' . get_the_author_meta('display_name') . '" class="vcard author" rel="author"><span class="fn">' . get_the_author_meta('display_name') . '</span></a>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsms_option = cmsms_get_global_options();
		
		$out = '';
		
		if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_author']) {
			$out .= '<div class="project_details_item">' . 
				'<div class="project_details_item_title">' . __('Author', 'econature') . ':' . '</div>' . 
				'<div class="project_details_item_desc vcard author">' . 
					'<span class="cmsms_project_author fn" title="' . __('Projects by', 'econature') . ' ' . get_the_author_meta('display_name') . '">' . get_the_author_meta('display_name') . '</span>' . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Projects Tags Function */
function cmsms_project_tags($cmsms_id, $taxonomy, $template_type = 'page', $show = true) {
	if (get_the_terms($cmsms_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsms_project_tags">' . 
				get_the_term_list($cmsms_id, $taxonomy, '', ', ', '') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsms_option = cmsms_get_global_options();
			$out = '';
			
			if ($cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_tag']) {
				$out = '<div class="project_details_item">' . 
					'<div class="project_details_item_title">' . __('Tags', 'econature') . ':' . '</div>' . 
					'<div class="project_details_item_desc">' . 
						'<span class="cmsms_project_tags">' . 
							get_the_term_list($cmsms_id, $taxonomy, '', ', ', '') . 
						'</span>' . 
					'</div>' . 
				'</div>';
			}
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Projects Features Function */
function cmsms_project_features($features_position = 'features', $features = '', $features_title = false, $tag = 'h2', $show = true) {
	if (
		(
			!empty($features[0][0]) && 
			!empty($features[0][1])
		) || (
			!empty($features[1][0]) && 
			!empty($features[1][1])
		)
	) {
		$out = '';
		
		if ($features_position == 'features') {
			$out .= '<div class="project_features entry-meta">' . 
				($features_title ? '<' . $tag . ' class="project_features_title">' . $features_title . '</' . $tag . '>' : '');
		}
		
		
		foreach ($features as $feature) {
			if ($feature[0] != '' && $feature[1] != '') {
				$feature_lists = explode("\n", $feature[1]);
				
				$out .= '<div class="project_' . $features_position . '_item">' . 
					'<div class="project_' . $features_position . '_item_title">' . $feature[0] . '</div>' . 
					'<div class="project_' . $features_position . '_item_desc">';
				
						foreach ($feature_lists as $feature_list) {
							$out .= trim($feature_list);
						}
				
					$out .= '</div>' . 
				'</div>';
			}
		}
		
		
		if ($features_position == 'features') {
			$out .= '</div>';
		}
		
		if ($show) {
			echo cmsms_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Projects Link Function */
function cmsms_project_link($link_text, $link_url, $link_target, $show = true) {
	$cmsms_option = cmsms_get_global_options();
	$out = '';
	
	if ( 
		$cmsms_option[CMSMS_SHORTNAME . '_portfolio_project_link'] && 
		$link_text != '' && 
		$link_url != '' 
	) {
		$out = '<div class="project_details_item">' . 
			'<div class="project_details_item_title">' . __('Project Link', 'econature') . ':' . '</div>' . 
			'<div class="project_details_item_desc">' . 
				'<span class="cmsms_project_tags">' . 
					'<a href="' . $link_url . '" title="' . $link_text . '"' . (($link_target == 'true') ? ' target="_blank"' : '') . '>' . $link_text . '</a>' . 
				'</span>' . 
			'</div>' . 
		'</div>';
	}
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}

