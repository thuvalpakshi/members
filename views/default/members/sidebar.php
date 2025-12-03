<?php
/**
 * Members sidebar
 */

// Name search
$params = [
	'method' => 'get',
	'action' => elgg_normalize_url('members/search/name'),
	'disable_security' => true,
];
$body = elgg_view_form('members/name_search', $params);

echo elgg_view_module('aside', elgg_echo('members:searchname'), $body);

// Tag search
$params = [
	'method' => 'get',
	'action' => elgg_normalize_url('members/search/tag'),
	'disable_security' => true,
];

$body = elgg_view_form('members/tag_search', $params);

echo elgg_view_module('aside', elgg_echo('members:searchtag'), $body);
