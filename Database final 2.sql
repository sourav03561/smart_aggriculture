-- Drop the existing procedure if it exists
DROP PROCEDURE IF EXISTS InsertSampleData;

DELIMITER //
CREATE PROCEDURE InsertSampleData()
BEGIN
  SET @num_rows = 1000;
  SET @i = 1;

  -- Loop to insert data into users, farmers, and related tables
  WHILE @i <= @num_rows DO
    -- Insert into users table
    INSERT INTO users (User_name, Email_id, Password, PhoneNumber, Address, User_role) VALUES
    (CONCAT('User', @i), CONCAT('user', @i, '@example.com'), 'password', '1234567890', CONCAT('Address', @i), 'Role');

    -- Insert into farmers table
    INSERT INTO farmers (First_name, Last_name) VALUES
    (CONCAT('Farmer', @i, '_First'), CONCAT('Farmer', @i, '_Last'));

    -- Increment the counter for Farmer_id
    SET @farmer_id = LAST_INSERT_ID();

    -- Insert into land table
    INSERT INTO land (Farmer_id, Location, Soil_type, Crop_type, user_id) VALUES
    (@farmer_id, CONCAT('Location_', @i), CONCAT('Soil_', @i), CONCAT('Crop_', @i), @i);

    -- Insert into farmersland table
    INSERT INTO farmersland (Farmer_id, Land_id) VALUES
    (@farmer_id, @i);

    -- Increment the counter for Land_id
    SET @i = @i + 1;
  END WHILE;

  -- Reset the counter for Land_id
  SET @i = 1;

  -- Loop to insert data into sensortype table
  WHILE @i <= @num_rows DO
    -- Insert into sensortype table
    INSERT INTO sensortype (Typename, Measurement_unit, Sensortype_max, Sensortype_min) VALUES
    (CONCAT('SensorType_', @i), 'Unit', RAND() * 100, RAND() * 100);

    -- Increment the counter
    SET @i = @i + 1;
  END WHILE;

  -- Reset the counter
  SET @i = 1;

  -- Loop to insert data into sensors, sensordata, and tasks tables
  WHILE @i <= @num_rows DO
    -- Insert into sensors table
    INSERT INTO sensors (Sensor_typeid, Land_id, Location) VALUES
    (FLOOR(RAND() * @num_rows) + 1, FLOOR(RAND() * @num_rows) + 1, CONCAT('Location_', @i));

    -- Increment the counter for Sensor_id
    SET @sensor_id = LAST_INSERT_ID();

    -- Insert into sensordata table
    INSERT INTO sensordata (Sensor_id, Date, Time, Value) VALUES
    (@sensor_id, CURDATE(), CURTIME(), RAND() * 100);

    -- Insert into tasktype table
    INSERT INTO tasktype (Tasktype_name, Description) VALUES
    (CONCAT('TaskType_', @i), CONCAT('Description_', @i));

    -- Increment the counter for Type_id
    SET @type_id = LAST_INSERT_ID();

    -- Insert into tasks table
    INSERT INTO tasks (Task_name, Task_status, Taskstart_date, Taskend_date, user_id, type_id, Land_id) VALUES
    (CONCAT('Task_', @i), 'Status', CURDATE(), CURDATE(), FLOOR(RAND() * @num_rows) + 1, @type_id, FLOOR(RAND() * @num_rows) + 1);

    -- Increment the counter
    SET @i = @i + 1;
  END WHILE;
END //
DELIMITER ;




USE Teja;
CALL InsertSampleData();


