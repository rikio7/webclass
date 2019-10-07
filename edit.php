<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <style type="text/css">
	.container{
		width: 60%;
		height: 400px;
		margin:auto;
		box-shadow: 0px 0px 5px 5px #fff;
		border: 2px solid gray;
		border-radius: 5px; 
		padding: 15px;
	       }
       </style>
</head>
<body>
	<?php
     include 'conn.php';
          $id = $_GET['id'];
         $query = "SELECT * FROM `students` WHERE `id` = $id";
           $result = mysqli_query($con,$query); 
            while($row=mysqli_fetch_row($result)){
            	$std_name = $row[1];
            	$std_email = $row[2];
            	$std_address = $row[3];
            	$std_dob = $row[4];
            	$std_phno = $row[5];
	   }      
    ?>
	<div class="container">
	<form>
	<br>
	<input type="hidden" name="id" id="id" value="<?php echo $id?>">
	<input type="text" name="std_name" placeholder="Enter student name" class="form-control" id="std_name" value="<?php echo $std_name?>"><br>
	<input type="email" name="std_email" placeholder="Enter student email" class="form-control" id="std_email" value="<?php echo $std_email?>"><br>
	<textarea type="address" name="std_address" placeholder="Enter student address" class="form-control" id="std_address"> <?php echo $std_address?> </textarea>
	<input type="date" name="std_dob" placeholder="dd/mm/yy" class="form-control" id="std_dob" value="<?php echo $std_dob?>"><br>
	<input type="text" name="std_phno" placeholder="Enter student contact details" class="form-control" id="std_phno" value="<?php echo $std_phno?>"><br>
	<input type="button" name="submit" value="Register" class="btn btn-info" id="btn">

</form>
</div>
	<div id="div1">
	<table class="table" id="table">
		<tr>
			<th>Sl.No</th>
			<th>Student Name</th>
			<th>Student Email</th>
			<th>Student Address</th>
			<th>Student dob</th>
			<th>Student phno</th>
		</tr>
	</table>
	<script type="text/javascript">
		$(function(){
		$('#btn').click(function(){
			var id = $('#id').val();
			var std_name=$('#std_name').val();
			var std_email=$('#std_email').val();
			var std_address= $('#std_address').val();
			var std_dob=$('#std_dob').val();
			var std_phno=$('#std_phno').val();

			$.ajax({
				url:"studentUpdate.php",
				type:'post',
				data:{
					id:id,
					std_name:std_name,
					std_email:std_email,
					std_address:std_address,
					std_dob:std_dob,
					std_phno:std_phno
				},
				success:function(res){
					console.log(res)
					display();
				},
				error:function(res){
					console.log(res)
				}
			})
		})
	})
		
		function dele(id){
			$.ajax({
				url:'delete.php',
				type:'get',
				data:{
					id:id
		},
		success:function(res){
			alert(res);
			display();
		},
		error:function(res){

		       }
	       })
		    }
		function display(){
			$.ajax({
				url:'view.php',
				type:'get',
				data:{

				},
				success:function(res){
					console.log(res)
					var obj = JSON.parse(res);
					console.log(obj)
					var table_content = ''
					$('#table').find('tr:not(:first)' ).remove();
						$.each(obj,function(index,value){
							table_content+="<tr>";
							table_content+="<td>"+value.id+"</td>";
							table_content+="<td>"+value.std_name+"</td>";
							table_content+="<td>"+value.std_email+"</td>";
							table_content+="<td>"+value.std_address+"</td>";
							table_content+="<td>"+value.std_dob+"</td>";
							table_content+="<td>"+value.std_phno+"</td>";
							table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-info' onclick='studentView("+value.id+")'>View</button></td>";
							table_content+="</tr>";
						});
						$("#table").append(table_content);
				},
				error:function(res){
					console.log(res)
				}
			})
		}
		display()
	</script>
</div>
</body>
</html>