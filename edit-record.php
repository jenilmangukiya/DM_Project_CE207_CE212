<?php 
include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);

	if($cname==""){
		header('location:'.$_SERVER['PHP_SELF'].'?editId='.$_REQUEST['editId']);
		exit;
	}elseif($cphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
							'date'=>$date,
							'cname'=>$cname,
							'cname'=>$cname,
							'cphone'=>$cphone,
							'pname'=>$pname,
							'qty'=>$qty,
							'detail'=>$detail,
							'cost'=>$cost
						);
	$update	=	$db->update('users',$data,array('id'=>$editId));
	if($update){
		header('location: index.php?msg=rus');
		exit;
	}else{
		header('location: index.php?msg=rnu');
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    
</head>

<body>
	
	</br>
   	<div class="container">
		<h1 style="font-family: 'Raleway', sans-serif; text-align: center;">Product Management</h1> 
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Create Invoice</strong> <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> View Invoice</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					
					<form method="post">
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="date" id="date" class="form-control" value="<?php echo $row[0]['date']; ?>" placeholder="Enter Date" required>
						</div>
						<div class="form-group">
							<label>Customer Name</span></label>
							<input type="text" name="cname" id="cname" class="form-control" value="<?php echo $row[0]['cname']; ?>" placeholder="Enter Customer Name" required>
						</div>


						<div class="form-group">
							<label>Phone Number</span></label>
							<input type="tel"  x-autocompletetype="tel" class="tel form-control" pattern="^\d{10}$" title="Please Enter Valid Phone Number." name="cphone" id="cphone" maxlength="10" class="form-control" value="<?php echo $row[0]['cphone']; ?>" placeholder="Enter Phone Number" required>
						</div>
						<div class="form-group">
							<label>Product Name</span></label>
							<input type="text" name="pname" id="pname" class="form-control" value="<?php echo $row[0]['pname']; ?>" placeholder="Enter Prouct Name" required>
						</div>
						<div class="form-group">
							<label>Quantity</span></label>
							<input type="number" name="qty" min="1" id="qty" class="form-control" value="<?php echo $row[0]['qty']; ?>" placeholder="Enter Quantity" required>
						</div>
						<div class="form-group">
							<label>Detail</span></label>
							<input type="text" name="detail" id="detail" class="form-control" value="<?php echo $row[0]['detail']; ?>" placeholder="Enter Detail" required>
						</div>
						<div class="form-group">
							<label>Cost</span></label>
							<input type="text" min="1" name="cost" id="cost" maxlength="12" class="form-control" value="<?php echo $row[0]['cost']; ?>" placeholder="Enter Total Cost" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
 
</body>
</html>