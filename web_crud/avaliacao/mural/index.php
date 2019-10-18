<?php

include 'conf/init.php';

$items = getItems();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Mural</h1>
    <h3><strong>Publique o que quiser, beijão!.</strong></h3></p>
    <strong style="margin-left: 90%;">
    <?php if (is_logged()): ?>
        <form action="addItem.php" method="POST">
            <fieldset>
                <legend>Novo item</legend>
                <input type="text" name="title" placeholder="Título">
                <textarea name="description" rows="6" placeholder="Descrição"></textarea>
                <select name="category" required="">
                    <option value="" readonly>Escolha a categoria</option>
                    <option value="" disabled>--</option>
                    <option value="Aviso">Aviso</option>
                    <option value="Pergunta">Pergunta</option>
                    <option value="Procurando">Procurando</option>
                    </select><p></p>
                <input type="submit">
            </fieldset>
        </form>
        <br>
        <table>
            <tr>
                <th>Nome</th>
                <th>Publicação</th>
                <?php if (is_logged()): ?>
                    <th>usuário</th>
                    <th>Opções</th>
                <?php endif ?>
            </tr>
            <?php foreach ($items as $itemId => $item): ?>
                <tr>
                    <td><?= $item['titulo'] ?></td>
                    <td><?= $item['desc'] ?></td>
                    <?php if (is_logged()): ?>
                        <td>
                            <?php
                            $author = user_info($item['email']);
                            ?>
                            <?= $author['nome'] ?>
                        </td>
                        <td>
                            <a href="itemInfo.php?id=<?= $itemId ?>">Mais informações</a>
                            <?php if ($item['email'] == user_email()): ?>
                                <br>
                                <a href="delItem.php?id=<?= $itemId ?>">Remover</a>
                            <?php endif ?>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </table>
    <?php else: ?>
        <div class="message">
        <div class="category category-0">Aviso</div>
        <div class="message-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quidem quis nihil deleniti laboriosam, non aspernatur minus quod maxime consequuntur dicta nemo consectetur, nesciunt quo magni atque, magnam, asperiores suscipit. <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo maxime voluptatibus repudiandae numquam earum ex cumque aliquid voluptatum reiciendis dolorum animi, corporis illum aperiam, laborum iure. Ad pariatur, rerum doloribus.
        </div>
        <div class="author_date">
            <div class="author">Bruce Banner <span>(hulk)</span></div>
            <div class="date">19/04/2019</div>
        </div>
    </div>

    <div class="message from-user">
        <div class="category category-1">Pergunta <a href="removeMessage.php?id=16" class="del" title="Remover mensagem">&times;</a></div>
        <div class="message-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa praesentium, rerum fugiat magnam ratione doloremque enim numquam aspernatur exercitationem ut dolore earum dolorem, id voluptas et eveniet ea, accusantium repudiandae?
        </div>
        <div class="author_date">
            <div class="author">Peter Quill <span>(starlord)</span></div>
            <div class="date">17/04/2019</div>
        </div>
    </div>

    <div class="message">
        <div class="category category-2">Procurando</div>
        <div class="message-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas itaque perspiciatis neque ut commodi omnis mollitia quod iure ipsa enim quae incidunt, porro quas consequuntur natus repudiandae voluptatem illo ab.
        </div>
        <div class="author_date">
            <div class="author">Tony Stark <span>(ironman)</span></div>
            <div class="date">16/04/2019</div>
        </div>
    </div>

    <div class="message from-user">
        <div class="category category-5">Encontrado <a href="removeMessage.php?id=14" class="del" title="Remover mensagem">&times;</a></div>
        <div class="message-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi nisi dolor sunt, unde delectus magnam odit quos harum provident voluptas placeat quas facilis, iusto excepturi blanditiis distinctio amet enim molestiae.
        </div>
        <div class="author_date">
            <div class="author">Peter Quill <span>(starlord)</span></div>
            <div class="date">16/04/2019</div>
        </div>
    <?php endif ?>
        <h3><a href="reg_login.php">Registro / login</a></h3>
</body>
</html>