<html>
<head>
    <meta charset="UTF-8">
    <script src="/group3/Login/lang.js"></script>
	<script src="/group3/Login/theme.js" defer></script>

	<link rel="stylesheet" href="/group3/style.css">
    
    <title>Edit User</title>
</head>
<body>
    <div class="form">
        <?php
            function getUserLogin($ligacao, $user_srs){
                $consulta = "SELECT LoginUsername FROM srsUser WHERE LoginUsername = '" . $user_srs."'";
                $resultado = mysqli_query($ligacao, $consulta);

                if($resultado -> num_rows > 0){
                    $row = $resultado->fetch_assoc();
                    return $row["LoginUsername"];
                } else {
                    return -1;
                }
            }

            $servidor = 'localhost';
            $user = 'root';
            $dbname = 'srsWeb';

            $ligacao = mysqli_connect($servidor, $user) or die("Sem ligação");
            mysqli_select_db($ligacao, $dbname) or die("Sem DB");

            session_start();
            $userEdit = $_POST['userEdit'];
            $_SESSION['userLogged'] = $_POST['userEdit'];
            
            $userLogin = getUserLogin($ligacao, $userEdit);

            if($userLogin == -1){
                echo "User '$userEdit' isn't registered.</br>";
                echo '</br><a href="/group3/adminUser.html"><input type="button" value="Back to menu"></a>';
            } else {
                if($userLogin != -1) {
                    header("Location: editUser.php");
                }
            }
        ?>
    </div>
</body>
</html>