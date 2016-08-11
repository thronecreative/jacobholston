<?

/** 
 * @file
 * template.php for FC Classic theme.
 * 
 * Implements preprocess and hook alter functions in this file.
 */
 
 
/**
 * Preprocess functions for page.tpl.php.
 */

function jh_classic_preprocess_page(&$vars){
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
 
function jh_classic_preprocess_node(&$vars){
	$node = $vars['node'];
	// Add general theme suggestions for all content types and view modes
	$vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];
	
	// JOB OFFER ====================================================
	if($vars['type'] == 'job_offer'){
		$vars['desc'] =  render($vars['content']['body']);
		$vars['quali'] =  render($vars['content']['field_qualifications']);
		$vars['require'] =  render($vars['content']['field_job_requirements']);
	}
	
}