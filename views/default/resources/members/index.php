<?php
/**
 * Members index resource view
 */

$page_filter = elgg_extract('page', $vars, 'newest');

$num_members = elgg_count_entities([
	'type' => 'user',
]);

$title = elgg_echo('members');

$options = [
	'type' => 'user',
	'full_view' => false,
	'no_results' => elgg_echo('members:none'),
];

switch ($page_filter) {
	case 'popular':
		$options['relationship'] = 'friend';
		$options['inverse_relationship'] = false;
		$content = elgg_list_entities_from_relationship_count($options);
		break;
		
	case 'online':
		$content = elgg_list_online_users();
		break;
		
	case 'avatar':
		$options['limit'] = 70;
		$options['metadata_name_value_pairs'] = [
			'name' => 'icontime',
		];
		$options['list_type'] = 'gallery';
		$options['gallery_class'] = 'elgg-gallery-users';
		$options['item_view'] = 'user/elements/summary';
		$options['size'] = 'small';
		$content = elgg_list_entities($options);
		break;
		
	case 'banned':
		elgg_admin_gatekeeper();
		$options['metadata_name_value_pairs'] = [
			'name' => 'banned',
			'value' => 'yes',
		];
		$content = elgg_list_entities($options);
		break;
		
	case 'today':
		$time = time() - 86400;
		$options['wheres'][] = function(\Elgg\Database\QueryBuilder $qb, $main_alias) use ($time) {
			return $qb->compare("{$main_alias}.last_action", '>=', $time, ELGG_VALUE_INTEGER);
		};
		$options['order_by'] = [
			new \Elgg\Database\Clauses\OrderByClause('e.last_action', 'DESC'),
		];
		$content = elgg_list_entities($options);
		break;
		
	case 'week':
		$time = time() - 604800;
		$options['wheres'][] = function(\Elgg\Database\QueryBuilder $qb, $main_alias) use ($time) {
			return $qb->compare("{$main_alias}.last_action", '>=', $time, ELGG_VALUE_INTEGER);
		};
		$options['order_by'] = [
			new \Elgg\Database\Clauses\OrderByClause('e.last_action', 'DESC'),
		];
		$content = elgg_list_entities($options);
		break;
		
	case 'name':
		$options['order_by'] = [
			new \Elgg\Database\Clauses\OrderByClause('n_table.name', 'ASC'),
		];
		$content = elgg_list_entities($options);
		break;
		
	case 'newest':
	default:
		$content = elgg_list_entities($options);
		break;
}

$params = [
	'content' => $content,
	'sidebar' => elgg_view('members/sidebar'),
	'title' => $title . " ({$num_members})",
	'filter_value' => $page_filter,
	'filter_id' => 'members',
];

// Page owner
$page_owner = elgg_get_page_owner_entity();
if (!$page_owner) {
	elgg_set_page_owner_guid(elgg_get_site_entity()->guid);
}

$body = elgg_view_layout('default', $params);

echo elgg_view_page($title, $body);

