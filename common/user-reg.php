<?
if(!empty($_POST)) {
    
    include_once './db.php';
    
    $userName = $_POST['login'];
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    
    if($ext) {
        $photoName = "./img/users/$userName.$ext";
    }else {
        $rand = mt_rand(1,2);
        $photoName = "./img/users/$rand.jfif";
    }
    
    $user = userReg($userName, $_POST['name'], $_POST['pass'], $photoName);
    
    if($user) {
        move_uploaded_file($_FILES['photo']['tmp_name'], ".$photoName");
        sleep(3);
        header('Location: /?route=login');
    }
}
else {
    header('Location: /');
}



