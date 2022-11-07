<?
if(!empty($_POST) && !empty($_POST['col']) &&  !empty($_POST['row'])){
    $col = $_POST['col'];
    $row = $_POST['row'];
    $result = '';
    for($i = 1; $i <= $row;$i++):
        $result .=  '<div class="table__row">';
            for($x = 1; $x <= $col;$x++):
                if($i == $x){
                    $result .=  '<div class="table__col" style="background:rgba(255, 0, 0, 0.604)">'. $x * $i .'</div>';
                }else{
                    $result .=  '<div class="table__col" >'. $x * $i .'</div>';
                }
            endfor;
        $result .= '</div>';
    endfor;
    echo $result;
}else {
    echo 'Пришли неправильные данные';
}
    
    