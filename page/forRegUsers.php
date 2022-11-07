<main class="main">
            <section class="head">
                <h2 class="head__title-fur">Для входа в эти страницы, вы должны зарегестрироваться и войти в аккаунт.</h2>
                <?
                    $m = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                ?>
                <?$month = date("n")-1?>
                <p class="head__date"><?='Today is the '.date('d').'th of '.$m[$month].' '.date('Y').' years';?></p>
            </section>
</main>