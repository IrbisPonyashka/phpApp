<?

session_start();



$pages = [
    'main' => [
        'name' => 'Главная',
        'icon' => 'fal fa-home'
    ],
    'contact' => [
        'name' => 'Контакты',
        'icon' => 'fal fa-address-book'
    ],
    'table' => [
        'name' => 'Таблица умножения',
        'icon' => 'fas fa-times'
    ],
    'calc' => [
        'name' => 'Калькулятор',
        'icon' => 'fas fa-calculator-alt'
    ],
    'slide' => [
        'name' => 'Слайдер',
        'icon' => 'far fa-presentation'
    ],
    'guest' => [
        'name' => 'Гостевая книга',
        'icon' => 'fal fa-books'
    ],
    'test' => [
        'name' => 'Тест',
        'icon' => 'fal fa-vial'
    ],
    'forRegUsers' => [
        'name' => 'ФРУ',
    ],
    'login' => [
        'name' => 'Вход'
    ],
    'registration' => [
        'name' => 'Регистрация'
    ]
    
];


$route = $_GET['route'] ? $_GET['route'] : 'main';

if(!$_SESSION['login']) {
    switch($route) {
        case 'guest':
            $route = 'forRegUsers';
            break;
        case 'test':
            $route = 'forRegUsers';
            break;
    }
}

if($_SESSION['role'] !== 'admin'){
    switch($route) {
        case 'test':
            $route = 'test';
            break;
    }
}
  
    $commentItem = '';
    function creatComm(){
    include_once 'common/db.php'; 
        $coms = commentAdd();
        foreach($coms as $el => $val){
            $commentItem .= "<div class=\"comments__item\">
                        <section class=\"comments__body\">
                            <div class=\"comments__head\">";
                $commentItem .="<h2 class=\"comment__head-title\">".$val['login']."</h2>";
                $commentItem .="<img src=".$val['photo']." alt=\"\" class=\"comments__head-img\">";
                $commentItem .="</div>";
                $commentItem .= "<p class=\"comments__body-descr\">".$val['comment']."</p>";
                $commentItem .= "<div class=\"comments__footer\">";
                $commentItem .= "<form action=\"/common/comment-del.php\" method=\"POST\">
                                    <input type=\"hidden\" name=\"delLogin\" value=".$val['login']." class=\"comments__footer-input\">
                                    <input type=\"hidden\" name=\"delId\" value=".$val['id']." class=\"comments__footer-input\">
                                    <a class=\"comments__footer-link replace_link\" ><i class=\"fas fa-pencil\"></i></a>
                                    <button name=\"delete\" class=\"comments__footer-link\"><i class=\"fal fa-trash\"></i></button>
                                </form>";
                $commentItem .= "</div>
                        </section>
                    </div>";
        }
        echo $commentItem;
}
function drawSlider() {
    $pathImages = './img/slider/';
    $arrayImages = scandir($pathImages);
    // просматривает папку и возвращает все элементы в массиве
    $slider = '<div class="slider">';
    $slider .= '<div class="slider__line">';
    foreach($arrayImages as $key => $img):
        $ext = pathinfo($img, PATHINFO_EXTENSION);
        if($ext == 'jpg' || $ext == 'png' || $ext == 'svg' || $ext == 'webp') {
            $slider .= "<img src=\"$pathImages$img\" alt=\"\" class=\"slider__img\">";
        }
    endforeach;
    $slider .= '</div>
    <div class="slider__controls">
        <button class="slider__prev slider__btn"><i class="far fa-chevron-left"></i></button>
        <button class="slider__next slider__btn"><i class="far fa-chevron-right"></i></button>
    </div>
    </div>';
    echo $slider;
}
