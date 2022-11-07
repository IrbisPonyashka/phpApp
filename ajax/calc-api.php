<?
            $one = $_POST['one'];
            $two = $_POST['two'];
            $symbol = $_POST['symbol'];
            $result = 0;

            if($symbol == '+'){
                echo ' Сумма : ' . ($one + $two);
            }elseif($symbol == '-'){
                echo ' Разность : ' . ($one - $two);
            }elseif($symbol == '*'){
                echo (' Произведение: ' . $one * $two);
            }elseif($symbol == '/'){
                echo (' Частное: ' . $one / $two);
            }        
?>  
