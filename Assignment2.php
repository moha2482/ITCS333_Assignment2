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


      /* This Part is done by mohammad



         /* Table Body */
         table tbody tr {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.2s;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table tbody td {
            padding: 15px;
            text-align: left;
            white-space: nowrap; /* Prevent cell content from breaking */
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            main.container {
                padding: 10px;
            }

            h1 {
                font-size: 1.5rem;
            }

            table thead th, table tbody td {
                font-size: 0.9rem;
                padding: 10px;
            }
        }


        /* Overflow Handling */
        main.container::-webkit-scrollbar {
            height: 8px; /* Horizontal scrollbar height */
        }

        main.container::-webkit-scrollbar-thumb {
            background: #4CAF50;
            border-radius: 10px;
        }

        main.container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }


        </style>
</head>
<body>
    <main class="container">
        <h1>Student Nationalities in Bachelor Programs</h1>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?= htmlspecialchars($record['year']) ?></td>
                        <td><?= htmlspecialchars($record['semester']) ?></td>
                        <td><?= htmlspecialchars($record['the_programs']) ?></td>
                        <td><?= htmlspecialchars($record['nationality']) ?></td>
                        <td><?= htmlspecialchars($record['colleges']) ?></td>
                        <td><?= htmlspecialchars($record['number_of_students']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>



