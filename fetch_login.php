<?php
    include(dirname(__DIR__) . '/hospital-pjbl/'  . "connection.php");
    if(!isset($_SESSION["id_username"])){

        $_SESSION["id_username"];
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["password"] == $password) {
                header("Location: index.php");
                session_start();
                $_SESSION["id_username"] = intval($row["id_username"]);
                $_SESSION["role"] = $row["role"];
            }
            else {
?>
<script>
    alert("Senha não confere");
    history.go(-1);
</script>
<?php
            }
        }
    }
    else {
?>
<script>
    alert("Login não confere");
    history.go(-1);
</script>
<?php
    }
?>