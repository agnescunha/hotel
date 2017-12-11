<?php  
    if(isset($_GET))   echo "existe algo<br>";

    echo "vou imprimir os POST<br>";
    var_dump($_GET);

    echo "<br>";
    echo $_GET["nome_cliente"]."<br>";

    echo "Já imprimi os POST<br>";
?>