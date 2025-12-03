<?php
/**
 * Members plugin initialization
 */

return function() {
	elgg_register_event_handler('init', 'system', 'members_init');
};

/**
 * Initialize page handler and site menu item
 */
function members_init() {
	elgg_register_page_handler('members', 'members_page_handler');

	elgg_register_menu_item('site', [
		'name' => 'members',
		'text' => elgg_echo('members'),
		'href' => elgg_generate_url('default:members'),
	]);
	
	// Register route
	elgg_register_route('default:members', [
		'path' => '/members/{page?}/{subpage?}',
		'resource' => 'members/index',
		'defaults' => [
			'page' => 'newest',
		],
	]);
}

/**
 * Members page handler
 *
 * @param array $page url segments
 * @return bool
 */
function members_page_handler($page) {
	if (!isset($page[0])) {
		$page[0] = 'newest';
	}

	$vars = [];
	$vars['page'] = $page[0];

	if ($page[0] == 'search') {
		$vars['search_type'] = $page[1] ?? 'name';
		echo elgg_view_resource('members/search', $vars);
	} else {
		echo elgg_view_resource('members/index', $vars);
	}
	
	return true;
}
