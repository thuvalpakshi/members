<?php
/**
 * Members navigation - deprecated, now using page menu
 * This file is kept for backwards compatibility
 */

// Register page menu items
elgg_register_menu_item('page', [
	'name' => 'members:newest',
	'text' => elgg_echo('members:label:newest'),
	'href' => 'members/newest',
	'selected' => ($vars['selected'] ?? 'newest') == 'newest',
	'priority' => 100,
]);

elgg_register_menu_item('page', [
	'name' => 'members:name',
	'text' => elgg_echo('members:label:name'),
	'href' => 'members/name',
	'selected' => ($vars['selected'] ?? '') == 'name',
	'priority' => 200,
]);

elgg_register_menu_item('page', [
	'name' => 'members:popular',
	'text' => elgg_echo('members:label:popular'),
	'href' => 'members/popular',
	'selected' => ($vars['selected'] ?? '') == 'popular',
	'priority' => 300,
]);

elgg_register_menu_item('page', [
	'name' => 'members:online',
	'text' => elgg_echo('members:label:online'),
	'href' => 'members/online',
	'selected' => ($vars['selected'] ?? '') == 'online',
	'priority' => 400,
]);

elgg_register_menu_item('page', [
	'name' => 'members:today',
	'text' => elgg_echo('members:label:today'),
	'href' => 'members/today',
	'selected' => ($vars['selected'] ?? '') == 'today',
	'priority' => 500,
]);

elgg_register_menu_item('page', [
	'name' => 'members:week',
	'text' => elgg_echo('members:label:week'),
	'href' => 'members/week',
	'selected' => ($vars['selected'] ?? '') == 'week',
	'priority' => 600,
]);

elgg_register_menu_item('page', [
	'name' => 'members:avatar',
	'text' => elgg_echo('members:label:avatar'),
	'href' => 'members/avatar',
	'selected' => ($vars['selected'] ?? '') == 'avatar',
	'priority' => 700,
]);

if (elgg_is_admin_logged_in()) {
	elgg_register_menu_item('page', [
		'name' => 'members:banned',
		'text' => elgg_echo('members:label:banned'),
		'href' => 'members/banned',
		'selected' => ($vars['selected'] ?? '') == 'banned',
		'priority' => 800,
	]);
}

echo elgg_view_menu('page', [
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz elgg-menu-filter',
]);
