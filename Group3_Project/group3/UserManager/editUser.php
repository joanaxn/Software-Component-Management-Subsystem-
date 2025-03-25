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
            $servidor = 'localhost';
            $user = 'root';
            $dbname = 'srsWeb';

            $ligacao = mysqli_connect($servidor, $user) or die("Sem ligação");
            mysqli_select_db($ligacao, $dbname) or die("Sem DB");

            session_start();
            $userLogged = $_SESSION['userLogged'];
            
            echo '<form action="" method="post">
                    Password: <input type="password" name="editPassword"></br>
                    Name: <input type="text" name="editName"></br>
                    Address: <input type="text" name="editAddress"></br>
                    NIF: <input type="text" name="editNIF"></br>
                    Email: <input type="email" name="editEmail"></br>
                    </br>
                    <input type="submit" name="submit" value="Update"></br>
                    </form>';
                
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $update_user = "UPDATE srsUser SET LoginPassword = '".$_POST['editPassword']."', 
                                    UserName = '".$_POST['editName']."', 
                                    UserAddress = '".$_POST['editAddress']."', 
                                    UserNIF = '".$_POST['editNIF']."', 
                                    UserEmail = '".$_POST['editEmail']."'
                                WHERE LoginUsername = '".$userLogged."'";
                if ($ligacao -> query($update_user) === TRUE) {
                    header("Location: /group3/adminUser.html");
                } else {
                    echo "Error: " . $ligacao . "<br>" . $ligacao->error;
                }
            }
        ?>
    </div>
</body>
</html>