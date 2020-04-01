<?php
/**
 * @var $pageTitle string
 * @var $code string
 */
?>

<header>
<img src="css/images/Battleship.jpg" alt="logo" class="logo">
</header>

<button onclick="togglePopup()" class="info">?</button>

<div class="full-screen hidden flex-container-center">
    <button onclick="togglePopup()" class="info-close">?</button>
    <h3>Voorbeeld van alle regels enz.</h3>
</div>

<form action="" method="post" id="joinForm">
    <input type="text" name="username" placeholder="Username">
</form>

<button form="joinForm" type="submit" name="join" value="<?= $code; ?>" class="submit">Join</button>
<script src="js/joinScript.js"></script>