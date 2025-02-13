<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operation = $_POST["operation"];
        $result = 0;

        if(!is_numeric($num1) || !is_numeric($num2)){
            header("Location: .//calc.php?error=" . urlencode("Musisz podać liczby!"));
            exit();
        }

        switch($operation){
            case "add":
                $result=$num1+$num2;
                break;
            case "substract":
                $result=$num1-$num2;
                break;
            case "multiply":
                $result=$num1*$num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    header("Location: ../calc.php?error=" . urlencode("Nie można dzielić przez 0"));
                    exit();
                }
                $result=$num1/$num2;
                break;
            default:
            header("Location: ../calc.php?error=" . urlencode("Zła operacja"));
            exit();
        }
        header("Location: ../calc.php?result=" . urlencode($result));
        exit();
    }
    else {
        header("Location: ../calc.php");
        exit();
    }
?>