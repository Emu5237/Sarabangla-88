<?php
include('db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Crud Operation</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<img src="upload_images/hero-bg.jpg" alt="" width="450px" ><br><br>
	<a href="#" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Create New Account
  </button>
  <a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print PDF</a>
  <hr>
		<table class="table table-bordered table-striped table-hover" id="myTable">
		<thead>
			<tr>
			   <th class="text-center" scope="col">S.L</th>
				<th class="text-center" scope="col">Phone Number</th>
				<th class="text-center" scope="col">Full Name</th>
				<th class="text-center" scope="col">Nick Name</th>
				<th class="text-center" scope="col">School Name</th>
				<th class="text-center" scope="col">View</th>
				<th class="text-center" scope="col">Edit</th>
				<th class="text-center" scope="col">Delete</th>
			</tr>
		</thead>
			<?php

        	$get_data = "SELECT * FROM card_activation order by 1 desc";
        	$run_data = mysqli_query($con,$get_data);
			$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
				$sl = ++$i;
				$id = $row['id'];
				$u_card = $row['u_card'];
				$u_f_name = $row['u_f_name'];
				$u_l_name = $row['u_l_name'];
				$u_phone = $row['u_phone'];
				$u_family = $row['u_family'];
				$u_staff_id = $row['staff_id'];

        		$image = $row['image'];

        		echo "

				<tr>
				<td class='text-center'>$sl</td>
				<td class='text-left'>$u_f_name</td>
				<td class='text-left'>$u_card</td>
				<td class='text-left'>$u_phone</td>
				<td class='text-center'>$u_family</td>
			
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>

					     
					    
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					
						<a href='#' class='btn btn-danger deleteuser' title='Delete'>
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

			
			
		</table>
		<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export Data" />
    </form>
	</div>


	<!---Add in modal---->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><img src="upload_images/hero-bg.jpg" <img src="upload_images/hero-bg.jpg"width="550px" height="350px" alt=""></center>
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">
			
			<!-- This is test for New Card Activate Form  -->
			<!-- This is Address with email id  -->
			<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">Full Name</label>
<input type="text" class="form-control" name="card_no" placeholder="Enter Full Name" maxlength="500" required>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Nick Name</label>
<input type="phone" class="form-control" name="user_phone" placeholder="Enter Nick Name" maxlength="500" required>
</div>
</div>



<div class="form-row">
<div class="form-group col-md-6">
<label for="firstname">Cell No</label>
<input type="text" class="form-control" name="user_first_name" placeholder="Enter Cell No"maxlength="500" required>
</div>
<div class="form-group col-md-6">
<label for="lastname">School Name</label>
<input type="text" class="form-control" name="user_last_name" placeholder="Enter School Name">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="fathername">Permanent Address</label>
<input type="text" class="form-control" name="user_father" placeholder="Enter Permanent Address">
</div>
<div class="form-group col-md-6">
<label for="mothername">Present Address</label>
<input type="text" class="form-control" name="user_mother" placeholder="Enter Present Address">
</div>
</div>


<div class="form-row" style="color: skyblue;">
<div class="form-group col-md-6">
<label for="email">Email Id</label>
<input type="email" class="form-control" name="user_email" placeholder="Enter Email id">
</div>
<div class="form-group col-md-6">
<label for="aadharno">Profession</label>
<input type="text" class="form-control" name="user_aadhar" maxlength="500" placeholder="Enter Your Profession">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputState">Blood Group</label>
<select id="inputState" name="user_gender" class="form-control">
  <option selected>Choose...</option>
  <option>A+</option>
  <option>O+</option>
  <option>B+</option>
  <option>AB+</option>
  <option>A-</option>
  <option>O-</option>
  <option>B-</option>
  <option>AB-</option>

</select>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Date of Birth</label>
<input type="date" class="form-control" name="user_dob" placeholder="Date of Birth">
</div>
</div>


<div class="form-group">
<label for="family">School Name</label>
    <textarea class="form-control" name="family" rows="3"></textarea>
</div>



<div class="form-group">
<label for="inputAddress">Village</label>
<input type="text" class="form-control" name="village" placeholder="Enter Your Village">
</div>
<div class="form-group">
<label for="inputAddress2">Thana</label>
<input type="text" class="form-control" name="police_station" placeholder="Enter Thana">
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity">District</label>
<input type="text" class="form-control" name="dist">
</div>
<div class="form-group col-md-4">
<label for="inputState">Enter District</label>
<select name="state" class="form-control">
  <option selected>Choose...</option>
  <option value="Dhaka">Dhaka</option>
									<option value="Faridpur">Faridpur</option>
									<option value="Assam">Gazipur</option>
									<option value="Bihar">Gopalganj</option>
									<option value="Chandigarh">Jamalpur</option>
									<option value="Chhattisgarh">Kishoreganj</option>
									<option value="Daman and Diu">Madaripur</option>
									<option value="Delhi">Manikganj</option>
									<option value="Puducherry">Munshiganj</option>
									<option value="Goa">Mymensingh</option>
									<option value="Gujarat">Narayanganj</option>
									<option value="Haryana">Narsingdi</option>
									<option value="Himachal Pradesh">Netrokona</option>
									<option value="Jammu and Kashmir">Rajbari</option>
									<option value="Jharkhand">Shariatpur</option>
									<option value="Karnataka">Sherpur</option>
									<option value="Kerala">Tangail</option>
									<option value="Madhya Pradesh">Bogra</option>
									<option value="Maharashtra">Joypurhat</option>
									<option value="Manipur">Naogaon</option>
									<option value="Meghalaya">Natore</option>
									<option value="Nagaland">Nawabganj</option>
									<option value="Odisha">Pabna</option>
									<option value="Punjab">Rajshahi</option>
									<option value="Rajasthan">Sirajgonj</option>
									<option value="Sikkim">Dinajpur</option>
									<option value="Tamil Nadu">Gaibandha</option>
									<option value="Telangana">Kurigram</option>
									<option value="Tripura">Lalmonirhat</option>
									<option value="Uttar Pradesh">Nilphamari</option>
									<option value="Uttarakhand">Panchagarh</option>
									<option value="West Bengal">Rangpur</option>
									<option value="West Bengal">Thakurgaon</option>
									<option value="West Bengal">Barguna</option>
									<option value="West Bengal">Barisal</option>
									<option value="West Bengal">Bhola</option>
									<option value="West Bengal">Jhalokati</option>
									<option value="West Bengal">Patuakhali</option>
									<option value="West Bengal">Pirojpur</option>
									<option value="West Bengal">Bandarban</option>
									<option value="West Bengal">Brahmanbaria</option>
									<option value="West Bengal">Chandpur</option>
									<option value="West Bengal">Chittagong</option>
									<option value="West Bengal">Comilla</option>
									<option value="West Bengal">Cox's Bazar</option>
									<option value="West Bengal">Feni</option>
									<option value="West Bengal">Khagrachari</option>
									<option value="West Bengal">Lakshmipur</option>
									<option value="West Bengal">Noakhali</option>
									<option value="West Bengal">Rangamati</option>
									<option value="West Bengal">Habiganj</option>
									<option value="West Bengal">Maulvibazar</option>
									<option value="West Bengal">Sunamganj</option>
									<option value="West Bengal">Sylhet</option>
									<option value="West Bengal">Bagerhat</option>
									<option value="West Bengal">Chuadanga</option>
									<option value="West Bengal">Jessore</option>
									<option value="West Bengal">Jhenaidah</option>
									<option value="West Bengal">Khulna</option>
									<option value="West Bengal">Kushtia</option>
									<option value="West Bengal">Magura</option>
									<option value="West Bengal">Meherpur</option>
									<option value="West Bengal">Narail</option>
									<option value="West Bengal">Satkhira</option>
									</select>


									</select>
</div>
<div class="form-group col-md-2">
<label for="inputZip">Code</label>
<input type="text" class="form-control" name="pincode">
</div>
</div>


<div class="form-group">
<label for="inputAddress">Post Office</label>
<input type="text" class="form-control" name="staff_id" maxlength="12" placeholder="Enter Post Office">
</div>

        	<div class="form-group">
        		<label>Image</label>
        		<input type="file" name="image" class="form-control" >
        	</div>

        	
        	 <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
	
}


?>


<!-- View modal  -->
<?php 

// <!-- profile modal start -->
$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$card = $row['u_card'];
	$name = $row['u_f_name'];
	$name2 = $row['u_l_name'];
	$father = $row['u_father'];
	$mother = $row['u_mother'];
	$gender = $row['u_gender'];
	$email = $row['u_email'];
	$aadhar = $row['u_aadhar'];
	$Bday = $row['u_birthday'];
	$family = $row['u_family'];
	$phone = $row['u_phone'];
	$address = $row['u_state'];
	$village = $row['u_village'];
	$police = $row['u_police'];
	$dist = $row['u_dist'];
	$pincode = $row['u_pincode'];
	$state = $row['u_state'];
	$time = $row['uploaded'];
	
	$image = $row['image'];
	echo "

		<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
			<div class='container' id='profile'> 
				<div class='row'>
					<div class='col-sm-4 col-md-2'>
						<img src='upload_images/$image' alt='' style='width: 150px; height: 150px;' ><br>
		
						<i class='fa fa-id-card' aria-hidden='true'></i> $card<br>
						<i class='fa fa-phone' aria-hidden='true'></i> $name  <br>
						Issue Date : $time
					</div>
					<div class='col-sm-3 col-md-6'>
						<h3 class='text-primary'>$card</h3>
						<p class='text-secondary'>
						<strong>Permanent Address :</strong> $father <br>
						<strong>Present Address :</strong>$mother <br>
						<strong>Profession :</strong> $aadhar <br>
						<strong>Blood Group :</strong> $gender <br>
						<strong>Email Address :</strong> $email <br>
						<strong>Email Address :</strong> $family <br>
						<strong>Email Address :</strong> $village, $police, <br> $dist, $state - $pincode
						<br/>
						</p>
						<!-- Split button -->
					</div>
				</div>

			</div>   
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			</div>
			</form>
			</div>
		</div>
		</div> 


    ";
}


// <!-- profile modal end -->


?>





<!----edit Data--->

<?php

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$card = $row['u_card'];
	$name = $row['u_f_name'];
	$name2 = $row['u_l_name'];
	$father = $row['u_father'];
	$mother = $row['u_mother'];
	$gender = $row['u_gender'];
	$email = $row['u_email'];
	$aadhar = $row['u_aadhar'];
	$Bday = $row['u_birthday'];
	$family = $row['u_family'];
	$phone = $row['u_phone'];
	$address = $row['u_state'];
	$village = $row['u_village'];
	$police = $row['u_police'];
	$dist = $row['u_dist'];
	$pincode = $row['u_pincode'];
	$state = $row['u_state'];
	$staffCard = $row['staff_id'];
	$time = $row['uploaded'];
	$image = $row['image'];
	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Data</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputEmail4'>Student Id.</label>
		<input type='text' class='form-control' name='card_no' placeholder='Enter 12-digit Student Id.' maxlength='12' value='$card' required>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Mobile No.</label>
		<input type='phone' class='form-control' name='user_phone' placeholder='Enter 10-digit Mobile no.' maxlength='10' value='$phone' required>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='firstname'>First Name</label>
		<input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name' value='$name'>
		</div>
		<div class='form-group col-md-6'>
		<label for='lastname'>Last Name</label>
		<input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name' value='$name2'>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='fathername'>Father's Name</label>
		<input type='text' class='form-control' name='user_father' placeholder='Enter First Name' value='$father'>
		</div>
		<div class='form-group col-md-6'>
		<label for='mothername'>Mother's Name</label>
		<input type='text' class='form-control' name='user_mother' placeholder='Enter Last Name' value='$mother'>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='email'>Email Id</label>
		<input type='email' class='form-control' name='user_email' placeholder='Enter Email id' value='$email'>
		</div>
		<div class='form-group col-md-6'>
		<label for='aadharno'>Aadhar No.</label>
		<input type='text' class='form-control' name='user_aadhar' maxlength='12' placeholder='Enter 12-digit Aadhar no. ' value='$aadhar'>
		</div>
		</div>
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputState'>Gender</label>
		<select id='inputState' name='user_gender' class='form-control' value='$gender'>
		  <option selected>$gender</option>
		  <option>Male</option>
		  <option>Female</option>
		  <option>Other</option>
		</select>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Date of Birth</label>
		<input type='date' class='form-control' name='user_dob' placeholder='Date of Birth' value='$Bday'>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label for='family'>Family Member's</label>
			<textarea class='form-control' name='family' rows='3'>$family</textarea>
		</div>
		
		
		
		<div class='form-group'>
		<label for='inputAddress'>Village</label>
		<input type='text' class='form-control' name='village' placeholder='1234 Main St' value='$village'>
		</div>
		<div class='form-group'>
		<label for='inputAddress2'>Police Station</label>
		<input type='text' class='form-control' name='police_station' placeholder='Enter police station' value='$police'>
		</div>
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputCity'>District</label>
		<input type='text' class='form-control' name='dist' value='$dist'>
		</div>
		<div class='form-group col-md-4'>
		<label for='inputState'>State</label>
		<select name='state' class='form-control'>
		  <option>$state</option>
		  <option value='Andhra Pradesh'>Andhra Pradesh</option>
											<option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
											<option value='Arunachal Pradesh'>Arunachal Pradesh</option>
											<option value='Assam'>Assam</option>
											<option value='Bihar'>Bihar</option>
											<option value='Chandigarh'>Chandigarh</option>
											<option value='Chhattisgarh'>Chhattisgarh</option>
											<option value='Dadar and Nagar Haveli'>Dadar and Nagar Haveli</option>
											<option value='Daman and Diu'>Daman and Diu</option>
											<option value='Delhi'>Delhi</option>
											<option value='Lakshadweep'>Lakshadweep</option>
											<option value='Puducherry'>Puducherry</option>
											<option value='Goa'>Goa</option>
											<option value='Gujarat'>Gujarat</option>
											<option value='Haryana'>Haryana</option>
											<option value='Himachal Pradesh'>Himachal Pradesh</option>
											<option value='Jammu and Kashmir'>Jammu and Kashmir</option>
											<option value='Jharkhand'>Jharkhand</option>
											<option value='Karnataka'>Karnataka</option>
											<option value='Kerala'>Kerala</option>
											<option value='Madhya Pradesh'>Madhya Pradesh</option>
											<option value='Maharashtra'>Maharashtra</option>
											<option value='Manipur'>Manipur</option>
											<option value='Meghalaya'>Meghalaya</option>
											<option value='Mizoram'>Mizoram</option>
											<option value='Nagaland'>Nagaland</option>
											<option value='Odisha'>Odisha</option>
											<option value='Punjab'>Punjab</option>
											<option value='Rajasthan'>Rajasthan</option>
											<option value='Sikkim'>Sikkim</option>
											<option value='Tamil Nadu'>Tamil Nadu</option>
											<option value='Telangana'>Telangana</option>
											<option value='Tripura'>Tripura</option>
											<option value='Uttar Pradesh'>Uttar Pradesh</option>
											<option value='Uttarakhand'>Uttarakhand</option>
											<option value='West Bengal'>West Bengal</option>
		</select>
		</div>
		<div class='form-group col-md-2'>
		<label for='inputZip'>Zip</label>
		<input type='text' class='form-control' name='pincode' value='$pincode'>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label for='inputAddress'>Staff Id one who Activate this card.</label>
		<input type='text' class='form-control' name='staff_id' maxlength='12' placeholder='Enter 12-digit Staff Id' value='$staffCard'>
		</div>
        	

        	<div class='form-group'>
        		<label>Image</label>
        		<input type='file' name='image' class='form-control'>
        		<img src = 'upload_images/$image' style='width:50px; height:50px'>
        	</div>

        	
        	
			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>