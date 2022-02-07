<html>
<head><h3>Insert Employes Details</h3></head>
<body>
	<form method="POST">
		<table>
			<tr><td>Employee Id :</td>
				<td><input type="text" name="empid" /></td></tr>
				<tr><td>Employee Name :</td>
				<td><input type="text" name="empname" /></td></tr>
				<tr><td>Job Name :</td>
				<td><input type="text" name="empjob" /></td></tr>
				<tr><td>Manager Id :</td>
				<td><input type="text"  name="mid" /></td></tr>
				<tr><td>salary :</td>
				<td><input type="text" name="salary" /></td>
				<td><input type="submit" name="submit"></td></tr>
				
		</table>
	</form>
	<br><hr>    
	<h3>Employees who have salary greater than Rs 35000/-</h3>
	<form method="POST">
		<input type="submit" name="s2" value="Display">  
	</form>      
	<?php
        if(isset($_POST["submit"]))
        {
            $connect=mysqli_connect("localhost","root","","MCA");
			$empid=$_POST["empid"];
            $empname=$_POST["empname"];
            $jobname=$_POST["empjob"];
            $salary=$_POST["salary"];
            $mid=$_POST["mid"];
            $verify="select id from book where id={$empid}";
            $execute=mysqli_query($connect,$verify);
            if(mysqli_num_rows($execute)==0)
            {
                $query="INSERT INTO Employee 
							(id,name,job,salary,mid) 
						VALUES
							('{$empid}','{$empname}','{$jobname}','{$salary}','{$mid}')";  
                mysqli_query($connect,$query); 
            }
            else{
                echo "Employee already exists";
            }
            mysqli_close($connect);
            
        }
		if(isset($_POST["s2"]))
		{
			$connect1=mysqli_connect("localhost","root","","MCA");
			$Display="select * from Employee where salary > 35000";   
			$execute=mysqli_query($connect1,$Display);
			echo "<table border='1px solid'><th>Employee Name</th><th>Employee Salary</th>";
			if(mysqli_num_rows($execute)!=0)
			{
				while($result=mysqli_fetch_array($execute))
				{
					echo "<tr><td>{$result["name"]}</td>";
					echo "<td>Rs {$result["salary"]}/-</td></tr>";
				}
			}
			mysqli_close($connect1);	
		}
	?>
</html>