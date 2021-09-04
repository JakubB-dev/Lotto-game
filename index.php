<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
        <title>
            Lotto
        </title>
    </head>
    <body>
        <h1>
            Lotto
        </h1>
        <h3>
            Wybierz 6 liczb:
        </h3>
        <form action="#" method="POST">
            <?php
                // Loop - display 49 numbers
                $i = 1;
                while($i < 50){
                    echo "
                        <label>
                            $i<br>
                            <input type='checkbox' value='$i' name='number[]'>
                        </label>
                    ";
                    
                    // Every 7 numbers, start new line
                    if($i % 7 == 0){
                        echo "<br>";
                    }

                    $i++;
                }
            ?>
            <button type="submit">
                Wyślij
            </button>
        </form>
        <?php
            include_once("lotto.php");
        ?>
    </body>
</html>