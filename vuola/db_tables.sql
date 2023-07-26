CREATE TABLE sites (
    id INT PRIMARY KEY,
    site_name VARCHAR(100),
    site_latitude DOUBLE,
    site_longitude DOUBLE,
    user_id INT
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE products (
    id INT PRIMARY KEY,
    product_name VARCHAR(100),
    product_picture VARCHAR(255),
    product_default_protocol VARCHAR(255),
    product_default_IP_address VARCHAR(15),
    product_default_IP_port INT,
    product_default_RTU_address INT,
    product_default_variables JSON,
    image_id INT,
    FOREIGN KEY (image_id) REFERENCES images(id)
);

CREATE TABLE devices (
    id INT PRIMARY KEY,
    device_location_description VARCHAR(255),
    device_protocol VARCHAR(255),
    device_IP_address VARCHAR(15),
    device_IP_port INT,
    device_RTU_address INT,
    device_variables JSON,
    product_id INT,
    site_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (site_id) REFERENCES sites(id)
);

CREATE TABLE variables (
    id INT PRIMARY KEY,
    variable_multiplier DECIMAL(10, 2),
    variable_unit VARCHAR(50)
);

CREATE TABLE images (
    id INT PRIMARY KEY,
    image_platform VARCHAR(20),
    image_protocol VARCHAR(20),
    image_name VARCHAR(255),
    image_deploy VARCHAR(255),
    image_decomission VARCHAR(255)
);

CREATE TABLE collectors (
    id INT PRIMARY KEY,
    collector_name VARCHAR(255),
    collector_status VARCHAR(20),
    image_id INT,
    device_id INT,
    FOREIGN KEY (image_id) REFERENCES images(id),
    FOREIGN KEY (device_id) REFERENCES devices(id)
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

