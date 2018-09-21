<?php
    foreach ($news as $key => $item) {
        ?>
            <article style="border-bottom: 1px dashed;">
                <h2><?= $item["title"]?></h2>
                <p><?= $item["content"]?></p>
                <a href="/news/<?= $key?>">Читать далее</a>
            </article>
        <?php
    }
?>