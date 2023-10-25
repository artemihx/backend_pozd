<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname()?></p>
    <div align="right">
        <? if(!empty($user) && ($user->getRole() == 'admin')): ?>
        <a href="/articles/<?=$article->getId()?>/edit"/>Редактировать</a>
        <? endif; ?>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>