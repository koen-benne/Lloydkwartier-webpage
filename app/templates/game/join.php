<?php
/**
 * @var $pageTitle string
 * @var $code string
 */
?>

<h1><?= $pageTitle; ?></h1>

<form action="" method="post" id="joinForm">
    <input type="text" name="username" placeholder="Username">
</form>
<button form="joinForm" type="submit" name="join" value="<?= $code; ?>">Join</button>