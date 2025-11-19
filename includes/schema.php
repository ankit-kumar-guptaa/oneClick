<?php
function ensure_app_schema(mysqli $conn) {
    // Ensure users table exists (compatible with existing structure)
    $conn->query("CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(20) NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin','manager','staff','customer') NOT NULL DEFAULT 'customer',
        status ENUM('active','inactive','pending_verification') NOT NULL DEFAULT 'pending_verification',
        email_verified_at DATETIME NULL,
        last_login DATETIME NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Add missing columns defensively
    ensure_column($conn, 'users', 'phone', "ALTER TABLE users ADD COLUMN phone VARCHAR(20) NULL AFTER email");
    ensure_column($conn, 'users', 'status', "ALTER TABLE users ADD COLUMN status ENUM('active','inactive','pending_verification') NOT NULL DEFAULT 'pending_verification' AFTER role");
    ensure_column($conn, 'users', 'email_verified_at', "ALTER TABLE users ADD COLUMN email_verified_at DATETIME NULL AFTER status");

    // Ensure role enum includes 'customer'
    $conn->query("ALTER TABLE users MODIFY role ENUM('admin','manager','staff','customer') NOT NULL DEFAULT 'customer'");

    // Email verifications
    $conn->query("CREATE TABLE IF NOT EXISTS email_verifications (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NOT NULL,
        email VARCHAR(100) NOT NULL,
        otp_code VARCHAR(10) NOT NULL,
        expires_at DATETIME NOT NULL,
        attempts INT(11) NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX (email),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Policies catalog
    $conn->query("CREATE TABLE IF NOT EXISTS policies (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150) NOT NULL,
        slug VARCHAR(150) NOT NULL UNIQUE,
        category ENUM('Health','Motor','Travel','Life','Business','Investment','Other') NOT NULL,
        insurer VARCHAR(120) NOT NULL,
        description TEXT,
        premium DECIMAL(10,2) NOT NULL DEFAULT 0,
        sum_assured DECIMAL(12,2) NOT NULL DEFAULT 0,
        features TEXT,
        active TINYINT(1) NOT NULL DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX (category), INDEX (active)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Policy orders
    $conn->query("CREATE TABLE IF NOT EXISTS policy_orders (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NOT NULL,
        policy_id INT(11) NOT NULL,
        full_name VARCHAR(120) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        status ENUM('initiated','pending','paid','failed','issued') NOT NULL DEFAULT 'initiated',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (policy_id) REFERENCES policies(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    seed_default_policies($conn);
}

function ensure_column(mysqli $conn, string $table, string $column, string $alterSql) {
    $res = $conn->query("SHOW COLUMNS FROM `$table` LIKE '$column'");
    if ($res && $res->num_rows === 0) {
        $conn->query($alterSql);
    }
}

function seed_default_policies(mysqli $conn) {
    $countRes = $conn->query("SELECT COUNT(*) AS c FROM policies");
    $row = $countRes ? $countRes->fetch_assoc() : ['c' => 0];
    if ((int)$row['c'] > 0) return;

    $policies = [
        ['Term Life Insurance','term-life-insurance','Life','OneClick LifeCo','Affordable term life plan with high coverage.',499.00,5000000.00,'{"No medical up to 50L":"Yes","Accidental cover":"Optional"}'],
        ['Health Insurance','health-insurance','Health','OneClick Health','Comprehensive health cover for family.',699.00,1000000.00,'{"Cashless hospitals":"5000+","OPD":"Add-on"}'],
        ['Car Insurance','car-insurance','Motor','OneClick Motor','Complete car insurance with zero dep.',399.00,500000.00,'{"Zero Dep":"Yes","Roadside Assist":"Yes"}'],
        ['Travel Insurance','travel-insurance','Travel','OneClick Travel','Worldwide travel cover with COVID protection.',299.00,2000000.00,'{"Trip delay":"Covered","Loss of baggage":"Covered"}'],
        ['Business Insurance','business-insurance','Business','OneClick Biz','Protect your business from key risks.',899.00,10000000.00,'{"Liability":"Covered","Property":"Covered"}']
    ];

    $stmt = $conn->prepare("INSERT INTO policies (name, slug, category, insurer, description, premium, sum_assured, features) VALUES (?,?,?,?,?,?,?,?)");
    foreach ($policies as $p) {
        $stmt->bind_param('sssssdds', $p[0], $p[1], $p[2], $p[3], $p[4], $p[5], $p[6], $p[7]);
        $stmt->execute();
    }
    $stmt->close();
}
?>