<?php
    include("../connection.php");

        $id = $_GET["id"];
        $sql = "DELETE FROM paciente WHERE ID_Paciente = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
?>
<script>
    alert('Usuário removido com sucesso!!!');
    location.href = <?= header("Location: paciente_view.php") ?>;
</script>
<?php
        }
        else {
?>
<script>
    alert('Algo não deu certo...');
    history.go(-1);
</script>
<?php
        }
?>