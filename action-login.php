<?php
$email=$_POST["email"];
$password=$_POST["password"];
$conn=mysqli_connect("localhost","root","","blood_info");
$sql="select * from login where email='$email' and password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	while($data=mysqli_fetch_array($result))
	{
		$type=$data[3];
		$l_id=$data[0];
		session_start();
		$_SESSION["l_id"]=$l_id;
		if($type=='admin')
		{
			header("location:./admin_login/admin_login.php");
		}
		else if($type=='donor')
		{
			header("location:./donor_login/login.php");
		}
		else if($type=='acceptor')
		{
			header("location:./acceptor_login/Login_Acceptor.php");
		}
		else 
		{
			?>
					<script>
					alert("Account under Verification. Try Again Later")
					window.location="./index.php"
					</script>
					<?php
		}
	}
}
else
{
	?>
		<script>
        alert("Username or Password Incorrect.")
        window.location="./index.php"
        </script>
    <?php
}
?>
