<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function __autoload($db_connection) {
            include $db_connection . '.php';
        }

        // put your code here
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'toeic';
        $dbtest = new db_connection($servername, $username, $password, $db_name);
        
        var_dump($dbtest);
        ?>
    </body>
</html>
