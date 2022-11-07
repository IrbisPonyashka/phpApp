<?

if(!empty($_POST['descr'])){

    include_once './db.php';
    include_once '../function.php';

    $comments = $_POST['descr'];
    $login = $_SESSION['login'];
    $photo = $_SESSION['photo'];
    $com = userComments($login,$comments,$photo);
    header('Location: /?route=guest');
}else if(empty($_POST['descr']) || empty($_POST['login'])){
    header('Location: /?route=guest');
}

