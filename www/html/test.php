<?php
require_once "dbconnect.php";

$pdo = connect();

if ( isset($_POST['username']) && isset($_POST['email'])) {
    $sql = "INSERT INTO users (username, email)
               VALUES (:username, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':username' => $_POST['username'],
        ':email' => $_POST['email']));
}
?>
<html>
<head></head>
<body>
    <table>
    <?php
    $stmt = $pdo->query("SELECT * FROM users");
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        echo "<tr><td>";
        echo($row['username']);
        echo("</td><td>");
        echo($row['email']);
        echo("</td></tr>");
    }
    ?> <br>
    </table>

    <p>Add A New User</p>
    <form method="post">
    <p>Name:<input type="text" name="username" size="40"></p>
    <p>Email:<input type="text" name="email"></p>
    <p><input type="submit" value="Add New"/></p>
    </form>
</body>