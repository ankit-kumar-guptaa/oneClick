<?php
// Basic Routing System
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = '/OneClick Insurance/';

// Remove base path from request URI
$route = str_replace($base_path, '', $request_uri);
$route = trim($route, '/');

// Route definitions
$routes = [
    '' => 'index.php',
    'home' => 'index.php',
    'about' => 'pages/about.php',
    'contact' => 'contact-us.php',
    'products' => 'pages/products.php',
    'login' => 'auth/login.php',
    'register' => 'auth/register.php',
    'dashboard' => 'user/dashboard.php'
];

// Handle routing
function handle_route($route, $routes) {
    if (array_key_exists($route, $routes)) {
        return $routes[$route];
    }
    return '404.php';
}

// Current route
$current_page = handle_route($route, $routes);
?>
