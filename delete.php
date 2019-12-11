<?php
    require_once 'config.php';

    $sql = "DELETE FROM phonebook WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = $_GET['id'];

        if (mysqli_stmt_execute($stmt)) {
            echo "Deletion successful";
            header("location: index.php");
        } else {
            echo "Error";
        }
    }
    $stmt->close();
                
    mysql_close($conn);
?>