<?php
/**
 * Members tag search form
 */

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('search:tags'),
	'name' => 'tag',
	'value' => get_input('tag'),
	'required' => true,
]);

echo elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('search'),
]);

