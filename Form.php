<?php include 'Connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body style="background-color: blueviolet;">
    <div class="mainContainer">

        <form action="" method="post">
            <div class="box">

                <label for="first_name">First Name:</label><br>
                <input type="text" id="firstname" name="firstname" placeholder="Text input" required><br>

                <label for="last_name">Last Name:</label><br>
                <input type="text" id="lastname" name="lastname" placeholder="Text input" required><br>


                <label for="Address">Address:</label><br>
                <input type="text" id="Address" name="Address" maxlength="35"><br>


                <label for="Bdate">Select Date of Birth:</label><br>
                <input type="date" id="Bdate" name="Bdate"><br>

                <label for="Gender">Gender:</label> <br>
                <select id="Gender" name="gender">
                    <option value="Fimale">Fimale</option>
                    <option value="Male">Male</option>
                </select> <br>
                <label for="Notes">Notes:</label><br>
                <textarea name="Notes" rows="10" cols="25">Notes </textarea><br>
                <input type="submit" name="insert" style="color:rgb(250, 250, 253); background-color: rgb(95, 212, 69); width:25%; font-size: 18px; "><br>
            </div>
        </form>

        <?php
            if(isset($_POST['insert'])){
                $gender=$_POST['gender'];
                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $Address=$_POST['Address'];
                $Bdate=$_POST['Bdate'];

                $insert_query="INSERT INTO datatable(FirstName,LastName,Address,Date,Gender) value ('$firstname','$lastname','$Address','$Bdate','$gender')";
                if (mysqli_query($connection,$insert_query)) {
                    // echo "New record created successfully";
                   
                } else {
                    echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
                }
                
            }
        ?>

    </div>
    <div style="background-color:pink; display: flex;
    flex-direction: column;justify-content: center; width: 70%; margin-left:15%">

        <table style=" border-collapse: collapse;">

            <thead style="text-align: left; border: 1px solid black;">
                <tr>
                    <th>ID</th>
                    <th>FName</th>
                    <th>Lname</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Gender</th>
                    <th>Setting</th>
                </tr>
            </thead>
            <tbody style=" border-bottom: 1px black solid;padding: 10px;">
                <?php
                $query = "SELECT * FROM datatable order by id DESC";
                $result = mysqli_query($connection,  $query);
              
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                          
                            <td><?= $row['ID'] ?></td>
                            <td><?= $row['FirstName'] ?></td>
                            <td><?= $row['LastName'] ?></td>
                            <td><?= $row['Address'] ?></td>
                            <td><?= $row['Date'] ?></td>
                            <td><?= $row['Gender'] ?></td>
                            <td><form action='delete.php?ID=<?= $row['ID'] ?>' method="post">
                            <input type="hidden" name="ID" value="<?= $row['ID'] ?>">
                            <!-- <input type="button" name="Delete" value="Delete"> -->
                            <button type="button">Delte</button>
                            </form></td>
                           
                            
                        </tr>
                <?php }
                }
                        //  if(isset($_Post['Delete']) ){
                            
                          
                        //     $delete_query="DELETE FROM datatable WHERE ID={$_POST['ID']}";
                            
                        //     mysqli_query($connection,$delete_query);
                            
                        // }
            
                ?>

            </tbody>

        </table>



    </div>
</body>

</html>