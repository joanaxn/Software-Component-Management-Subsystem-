<html>
<head>
	<meta charset="UTF-8">
	<script src="/group3/Login/lang.js"></script>
	<script src="/group3/Login/theme.js" defer></script>

	<link rel="stylesheet" href="/group3/style.css">

    <title>Register User</title>
</head>
<body>
	<div class="form">
		<?php
			function getUserLogin($ligacao, $user_srs){

				$consulta_login = "SELECT LoginUsername FROM srsUser WHERE LoginUsername = '" . $user_srs."'";
				$resultado_login = mysqli_query($ligacao, $consulta_login);

				if($resultado_login -> num_rows > 0){
					$row = $resultado_login->fetch_assoc();
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
			
			$userRegister = $_POST['newLogin'];
			$userLogin = getUserLogin($ligacao, $userRegister);
			
			if($userLogin != -1){
				echo "User '$userRegister' already registered.</br>";
				echo '</br><a href="/group3/adminUser.html"><input type="button" value="Back to menu"></a>';
			} else {
				if($userLogin == -1) {
					$register_user = "INSERT INTO srsUser (LoginUsername, LoginPassword, UserName, UserAddress, UserNIF, userEmail, UserRoleID) 
									VALUES ('".$_POST['newLogin']."', '".$_POST['newPassword']."', '".$_POST['newName']."','".$_POST['newAddress']."', '".$_POST['newNIF']."', '".$_POST['newEmail']."', '".$_POST['newUserRoleID']."')";
					if ($ligacao -> query($register_user) === TRUE) {
						echo "User registered successfully.</br>";
						echo '</br><a href="/group3/adminUser.html"><input type="button" value="Back to menu"></a>';
						$newUserID = $ligacao->insert_id;
						if ($_POST['newUserRoleID'] == 2) {
							$perm_ids = [1, 2, 3, 4, 5];
							foreach ($perm_ids as $perm_id) {
								$insert_perm = "INSERT INTO srsDevPerm (DevID, PermissionID) VALUES ('$newUserID', '$perm_id')";
								if ($ligacao->query($insert_perm) == TRUE) {
									header("Location: /group3/adminUser.html");
								}
							}
						} else {
							header("Location: group3/adminUser.html");
						}
					} else {
						echo "Error: " . $ligacao . "<br>" . $ligacao->error;
					}
					header("Location: /group3/adminUser.html");
				}
			}
		?>
	</div>
</body>
</html>