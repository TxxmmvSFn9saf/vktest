<?php
$fp = fopen('../../class1.php', 'r');
echo fread($fp, 90000);