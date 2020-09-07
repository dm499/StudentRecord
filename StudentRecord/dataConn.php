<?php 

include 'dataConfig.php';


if(isset($_POST['submit_btn']))
{
    $fullname = $_POST['fullname'];
    $idnumber = $_POST['idnumber'];
    $email = $_POST['email'];
    $major = $_POST['major'];
    

    $sql_u = "SELECT * FROM student WHERE fullname='$fullname' AND idnumber='$idnumber'";
    $res_u = mysqli_query($handleConnection, $sql_u);


    if(mysqli_num_rows($res_u) > 0)
    {
        echo 
            "<script>
                alert('full Name and ID already exist! Try again');
                window.location = 'index.php';
            </script>";
    }
    else
    {
        $insertData = "INSERT INTO student(ID, fullname, idnumber, email, major) 
            VALUES (NULL, '$fullname', '$idnumber', '$email', '$major')";

        $holdConnection = mysqli_query($handleConnection, $insertData);
        header("location: index.php");
    }
}

?>