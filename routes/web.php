<?php
// Advanced Automatic Routing System
class Router {
    private $routes = [];
    private $basePath = '';
    
    public function __construct($basePath = '') {
        $this->basePath = $basePath;
        $this->loadAutoRoutes();
    }
    
    private function loadAutoRoutes() {
        // Auto-generate routes for all PHP files
        $phpFiles = $this->scanPhpFiles();
        
        foreach ($phpFiles as $file) {
            $routeName = $this->generateRouteName($file);
            $this->routes[$routeName] = $file;
        }
        
        // Custom routes (optional - can override auto-generated ones)
        $this->routes[''] = 'index.php';
        $this->routes['home'] = 'index.php';
        $this->routes['signin'] = 'signin.php';
        $this->routes['contact'] = 'contact-us.php';
        $this->routes['about'] = 'about-us.php';
        $this->routes['car-insurance'] = 'car-insurance.php';
        $this->routes['bike-insurance'] = 'bike-insurance.php';
        $this->routes['health-insurance'] = 'health-insurance.php';
        $this->routes['life-insurance'] = 'life-insurance.php';
        $this->routes['travel-insurance'] = 'travel-insurance.php';
        $this->routes['business-insurance'] = 'business-insurance.php';
        $this->routes['investment-insurance'] = 'investment-insurance.php';
        $this->routes['commercial-vehicle-insurance'] = 'commercial-vehicle-insurance.php';
    }
    
    private function scanPhpFiles() {
        $files = [];
        $directory = new RecursiveDirectoryIterator(__DIR__ . '/..');
        $iterator = new RecursiveIteratorIterator($directory);
        $regex = new RegexIterator($iterator, '/^.+\\.php$/i', RecursiveRegexIterator::GET_MATCH);
        
        foreach ($regex as $file) {
            $relativePath = str_replace(__DIR__ . '/../', '', $file[0]);
            $relativePath = str_replace('\\', '/', $relativePath);
            
            // Skip vendor directory and admin panel files
            if (strpos($relativePath, 'vendor/') === 0 || 
                strpos($relativePath, 'admin/') === 0 ||
                strpos($relativePath, 'includes/') === 0) {
                continue;
            }
            
            $files[] = $relativePath;
        }
        
        return $files;
    }
    
    private function generateRouteName($filePath) {
        // Remove .php extension
        $routeName = preg_replace('/\\.php$/', '', $filePath);
        
        // Convert to kebab-case
        $routeName = strtolower(preg_replace(['/([a-z])([A-Z])/', '/[\s_\-]+/'], ['$1-$2', '-'], $routeName));
        
        // Remove any remaining special characters
        $routeName = preg_replace('/[^a-z0-9\-\/]/', '', $routeName);
        
        return $routeName;
    }
    
    public function getCurrentRoute() {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $route = trim(str_replace($this->basePath, '', $requestUri), '/');
        
        // Handle query parameter routing (from .htaccess)
        if (empty($route) && isset($_GET['route'])) {
            $route = trim($_GET['route'], '/');
        }
        
        return $route ?: '';
    }
    
    public function route() {
        $currentRoute = $this->getCurrentRoute();
        
        // Check if route exists
        if (array_key_exists($currentRoute, $this->routes)) {
            $file = $this->routes[$currentRoute];
            
            if (file_exists(__DIR__ . '/../' . $file)) {
                return __DIR__ . '/../' . $file;
            }
        }
        
        // Try to find the file directly
        $directFile = __DIR__ . '/../' . $currentRoute . '.php';
        if (file_exists($directFile)) {
            return $directFile;
        }
        
        // Fallback to 404
        return __DIR__ . '/../404.php';
    }
    
    public function generateUrl($routeName, $params = []) {
        if (array_key_exists($routeName, $this->routes)) {
            $url = $this->basePath . $routeName;
        } else {
            $url = $this->basePath . $routeName . '.php';
        }
        
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        
        return $url;
    }
}

// Initialize router
$basePath = '/OneClick Insurance/';
$router = new Router($basePath);

// Get the file to include
$fileToInclude = $router->route();

// Include the file
if (file_exists($fileToInclude)) {
    include $fileToInclude;
} else {
    // Fallback to 404
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 - Page Not Found</h1>";
    echo "<p>The page you are looking for does not exist.</p>";
}
?>
