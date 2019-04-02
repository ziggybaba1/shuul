<?php


return [

	'path' => storage_path() . '/dumps/',

	'mysql' => [
		'dump_command_path' => public_path('/uploads/backup/'),
		'restore_command_path' => '',
	],

	's3' => [
		'path' => ''
	],

    'compress' => false,
];

