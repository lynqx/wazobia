<?php

// Create a unique password:
echo $p = uniqid() . '<br><br>';

// Create the activation code:
echo $a = uniqid(rand(000000, 999999), true);


?>
