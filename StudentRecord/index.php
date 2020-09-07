<?php   
    include 'dataConn.php';

    $sql_u = "SELECT fullname, idnumber, email, major FROM student";
    $res_u = mysqli_query($handleConnection, $sql_u);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body>
    <br />
    <h2 class="text-info col-12">Add student</h2>
    <br />

    <div class="container border" style="padding: 30px;">
        <form action="dataConn.php" method="POST">
            <div class="form-group row">
                <div class="col-3">
                    <label>Full Name</label>
                </div>
                <div class="col-6">
                    <input type="text" name="fullname" class="form-control" required />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>ID Number</label>
                </div>
                <div class="col-6">
                    <input type="text" name="idnumber" class="form-control" maxlength="5" required />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>Email</label>
                </div>
                <div class="col-6">
                    <input type="email" name="email" class="form-control" required />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>Major</label>
                </div>
                <div class="col-6">
                    <select class="form-control" name="major" required>
                        <option value="" selected disabled>-- Choose a major --</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Telecommunications Engineering">Telecommunications Engineering</option>
                        <option value="Management Information System">Management Information System</option>
                        <option value="Communications-Media Studies & Broadcast">Communications-Media Studies & Broadcast</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3 offset-3">
                    <button type="submit" name="submit_btn" class="btn btn-success form-control">Add</button>
                </div>
                <div class="col-3">
                    <button type="reset" class="btn btn-primary form-control">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <br />
    <h2 class="text-info col-12">List of students</h2>
    <br />

    <div class="container border" style="padding: 30px;">

        <table class="table table-striped border">
            <tr class="table-secondary">
                <th>Full Name</th>
                <th>ID Number</th>
                <th>Email</th>
                <th>Major</th>
            </tr>

            <?php
            
                while($row = mysqli_fetch_array($res_u, MYSQLI_ASSOC)) 
                {
                    echo "<tr><td>" . $row["fullname"]. "</td><td>" . $row["idnumber"] . "</td><td>"
                    . $row["email"]. "</td><td>" . $row["major"]. "</td></tr>";
                }
                echo "</table>";
                
            ?>
        </table>

        <?php   

            if((mysqli_num_rows($res_u) > 0)){}else
            {
                echo "<p>No students found.</p>";
            }
        ?>
    </div>

</body>
</html>