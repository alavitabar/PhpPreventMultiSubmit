<?php
/*** begin the session ***/
session_start();

/*** create the form token ***/
$form_token = MD5(uniqid());

/*** add the form token to the session ***/
$_SESSION['form_token'] = $form_token;
?>
<!DOCTYPE html>
<head>
    <title>My Form</title>
</head>
<body>
<form action="process.php" method="post">
    <input type="hidden" name="_token" value="<?php echo $form_token; ?>" />
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