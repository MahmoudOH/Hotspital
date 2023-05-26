<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

 if ($_SERVER['REQUST_METHOD'] == 'POST') {
  if (isset($_POST['logout'])) {
   session_destroy();
   header("location: login.php");
  }
 }

 ?>

 <html lang="en">

 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard</title>
  <style>
   body {
    font-family: Arial, sans-serif;
   }

   .container {
    max-width: 800px;
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

   section {
    margin-bottom: 30px;
   }

   section h3 {
    margin-top: 0;
   }

   table {
    width: 100%;
    border-collapse: collapse;
   }

   table th,
   table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
   }

   form .form-group {
    margin-bottom: 20px;
   }

   form .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
   }

   form .form-group input[type="text"],
   form .form-group textarea,
   form .form-group select {
    width: 100%;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
   }

   form .form-group select[multiple] {
    height: 100px;
   }

   form .form-group button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #2196f3;
    border: none;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
   }

   .logout {
    display: block;
    text-align: center;
    color: #2196f3;
    text-decoration: none;
   }
  </style>
 </head>

 <body>
  <div class="container">
   <h2>Doctor Dashboard</h2>

   <section>
    <h3>Assigned Patients</h3>
    <table>
     <thead>
      <tr>
       <th>Patient ID</th>
       <th>Patient Name</th>
      </tr>
     </thead>
     <tbody>
      <!-- Use PHP to populate the table rows dynamically -->
      <?php foreach ($assignedPatients as $patient) { ?>
       <tr>
        <td>
         <?php echo $patient['patient_id']; ?>
        </td>
        <td>
         <?php echo $patient['patient_name']; ?>
        </td>
       </tr>
      <?php } ?>
     </tbody>
    </table>
   </section>

   <section>
    <h3>Diagnosis and Medications</h3>
    <form action="process.php" method="post">
     <div class="form-group">
      <label for="patient_id">Patient ID:</label>
      <input type="text" id="patient_id" name="patient_id" required>
     </div>
     <div class="form-group">
      <label for="diagnosis">Diagnosis:</label>
      <textarea id="diagnosis" name="diagnosis" rows="3" required></textarea>
     </div>
     <div class="form-group">
      <label for="medications">Medications:</label>
      <select id="medications" name="medications[]" multiple required>
       <!-- Use PHP to populate the select options dynamically -->
       <?php foreach ($allMedications as $medication) { ?>
        <option value="<?php echo $medication['medication_id']; ?>"><?php echo $medication['medication_name']; ?></option>
       <?php } ?>
      </select>
     </div>
     <div class="form-group">
      <button type="submit">Submit</button>
     </div>
    </form>
   </section>

   <section>
    <h3>All Medications</h3>
    <ul>
     <!-- Use PHP to populate the list items dynamically -->
     <?php foreach ($allMedications as $medication) { ?>
      <li>
       <?php echo $medication['medication_name']; ?>
      </li>
     <?php } ?>
    </ul>
   </section>

   <section>
    <h3>Update Status</h3>
    <form action="" method="post">
     <div class="form-group">
      <label for="status">Status:</label>
      <select id="status" name="status" required>
       <option value="busy">Busy</option>
       <option value="available">Available</option>
      </select>
     </div>
     <div class="form-group">
      <button type="submit">Update</button>
     </div>

     <a class="logout" name="logout">Logout</a>
    </form>
   </section>
  </div>
 </body>

 </html>

 <?php

} else {
 header('location: login.php');
}

?>