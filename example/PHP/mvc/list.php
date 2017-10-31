<?php foreach ($List as $row): ?>
    <ul>
        <li><?= $row.'</br>' ?></li>
        <li><?= $row[2] ?> - <?= $row[1] ?></li>
    </ul>
<?php endforeach ?>