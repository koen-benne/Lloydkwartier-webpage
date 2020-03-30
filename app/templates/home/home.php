<?php
/**
 * @var $pageTitle string
 * @var $code string
 */
?>

<h1><?= $pageTitle; ?></h1>

<form action="" method="post">
    <input type="text" name="username" placeholder="Username">
</form>
<button name="join" value="<?= $code; ?>">Join</button>