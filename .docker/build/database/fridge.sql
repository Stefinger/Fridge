CREATE TABLE items (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   expiration_date DATE NOT NULL,
   quantity DECIMAL(10, 6) NOT NULL,
   unit ENUM('piece', 'kg', 'g', 'liter') NOT NULL DEFAULT 'piece',
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
