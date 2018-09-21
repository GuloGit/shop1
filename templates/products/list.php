<?php
    foreach ($products as $key => $item) {
        ?>
            <article style="border-bottom: 1px dashed;">
                <h2><?= $item["ProductName"]?></h2>
                <p><?= $item["ProductDescription"]?></p>
                <a href="/products/<?= $key?>">Читать далее</a>
            </article>
        <?php
    }
?>