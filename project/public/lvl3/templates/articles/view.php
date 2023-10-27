<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname()?></p>
    <div align="right">
        <? if(!empty($user) && ($user->getRole() == 'admin')): ?>
        <a href="/articles/<?=$article->getId()?>/edit"/>Редактировать</a>
        <? endif; ?>
    </div>
    <div>
        Комментарии:
        <br><br>
        <? if($comment !== null):?>
        <? foreach ($comment as $com):?>
        <?= $com->getAuthor()->getNickname().': '?>
        <?= $com->getText()?>
        <? if($com->getAuthorId() == $user->getId() || ($user->getRole() == 'admin')): ?>
        <a href="/comments/<?=$com->getId()?>/edit"/>Редактировать</a>
        <? endif; ?>
        <br>
        <? endforeach; endif;?>
    </div>
    <div>
        <br><br>
        <? if(!empty($user)): ?>
            <form action="/articles/<?= $article->getId() ?>/comments" method="post">
                <label for="text">Введите комментарий</label><br>
                <textarea name="text" id="text" rows="3" cols="50"></textarea><br>
                <br>
                <input type="submit" value="Отправить">
            </form>
        <? else: ?>
            <p>Авторизуйтесь, чтобы оставлять комментарии!</p>
        <? endif; ?>

    </div>
<?php include __DIR__ . '/../footer.php'; ?>