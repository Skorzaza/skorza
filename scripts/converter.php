<?php

// 1. Retrieve the form data
$numberToConvert = (float) $_POST['numberToConvert']; // Convert to float
$numberFrom = $_POST['NumberFrom'];
$numberTo = $_POST['NumberTo'];

// 2. Define conversion factors (cm, m, km to feet)
$cmToFeet = 0.0328084;
$mToFeet = 3.28084;
$kmToFeet = 3280.84;

// Define conversion factors for result
$footToInch = 12;
$footToMiles = 0.000189394;

// 3. Convert to feet first (as an intermediary)
$feet = 0; // Initialize $feet to 0

switch ($numberFrom) {
    case "Centymetr":
        $feet = $numberToConvert * $cmToFeet;
        break;
    case "Metr":
        $feet = $numberToConvert * $mToFeet;
        break;
    case "Kilometr":
        $feet = $numberToConvert * $kmToFeet;
        break;
    default:
        echo "Invalid 'From' unit.";
        exit; // Stop execution
}

// 4. Convert from feet to desired unit
$conversionResult = 0; // Renamed variable

switch ($numberTo) {
    case "Cal":
        $conversionResult = $feet * $footToInch;
        break;
    case "Stopa":
        $conversionResult = $feet; // Already in feet
        break;
    case "Mila":
        $conversionResult = $feet * $footToMiles;
        break;
    default:
        echo "Invalid 'To' unit.";
        exit; // Stop execution
}

$formattedResult = number_format($conversionResult, 2);

$formPage = "../calc.php";
$url = $formPage . "?conversionResult=" . urlencode($formattedResult);
header("Location: " . $url);
exit;

?>