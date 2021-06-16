<?php 
include_once('config.php');
session_start();
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
			$data	=	array(
							'date'=>$date,
							'cname'=>$cname,
							'cname'=>$cname,
							'cphone'=>$cphone,
							'pname'=>$pname,
							'qty'=>$qty,
							'detail'=>$detail,
							'cost'=>$cost,
							'created_by'=>$_SESSION['id']
						);
			$insert	=	$db->insert('users',$data);
			if($insert){
				header('location:index.php?msg=ras');
				exit;
			}else{
				header('location:index.php?msg=rna');
				exit;
			}
		
	}
?>

<!doctype html>

<html>

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Product Management</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">

</head>

<body>

   	<div class="container">
		</br>
		<h1><center>Product Management</center></h1>

		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}

		?>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Create Invoice</strong> <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> View Invoices</a></div>

			<div class="card-body">

				<div class="col-sm-6">

					<form method="post">

						<div class="form-group">

							<label>Date</label>

							<input type="date" name="date" id="date" class="form-control" placeholder="Enter Date" required>

						</div>
						
						
						<div class="form-group">

							<label>Customer Name</label>

							<input type="text" name="cname" id="cname" class="form-control" placeholder="Enter Customer Name" required>

						</div>
						
						<div class="form-group">

							<label>Phone No </label>

							<input type="tel" pattern="^\d{10}$" title="Please Enter Valid Phone Number." class="tel form-control" name="cphone" id="cphone" x-autocompletetype="tel" placeholder="Enter Phone Number">

						</div>
						
						<div class="form-group">

							<label>Product Name</label>

							<input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Product Name" required>

						</div>
						
						<div class="form-group">

							<label>Quantity</label>

							<input type="number" name="qty" id="qty" class="form-control" placeholder="Enter Quantity" required>

						</div>
						
						<div class="form-group">

							<label>Details</label>

							<input type="text" name="detail" id="detail" class="form-control" placeholder="Enter Product Detail" required>

						</div>
						
						<div class="form-group">

							<label>Cost</label>

							<input type="number" name="cost" id="cost" class="form-control" placeholder="Enter Total Cost" required>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Save</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>

</body>

</html>