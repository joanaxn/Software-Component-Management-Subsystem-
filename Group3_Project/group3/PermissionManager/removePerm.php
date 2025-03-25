<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <script src="/group3/Login/lang.js"></script>
   <script src="/group3/Login/theme.js" defer></script>

   <link rel="stylesheet" href="/group3/style.css">
    
   <title>Remove Permission</title>
</head>
<body>
    <div class="form">
    <?php
        session_start();

        $servidor = 'localhost';
        $user = 'root';
        $dbname = 'srsWeb';

        $ligacao = mysqli_connect($servidor, $user) or die("Sem ligação");
        mysqli_select_db($ligacao, $dbname) or die("Sem DB");

        $devID = $_SESSION['userIDChange'];
        $permID = $_POST['permIDRemove'];
        
        $removerPerm = "DELETE FROM srsDevPerm WHERE DevID = '$devID' AND PermissionID = '$permID'";
        $permRemoved = mysqli_query($ligacao, $removerPerm);

        if($permRemoved){
            header("Location: /group3/adminUser.html");
        } else {
            echo "Error removing permission $permID to developer '$devID'.</br>";
            echo '</br><a href="/group3/adminUser.html"><input type="button" value="Back to menu"></a>';
        }
?>
    </div>
</body>
</html>