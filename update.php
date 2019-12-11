<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Contact</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Edit Contact</h1>
        <?php
            require_once "config.php";

            if (isset($_POST['update'])) {
                $id = $_GET['id'];
                $last_name = $_POST['last_name'];
                $first_name = $_POST['first_name'];
                $phone_number = $_POST['phone_number'];
                $email = $_POST['email'];

                $sql = "UPDATE phonebook SET last_name=?, first_name=?, phone_number=?, email=? WHERE id=?";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    $stmt->bind_param("ssssi", $param_last_name, $param_first_name, $param_phone_number, $param_email, $param_id);

                    $param_last_name = $last_name;
                    $param_first_name = $first_name;
                    $param_phone_number = $phone_number;
                    $param_email = $email;
                    $param_id = $id;

                    if ($stmt->execute()) {
                        header("location: index.php");
                        exit();
                    }
                    close($stmt);
                    mysqli_close($conn);
                }
            } else {
                $id = $_GET['id'];
                $sql = "SELECT * FROM phonebook WHERE id = ?";
                
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    $stmt->bind_param("i", $param_id);

                    $param_id = $id;

                    if (mysqli_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_array($result);
                        $last_name = $row['last_name'];
                        $first_name = $row['first_name'];
                        $phone_number = $row['phone_number'];
                        $email = $row['email'];
                    }
                }
                $stmt->close();
                mysqli_close($conn);
            }
        ?>
        <form method="POST">
            <label>Last Name</label><br>
            <input type='text' name='last_name' class='input-field' value=<?php echo $last_name ?> /><br>
            <label>First Name</label><br>
            <input type='text' name='first_name' class='input-field' value=<?php echo $first_name ?> /><br>
            <label>Phone Number</label><br>
            <input type='text' name='phone_number' class='input-field' value=<?php echo $phone_number ?> /><br>
            <label>Email Address</label><br>
            <input type='text' name='email' class='input-field' value=<?php echo $email ?> /><br>
            <input type='submit' name='update' class='submit-btn'/>
        <form/>
        <a href='index.php' class='back-btn'>Go back<a/>
    </body>
</html>