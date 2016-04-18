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
        
        spl_autoload_register(function ($class_name) {
            include $class_name . '.php';
        });
        
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'toeic';
        $db_obj = new db_connection($servername, $username, $password, $db_name);
        $db_con = $db_obj->getConnection();
        
        $word_obj = new words();
        $tmp = $word_obj->getOneNoMeaningWord($db_con);
        
        //echo '<br><br><b>Method result</b> = ';
        echo json_encode($tmp);
        
        ?>
    </body>
</html>
