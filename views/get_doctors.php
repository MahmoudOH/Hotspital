<?php
  require_once("db_helper.php");
  $db_helper = new DbHelper();
  $db_helper->createDbConnection();

  if (!empty($_GET['dept_id'])){
   $dept_id = $_GET['dept_id'];
   $doctors = $db_helper->getAllDoctors();
?>
   <?php foreach($doctors as $doc){ ?>
    <?php if ($doc['doc_dept_id'] == $dept_id){ ?>
     <option value="<?php echo $doc["id"]; ?>"><?php echo $doc["full_name"]; ?></option>
   <?php } ?>

  <?php }
  
    }?>