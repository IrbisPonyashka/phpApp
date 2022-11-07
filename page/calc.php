        <main class="main">
            <section class="head">
                <h2 class="head__title">Таблица умножения</h2>
                <?
                    $m = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                ?>
                <?$month = date("n")-1?>
                <p class="head__date"><?='Today is the '.date('d').'th of '.$m[$month].' '.date('Y').' years';?></p>
            </section>
            <div class="main__calc">
                    <form class="form form__calc" >
                        <label class="form__label">
                            <span class="form__text">Число 1</span>
                        <input type="text" class="form__input" name="one" data-type="number">
                    </label>
                    <div class="form__mySelect">
                        <div class="form__select">
                            <div class="form__select-name">Выбирите знак</div>
                            <div class="form__select-option">
                                </div>
                            </div>
                        <select name="symbol">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                        </select>
                    </div>
                    <label class="form__label">
                        <span class="form__text">Число 2</span>
                        <input type="text" class="form__input" name="two" data-type="number"> 
                    </label>
                    <button class="form__btn" onclick="getRes()">Посчитать</button>
                </form>
                <div class="answer__item">
                    <h3 class="answer__title">
                    </h3>
                </div>
            </div>
        </main>
<script>
    function getRes(){ 
        console.log('yeeee');
        let formTable = document.querySelector('.form__calc')
        let result = document.querySelector('.answer__title')
        formTable.addEventListener('submit', function(event)  {
            event.preventDefault()
            fetch('./ajax/calc-api.php', {
                method: 'POST',
                body: new FormData(this)
            })
            .then(data => data.text())
            .then(info => result.innerHTML = info)
            this.reset();
        })
    }
</script>
