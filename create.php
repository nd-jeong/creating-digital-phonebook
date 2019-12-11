<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add New Contact</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Add New Contact</h1>
        <?php
            require_once "config.php";

            if(isset($_POST['save'])) {
                $last_name = $_POST['last_name'];
                $first_name = $_POST['first_name'];
                $phone_number = $_POST['phone_number'];
                $email = $_POST['email'];

                $sql = "INSERT INTO phonebook (last_name, first_name, phone_number, email) VALUES (?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);

                $stmt->bind_param("ssss", $param_last_name, $param_first_name, $param_phone_number, $param_email);
                
                $param_last_name = $last_name;
                $param_first_name = $first_name;
                $param_phone_number = $phone_number;
                $param_email = $email;

                if ($stmt->execute()) {
                    header("location: index.php");
                    exit();
                } else {
                    echo "Data entry failed";
                }
                
                $stmt->close();
                
                mysql_close($conn);
            }
        ?>
        <form method="POST">
            <label>Last Name</label><br>
            <input type='text' name='last_name'/ class='input-field'><br>
            <label>First Name</label><br>
            <input type='text' name='first_name' class='input-field'/><br>
            <label>Phone Number</label><br>
            <input type='text' name='phone_number' class='input-field'/><br>
            <label>Email Address</label><br>
            <input type='text' name='email' class='input-field'/><br>
            <input type='submit' name='save' class='submit-btn'/>
        <form/>
        <a href='index.php' class='back-btn'>Go back<a/>
    </body>
</html>