<?

if(!empty($_POST['delId'])){
    include_once './db.php';
    include_once '../function.php';
    if($_SESSION['role'] == 'admin' || $_SESSION['login'] == $_POST['delLogin']){
        $id = $_POST['delId'];
        delComments($id);
        header('Location: /?route=guest');
        return 'nice';
    }else {
        header('Location: /?route=guest');
    }
}

if(!empty($_POST['reComment'])){
    include_once './db.php';
    include_once '../function.php';
    if($_SESSION['login'] == $_POST['reLogin']){
        $id = $_POST['reId'];
        $comment = $_POST['reComment'];
        renComments($id,$comment);
        header('Location: /?route=main');
    }else {
        echo $_POST['reLogin'];
        echo $_POST['reId'];
        header('Location: /?route=guest');
    }
}
