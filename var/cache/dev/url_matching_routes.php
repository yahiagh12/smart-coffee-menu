<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\Admin\\DashboardController::dashboard'], null, null, null, false, false, null]],
        '/admin/events' => [[['_route' => 'admin_events', '_controller' => 'App\\Controller\\Admin\\EventsController::index'], null, null, null, false, false, null]],
        '/admin/events/list' => [[['_route' => 'admin_events_list', '_controller' => 'App\\Controller\\Admin\\EventsController::list'], null, null, null, false, false, null]],
        '/admin/events/new' => [[['_route' => 'admin_events_new', '_controller' => 'App\\Controller\\Admin\\EventsController::create'], null, null, null, false, false, null]],
        '/admin/events/edit' => [[['_route' => 'admin_events_edit_query', '_controller' => 'App\\Controller\\Admin\\EventsController::editQuery'], null, null, null, false, false, null]],
        '/admin/loyalty' => [[['_route' => 'admin_loyalty', '_controller' => 'App\\Controller\\Admin\\LoyaltyController::index'], null, null, null, false, false, null]],
        '/admin/loyalty/list' => [[['_route' => 'admin_loyalty_list', '_controller' => 'App\\Controller\\Admin\\LoyaltyController::list'], null, null, null, false, false, null]],
        '/admin_loyalty_list' => [[['_route' => 'admin_loyalty_list_alias', '_controller' => 'App\\Controller\\Admin\\LoyaltyController::list'], null, null, null, false, false, null]],
        '/admin/menu' => [[['_route' => 'admin_menu', '_controller' => 'App\\Controller\\Admin\\MenuController::index'], null, null, null, false, false, null]],
        '/admin/menu/list' => [[['_route' => 'admin_menu_list', '_controller' => 'App\\Controller\\Admin\\MenuController::list'], null, null, null, false, false, null]],
        '/admin/menu/categories' => [[['_route' => 'admin_menu_categories', '_controller' => 'App\\Controller\\Admin\\MenuController::categories'], null, null, null, false, false, null]],
        '/admin/orders' => [[['_route' => 'admin_orders', '_controller' => 'App\\Controller\\Admin\\OrdersController::index'], null, null, null, false, false, null]],
        '/admin/orders/list' => [[['_route' => 'admin_orders_list', '_controller' => 'App\\Controller\\Admin\\OrdersController::list'], null, null, null, false, false, null]],
        '/admin/settings' => [[['_route' => 'admin_settings', '_controller' => 'App\\Controller\\Admin\\SettingsController::index'], null, null, null, false, false, null]],
        '/admin/suggestions' => [[['_route' => 'admin_suggestions', '_controller' => 'App\\Controller\\Admin\\SuggestionsController::index'], null, null, null, false, false, null]],
        '/admin/suggestions/list' => [[['_route' => 'admin_suggestions_list', '_controller' => 'App\\Controller\\Admin\\SuggestionsController::list'], null, null, null, false, false, null]],
        '/admin_suggestions_list' => [[['_route' => 'admin_suggestions_list_alias', '_controller' => 'App\\Controller\\Admin\\SuggestionsController::list'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\Controller\\Admin\\UsersController::index'], null, null, null, false, false, null]],
        '/admin/users/list' => [[['_route' => 'admin_users_list', '_controller' => 'App\\Controller\\Admin\\UsersController::list'], null, null, null, false, false, null]],
        '/admin/users/manage' => [[['_route' => 'admin_users_manage', '_controller' => 'App\\Controller\\Admin\\UsersController::manage'], null, null, null, false, false, null]],
        '/api/categories' => [
            [['_route' => 'api_categories_list', '_controller' => 'App\\Controller\\Api\\CategorieController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_categories_create', '_controller' => 'App\\Controller\\Api\\CategorieController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/menu-items' => [
            [['_route' => 'api_menu_items_list', '_controller' => 'App\\Controller\\Api\\MenuItemController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_menu_items_create', '_controller' => 'App\\Controller\\Api\\MenuItemController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/cafe_virtuel' => [
            [['_route' => 'cafe_virtuel', '_controller' => 'App\\Controller\\CafeController::show'], null, null, null, false, false, null],
            [['_route' => 'app_cafe_home', '_controller' => 'App\\Controller\\CafeController::show'], null, null, null, false, false, null],
        ],
        '/profile' => [[['_route' => 'profile_redirect', '_controller' => 'App\\Controller\\CafeController::profileRedirect'], null, null, null, false, false, null]],
        '/client' => [[['_route' => 'client_home', '_controller' => 'App\\Controller\\ClientController::index'], null, null, null, false, false, null]],
        '/client/event-request' => [[['_route' => 'client_event_request', '_controller' => 'App\\Controller\\Client\\EventRequestController::submit'], null, ['POST' => 0], null, false, false, null]],
        '/client/profile/upload' => [[['_route' => 'client_profile_upload', '_controller' => 'App\\Controller\\Client\\ProfileController::upload'], null, ['POST' => 0], null, false, false, null]],
        '/auth/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/auth/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/auth/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/traiteur' => [
            [['_route' => 'traiteur_home', '_controller' => 'App\\Controller\\TraiteurController::index'], null, null, null, false, false, null],
            [['_route' => 'traiteur_home_slash', '_controller' => 'App\\Controller\\TraiteurController::index'], null, null, null, true, false, null],
        ],
        '/traiteur/dashboard' => [[['_route' => 'traiteur_dashboard', '_controller' => 'App\\Controller\\TraiteurController::dashboard'], null, null, null, false, false, null]],
        '/traiteur/orders' => [[['_route' => 'traiteur_orders_list', '_controller' => 'App\\Controller\\TraiteurController::orders'], null, null, null, false, false, null]],
        '/traiteur/products' => [[['_route' => 'traiteur_products', '_controller' => 'App\\Controller\\TraiteurController::products'], null, null, null, false, false, null]],
        '/view' => [[['_route' => 'view_template', '_controller' => 'App\\Controller\\ViewController::view'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|events/([^/]++)/edit(*:40)'
                        .'|orders/([^/]++)(*:62)'
                    .')'
                    .'|pi/(?'
                        .'|categories/([^/]++)(?'
                            .'|(*:98)'
                        .')'
                        .'|menu\\-items/([^/]++)(?'
                            .'|(*:129)'
                        .')'
                        .'|upload/([^/]++)(*:153)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        40 => [[['_route' => 'admin_events_edit', '_controller' => 'App\\Controller\\Admin\\EventsController::edit'], ['id'], null, null, false, false, null]],
        62 => [[['_route' => 'admin_orders_detail', '_controller' => 'App\\Controller\\Admin\\OrdersController::detail'], ['id'], null, null, false, true, null]],
        98 => [
            [['_route' => 'api_categories_get', '_controller' => 'App\\Controller\\Api\\CategorieController::get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_delete', '_controller' => 'App\\Controller\\Api\\CategorieController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_categories_update', '_controller' => 'App\\Controller\\Api\\CategorieController::update'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        129 => [
            [['_route' => 'api_menu_items_get', '_controller' => 'App\\Controller\\Api\\MenuItemController::get'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_menu_items_update', '_controller' => 'App\\Controller\\Api\\MenuItemController::update'], ['id'], ['PUT' => 0, 'POST' => 1], null, false, true, null],
            [['_route' => 'api_menu_items_delete', '_controller' => 'App\\Controller\\Api\\MenuItemController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        153 => [
            [['_route' => 'api_upload', '_controller' => 'App\\Controller\\Api\\UploadController::upload'], ['type'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
