CREATE TABLE users (
  users_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(100) NOT NULL,
  lastName VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pass VARCHAR(100),
  phoneNumber VARCHAR(100) NOT NULL,
  utype VARCHAR(100) NOT NULL
);

CREATE TABLE catalog (
  car_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  price decimal(10, 2) NOT NULL,
  created_at timestamp DEFAULT CURRENT_TIMESTAMP,
  available tinyint(1) DEFAULT 1
);


CREATE TABLE orders (
    order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
    FOREIGN KEY (carId) REFERENCES catalog(car_id),
    FOREIGN KEY (userId) REFERENCES users(users_id)
);

CREATE TABLE messages (
  message_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(50) NOT NULL,
  lastName VARCHAR(50) NOT NULL,
  topic VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  body VARCHAR(500) NOT NULL
);
