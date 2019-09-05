<?php require_once('views/header.php'); ?>

</header>

        <?php
        foreach($chapters1 as $chapter): ?>

        <h4>Chapitre <?= $chapter->chapi() ?> : <?= $chapter->title() ?></h4>
                    
        <h5><?= $chapter->content() ?>...</h5>

        <?php endforeach; ?>


<?php require_once('views/footer.php'); ?>
