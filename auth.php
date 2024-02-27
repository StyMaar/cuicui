<?php
    $users = [
        'mima' => '$2y$10$QhJk75vE44Vs1dv.uG3sDuDvUQZndh2nY2.RwR8y6lFXqWFD8CKeK',
        'papy' => '$2y$10$bph5h3RpsMKSl7oeY7Dn6erhko0auaRl7oqmaB60x102gc7ehTUAC',
        'amatxi' => '$2y$10$rcRZxNdZWB8IXNKlRMoH0u/WC4qaPEI8NxUQ0izcPXJSpSGeTeQfO',
        'papanou' => '$2y$10$1y8IXWVZgoi0yBr2DOKJ7eIo2noUSObBGmCvzBUu2JOdKoi7ioo66',
        'marie-pia' => '$2y$10$seX4B0sXzE4t0XoN/It5DePgvVGAznMARpfTEnij3yAC8e1NwQ4y.',
        'photos' => '$2y$10$6S.mKU7P8n.Tv1P7aCIxFuWq19gl0ti6LvQTj4UaRsppNVxX.o0La'
    ];

    session_start();

    if (!empty($_POST) && !$_SESSION['authenticated']) {
       $hash = $users[$_POST['username']];
       if (password_verify($_POST['password'], $hash)) {
           $_SESSION['authenticated'] = true;
           header("Location: /fanclub/", true, 307);
           exit();
        } else {
            $error = 'Incorrect username or password. Please retry';
            echo $error;
        }
   }
?>
<form method="post" action="auth.php"><input type="text" name="username" /><input type="password" name="password" /><input type="submit" value="Connection" /></form>