-- Database creation
CREATE DATABASE IF NOT EXISTS pthealthcare;
USE pthealthcare;

-- 1. Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Storing hashed password here via PHP
    role ENUM('admin', 'staff') DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default Admin Account: admin@pthealthcare.in / password123
INSERT IGNORE INTO users (name, email, password, role) VALUES 
('Super Admin', 'admin@pthealthcare.in', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- 2. Products Table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    size VARCHAR(20) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) DEFAULT 'default-bottle.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Products
INSERT IGNORE INTO products (name, brand, size, price) VALUES 
('Bipraj 500ml', 'Bipraj', '500ml', 10.00),
('Bipraj 1L', 'Bipraj', '1L', 20.00),
('Bipraj 2L', 'Bipraj', '2L', 35.00),
('Bipraj 5L', 'Bipraj', '5L', 80.00),
('Bipraj 20L', 'Bipraj', '20L', 150.00),
('Bislaim 500ml', 'Bislaim', '500ml', 10.00),
('Bislaim 1L', 'Bislaim', '1L', 20.00),
('Bislini 1L', 'Bislini', '1L', 20.00);

-- 3. Orders Table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'delivered', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Order Items Table
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
