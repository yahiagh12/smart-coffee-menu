<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\Admin\\DashboardController::dashboard'], null, null, null, false, false, null]],
        '/admin/menu' => [[['_route' => 'admin_menu', '_controller' => 'App\\Controller\\Admin\\MenuController::index'], null, null, null, false, false, null]],
        '/admin/menu/list' => [[['_route' => 'admin_menu_list', '_controller' => 'App\\Controller\\Admin\\MenuController::list'], null, null, null, false, false, null]],
        '/admin/menu/categories' => [[['_route' => 'admin_menu_categories', '_controller' => 'App\\Controller\\Admin\\MenuController::categories'], null, null, null, false, false, null]],
        '/api/categories' => [
            [['_route' => 'api_categories_list', '_controller' => 'App\\Controller\\Api\\CategorieController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_categories_create', '_controller' => 'App\\Controller\\Api\\CategorieController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/menu-items' => [
            [['_route' => 'api_menu_items_list', '_controller' => 'App\\Controller\\Api\\MenuItemController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_menu_items_create', '_controller' => 'App\\Controller\\Api\\MenuItemController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/simple-menu' => [[['_route' => 'api_simple_menu_list', '_controller' => 'App\\Controller\\Api\\SimpleMenuController::list'], null, ['GET' => 0], null, false, false, null]],
        '/test' => [[['_route' => 'app_test_test', '_controller' => 'App\\Controller\\TestController::test'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|categories/([^/]++)(?'
                        .'|(*:37)'
                    .')'
                    .'|menu\\-items/([^/]++)(?'
                        .'|(*:68)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        37 => [
            [['_route' => 'api_categories_get', '_controller' => 'App\\Controller\\Api\\CategorieController::get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_delete', '_controller' => 'App\\Controller\\Api\\CategorieController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        68 => [
            [['_route' => 'api_menu_items_get', '_controller' => 'App\\Controller\\Api\\MenuItemController::get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_menu_items_update', '_controller' => 'App\\Controller\\Api\\MenuItemController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_menu_items_delete', '_controller' => 'App\\Controller\\Api\\MenuItemController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
