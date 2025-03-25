<html>
<head>
	<meta charset="UTF-8">
	<script src="/group3/Login/lang.js"></script>
	<script src="/group3/Login/theme.js" defer></script>

	<link rel="stylesheet" href="/group3/style.css">
    
    <title>Register Permission</title>
</head>
<body>
	<div class="form">
		<?php
			function getPerms($ligacao, $permCheck){

				$consulta_login = "SELECT PermDescr FROM srsPerm WHERE PermDescr = '" . $permCheck."'";
				$resultado_login = mysqli_query($ligacao, $consulta_login);

				if($resultado_login -> num_rows > 0){
					$row = $resultado_login->fetch_assoc();
					return $row["PermDescr"];
				} else {
					return -1;
				}
			}

			$servidor = 'localhost';
			$user = 'root';
			$dbname = 'srsWeb';

			$ligacao = mysqli_connect($servidor, $user) or die("Sem ligação");
			mysqli_select_db($ligacao, $dbname) or die("Sem DB");
			
			$permDes = $_POST['newPermDescr'];
			$permCheck = getPerms($ligacao, $permDes);

			if($permCheck != -1){
				echo "Permission '$permDes' already registered.</br>";
				echo '</br><a href="/group3/adminUser.html"><input type="button" value="Back to menu"></a>';
			} else {
				if($permCheck == -1) {
					$register_perm = "INSERT INTO srsPerm (PermDescr) VALUES ('".$_POST['newPermDescr']."')";
					if ($ligacao -> query($register_perm) === TRUE) {
						header("Location: /group3/adminUser.html");
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