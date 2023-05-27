<?php
include('db_helper.php');

$db_helper = new DbHelper();
$db_helper->createDbConnection();

$sdf = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (empty($_POST["subject"])) {

  } else {
    $sdf = $_POST["selectedDept"];
    echo $sdf;
  }

  $departments = $db_helper->getAllDocDpts();
  $doctors = $db_helper->getAllDoctors();
  $selected_docs = $doctors;
}

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Reception</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <form method="GET" action="register_patient.php">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Select2</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Patients</label>
                <select name="patient" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                  tabindex="-1" aria-hidden="true">
                  <option value="0"></option>
                  <?php
                  $patients = $db_helper->getAllPatients();
                  foreach ($patients as $p) {
                    echo '<option value="' . $p['id'] . '">' . $p['gov_id'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label>Doctor deparments</label>
                <select id="docDeptSelect" name="docDeptSelect" class="form-control select2 select2-hidden-accessible" onchange="getState();" style="width: 100%;"
                  data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option value="0"></option>
                  <?php

                  $doc_depts = $db_helper->getAllDocDpts();
                  foreach ($doc_depts as $d) {
                    echo '<option value="' . $d['id'] . '">' . $d['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label>Doctors</label>
                <select id="docSelect" name="doctor" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                  data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option></option>

                </select>
              </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Register Patient</button>
        </div>
      </div>
    </form>
    <!-- /.card -->

</section>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script type="text/javascript">
function getState() {
        var str='';
        var val=document.getElementById('docDeptSelect').value;
        
	$.ajax({          
        	type: "GET",
        	url: "views/get_doctors.php",
        	data:'dept_id='+val,
        	success: function(data){
        		$("#docSelect").html(data);
        	}
	});
}
</script>


