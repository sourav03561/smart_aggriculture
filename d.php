<?php include("auth_session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>DetectLand</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>

<div class="leftContainer">
    <div class="navbar">
        <img src="logo.png"/>
        <a href="home.html" target="contentFrame" class="selected">Home</a>
        <a href="Suggestion.html" target="contentFrame">About Us</a>
        <a href="LandCompare.html" target="contentFrame">Profile</a>
        <a href="login.html">Sign out</a>
    </div>

    <div class="leftContent">
        <div class="custom-background">
            <section class="outside-form">
                <form class="custom-formcontent" action="home.php" method="post">
                    <div class="form-group">
                        <label for="landLocation">Land Location:</label>
                        <input type="text" id="landLocation" name="landLocation" class="custom-input">
                    </div>
                    <div class="form-group">
                        <label for="Soil">Soil:</label>
                        <select id="Soil" name="Soil" class="custom-dropdown">
                            <option value="Loam">Loam</option>
                            <option value="Silt">Silt</option>
                            <option value="Clay">Clay</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Crop">Crop:</label>
                        <select id="Crop" name="Crop" class="custom-dropdown">
                            <option value="potato">Potato</option>
                            <option value="tomato">Tomato</option>
                            <option value="cron">Cron</option>
                        </select>
                    </div>
                    <div class="form-group sensor-row">
                        <select id="sensorType" name="sensorType" class="custom-dropdown"></select>
                        <input type="text" class="sensorLocation custom-input" name="sensorLocation">
                        <input type="button" class="add-button" value="+" onclick="addSensorRow(this)">
                        <input type="button" class="delete-button" value="-" onclick="deleteSensorRow(this)">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="save-form custom-button" id="saveForm" name="saveForm" value="Save"/>
                        <input type="submit" class="detecting-form custom-button" id="detecting" name="detecting" value="Detecting"/>
                        <input type="button" class="custom-button" value="Cancel"/>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<div class="rightContainer">
    <h1 class="dashboard-title">Harvesting<br />Tomorrow</h1>
    <h1 class="dashboard-title">Smart<br />Agriculture</h1>
    <h1 class="dashboard-title">Sensor<br />Solutions</h1>
</div>

<script>
    $(document).ready(function () {
        addOptionsToSelect();
    });

    function addOptionsToSelect() {
        $.ajax({
            url: 'getSensors.php', // replace with the correct path to your PHP file
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var selectBox = $('#sensorType');
                selectBox.empty();
                $.each(data, function (index, item) {
                    selectBox.append($('<option>', {
                        value: item.Sensortype_id,
                        text: item.Typename
                    }));
                });
            },
            error: function () {
                console.error('Error loading data');
            }
        });
    }

    function addSensorRow(button) {
        const sensorForm = document.querySelector('form');
        const newRow = document.createElement('div');
        newRow.classList.add('form-group', 'sensor-row');

        const label1 = createLabel('Sensor Type:', 'sensorType');
        newRow.appendChild(label1);

        const select = createSelect('sensorType', [
            { value: 'temperature', text: 'Temperature' },
            { value: 'humidity', text: 'Humidity' },
            { value: 'moisture', text: 'Moisture' }
        ]);
        newRow.appendChild(select);

        const label2 = createLabel('Sensor Number:', 'sensorLocation');
        newRow.appendChild(label2);

        const input = createInput('text', 'sensorLocation', 'sensor-quantity custom-input', '1');
        newRow.appendChild(input);

        const addButton = createInput('button', '', 'add-button', '+');
        addButton.setAttribute('onclick', 'addSensorRow(this)');
        newRow.appendChild(addButton);

        const deleteButton = createInput('button', '', 'delete-button', '-');
        deleteButton.setAttribute('onclick', 'deleteSensorRow(this)');
        newRow.appendChild(deleteButton);

        sensorForm.insertBefore(newRow, sensorForm.lastElementChild);
    }

    function deleteSensorRow(button) {
        const sensorForm = document.querySelector('form');
        const rowToDelete = button.parentElement;
        sensorForm.removeChild(rowToDelete);
    }

    function createLabel(text, forAttribute) {
        const label = document.createElement('label');
        label.setAttribute('for', forAttribute);
        label.textContent = text;
        return label;
    }

    function createSelect(name, options) {
        const select = document.createElement('select');
        select.setAttribute('name', name);
        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.setAttribute('value', option.value);
            optionElement.textContent = option.text;
            select.appendChild(optionElement);
        });
        return select;
    }

    function createInput(type, name, className, value) {
        const input = document.createElement('input');
        input.setAttribute('type', type);
        input.setAttribute('name', name);
        input.classList.add(className);
        input.setAttribute('value', value);
        return input;
    }
</script>

</body>
</html>
