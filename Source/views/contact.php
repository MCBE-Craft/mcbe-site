<?php
    if (!isset($discordUser)) return;
    $lang = Controller::getLang();
?>
<h1><?php echo htmlspecialchars($lang::getItem('contact_title')); ?></h1>
<div>
    <img class="icon" src="../Assets/img/discord.png" alt="discord">
    <h3><?php echo htmlspecialchars($lang::getItem('contact_discord-title')); ?></h3>
    <p><a class="link" href="https://discordapp.com/users/630919091015909386"><?php echo htmlspecialchars($discordUser); ?></a></p>
</div>
<div>
    <img class="icon" src="../Assets/img/mail.png" alt="gmail">
    <h3><?php echo htmlspecialchars($lang::getItem('contact_mail-title')); ?></h3>
    <p><a class="link" href="mailto:mcbe.craft0@gmail.com?subject=Contact%20from%20website&body=Hello%20MCBE%20Craft">mcbe.craft0@gmail.com</a></p>
</div>