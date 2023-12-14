CREATE DATABASE SmartAgriculture;
USE SmartAgriculture;
CREATE TABLE users (user_id INT PRIMARY KEY,username VARCHAR(255) NOT NULL,email_id VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL,phone_no VARCHAR(15),address TEXT,user_role VARCHAR(50) NOT NULL
);
INSERT INTO users (user_id, username, email_id, password, phone_no, address, user_role)
VALUES
    (1, 'Sowrya', 'sowrya.teja@gmail.com', 'sowtej', '1234567890', '123 Main Street, Paris', 'User'),
    (2, 'Sourav', 'sourav.sarkar@gmail.com', 'sousar', '9876543210', '456 Oak Avenue, Bourdeaux', 'Admin'),
    (3, 'Punitha', 'punitha.karmegam@gmail.com', 'punkar', '5551112233', '789 Line, India', 'User'),
    (4, 'Jintao', 'jintao.fu@gmail.com', 'jintfu', '3332221111', '234 Road, China', 'Admin'),
    (5, 'Xiaoyu', 'xiaoyu.tang@gmail.com', 'xiatan', '9998887777', '567 Street, China', 'User');
    
    Select * from users;

CREATE TABLE tasks (task_id INT PRIMARY KEY,task_name VARCHAR(255) NOT NULL,task_status VARCHAR(50) NOT NULL,task_start_date DATE,task_end_date DATE
);
INSERT INTO tasks (task_id, task_name, task_status, task_start_date, task_end_date)
VALUES
    (1, 'Task 1', 'In Progress', '2024-01-15', '2024-02-28'),
    (2, 'Task 2', 'Pending', '2024-03-01', '2024-03-15'),
    (3, 'Task 3', 'Completed', '2024-02-10', '2024-02-25'),
    (4, 'Task 4', 'In Progress', '2024-04-01', '2024-04-15'),
    (5, 'Task 5', 'Pending', '2024-05-01', '2024-05-15');
    
    Select * from tasks;


CREATE TABLE tasktype (type_id INT PRIMARY KEY,tasktype_name VARCHAR(255) NOT NULL,description TEXT
);

INSERT INTO tasktype (type_id, tasktype_name, description)
VALUES
    (1, 'Development', 'Creating new features'),
    (2, 'Testing', 'Verifying the functionality of the system'),
    (3, 'Maintenance', 'Fixing bugs and updating existing features'),
    (4, 'Documentation', 'Creating and updating project documentation'),
    (5, 'Meeting', 'Conducting project meetings and discussions');
    
    Select * from tasktype;



CREATE TABLE standard_data (data_id INT PRIMARY KEY,nitrogen DECIMAL(10, 2) NOT NULL,potassium DECIMAL(10, 2) NOT NULL,phosphorus DECIMAL(10, 2) NOT NULL,calcium DECIMAL(10, 2) NOT NULL,ph DECIMAL(5, 2) NOT NULL,suitable_crop VARCHAR(255) NOT NULL,humidity DECIMAL(5, 2) NOT NULL
);

INSERT INTO standard_data (data_id, nitrogen, potassium, phosphorus, calcium, ph, suitable_crop, humidity)
VALUES
    (1, 25.5, 10.2, 15.8, 5.5, 6.8, 'Wheat', 65.5),
    (2, 30.2, 12.0, 20.1, 7.3, 7.2, 'Rice', 72.3),
    (3, 18.8, 8.5, 12.3, 4.7, 6.5, 'Corn', 60.1),
    (4, 22.0, 11.3, 18.5, 6.2, 7.0, 'Barley', 68.2),
    (5, 28.5, 13.8, 22.5, 8.0, 7.5, 'Soyabeans', 75.0);
    
    Select * from standard_data;



CREATE TABLE land (land_id INT PRIMARY KEY,
    farmer_id INT ,
    location VARCHAR(255) NOT NULL,
    soil_type VARCHAR(255),
    crop_type VARCHAR(255),
    FOREIGN KEY (farmer_id) REFERENCES land(land_id)
);
Alter table land Drop column attribute5; 
INSERT INTO land (land_id, farmer_id, location, soil_type, crop_type)
VALUES
    (1, 1, 'Field A', 'Loam',  'Rice'),
    (2, 2, 'Field B', 'Silt', 'Wheat'),
    (3, 3, 'Field C', 'Clay', 'Corn'),
    (4, 4, 'Field D', 'Sandy Loam', 'Barley'),
    (5, 5, 'Field E', 'Peat', 'Soybeans');

Select * from land;

CREATE TABLE farmers (
    farmer_id INT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    land_id INT,
    FOREIGN KEY (land_id) REFERENCES farmers(farmer_id) 
);

INSERT INTO farmers (farmer_id, first_name, last_name, land_id)
VALUES
    (1, 'Salah', 'sahal', 1),
    (2, 'Gautham', 'Pranshu', 2),
    (3, 'Ashish', 'Nehra', 3),
    (4, 'Sripathy', 'Sri', 4),
    (5, 'Manoj', 'Kumar', 5);

Select * from farmers;

CREATE TABLE sensors (
    sensor_id INT PRIMARY KEY,
    sensor_type_id INT,
    land_id INT,
    location VARCHAR(255) NOT NULL,
    FOREIGN KEY (sensor_type_id) REFERENCES sensor_type(type_id),
    FOREIGN KEY (land_id) REFERENCES land(land_id)
);

INSERT INTO sensors (sensor_id, sensor_type_id, land_id, location)
VALUES
    (1, 1, 1, 'Field A '),
    (2, 2, 2, 'Field B '),
    (3, 1, 3, 'Field C '),
    (4, 2, 4, 'Field D '),
    (5, 1, 5, 'Field E ');

Select * from sensors;




CREATE TABLE sensor_data (
    sensordata_id INT PRIMARY KEY,
    date DATE NOT NULL,
    time TIME NOT NULL,
    value DECIMAL(10, 2) NOT NULL
);

INSERT INTO sensor_data (sensordata_id, date, time, value)
VALUES
    (1, '2023-01-01', '12:30:00', 25.45),
    (2, '2023-01-02', '13:45:00', 18.20),
    (3, '2023-01-03', '10:15:00', 30.75),
    (4, '2023-01-04', '08:00:00', 22.60),
    (5, '2023-01-05', '15:30:00', 27.90);

Select * from sensor_data;

    CREATE TABLE Sensor_type2 (
    type_id INT PRIMARY KEY,
    type_name VARCHAR(255) NOT NULL,
    measurement_unit DECIMAL(4,2) NOT NULL,
    Sensortype_max DECIMAL(4, 2) NOT NULL,
    Sensortype_min DECIMAL(3, 2) NOT NULL
);
INSERT INTO Sensor_type2 (type_id, type_name, measurement_unit, Sensortype_max, Sensortype_min) VALUES
    (1, 'Temperature Sensor', 1.34, 1.00, 1.00),
    (2, 'Humidity Sensor', 5.78, 90.00, 1.00),
    (3, 'Light Sensor', 9.9, 80.00, 5.00),
    (4, 'Soil Moisture Sensor', 4.67, 80.00, 2.00),
    (5, 'PH Sensor', 7.89, 12.00, 3.00);
    
    select * from Sensor_type2;
    

