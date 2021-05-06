<?php
session_start();
// 1) _____________________________________________ POST _____________________________
if (count($_POST)) {
    var_dump('post');
    $ermsg = '';
    //…
    //check data, write some data to database(s), set error message(s) if any
    //…
    $userdata1 = $_POST['htUserdata1'];
    $userdata2 = $_POST['htUserdata2'];
    //…

    $_SESSION['PRG'] = array('field1' => $userdata1, 'field2' => $userdata1, …, 'ermsg' => $ermsg);
    session_write_close();
    header('Location: ' . $_SERVER['REQUEST_URI'] . '?z', true, 303);
    exit;
// 2) _____________________________________________ REDIRECT ________________________
} else if (array_key_exists('PRG', $_SESSION)) {
    $userdata1 = $_SESSION['PRG']['field1'];
    $userdata2 = $_SESSION['PRG']['field2'];
    //…
    $ermsg = $_SESSION['PRG']['ermsg'];
    unset($_SESSION['PRG']);
// 3) _____________________________________________ GET ______________________________
} else {
    //…
    //retrieve data from database(s)
    //…
    $userdata1 = "";//dbGet1();
    $userdata2 = "";//dbGet2();
    //…
    $ermsg = '';
}
// 4) _____________________________________________ DISPLAY _________________________
?>
<!DOCTYPE html>
<html lang="fr">
<!--…-->
<body>
<form method="post" action="form.php" accept-charset="utf-8">
    <input id="htUserdata1" name="htUserdata1" type="text"/>
    <input id="htUserdata2" name="htUserdata2" type="text"/>
    <!--…-->
    <input type="submit" value="submit"/>
</form>
<script language="javascript">
    "use strict";
    <?php
    $G['htUserdata1'] = $userdata1;
    $G['htUserdata2'] = $userdata2;
    /*…*/
    $G['ermsg'] = $ermsg;
    $myJSON = json_encode($G);
    echo "var G=$myJSON;";
    ?>
    document.getElementById('htUserdata1').value = G.htUserdata1;
    document.getElementById('htUserdata2').value = G.htUserdata2;
    // …
    if (G.ermsg !== '') alert(G.ermsg);
</script>
</body>
</html>