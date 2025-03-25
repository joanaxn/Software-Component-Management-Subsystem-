<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="/group3/Login/lang.js"></script>
	<script src="/group3/Login/theme.js" defer></script>

	<link rel="stylesheet" href="/group3/style.css">
    
    <title>Search Components</title>
</head>
<body>
    <div class="form">
        <?php
            session_start();

            function getComponentsByID($compID , $ligacao){
                $consulta = "SELECT * FROM srsComp INNER JOIN srsUser ON CompUserID = UserID WHERE CompID = '" . $compID . "'";    
                
                return mysqli_query($ligacao,$consulta);
            }

            $servidor = 'localhost';
            $user = 'root';
            $dbname = 'srsWeb';
            
            $ligacao = mysqli_connect($servidor, $user) or die("Sem ligação");
            mysqli_select_db($ligacao , $dbname) or die("Sem DB");

            $compID = $_POST['compID'];
            $resultadoCompByID = getComponentsByID($compID, $ligacao);

            if($resultadoCompByID->num_rows > 0){
                echo "<h2>Component $compID</h2>";
                echo "<table class='table'>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Code</th>
                    <th>Username</th>
                    <th>Dependency</th>
                    </tr>";
                    while($row = $resultadoCompByID->fetch_assoc()){
                        echo
                        "<tr>"
                        ."<td>" .$row["CompID"] . "</td>"
                        ."<td>" .$row["CompName"] . "</td>"
                        ."<td>" .$row["CompDescr"] . "</td>"
                        ."<td>" .$row["CompDate"] . "</td>"
                        ."<td>" .$row["CompCode"] . "</td>"
                        ."<td>" .$row["UserName"] . "</td>"
                        ."<td>" .$row["compDepend"] . "</td>"
                        ."</tr>";
                    }
                    echo "</table>";
                    echo '</br><a href="/group3/devUser.html"><input type="button" value="Back to menu"></a>';
                }
            else{
                echo "Component $compID not found.</br>";
                echo '</br><a href="/group3/devUser.html"><input type="button" value="Back to menu"></a>';
            }
        ?>
    </div>
</body>
</html>