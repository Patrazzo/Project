CREATE TABLE users (
  users_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(100) NOT NULL,
  lastName VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pass VARCHAR(100),
  phoneNumber VARCHAR(100) NOT NULL,
  utype VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE catalog (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    available TINYINT(1) DEFAULT 1
);

CREATE TABLE orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    shippingAddress VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pickupLocation VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    postalCode VARCHAR(10) NOT NULL,
    paymentMethod VARCHAR(100) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    carId INT(11),
    userId INT(11),
    FOREIGN KEY (carId) REFERENCES catalog(id),
    FOREIGN KEY (userId) REFERENCES users(users_id)
);