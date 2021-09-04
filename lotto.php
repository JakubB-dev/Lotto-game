<?php
    // Check if predefined variable is set
    if(isset($_POST['number']) && !empty($_POST['number'])){
        $_SESSION['numbers'] = $_POST['number'];
        $length = count($_SESSION['numbers']);

        // Check number of numbers selected by player
        if($length < 6){
            echo "
                <h2>
                    Wybierz 6 liczb!
                </h2>
                <h3>
                    Wybrałeś tylko $length!
                </h3>
            ";
        } else if($length > 6){
            echo "
                <h2>
                    Wybierz 6 liczb!
                </h2>
                <h3>
                    Wybrałeś aż $length!
                </h3>
            ";
        } else{
            $allNumbers = [];
            for($f = 1; $f < 50; $f++){
                $allNumbers[$f] = $f;
            }

            $randomNumbers = [];
            for($f = 0; $f < 50; $f++){
                $rand = rand(1, 49);
                $randomNumbers[$f] = $allNumbers[$rand];
            }

            // Display numbers - player
            $y = 0;
            echo "Twoje liczby: <br>";
            foreach($_SESSION['numbers'] as $num){
                echo "$num";
                if($y < 5){
                    echo ", ";
                }
                $y++;
            }

            // Drawn numbers
            $winningNumbers = [];
            for($i = 0; $i < 6; $i++){
                $rand = rand(1, 49);

                while(!isset($allNumbers[$rand])){
                    $rand = rand(1, 49);
                }

                $winningNumbers[$i] = $allNumbers[$rand];
                unset($allNumbers[$rand]);
            }

            // Sort winning numbers ascending
            sort($winningNumbers);

            // Display numbers - random
            $z = 0;
            echo "<br><br>Wygrywające liczby: <br>";
            foreach($winningNumbers as $win){
                echo "$win";
                if($z < 5){
                    echo ", ";
                }
                $z++;
            }

            // Display result
            $shootedNumbers = 6 - count(array_diff($winningNumbers, $_SESSION['numbers']));
            echo "<br><br>Trafiono: <br>$shootedNumbers<br>";
        }
        $_SESSION['numbers'] = "";
    }
?>