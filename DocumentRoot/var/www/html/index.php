<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Compteur docker-compose</title>
    </head>
    <body>
        <?php
            $servername = "mariadb";
            $username = "user";
            $password = "pwd";
            $dbname = "testdb";
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->query("CREATE TABLE testdb.'compteur' ( id INT NOT NULL AUTO_INCREMENT , value INT NOT NULL , PRIMARY KEY (id));");
            $conn->query("INSERT INTO testdb.'compteur' (id,'value') VALUES (1,0);");
            $conn->query("UPDATE compteur SET value=value+1 WHERE id=1");
            $res = $conn->query("SELECT value FROM compteur WHERE id=1");
            $row = $res->fetch_array(MYSQLI_NUM);
            echo "Ajout +1 et refresh : ". $row[0];
        ?>
    </body>
</html>
