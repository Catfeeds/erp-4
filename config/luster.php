<?php

return [

'default_storehouse' =>1,
	'macros' => [
		/*
		 * Administration tables
		 */
		'default_per_page' => 25,

		/*
		 * The role the user is assigned to when they sign up from the frontend, not namespaced
		 */
		'default_role' => 'User',

		/*
		 * Whether or not the user has to confirm their email when signing up
		 */
		'confirm_email' => true,

		/*
		 * Whether or not the users email can be changed on the edit profile screen
		 */
		'change_email' => false,
	],
    'google-analytics' => 'UA-XXXXX-X',

];