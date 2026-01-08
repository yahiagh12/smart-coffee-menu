<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/categories' => [[['_route' => 'admin_categories_list', '_controller' => 'App\\Controller\\Admin\\CategorieController::list'], null, null, null, false, false, null]],
        '/admin/categories/create' => [[['_route' => 'admin_categories_create', '_controller' => 'App\\Controller\\Admin\\CategorieController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\Admin\\DashboardController::dashboard'], null, null, null, false, false, null]],
        '/admin/events/list' => [
            [['_route' => 'admin_events_data', '_controller' => 'App\\Controller\\Admin\\EventManagementController::list'], null, null, null, false, false, null],
            [['_route' => 'admin_events_list', '_controller' => 'App\\Controller\\Admin\\EventsController::list'], null, null, null, false, false, null],
        ],
        '/admin/events/create' => [[['_route' => 'admin_events_create_action', '_controller' => 'App\\Controller\\Admin\\EventManagementController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin/events' => [[['_route' => 'admin_events', '_controller' => 'App\\Controller\\Admin\\EventsController::index'], null, null, null, false, false, null]],
        '/admin/events/new' => [[['_route' => 'admin_events_new', '_controller' => 'App\\Controller\\Admin\\EventsController::create'], null, null, null, false, false, null]],
        '/admin/events/edit' => [[['_route' => 'admin_events_edit_query', '_controller' => 'App\\Controller\\Admin\\EventsController::editQuery'], null, null, null, false, false, null]],
        '/admin/loyalty/api' => [[['_route' => 'admin_loyalty_api', '_controller' => 'App\\Controller\\Admin\\LoyaltyApiController::api'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/loyalty' => [[['_route' => 'admin_loyalty', '_controller' => 'App\\Controller\\Admin\\LoyaltyController::index'], null, null, null, false, false, null]],
        '/admin/loyalty/list' => [[['_route' => 'admin_loyalty_list', '_controller' => 'App\\Controller\\Admin\\LoyaltyController::list'], null, null, null, false, false, null]],
        '/admin_loyalty_list' => [[['_route' => 'admin_loyalty_list_alias', '_controller' => 'App\\Controller\\Admin\\LoyaltyController::list'], null, null, null, false, false, null]],
        '/admin/menu' => [[['_route' => 'admin_menu', '_controller' => 'App\\Controller\\Admin\\MenuController::index'], null, null, null, false, false, null]],
        '/admin/menu/list' => [[['_route' => 'admin_menu_list', '_controller' => 'App\\Controller\\Admin\\MenuController::list'], null, null, null, false, false, null]],
        '/admin/menu/categories' => [[['_route' => 'admin_menu_categories', '_controller' => 'App\\Controller\\Admin\\MenuController::categories'], null, null, null, false, false, null]],
        '/admin/menu/items' => [[['_route' => 'admin_menu_items_list', '_controller' => 'App\\Controller\\Admin\\MenuItemController::list'], null, null, null, false, false, null]],
        '/admin/menu/items/create' => [[['_route' => 'admin_menu_items_create', '_controller' => 'App\\Controller\\Admin\\MenuItemController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin/orders' => [[['_route' => 'admin_orders', '_controller' => 'App\\Controller\\Admin\\OrdersController::index'], null, null, null, false, false, null]],
        '/admin/orders/list' => [[['_route' => 'admin_orders_list', '_controller' => 'App\\Controller\\Admin\\OrdersController::list'], null, null, null, false, false, null]],
        '/admin/settings' => [[['_route' => 'admin_settings', '_controller' => 'App\\Controller\\Admin\\SettingsController::index'], null, null, null, false, false, null]],
        '/admin/suggestions' => [[['_route' => 'admin_suggestions', '_controller' => 'App\\Controller\\Admin\\SuggestionsController::index'], null, null, null, false, false, null]],
        '/admin/suggestions/list' => [[['_route' => 'admin_suggestions_list', '_controller' => 'App\\Controller\\Admin\\SuggestionsController::list'], null, null, null, false, false, null]],
        '/admin_suggestions_list' => [[['_route' => 'admin_suggestions_list_alias', '_controller' => 'App\\Controller\\Admin\\SuggestionsController::list'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\Controller\\Admin\\UsersController::index'], null, null, null, false, false, null]],
        '/admin/users/list' => [[['_route' => 'admin_users_list', '_controller' => 'App\\Controller\\Admin\\UsersController::list'], null, null, null, false, false, null]],
        '/admin/users/manage' => [[['_route' => 'admin_users_manage', '_controller' => 'App\\Controller\\Admin\\UsersController::manage'], null, null, null, false, false, null]],
        '/auth/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\Auth\\RegistrationController::register'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\Auth\\SecurityController::login'], null, null, null, false, false, null]],
        '/auth/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\Auth\\SecurityController::logout'], null, null, null, false, false, null]],
        '/client' => [[['_route' => 'client_home', '_controller' => 'App\\Controller\\Client\\ClientController::index'], null, null, null, false, false, null]],
        '/client/event-request' => [
            [['_route' => 'client_event_request_form', '_controller' => 'App\\Controller\\Client\\EventRequestController::form'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'client_event_request', '_controller' => 'App\\Controller\\Client\\EventRequestController::submit'], null, ['POST' => 0], null, false, false, null],
        ],
        '/client/events' => [[['_route' => 'client_events_list', '_controller' => 'App\\Controller\\Client\\EventsController::list'], null, null, null, false, false, null]],
        '/client/profile/upload' => [[['_route' => 'client_profile_upload', '_controller' => 'App\\Controller\\Client\\ProfileController::upload'], null, ['POST' => 0], null, false, false, null]],
        '/cafe_virtuel' => [
            [['_route' => 'cafe_virtuel', '_controller' => 'App\\Controller\\Public\\CafeController::show'], null, null, null, false, false, null],
            [['_route' => 'app_cafe_home', '_controller' => 'App\\Controller\\Public\\CafeController::show'], null, null, null, false, false, null],
        ],
        '/profile' => [[['_route' => 'profile_redirect', '_controller' => 'App\\Controller\\Public\\CafeController::profileRedirect'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\Public\\DefaultController::index'], null, null, null, false, false, null]],
        '/api/orders' => [[['_route' => 'api_orders', '_controller' => 'App\\Controller\\Public\\OrderApiController::orders'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/menu' => [[['_route' => 'api_menu', '_controller' => 'App\\Controller\\Public\\OrderApiController::menu'], null, ['GET' => 0], null, false, false, null]],
        '/traiteur' => [[['_route' => 'traiteur_dashboard', '_controller' => 'App\\Controller\\Traiteur\\TraiteurController::dashboard'], null, null, null, false, false, null]],
        '/traiteur/orders' => [[['_route' => 'traiteur_orders_list', '_controller' => 'App\\Controller\\Traiteur\\TraiteurController::orders'], null, null, null, false, false, null]],
        '/traiteur/products' => [[['_route' => 'traiteur_products', '_controller' => 'App\\Controller\\Traiteur\\TraiteurController::products'], null, null, null, false, false, null]],
        '/traiteur/dashboard/products' => [[['_route' => 'traiteur_dashboard_products', '_controller' => 'App\\Controller\\Traiteur\\TraiteurController::dashboardProducts'], null, null, null, false, false, null]],
        '/traiteur/update-order-status' => [[['_route' => 'traiteur_update_order_status', '_controller' => 'App\\Controller\\Traiteur\\TraiteurController::updateOrderStatus'], null, ['POST' => 0], null, false, false, null]],
        '/view' => [[['_route' => 'view_template', '_controller' => 'App\\Controller\\Utils\\ViewController::view'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|categories/([^/]++)/(?'
                            .'|edit(*:47)'
                            .'|delete(*:60)'
                        .')'
                        .'|events/(?'
                            .'|([^/]++)/(?'
                                .'|edit\\-action(*:102)'
                                .'|delete(*:116)'
                            .')'
                            .'|requests/([^/]++)/(?'
                                .'|accept(*:152)'
                                .'|delete(*:166)'
                            .')'
                            .'|([^/]++)/edit(*:188)'
                        .')'
                        .'|menu/items/([^/]++)/(?'
                            .'|edit(*:224)'
                            .'|delete(*:238)'
                        .')'
                        .'|orders/([^/]++)(*:262)'
                    .')'
                    .'|pi/orders/([^/]++)/status(*:296)'
                .')'
                .'|/client/event\\-request/([^/]++)/cancel(*:343)'
                .'|/traiteur/toggle\\-product\\-availability/([^/]++)(*:399)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        47 => [[['_route' => 'admin_categories_update', '_controller' => 'App\\Controller\\Admin\\CategorieController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        60 => [[['_route' => 'admin_categories_delete', '_controller' => 'App\\Controller\\Admin\\CategorieController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        102 => [[['_route' => 'admin_events_update_action', '_controller' => 'App\\Controller\\Admin\\EventManagementController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        116 => [[['_route' => 'admin_events_delete_action', '_controller' => 'App\\Controller\\Admin\\EventManagementController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        152 => [[['_route' => 'admin_event_requests_accept_action', '_controller' => 'App\\Controller\\Admin\\EventManagementController::acceptRequest'], ['id'], ['POST' => 0], null, false, false, null]],
        166 => [[['_route' => 'admin_event_requests_delete_action', '_controller' => 'App\\Controller\\Admin\\EventManagementController::deleteRequest'], ['id'], ['POST' => 0], null, false, false, null]],
        188 => [[['_route' => 'admin_events_edit', '_controller' => 'App\\Controller\\Admin\\EventsController::edit'], ['id'], null, null, false, false, null]],
        224 => [[['_route' => 'admin_menu_items_update', '_controller' => 'App\\Controller\\Admin\\MenuItemController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        238 => [[['_route' => 'admin_menu_items_delete', '_controller' => 'App\\Controller\\Admin\\MenuItemController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        262 => [[['_route' => 'admin_orders_detail', '_controller' => 'App\\Controller\\Admin\\OrdersController::detail'], ['id'], null, null, false, true, null]],
        296 => [[['_route' => 'api_orders_status', '_controller' => 'App\\Controller\\Public\\OrderApiController::updateStatus'], ['id'], ['POST' => 0], null, false, false, null]],
        343 => [[['_route' => 'client_event_request_cancel', '_controller' => 'App\\Controller\\Client\\EventRequestController::cancel'], ['id'], ['POST' => 0], null, false, false, null]],
        399 => [
            [['_route' => 'traiteur_toggle_product', '_controller' => 'App\\Controller\\Traiteur\\TraiteurController::toggleProductAvailability'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
