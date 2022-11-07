<?
if($_SERVER['REDIRECT_STATUS'] === '404') {
    header('Location: /?route=404');
}
?>
<main class="main">
            <section class="head">
                <h2 class="head__title">Ошибка 404 страница не найдена</h2>
                <?
                    $m = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                ?>
                <?$month = date("n")-1?>
                <p class="head__date"><?='Today is the '.date('d').'th of '.$m[$month].' '.date('Y').' years';?></p>
            </section>
</main>