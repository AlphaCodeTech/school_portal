<?php
	
	if(isset($_POST["submit"])){

	include "function/load.php";
	
		$sql = "SELECT * FROM student_data WHERE class= '".$_POST["class"]."' ";
		
		$class = $_POST["class"];
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows ($result) > 0){
?>
				<table class="table" border="1">
					<tr>
						<th>NAME</td>
						<th>ADIMISSION NUMBER</td>
					</tr>
<?php
		while($row = mysqli_fetch_array($result)){
?>
		<tr>
			<td><?php echo $row["surname"] ?> <?php echo $row["lastname"] ?> <?php echo $row["middlename"] ?></td>
			<td><?php echo $row["admno"] ?></td>
		</tr>
			
<?php
		}

			
			echo '</table>';
			header ("Content-Type: application/xls");
			header ("content-Disposition: attachment; filename= $class Data.xls");
			
		}else{
			echo"
			<script>
				alert($class' Not Ready Try Again Later !!!');
			</script>
			";	
			echo ' <a href="print_student_data.php">Go Back</a>';
		}
				
	}