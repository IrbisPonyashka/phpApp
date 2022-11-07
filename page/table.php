
        <main class="main">
            <section class="head">
                <h2 class="head__title">Таблица умножения</h2>
                <?
                    $m = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                ?>
                <?$month = date("n")-1?>
                <p class="head__date"><?='Today is the '.date('d').'th of '.$m[$month].' '.date('Y').' years';?></p>
            </section>
            <form class="form form__table">
                <label class="form__label">
                    <span class="form__text">Количество колонок</span>
                    <input type="text" class="form__input" name="col">
                </label>
                <label class="form__label">
                    <span class="form__text">Количество строк</span>
                    <input type="text" class="form__input" name="row">
                </label>
                <button class="form__btn">Отправить</button>
            </form>
            <div class="table">
                
            </div>
        </main>
        
<script>
    let formTable = document.querySelector('.form__table')
    let table = document.querySelector('.table')
    formTable.addEventListener('submit', function(event) {
        event.preventDefault()
        fetch('./ajax/table-api.php', {
            method: 'POST',
            body: new FormData(this)
        })
        .then(data => data.text())
        .then(info => table.innerHTML = info)
        this.reset();
    })
</script>
