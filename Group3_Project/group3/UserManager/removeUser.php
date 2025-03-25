<html>
<head>
    <meta charset="UTF-8">
    <script src="/group3/Login/lang.js"></script>
	<script src="/group3/Login/theme.js" defer></script>

	<link rel="stylesheet" href="/group3/style.css">

    <title>Deactivate User</title>
</head>
<body>
    <div class="form">
        <?php
            function getUserID($ligacao, $username){
                $consulta = "SELECT UserID FROM srsUser WHERE LoginUsername = '" . $username."'";
                $resultado = mysqli_query($ligacao, $consulta);
        
                if($resultado -> num_rows > 0){
                    $row = $resultado->fetch_assoc();
                    return $row["UserID"];
                } else {
                    return -1;
                }
            }

            function getUserRole($ligacao, $userID) {
                $consultaRole = "SELECT UserRoleID FROM srsUser WHERE UserID = '" . $userID."'";
                $roleID = mysqli_query($ligacao, $consultaRole);
                if($roleID -> num_rows > 0){
                    $row = $roleID->fetch_assoc();
                    return $row["UserRoleID"];
                } else {
                    return -1;
                }
            }

            $servidor = 'localhost';
            $user = 'root';
            $dbname = 'srsWeb';

            $ligacao = mysqli_connect($servidor, $user) or die("Sem ligação");
            mysqli_select_db($ligacao, $dbname) or die("Sem DB");
            
            $userRemove = $_POST['userRemove'];
            $userLogin = getUserID($ligacao, $userRemove);
            $userRole = getUserRole($ligacao, $userLogin);

            if($userLogin == -1){
                echo "User '$userRemove' isn't registered.</br>";
                echo '</br><a href="/group3/adminUser.html"><input type="button" value="Back to menu"></a>';
            } else {
                if($userLogin != -1) {
                    $id = $userLogin;
                    if($userRole != 2){
                        $remove = "DELETE FROM srsUser WHERE UserID = '" . $id."'";
                        $resultadoRemove = mysqli_query($ligacao, $remove);
                        header("Location: /group3/adminUser.html");
                    }
                    else{
                        $removePerms = "DELETE FROM srsDevPerm WHERE DevID = '" . $id."'";
                        $resultPerm = mysqli_query($ligacao, $removePerms);
                        
                        $remove = "DELETE FROM srsUser WHERE UserID = '" . $id."'";
                        $resultPerm = mysqli_query($ligacao, $remove);
                        header("Location: /group3/adminUser.html");
                    }
                }
                else{
                    echo"Error";
                }
            }
        ?>
    </div>
</body>
</html>