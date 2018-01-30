<?php 
include('header.php');
include_once("db_connect.php");
if(!empty($_GET['import_status'])) {
    switch($_GET['import_status']) {
        case 'success':
            $message_stauts_class = 'alert-success';
            $import_status_message = 'Employee data inserted successfully.';
            break;
        case 'error':
            $message_stauts_class = 'alert-danger';
            $import_status_message = 'Error: Please try again.';
            break;
        case 'invalid_file':
            $message_stauts_class = 'alert-danger';
            $import_status_message = 'Error: Please upload a valid CSV file.';
            break;
        default:
            $message_stauts_class = '';
            $import_status_message = '';
    }
}
?>
<title>phpzag.com : Demo Import CSV File into MySQL using PHP</title>
<!--
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>
-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
<?php include('container.php');?>
<div class="container">
	<h2>Example: Import CSV File into MySQL using PHP</h2>	
    <?php if(!empty($import_status_message)){
        echo '<div class="alert '.$message_stauts_class.'">'.$import_status_message.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-body">
			<br>
			<div class="row">
				<form action="import.php" method="post" enctype="multipart/form-data" id="import_form">
						<div class="col-md-3">
						<input type="file" name="file" />
						</div>
						<div class="col-md-5">
						<input type="submit" class="btn btn-primary" name="import_data" value="IMPORT">
						</div>
				</form>
			</div>
			<br>
			<div class="row">
				<table class="table table-bordered">
					<thead>
						<tr>
						  <th>Emp Id</th>
						  <th>Emp Name</th>
						  <th>Emp Email</th>
						  <th>Emp Age</th>
						  <th>Salary ($)</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$sql = "SELECT emp_id, emp_name, emp_email, emp_salary, emp_age FROM emp ORDER BY emp_id DESC LIMIT 10";
						$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
						if(mysqli_num_rows($resultset)) { 
						while( $rows = mysqli_fetch_assoc($resultset) ) {
						?>
						<tr>
						  <td><?php echo $rows['emp_id']; ?></td>
						  <td><?php echo $rows['emp_name']; ?></td>
						   <td><?php echo $rows['emp_email']; ?></td>
						  <td><?php echo $rows['emp_salary']; ?></td>
						  <td><?php echo $rows['emp_age']; ?></td>
						</tr>
						<?php } } else { ?>  
						<tr><td colspan="5">No records to display.....</td></tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
        </div>
    </div>
</div>
<?php include('footer.php');?>