<?php

include_once './lib/functions.php';

echo date('dmY', strtotime(converteData2('20030429') . ' + 99999 days'));
?>