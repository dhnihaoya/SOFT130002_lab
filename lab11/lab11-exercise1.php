<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 11-1 | Using Cookies</title>
</head>

<body>
<header>
</header>


<?php
function getLoginForm(){
   return "
<form action='' method='post' role='form'>
<div class ='form-group'>
  <label for='username'>Username</label>
  <input type='text' name='username' class='form-control'/>
</div>
<div class ='form-group'>
  <label for='pword'>Password</label>
  <input type='password' name='pword' class='form-control'/>
</div>
<input type='submit' value='Login' class='form-control' />

</form>";
}
?>
 <div class="container theme-showcase" role="main">  
      <div class="jumbotron">
        <h1>
<?php

   require_once("config.php");

function validLogin(){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    //very simple (and insecure) check of valid credentials.
    $sql = "SELECT * FROM Credentials WHERE Username=:user and Password=:pass";
    $_POST['username'] = "";
    $_POST['pword'] = "";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':user',$_POST['username']);
    $statement->bindValue(':pass',$_POST['pword']);
    $statement->execute();
    if($statement->rowCount()>0){
        return true;
    }
    return false;
}



$loggedIn=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(validLogin()){
        $expiryTime = time()+60*60*24;
        setcookie("Username", $_POST['username'], $expiryTime);
        if(isset($_COOKIE['Username'])) {
            echo "Welcome ".$_COOKIE['Username'];
        }
    }
    else{
        echo "login unsuccessful";
    }
}
else{
    echo "No Post detected";
}




if(validLogin()){
    echo "Welcome ".$_POST['username'];
    // add 1 day to the current time for expiry time
    $expiryTime = time()+60*60*24;
    setcookie("Username", $_POST['username'], $expiryTime);
}


?>

</h1>
      </div>
<?php

if(!isset($_COOKIE['Username'])){
    echo getLoginForm();
}
else{
    echo "This is some content";
}

?>

<p><a href="logout.php">logout</a></p>

 </div>
</body>
</html>
