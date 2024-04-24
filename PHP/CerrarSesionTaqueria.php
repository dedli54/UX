<?php
        session_start();
        echo '
        <script>
            alert("Se cerró la sesión de manera satisfactoria!");
        </script>
        ';
        session_destroy();
        header("location: ../HTML/IndexTaqueria.php");
?>
