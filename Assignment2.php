<!-- this is Done by Mariam-->
<?php
// API Endpoint URL
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch the data from the API
$response = file_get_contents($URL);
if ($response === FALSE) {
    die("Error fetching data from API.");
}

// Decode JSON response into an associative array
$data = json_decode($response, true);

// Check if the data contains results
if (!isset($data['results'])) {
    die("No records found.");
}
// Extract the results
$records = $data['results'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Statistics</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.5/css/pico.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
 /* Main Container */
        main.container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1200px;
            width: 100%;
            overflow-x: auto; /* Ensure table scrolls horizontally if needed */
        }

        /* Title */
        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: grey;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        /* Table Header */
        table thead {
            background-color: grey;
            color: black;
        }
        table thead th {
            padding: 15px;
            text-align: left;
            font-weight: bold;
            white-space: nowrap; /* Prevent headers from breaking into multiple lines */
        }