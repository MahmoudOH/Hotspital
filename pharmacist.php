<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Pharmacist Dashboard</title>
 <style>
  body {
   font-family: Arial, sans-serif;
   margin: 0;
   padding: 0;
  }

  header {
   background-color: #2196f3;
   padding: 10px;
   color: #fff;
  }

  h1,
  h2 {
   margin: 0;
  }

  main {
   padding: 20px;
  }

  section {
   margin-bottom: 20px;
  }

  .form-group {
   margin-bottom: 10px;
  }

  label {
   display: block;
   margin-bottom: 5px;
  }

  input[type="text"],
  input[type="number"] {
   width: 100%;
   padding: 10px;
   border: 1px solid #ccc;
   border-radius: 3px;
  }

  button {
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
   font-weight: bold;
   text-align: center;
   color: #2196f3;
   text-decoration: none;
  }
 </style>
</head>

<body>
 <header>
  <h1>Pharmacist Dashboard</h1>
  <a href="login.html" class="logout">Logout</a>
 </header>

 <main>
  <section>
   <h2>Patient Service</h2>
   <form action="process.php" method="POST">
    <div class="form-group">
     <label for="patient_id">Enter ID Number:</label>
     <input type="text" id="patient_id" name="patient_id" required>
    </div>
    <button type="submit">Check Payment and Retrieve Data</button>
   </form>
  </section>

  <section>
   <h2>View All Patients at the Pharmacy</h2>
   <!-- Display patients data here -->
  </section>

  <section>
   <h2>Show All Medications in the System</h2>
   <!-- Display medications data here -->
  </section>

  <section>
   <h2>Add a Medication into the System</h2>
   <form action="process.php" method="POST">
    <div class="form-group">
     <label for="medication_name">Medication Name:</label>
     <input type="text" id="medication_name" name="medication_name" required>
    </div>
    <div class="form-group">
     <label for="quantity">Quantity:</label>
     <input type="number" id="quantity" name="quantity" required>
    </div>
    <button type="submit">Add Medication</button>
   </form>
  </section>

  <section>
   <h2>Show Statistics</h2>
   <!-- Display statistics data here -->
  </section>
 </main>

 <a href="login.php" class="logout">Log out</a>

</body>



</html>