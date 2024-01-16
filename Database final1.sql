CREATE DATABASE Teja;
USE Teja;

-- Create farmers table
CREATE TABLE `farmers` (
  `Farmer_id` int NOT NULL AUTO_INCREMENT,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Land_id` int DEFAULT NULL,
  PRIMARY KEY (`Farmer_id`)
);


-- Create farmersland table
CREATE TABLE `farmersland` (
  `Farmer_id` int NOT NULL,
  `Land_id` int NOT NULL,
  PRIMARY KEY (`Farmer_id`,`Land_id`),
  KEY `Land_id` (`Land_id`),
  CONSTRAINT `farmersland_ibfk_1` FOREIGN KEY (`Farmer_id`) REFERENCES `farmers` (`Farmer_id`),
  CONSTRAINT `farmersland_ibfk_2` FOREIGN KEY (`Land_id`) REFERENCES `land` (`Land_id`)
);



-- Create users table
CREATE TABLE `users` (
  `User_id` int NOT NULL AUTO_INCREMENT,
  `User_name` varchar(255) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `User_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`User_id`)
);

-- Create land table
CREATE TABLE `land` (
  `Land_id` int NOT NULL AUTO_INCREMENT,
  `Farmer_id` int DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Soil_type` varchar(255) DEFAULT NULL,
  `Crop_type` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`Land_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`)
);


-- Create sensortype table
CREATE TABLE `sensortype` (
  `Sensortype_id` int NOT NULL AUTO_INCREMENT,
  `Typename` varchar(255) NOT NULL,
  `Measurement_unit` varchar(50) DEFAULT NULL,
  `Sensortype_max` float DEFAULT NULL,
  `Sensortype_min` float DEFAULT NULL,
  PRIMARY KEY (`Sensortype_id`)
);

-- Create sensors table
CREATE TABLE `sensors` (
  `Sensor_id` int NOT NULL AUTO_INCREMENT,
  `Sensor_typeid` int DEFAULT NULL,
  `Land_id` int DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Sensor_id`),
  KEY `Sensor_typeid` (`Sensor_typeid`),
  KEY `Land_id` (`Land_id`),
  CONSTRAINT `sensors_ibfk_1` FOREIGN KEY (`Sensor_typeid`) REFERENCES `sensortype` (`Sensortype_id`),
  CONSTRAINT `sensors_ibfk_2` FOREIGN KEY (`Land_id`) REFERENCES `land` (`Land_id`)
);

-- Create sensordata table
CREATE TABLE `sensordata` (
  `SensorData_id` int NOT NULL AUTO_INCREMENT,
  `Sensor_id` int DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Value` float DEFAULT NULL,
  PRIMARY KEY (`SensorData_id`),
  KEY `Sensor_id` (`Sensor_id`),
  CONSTRAINT `sensordata_ibfk_1` FOREIGN KEY (`Sensor_id`) REFERENCES `sensors` (`Sensor_id`)
);


-- Create tasktype table
CREATE TABLE `tasktype` (
  `Type_id` int NOT NULL AUTO_INCREMENT,
  `Tasktype_name` varchar(255) NOT NULL,
  `Description` text,
  PRIMARY KEY (`Type_id`)
);

-- Create tasks table
CREATE TABLE `tasks` (
  `Task_id` int NOT NULL AUTO_INCREMENT,
  `Task_name` varchar(255) NOT NULL,
  `Task_status` varchar(50) DEFAULT NULL,
  `Taskstart_date` date DEFAULT NULL,
  `Taskend_date` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `Land_id` int DEFAULT NULL,
  PRIMARY KEY (`Task_id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `Land_id` (`Land_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `tasktype` (`Type_id`),
  CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`Land_id`) REFERENCES `land` (`Land_id`)
);



