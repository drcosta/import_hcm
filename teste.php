<?php

$ler = file('./info_verbas.csv');
foreach ($ler as $linha) {
  $explode = explode(';', $linha);
  list($evento, $horas, $tfolha, $nparcela) = $explode;


  echo '
    if ($evento == "' . $evento . '") {<br />
      $info["horas"] = "' . $horas . '";<br />
      $info["tfolha"] = "' . $tfolha . '";<br />
      $info["nparcela"] = "' . $nparcela . '";<br />
    } else 

  ';
}
?>