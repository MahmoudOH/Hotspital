<?php
include('db_helper.php');

$db_helper = new DbHelper();
$db_helper->createDbConnection();
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
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                tabindex="-1" aria-hidden="true">
                <option></option>
                <?php
                $patients = $db_helper->getAllPatients();

                foreach ($patients as $p) {
                  echo '<option>' . $p['gov_id'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label>Doctor deparments</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                tabindex="-1" aria-hidden="true">
                <option></option>
                <?php

                $doc_depts = $db_helper->getAllDocDpts();

                foreach ($doc_depts as $d) {
                  echo '<option>' . $d['name'] . '</option>';
                }
                ?>
              </select>
            </div>

            <!-- /.form-group -->
            <div class="form-group">
              <label>Disabled</label>
              <select class="form-control select2 select2-hidden-accessible" disabled="" style="width: 100%;"
                data-select2-id="4" tabindex="-1" aria-hidden="true">
                <option selected="selected" data-select2-id="6">Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--disabled"
                dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span
                    class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                    aria-expanded="false" tabindex="-1" aria-disabled="true"
                    aria-labelledby="select2-l7v7-container"><span class="select2-selection__rendered"
                      id="select2-l7v7-container" role="textbox" aria-readonly="true"
                      title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b
                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                  aria-hidden="true"></span></span>
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Register Patient</button>
      </div>
    </div>
    <!-- /.card -->

</section>