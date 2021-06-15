<?php 
include_once('config.php');
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Product Management</title>
	
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
	
	<?php
	$condition='';
	$condition	.=	' AND created_by LIKE '.$_SESSION['id'].'';


	if(isset($_REQUEST['cname']) and $_REQUEST['cname']!=""){
		$condition	.=	' AND cname LIKE "%'.$_REQUEST['cname'].'%" ';
	}
	if(isset($_REQUEST['cphone']) and $_REQUEST['cphone']!=""){
		$condition	.=	' AND cphone LIKE "%'.$_REQUEST['cphone'].'%" ';
	}
	
	//echo $condition;


	$userData	=	$db->getAllRecords('users','*',$condition,'ORDER BY date DESC');

	$userdata = json_encode($userData);
	// echo $userdata;

	?>
   	<div class="container">
		</br>
		<h1><center>Product Management</center></h1>
		<div class="card">
			<div class="card-header">
			<i class="fa fa-fw fa-globe"></i> 
			<strong>Browse Details</strong> 
			
			<a href="#" class="float-right btn btn-dark btn-sm ml-2">
      	<span class="fa fa-user"></span> Hello <?php echo htmlspecialchars($_SESSION["username"]); ?>
    	</a>

			<a href="logout.php" class="float-right btn btn-dark btn-sm mx-2">
      	<span class="fa fa-sign-out-alt"></span> Log out
    	</a> 


			<a href="reset-password.php" class="float-right btn btn-dark btn-sm mx-2">
      	<span class="fa fa-key"></span> Change Password
    	</a> 

			<a href="add-record.php" class="float-right btn btn-dark btn-sm mx-2"> 
				<span class="fa fa-fw fa-plus-circle"></span> Add Invoice 
			</a>


			<a href="#" onClick="return confirm('for more detail please contact me on 8980877302');" class="float-right btn btn-dark btn-sm mx-2">
			<span class="fa fa-fw fa-info"></span>For info</a>

			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Customer Details</h5>
					<form method="get">
						<div class="row">
						
							<div class="col-sm-3">
								<div class="form-group">
									<label>Customer Name</label>
									<input type="text" name="cname" id="cname" class="form-control" value="<?php echo isset($_REQUEST['cname'])?$_REQUEST['cname']:''?>" placeholder="Enter Customer Name">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Customer Phone</label>
									<input type="tel" name="cphone" id="cphone" class="form-control" value="<?php echo isset($_REQUEST['cphone'])?$_REQUEST['cphone']:''?>" placeholder="Enter Customer Phone">
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
					    <th>Date</th>
						<th>Customer</th>
						<th>Phone</th>
						<th>Product Name</th>
						<th>Qty</th>
						<th>Details</th>
						<th>Cost</th>
						<th>Total Cost</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						foreach($userData as $val){
					?>
					<tr>
						<td><?php echo date_format (new DateTime($val['date']), 'd-m-Y');?></td>
						
						<td><?php echo $val['cname'];?></td>
						<td><?php echo $val['cphone'];?></td>
						<td><?php echo $val['pname'];?></td>
						<td><?php echo $val['qty'];?></td>
						<td><?php echo $val['detail'];?></td>
						<td><?php echo $val['cost'];?></td>
						<td><?php echo $val['qty'] * $val['cost'];?></td>
						<td align="center">
							<a href="edit-record.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i></a>

							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this record?');">
							<i class="fa fa-fw fa-trash"></i></a>

							<a target="_blank" href="print-record.php?Id=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-print"></i></a>
							
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="9" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			
		});
	</script>
</body>
</html>