CREATE TABLE data_item (
    data_item_id INT PRIMARY KEY,
    data_multiplier DECIMAL(10, 2),
    data_unit VARCHAR(50),
    _device_id INT,
    FOREIGN KEY (_device_id) REFERENCES device(device_id)
);

CREATE TABLE device (
    device_id INT PRIMARY KEY,
    device_location_description VARCHAR(255),
    device_IP_address VARCHAR(15),
    device_IP_port INT,
    device_RTU_address INT,
    _device_type_id INT,
    _site_id INT,
    FOREIGN KEY (_device_type_id) REFERENCES device_type(device_type_id),
    FOREIGN KEY (_site_id) REFERENCES site(site_id)
);

CREATE TABLE site (
    site_id INT PRIMARY KEY,
    site_name VARCHAR(100),
    site_coordinates VARCHAR(50)
);

CREATE TABLE data (
    data_id INT PRIMARY KEY,
    data_timestamp TIMESTAMP,
    data_value DOUBLE,
    _data_item_id INT,
    FOREIGN KEY (_data_item_id) REFERENCES data_item(data_item_id)
);

CREATE TABLE collector (
    collector_id INT PRIMARY KEY,
    collector_name VARCHAR(255),
    collector_status VARCHAR(20),
    _collector_type_id INT,
    FOREIGN KEY (_collector_type_id) REFERENCES collector_type(collector_type_id)
);

CREATE TABLE cron_event (
    cron_event_id INT PRIMARY KEY,
    cron_mask VARCHAR(50),
    _collector_id INT,
    _data_item_id INT,
    FOREIGN KEY (_collector_id) REFERENCES collector(collector_id),
    FOREIGN KEY (_data_item_id) REFERENCES data_item(data_item_id)
);

CREATE TABLE collector_type (
    collector_type_id INT PRIMARY KEY,
    collector_platform VARCHAR(20),
    collector_protocol VARCHAR(20),
    collector_type_name VARCHAR(100),
    collector_image VARCHAR(255),
    collector_deploy VARCHAR(255),
    collector_decomission VARCHAR(255)
);

CREATE TABLE device_type (
    device_type_id INT PRIMARY KEY,
    device_type_name VARCHAR(100),
    device_type_picture VARCHAR(255),
    _collector_type_id INT,
    FOREIGN KEY (_collector_type_id) REFERENCES collector_type(collector_type_id)
);
