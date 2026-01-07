<?php
/**
 * Members search resource view
 */

$search_type = elgg_extract('search_type', $vars, 'name');

if ($search_type == 'tag') {
	$tag = get_input('tag');
	
	$title = elgg_echo('members:title:searchtag', [$tag]);
	
	$options = [
		'query' => $tag,
		'type' => 'user',
		'limit' => get_input('limit', elgg_get_config('default_limit')),
	];
	
	$results = elgg_trigger_event_results('search', 'tags', $options, []);
	$count = $results['count'] ?? 0;
	$users = $results['entities'] ?? [];
	
	$content = elgg_view_entity_list($users, [
		'count' => $count,
		'limit' => $options['limit'],
		'full_view' => false,
		'list_type_toggle' => false,
		'pagination' => true,
		'no_results' => elgg_echo('members:searchname:none'),
	]);
} else {
	$name = get_input('name');
	
	$title = elgg_echo('members:title:searchname', [$name]);
	
	$params = [
		'type' => 'user',
		'full_view' => false,
		'query' => $name,
		'fields' => [
			'metadata' => ['name', 'username'],
		],
		'no_results' => elgg_echo('members:searchname:none'),
	];
	
	$content = elgg_list_entities($params);
}

$params = [
	'title' => $title,
	'content' => $content,
	'sidebar' => elgg_view('members/sidebar'),
	'filter' => false,
];

// Page owner
$page_owner = elgg_get_page_owner_entity();
if (!$page_owner) {
	elgg_set_page_owner_guid(elgg_get_site_entity()->guid);
}

$body = elgg_view_layout('default', $params);

echo elgg_view_page($title, $body);

