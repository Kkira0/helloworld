<?php


$host = "localhost";
$user = "php_app";
$password = "1234";
$database = "sql_hr";

$conn = new mysqli($host, $user, $password, $database);

if ($conn -> connect_error){
    die("Connection faailed: " . $conn ->connect_error);
}

echo"Connection successful";

$sql = "SELECT e.employee_id, e.last_name, m.first_name FROM employees e JOIN employees m ON e.reports_to = m.employee_id";
$result = $conn->query($sql);

//  var_dump($result);

//$insertSql = "INSERT INTO employees m (name) VALUES ('JANIS')";
//if ($conn->query($insertSql) === TRUE) {
    echo "New record created successfully";
//} else {
 //   echo "Error: " . $insertSql . "<br>" . $conn->error;
//}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>
<body>
    <h1>Customers</h1>
    <?php


    if ( $result-> num_rows > 0){
        echo "<ul>";
        while($row = $result->fetch_assoc()){
            //print_r($row);
            // izvadit katru klientu ar li elementu
            echo "<li>Employee ID: ". $row["employee_id"]. " - "  .  "Employee last_name: ". $row["last_name"]. " - reports to - " . "Manager last_name: ". $row["first_name"]."</li>";
         
        }
        echo"</ul>";
    }else{
        echo"No customers found";
    }
    
    ?>


</body>
</html>