<?php
/**
 * @var $code string
 */
?>

<header>
    <button id="info" class="open">?</button>
    <img src="css/images/Battleship.jpg" alt="logo" id="logo">
</header>

<div class="full-screen hidden flex-container-center">
    <section>
        <h3>Voorbeeld van alle regels enz.</h3>
    </section>
</div>

<form action="" method="post" id="joinForm">
    <input type="text" name="username" placeholder="Username">
</form>

<button form="joinForm" type="submit" name="join" value="<?= $code; ?>" class="submit">Join</button>