<?php
/*** begin the session ***/
session_start();

/*** create the form token ***/
$_token = MD5(uniqid());

/*** add the form token to the session ***/
$_SESSION['form_token'] = $_token;
?>
<!DOCTYPE html>
<head>
    <title>My Form</title>
</head>
<body>
<form action="process.php" method="post">
    <input type="hidden" name="_token" value="<?php echo $_token; ?>" />
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" />
        <div>
            <div>
                <input type="submit" value="Add Name" />
            </div>
</form>
</body>
</html>