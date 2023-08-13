CREATE TABLE sites (
    id INT PRIMARY KEY,
    site_name VARCHAR(100),
    site_latitude DOUBLE,
    site_longitude DOUBLE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE images (
    id INT PRIMARY KEY,
    image_platform VARCHAR(20),
    image_protocol ENUM('Mb_TCP', 'Mb_RTU', 'API'),
    image_name VARCHAR(255),
    image_deploy VARCHAR(255),
    image_decomission VARCHAR(255),
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE products (
    id INT PRIMARY KEY,
    product_name VARCHAR(100),
    product_picture VARCHAR(255),
    product_default_protocol ENUM('Mb_TCP', 'Mb_RTU', 'API'),
    product_default_IP_address VARCHAR(15),
    product_default_IP_port INT,
    product_default_RTU_address INT,
    product_default_schema JSON
);

CREATE TABLE devices (
    id INT PRIMARY KEY,
    device_location_description VARCHAR(255),
    device_protocol ENUM('Mb_TCP', 'Mb_RTU', 'API'),
    device_IP_address VARCHAR(15),
    device_IP_port INT,
    device_RTU_address INT,
    device_schema JSON,
    device_collector_name VARCHAR(255),
    device_collector_status ENUM(null, 'inactive', 'active')
    site_id INT,
    image_id INT,
    FOREIGN KEY (site_id) REFERENCES sites(id),
    FOREIGN KEY (image_id) REFERENCES images(id),
);

CREATE TABLE variables (
    id INT PRIMARY KEY,
    variable_name VARCHAR(255),
    variable_multiplier DECIMAL(10, 2),
    variable_unit VARCHAR(50)
);

CREATE TABLE headers (
    id INT PRIMARY KEY,
    row_timestamp TIMESTAMP,
    device_id INT,
    FOREIGN KEY (device_id) REFERENCES devices(id)    
);

CREATE TABLE datas (
    id INT PRIMARY KEY,
    data_value DOUBLE,
    variable_id INT,
    header_id INT,
    FOREIGN KEY (variable_id) REFERENCES variables(id),
    FOREIGN KEY (header_id) REFERENCES headers(id)
);

