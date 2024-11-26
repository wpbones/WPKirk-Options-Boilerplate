<?php

if (!defined('ABSPATH')) {
  exit();
}

/*
|--------------------------------------------------------------------------
| Plugin Menus routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the menu routes for a plugin.
| In this context, the route are the menu link.
|
*/

return [
  'wp_kirk_slug_menu' => [
    "page_title" => "WP Kirk Options",
    "menu_title" => "WP Kirk Options",
    'capability' => 'read',
    'icon' => 'wpbones-logo-menu.png',
    'items' => [
      [
        "menu_title" => __('Options', 'wp-kirk'),
        'capability' => 'read',
        'route' => [
          'get' => 'Options\OptionController@index'
        ],
      ],
      [
        "menu_title" => __('Options View', 'wp-kirk'),
        'capability' => 'read',
        'route' => [
          'get' => 'Options\OptionViewController@index',
          'post' => 'Options\OptionViewController@saveOptions',
        ],
      ],
      [
        "menu_title" => __('Options Resource', 'wp-kirk'),
        'capability' => 'read',
        'route' => [
          'load' => 'Options\OptionResourceController@load',
          'resource' => 'Options\OptionResourceController',
        ],
      ],
    ]
  ]
];
