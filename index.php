<?

include_once './function.php';

include_once './common/header.php';

include_once './common/aside.php';

if($pages[$route]) {
    include_once "./page/$route.php";
}else {
    include_once './page/404.php';
}

include_once './common/footer.php';

   
