<?php
/**
 * Members name search form
 */

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('name'),
	'name' => 'name',
	'value' => get_input('name'),
	'required' => true,
]);

echo elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('search'),
]);

