<?php      
    include('connection.php');  
    session_start();

    $username = $_SESSION['username'];  
    $password = $_SESSION['password']; 

    	$username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 

        //GET STUDENT INFO

        $sql = "select * from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 

        if ($count == 1) {
        	$class = $row["class"];
        }


        $result = mysqli_query($con, "DESCRIBE 12A"); 

        echo "<style>
        table, th, td {
        	border: 1px solid black;
        	margin-left: auto; 
        	margin-right: 0;
        }
        </style>" ;

        echo "<table style='width:20%''>
        <tr>";

        while ($row = mysqli_fetch_row($result)) {

        	echo "<th>";	
        	echo $row[0];
        	echo "</th>";

        }

        echo "</tr>";

        $result = mysqli_query($con, "select * from 12A where class = '$class'");  
        $row = mysqli_fetch_assoc($result);



        echo "<tr>";
        echo "<td>";
        echo $row["Monday"];
        echo "</td>";
        echo "<td>";
        echo $row["Tuesday"];
        echo "</td>";
        echo "<td>";
        echo $row["Wednesday"];
        echo "</td>";
        echo "<td>";
        echo $row["Thursday"];
        echo "</td>";
        echo "<td>";
        echo $row["Friday"];
        echo "</td>";
        echo "<td>";
        echo $row["Class"];
        echo "</td>";
        echo "</tr>";



        ?>