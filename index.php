<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Phonebook</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Phonebook</h1>
        <div id='phonebook'>
            <?php
                require_once "config.php";

                $sql = "SELECT * FROM phonebook";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>Action</th>";
                                    echo "<th>Last Name</th>";
                                    echo "<th>First Name</th>";
                                    echo "<th>Phone Number</th>";
                                    echo "<th>Email</th>"; 
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td class='action-row'>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' name='update' class='action'>Edit</a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' name='delete' class='action'>Delete</a>";
                                        echo "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['phone_number'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>";                            
                        echo "</table>";
                    }
                }
                mysqli_close($conn);
            ?>
            <a href='create.php' class='add-button'>Add New Contact<a/>
        </div>
    </body>
</html>