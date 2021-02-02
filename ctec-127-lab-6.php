<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>

    <?php
    // function to calculate converted temperature
    function convertTemp($temp, $unit1, $unit2)
    {   if (($unit1 != $unit2) && ($temp != "") && ($unit1 != "--Select--") and ($unit2 != "--Select--" )) {
        // conversion from Celsius
            if ($unit1 == "celsius") {
                if ($unit2 == "fahrenheit") {
                    return (($temp * (9/5)) + 32);
                }  else{
                    return ($temp + 273.15);
                }
                
            // conversion from Fahrenheit
                } elseif ($unit1 == "fahrenheit") {
                    if ($unit2 == "celsius") {
                        return (($temp - 32) * 5/9);
                    }  else { // conv. to kelvin
                        return (($temp + 459.67) * 5/9);
                    }   
            // conversion from Kelvin
                } else {
                    if ($unit2 == "celsius") {
                        return ($temp - 273.15);
                    }  else { //conv. to fahrenheit
                        return ($temp * 9/5 - 459.67);
                    } 
                }}  
                else {
                return null;
                }
            }


        // conversion formulas
        // Celsius to Fahrenheit = T(°C) × 9/5 + 32
        // Celsius to Kelvin = T(°C) + 273.15
        // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
        // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
        // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
        // Kelvin to Celsius = T(K) - 273.15

        // You need to develop the logic to convert the temperature based on the selections and input made

     // end function

        // Initialize variables or set to form submissions of $_POST
        if (isset($_POST['originaltemp'])) {
            $originalTemperature = $_POST['originaltemp'];
        } else {
            $originalTemperature = "";
        }
        if (isset($_POST['originalunit'])) {
            $originalUnit = $_POST['originalunit'];
        } else {
            $originalUnit = "";
        }
        if (isset($_POST['conversionunit'])){
            $conversionUnit = $_POST['conversionunit'];
        } else {
            $conversionUnit = "";
        }
        $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);

    ?>
    <!-- Form starts here -->
    <h1>Temperature Converter</h1>
    <h4>CTEC 127 - PHP with SQL 1</h4>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="group">
            <label for="temp">Temperature</label>
            <input type="text" value="<?php if (isset($_POST['originaltemp'])) {
                                            echo $_POST['originaltemp'];
                                        }
                                        ?>" name="originaltemp" size="14" maxlength="7" id="temp">

            <select name="originalunit">
                <option value="--Select--">--Select--</option>
                <option value="celsius" <?php if($originalUnit=="celsius") echo ' selected="selected"';?>>Celsius</option>
                <option value="fahrenheit" <?php if($originalUnit=="fahrenheit") echo ' selected="selected"';?>>Fahrenheit</option>
                <option value="kelvin" <?php if($originalUnit=="kelvin") echo ' selected="selected"';?>>Kelvin</option>
            </select>
        </div>

        <div class="group">
            <label for="convertedtemp">Converted Temperature</label>
            <input type="text" value="<?php if (isset($convertedTemp)) {
                                            echo $convertedTemp;
                                        }
                                        ?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>

            <select name="conversionunit">
                <option value="--Select--">--Select--</option>
                <option value="celsius" <?php if($conversionUnit=="celsius") echo ' selected="selected"';?>>Celsius</option>
                <option value="fahrenheit" <?php if($conversionUnit=="fahrenheit") echo ' selected="selected"';?>>Fahrenheit</option>
                <option value="kelvin" <?php if($conversionUnit=="kelvin") echo ' selected="selected"';?>>Kelvin</option>
            </select>
        </div>
        <input type="submit" value="Convert" />
    </form>
</body>

</html>