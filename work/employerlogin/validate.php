<html>
<body>
<?php
$user='root';
$pass='password';
$servername = 'localhost';
$dbname='project';

$db=new mysqli($servername,$user,$pass,$dbname) or die ("unable to connect");
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);

if(isset($_POST["email"],$_POST["password"]))
{
$a=$_POST["email"];
$b=$_POST["password"];

$query="SELECT * FROM employer_details WHERE email_id = '$a' AND  password = '$b'";
$result = $db->query($query) or die(mysqli_error($db));
$count = mysqli_num_rows($result);
if($result){
    if ($count == 1){
        session_start();
        $row=mysqli_fetch_assoc($result);
        $_SESSION['email_id'] = $a;
        $_SESSION['name'] = $row['name'];
        header("location:employermain.html");
        exit();
    }
    else{
        header("location:login.php");
    }
}
}
$db->close();
?>
</body>
</html>
