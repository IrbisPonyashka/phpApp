
        <main class="main">
            <? $name = 'js'; ?>
            <?if($name == 'php'):?>
            <h1><?= $name ?></h1>
            <?else:?>
            <h1>Ваш сайт на php и в перемеенной $name лежит <?= $name?></h1>
            <?endif;?>
            
            <?
                $array = ['cobalt','spark','gentra','nexia','damas'];
                $countries = [
                    'uzb' => ['plov','gm','somsa','chay'],
                    'russian' => ['vodka','putin','balalayka','medved'],
                    'usa' => ['dollar','new york', 'marvel']
                ];
            
            ?>
            
            <?for($i = 0; $i < count($array);$i++):?>
                <h1><?= $array[$i]?></h1>
            <?endfor;?>
            <hr>
            
            <?foreach($countries as $country => $values):?>
                <h2><?= $country?></h2>
                <?foreach($values as $key => $info):?>
                    <p><?= $info?></p>
                <?endforeach;?>
            <?endforeach;?>
            
            <form>
                <p>Выберите год рождения</p>
                <select>
                    <?for($i = 1950; $i <= date('Y');$i++):?>
                        <option><?= $i?></option>
                    <?endfor;?>
                </select>
            </form>
            
            <?
                var_dump($_GET);
            ?>
            
        </main>
