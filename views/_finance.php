<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Finance Dashboard</title>
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

  form .form-group input[type="text"] {
   width: 100%;
   padding: 8px;
   border-radius: 3px;
   border: 1px solid #ccc;
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
  <h2>Finance Dashboard</h2>

  <section>
   <h3>Patient Service</h3>
   <form action="process.php" method="post">
    <div class="form-group">
     <label for="patient_id">Patient ID:</label>
     <input type="text" id="patient_id" name="patient_id" required>
    </div>
    <div class="form-group">
     <button type="submit">Check Payment</button>
    </div>
   </form>
  </section>

  <section>
   <h3>View All Patients' Day Finances</h3>
   <table>
    <thead>
     <tr>
      <th>Patient ID</th>
      <th>Patient Name</th>
      <th>Payment</th>
     </tr>
    </thead>
    <tbody>
     <!-- Use PHP to populate the table rows dynamically -->
     <?php foreach ($allPatientFinances as $finance) { ?>
      <tr>
       <td>
        <?php echo $finance['patient_id']; ?>
       </td>
       <td>
        <?php echo $finance['patient_name']; ?>
       </td>
       <td>
        <?php echo $finance['payment']; ?>
       </td>
      </tr>
     <?php } ?>
    </tbody>
   </table>
  </section>

  <section>
   <h3>Transfer Patient's Name to Pharmacy</h3>
   <form action="process.php" method="post">
    <div class="form-group">
     <label for="patient_id_transfer">Patient ID:</label>
     <input type="text" id="patient_id_transfer" name="patient_id_transfer" required>
    </div>
    <div class="form-group">
     <button type="submit">Transfer</button>
    </div>
   </form>
  </section>

  <a href="login.php" class="logout">Logout</a>
 </div>
</body>

</html>