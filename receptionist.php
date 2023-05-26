<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospitalmangment";

// Create database connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to find the doctor with the lowest number of patients
function findAvailableDoctor($conn, $department)
{
  $sql = "SELECT d.doctor_name, COUNT(*) AS patient_count 
            FROM doctors d
            LEFT JOIN appointments a ON d.doctor_id = a.doctor_id
            WHERE d.department = '$department'
            GROUP BY d.doctor_id
            ORDER BY patient_count ASC
            LIMIT 1";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row['doctor_name'];
  } else {
    return null;
  }
}

// Function to handle patient service
function handlePatientService($conn, $patientID, $department)
{
  $sql = "SELECT * FROM patients WHERE patient_id = '$patientID'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $patient = $result->fetch_assoc();

    // Patient found, make preliminary diagnosis
    $availableDoctor = findAvailableDoctor($conn, $department);

    if ($availableDoctor) {
      // Doctor found, proceed with the service
      echo "Patient: " . $patient['patient_name'] . "<br>";
      echo "Department: " . $department . "<br>";
      echo "Preliminary Diagnosis: " . $department . " related issue.<br>";
      echo "Assigned Doctor: " . $availableDoctor . "<br>";
      // Other necessary actions

    } else {
      // No available doctor in the selected department
      echo "No available doctor in the selected department.<br>";
      // Handle this case as needed
    }
  } else {
    // Patient not found
    echo "Patient not found.<br>";
    // Handle this case as needed
  }
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $patientID = $_POST['patient_id'];
  $selectedDepartment = $_POST['department'];

  handlePatientService($conn, $patientID, $selectedDepartment);
}

$conn->close();

?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Management Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      margin-top: 0;
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group select {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group button {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #2196f3;
      border: none;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Patient Service</h2>
    <form action="process.php" method="post">
      <div class="form-group">
        <label for="patient_id">Patient ID:</label>
        <input type="text" id="patient_id" name="patient_id" required>
      </div>
      <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department" required>
          <option>Select Department</option>
          <option value="Cardiology">Cardiology</option>
          <option value="Orthopedics">Orthopedics</option>
          <option value="Gastroenterology">Gastroenterology</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</body>

</html>