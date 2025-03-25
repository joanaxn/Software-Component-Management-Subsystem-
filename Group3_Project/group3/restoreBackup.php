<?php
    require_once __DIR__ . '/db.php';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    function getDataBase($conn , $backupId){
        try{
        $dataBaseSelected = "SELECT backupData FROM srsBackup WHERE backupFileID = '" . $backupId."'";
        $resultado = mysqli_query($conn, $dataBaseSelected);
    
        if($resultado){
            $row = $resultado->fetch_assoc();
            return $row["backupData"];
        }else{
            return false;
        }
    }catch (mysqli_sql_exception $e) { 
        var_dump($e);
    exit;  }
    }

    $backupId = $_POST['backupId'];

    $backupData = getDataBase($conn, $backupId);

    if ($backupData) {

        $restore_file = __DIR__ . '/temp_backup.sql';
        file_put_contents($restore_file, $backupData);
        
        $host = "localhost";
        $user = "root";
        $database = "srsWeb";

        $cmd = "E:\\XAMPP\\mysql\\bin\\mysql -h {$host} -u {$user} {$database} < {$restore_file}";
        
        exec($cmd, $output);
        header("Location: adminUser.html");

    } else {
        echo "Error!";
    }
?>