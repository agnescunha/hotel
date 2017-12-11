<?php  
    if(isset($_POST))   echo "existe algo<br>";

    echo "vou imprimir os POST<br>";
    var_dump($_POST);

    echo "<br>";
    echo $_POST["nome_cliente"]."<br>";

    echo "Já imprimi os POST<br>";
?>