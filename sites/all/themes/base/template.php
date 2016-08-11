<?


/** 
 * @file
 * template.php for Gallery Base theme.
 * 
 * Implements preprocess and hook alter functions in this file.
 */
 
 
/**
 * Preprocess functions for page.tpl.php.
 */
function base_preprocess_page(&$vars){
		$vars['node_type'] = NULL;
	
	if(isset($vars['node'])){
		$node = $vars['node'];
		$vars['line_sheet_pw'] = 'EMPTY';
		if(isset($vars['node']->field_collection_line_sheet)){
			$vars['line_sheet_url'] = $vars['node']->field_collection_line_sheet['und'][0]['filename'];
		}
		
		if(isset($vars['node']->field_collection_line_sheet_pw)){
			$vars['line_sheet_pw'] = $vars['node']->field_collection_line_sheet_pw['und'][0]['value'];
		}
		
		$vars['node_type'] = $vars['node']->type;
		
	}
}
 

/**
 * Preprocess functions for node.tpl.php.
 */
 
function base_preprocess_node(&$vars){
	$node = $vars['node'];
	$options = array('absolute' => TRUE);
	$nid = $vars['vid']; // Node ID
	$url = url('node/' . $nid, $options);
	
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['view_mode'];
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];


	// GENERAL VARS ====================================================
	$vars['body'] = render($vars['content']['body']);
	$vars['created'] = format_date($vars['created'], 'custom', "n/j/y");
	$vars['sections'] = render($vars['content']['field_section']);
	$vars['tags'] =  render($vars['content']['field_tags']);
	$vars['service_links'] = render($vars['content']['service_links']);
	$vars['video'] = render($vars['content']['field_video_url']);
	
	if($vars['view_mode'] == 'teaser'){
		$vars['title'] = l(html_entity_decode($vars['title']), $url, array('html' => TRUE));

		$vars['cover_image'] = render($vars['content']['field_cover_image']);

		if($vars['type'] == 'video'){
			$vars['cover_image'] = render($vars['content']['field_video_url']);
		}
	}

	// IMAGE GALLERY ====================================================
	if($vars['type'] == 'intro_gallery'){



	 //   if($vars['view_mode'] == 'full'){
		//    $images = array();
		//    for($i = 0; $i < count($vars['field_intro_images']); $i++){

		//      	$image = render_image($vars['field_intro_images'][$i], 'intro_gallery_image');

		//      	if($vars['field_intro_images'][$i]['linknext'][1]){
		//      		$caption1 = '<div class="caption c-left">' . $vars['field_intro_images'][$i]['title'] . '</div>';
		//      		$iw = $vars['field_intro_images'][$i]['width'];
		//      		$i++;
		//      		$caption2 = '<div class="caption c-right">' . $vars['field_intro_images'][$i]['title'] . '</div>';
		//      		$iw2 = $vars['field_intro_images'][$i]['width'];
		//      		$wt = $iw + $iw2;

		// 	     	$image2 = render_image($vars['field_intro_images'][$i], 'gallery_large');
		// 	     	$images[] = '<div class="image-group" data-wt="'. $wt .'">' . $image . $image2 . '<div class="captions">' . $caption1 . $caption2 . '</div></div>';
		//      	}else{
		//      		$caption = '<div class="captions"><div class="caption">' . $vars['field_intro_images'][$i]['title'] . '</div></div>';
		//      		$images[] = '<div class="single-image">' . $image . $caption . '</div>';
		//      	}

		//    }

		//    $gallery_settings = array(
		// 		'autoplay' => $vars['field_autoplay_slideshow'][0]['value'],
		// 		'start_thumbs' => $vars['field_start_with_thumbnails'][0]['value'],
		// 		'hide_controls' => $vars['field_hide_controls'][0]['value'],
		// 	);

		// 	drupal_add_js(array('gallery_settings' => $gallery_settings), 'setting');

		//    $vars['images'] = theme_item_list(array(
		//    	'items' => $images, 
		//    	'title' => null,
		//    	'type' => 'ul', 
		//    	'attributes' => array(),
		//    	)
		//    );
		// 	drupal_add_js(path_to_theme() . '/js/init_gallery.js');
		// }


		if($vars['vid'] == 15){
			$vars['theme_hook_suggestions'][] = 'node__intro__gallery';
			$intro_images = array();
			
			for($i = 0; $i < 5; $i++){
				$intro_images[] = file_create_url($vars['field_intro_images'][$i]['uri']);
			}

			drupal_add_js(array('intro_images' => $intro_images), 'setting');
			drupal_add_js(path_to_theme() . '/js/jquery.backstretch.min.js');
			drupal_add_js(path_to_theme() . '/js/intro-gallery.js');

			//kpr($intro_images);
		}
		
	}
	

	// ARTICLE ====================================================
	if($vars['type'] == 'article'){
		
		$vars['cover_image'] = render($vars['content']['field_cover_image']);
		$vars['post_date'] = $vars['created'];
		$vars['tags'] =  render($vars['content']['field_tags']);
		$vars['summary'] = render($vars['content']['body']);
		$vars['service_links'] =  render($vars['content']['service_links']);
		$vars['comment_count'] = l('Comments ' . $vars['comment_count'], $url . '#comments');

		if($vars['view_mode'] == 'teaser'){
			//$vars['title'] = l($vars['title'], $url);
			$vars['cover_image'] = l($vars['cover_image'], $url, array('html'=>TRUE));
			$read_more = l(' — read more', $url);
			$summary_text = render($vars['content']['body']);
			$vars['summary'] = $summary_text . '  ' . $read_more;
		}

		//kpr($vars);
	}

	// ARTICLE ====================================================
	if($vars['type'] == 'job_offer'){
		
		$vars['quali'] =  render($vars['content']['field_qualifications']);
		$vars['require'] =  render($vars['content']['field_job_requirements']);
		//kpr($vars);
	}
	
	//dpm($vars);
}

// Renders image with a given image style
function render_image($img, $style){
	$uri = $img['uri'];
	$title = $img['title'];
  	$alt = $img['alt'];
  	$iw = $img['width'];
  	$ih = $img['height'];
  	
  	$image_style = array(
  		'style_name' => $style, 
  		'path' => $uri,
  		'alt' => $alt,
  		 
  		'attributes' => array(
  			'data-width' => $iw, 
  			'data-height' => $ih,
  			'data-title' => $title,
  		),
  	);

  	return theme('image_style', $image_style);
};





