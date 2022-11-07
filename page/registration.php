
        <main class="main">
            <section class="head">
                <h2 class="head__title">Регистрация в системе</h2>
                <?
                    $m = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                ?>
                <?$month = date("n")-1?>
                <p class="head__date"><?='Today is the '.date('d').'th of '.$m[$month].' '.date('Y').' years';?></p>
            </section>

            <form enctype="multipart/form-data" action="./common/user-reg.php" class="form" method="post">
                <label class="form__label">
                    <span class="form__text">Логин</span>
                    <input type="text" class="form__input" name="login" autocomplete="off">
                </label>
                <label class="form__label">
                    <span class="form__text">Имя</span>
                    <input type="text" class="form__input" name="name" autocomplete="off">
                </label>
                <label class="form__label">
                    <input type="file" class="form__input" name="photo" autocomplete="off">
                </label>
                <label class="form__label">
                    <span class="form__text">Пароль</span>
                    <input type="password" class="form__input" name="pass">
                    <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
                </label>
                <label class="form__label">
                    <span class="form__text">Повторите пароль</span>
                    <input type="password" class="form__input" name="confirmpass">
                    <button type="button" class="form__eye"><i class="far fa-eye-slash"></i></button>
                </label>
                <span class="form__error">* Пароли не совподают</span>
                <button class="form__btn" disabled>Зарегистрироваться</button>
            </form>
        </main>

        <script>
    let formTable = document.querySelector('.form');
    let btn = document.querySelector('.form__btn');
    let title = document.querySelector('.sucsy__title');
    btn.addEventListener('click', () => {
        title.innerHTML = 'Регистрация прошла успешно! Теперь просто войдите в свой аккаунт!'
    })

</script>