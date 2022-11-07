<?  include_once 'function.php' ?>
        <main class="main">
            <div class="modal__bg">
                <div class="modal">
                    <button class="modal__btn">ОК</button>
                    <h2 class="modal__answer">You cannot delete other people`s comments!</h2>
                </div>
            </div>
            <div class="rename__bg">
                <div class="rename ">
                    <button class="rename__btn">X</button>
                    <form action="/common/comment-del.php" method="POST" class="rename__form">
                        <h3 class="header__name">login : <?= $_SESSION['login']; ?></h3>
                            <input type="hidden" name="reLogin" value="<?$_SESSION['login']?>" class="comments__footer-input">
                            <input type="hidden" name="reId" value="<?$_SESSION['id']?>" class="comments__footer-input">
                            <input type="text" name="reComment" placeholder="rename your comment" class="comments__footer-input" id="replace_comment">
                        <button name="rename" class="comments__footer-link replace_btn">save</button>
                    </form>
                </div>
            </div>
            <section class="head">
                <h2 class="head__title">Гостевая книга</h2>
                <?
                    $m = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                ?>
                <?$month = date("n")-1?>
                <p class="head__date"><?='Today is the '.date('d').'th of '.$m[$month].' '.date('Y').' years';?></p>
            </section>
            <h3 class="header__name">Отправитель <?= $_SESSION['login']; ?>,</h3>
            <form action="./common/user-comments.php" class="form" method="POST">
                <label class="form__label">
                    <span class="form__text">Оставте отзыв</span>
                    <textarea class="form__input" name="descr"></textarea>
                </label>
                <button class="form__btn">Отправить</button>
            </form>
            <div class="comments"><?=creatComm()?></div>
        </main>
<script>

    let getModal = () => {
        let modal = document.querySelector('.modal__bg');
        let btn = document.querySelector('.modal__btn');
            document.querySelector('body').style =`overflow:hidden;`
            modal.classList.add('show');
            btn.addEventListener('click', () => {
                document.querySelector('body').style =`overflow:auto;`
                modal.classList.remove('show')
            })
    }



    let login = document.querySelector('.user__profile-name').innerHTML;
    let rename = document.querySelector('.rename__bg');
    let rebtn = document.querySelector('.rename__btn');
    // let reInput = document.getElementById('replace_comment');
    // let removeBtn = document.querySelectorAll('.replace_btn');
    let removeLink = document.querySelectorAll('.replace_link');
    
    removeLink.forEach(el => {
        el.addEventListener('click' , (event) => {
            if(event.path[4].querySelector('.comment__head-title').innerHTML != login){
                getModal();
            }else{
                document.querySelector('body').style =`overflow:hidden;`
                rename.classList.add('show');
                rebtn.addEventListener('click', () => {
                    document.querySelector('body').style =`overflow:auto;`
                    rename.classList.remove('show')
                })
            }
        })
    })


    let formTable = document.querySelectorAll('.comments__footer');
    formTable.forEach(el => {
        el.addEventListener('submit', function(event) {
            if(event.target[0].value != login && login != 'admin'){
                event.preventDefault();
                getModal();
            }else{
            }
        })
    })

</script>
