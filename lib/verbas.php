<?php

function info_verba($evento, $banco) {

  $info = "";

  if ($banco == "RUR") {
    if ($evento == "011") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "205") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "261") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "457") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "632") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "419") {
      $info["horas"] = "N";
      $info["tfolha"] = "3";
      $info["nparcela"] = "9 ";
    } else if ($evento == "171") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "371") {
      $info["horas"] = "N";
      $info["tfolha"] = "3";
      $info["nparcela"] = "9 ";
    } else if ($evento == "262") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "351") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "562") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "256") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "420") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "563") {
      $info["horas"] = "N";
      $info["tfolha"] = "3";
      $info["nparcela"] = "9 ";
    } else if ($evento == "035") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "580") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "355") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "052") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "100") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "176") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "027") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "070") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "351") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "103") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "070") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "245") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "221") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "471") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "405") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "496") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "224") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "253") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "201") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "017") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "376") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "557") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "525") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "356") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "524") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "377") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "523") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "180") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "485") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "400") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "801") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "490") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "381") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "197") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "290") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "108") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "356") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "479") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H01") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "472") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "233") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "508") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "294") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "455") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "452") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "558") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "602") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "092") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "351") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "190") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "230") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "234") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "330") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "478") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "492") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "633") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "634") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "205") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "469") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "227") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "602") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "193") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "482") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "355") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "468") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "487") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "479") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "403") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "484") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "557") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "527") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "527") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "606") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "273") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "474") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "233") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "527") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "023") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "524") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "026") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "257") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "100") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "527") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "541") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "021") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "017") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "030") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "468") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "190") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "190") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "495") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "406") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "494") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "099") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "022") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "479") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "332") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "400") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "486") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "023") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "026") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H02") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "024") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "024") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "191") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "488") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H03") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "493") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "801") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "601") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "601") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "601") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "520") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "601") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "580") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "940") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H05") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "603") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "654") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H06") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "E01") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "570") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "E02") {
      $info["horas"] = "N";
      $info["tfolha"] = "3";
      $info["nparcela"] = "9 ";
    } else if ($evento == "507") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "507") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "507") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "507") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H07") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H08") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "999") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H09") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H10") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "900") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "159") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "222") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "374") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "601") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "601") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "E02") {
      $info["horas"] = "N";
      $info["tfolha"] = "3";
      $info["nparcela"] = "9 ";
    } else if ($evento == "E02") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "544") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "549") {
      $info["horas"] = "N";
      $info["tfolha"] = "3";
      $info["nparcela"] = "9 ";
    } else if ($evento == "552") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "404") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "401") {
      $info["horas"] = "N";
      $info["tfolha"] = "2";
      $info["nparcela"] = "1 ";
    } else if ($evento == "H11") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "222") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "102") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "196") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "003") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "005") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "222") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "459") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "452") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "202") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "264") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "400") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "193") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H12") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "583") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "354") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "488") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "582") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H13") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "488") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "351") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "488") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H14") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H15") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "290") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "504") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "106") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "034") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "488") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "351") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "450") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H16") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "550") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "194") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "052") {
      $info["horas"] = "S";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H17") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "356") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "487") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H18") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "488") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H19") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "331") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "216") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "632") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "098") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "192") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "483") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "349") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H20") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "099") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "H21") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "403") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "494") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "037") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "028") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "271") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "360") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "402") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    } else if ($evento == "481") {
      $info["horas"] = "N";
      $info["tfolha"] = "1";
      $info["nparcela"] = "9 ";
    }
  }
//
  else if ($banco == "RUR_RV") {

  }
//
  else if ($banco == "URB") {

  }
//
  else if ($banco == "URB_RV") {

  }

  return $info;
}

function de_para_verbas($banco, $verba) {

  $new_verb = "";

  if ($banco == "RUR") {
    if ($verba == "172") {
      $new_verb = "999";
    } else if ($verba == "009") {
      $new_verb = "419";
    } else if ($verba == "010") {
      $new_verb = "416";
    } else if ($verba == "041") {
      $new_verb = "376";
    } else if ($verba == "053") {
      $new_verb = "381";
    } else if ($verba == "013") {
      $new_verb = "371";
    } else if ($verba == "046") {
      $new_verb = "377";
    } else if ($verba == "203") {
      $new_verb = "202";
    } else if ($verba == "095") {
      $new_verb = "403";
    } else if ($verba == "250") {
      $new_verb = "403";
    } else if ($verba == "035") {
      $new_verb = "405";
    } else if ($verba == "050") {
      $new_verb = "400";
    } else if ($verba == "128") {
      $new_verb = "400";
    } else if ($verba == "190") {
      $new_verb = "404";
    } else if ($verba == "191") {
      $new_verb = "401";
    } else if ($verba == "071") {
      $new_verb = "092";
    } else if ($verba == "231") {
      $new_verb = "194";
    } else if ($verba == "075") {
      $new_verb = "190";
    } else if ($verba == "117") {
      $new_verb = "190";
    } else if ($verba == "118") {
      $new_verb = "190";
    } else if ($verba == "136") {
      $new_verb = "191";
    } else if ($verba == "028") {
      $new_verb = "070";
    } else if ($verba == "031") {
      $new_verb = "070";
    } else if ($verba == "024") {
      $new_verb = "052";
    } else if ($verba == "232") {
      $new_verb = "052";
    } else if ($verba == "244") {
      $new_verb = "192";
    } else if ($verba == "054") {
      $new_verb = "197";
    } else if ($verba == "089") {
      $new_verb = "193";
    } else if ($verba == "210") {
      $new_verb = "193";
    } else if ($verba == "070") {
      $new_verb = "602";
    } else if ($verba == "088") {
      $new_verb = "602";
    } else if ($verba == "056") {
      $new_verb = "290";
    } else if ($verba == "222") {
      $new_verb = "290";
    } else if ($verba == "255") {
      $new_verb = "360";
    } else if ($verba == "197") {
      $new_verb = "005";
    } else if ($verba == "120") {
      $new_verb = "495";
    } else if ($verba == "061") {
      $new_verb = "472";
    } else if ($verba == "034") {
      $new_verb = "471";
    } else if ($verba == "103") {
      $new_verb = "474";
    } else if ($verba == "018") {
      $new_verb = "256";
    } else if ($verba == "109") {
      $new_verb = "257";
    } else if ($verba == "204") {
      $new_verb = "264";
    } else if ($verba == "254") {
      $new_verb = "271";
    } else if ($verba == "040") {
      $new_verb = "017";
    } else if ($verba == "114") {
      $new_verb = "017";
    } else if ($verba == "144") {
      $new_verb = "E17";
    } else if ($verba == "151") {
      $new_verb = "E17";
    } else if ($verba == "150") {
      $new_verb = "E19";
    } else if ($verba == "167") {
      $new_verb = "E20";
    } else if ($verba == "147") {
      $new_verb = "E18";
    } else if ($verba == "240") {
      $new_verb = "331";
    } else if ($verba == "079") {
      $new_verb = "330";
    } else if ($verba == "185") {
      $new_verb = "549";
    } else if ($verba == "184") {
      $new_verb = "544";
    } else if ($verba == "186") {
      $new_verb = "552";
    } else if ($verba == "065") {
      $new_verb = "455";
    } else if ($verba == "068") {
      $new_verb = "452";
    } else if ($verba == "202") {
      $new_verb = "452";
    } else if ($verba == "006") {
      $new_verb = "457";
    } else if ($verba == "036") {
      $new_verb = "496";
    } else if ($verba == "082") {
      $new_verb = "492";
    } else if ($verba == "139") {
      $new_verb = "493";
    } else if ($verba == "090") {
      $new_verb = "482";
    } else if ($verba == "052") {
      $new_verb = "490";
    } else if ($verba == "122") {
      $new_verb = "494";
    } else if ($verba == "251") {
      $new_verb = "494";
    } else if ($verba == "059") {
      $new_verb = "479";
    } else if ($verba == "126") {
      $new_verb = "479";
    } else if ($verba == "049") {
      $new_verb = "485";
    } else if ($verba == "137") {
      $new_verb = "488";
    } else if ($verba == "214") {
      $new_verb = "488";
    } else if ($verba == "217") {
      $new_verb = "488";
    } else if ($verba == "219") {
      $new_verb = "488";
    } else if ($verba == "226") {
      $new_verb = "488";
    } else if ($verba == "238") {
      $new_verb = "488";
    } else if ($verba == "129") {
      $new_verb = "486";
    } else if ($verba == "257") {
      $new_verb = "481";
    } else if ($verba == "080") {
      $new_verb = "478";
    } else if ($verba == "096") {
      $new_verb = "484";
    } else if ($verba == "093") {
      $new_verb = "487";
    } else if ($verba == "055") {
      $new_verb = "216";
    } else if ($verba == "074") {
      $new_verb = "216";
    } else if ($verba == "078") {
      $new_verb = "216";
    } else if ($verba == "081") {
      $new_verb = "216";
    } else if ($verba == "125") {
      $new_verb = "216";
    } else if ($verba == "135") {
      $new_verb = "216";
    } else if ($verba == "200") {
      $new_verb = "216";
    } else if ($verba == "241") {
      $new_verb = "216";
    } else if ($verba == "230") {
      $new_verb = "550";
    } else if ($verba == "069") {
      $new_verb = "558";
    } else if ($verba == "256") {
      $new_verb = "402";
    } else if ($verba == "158") {
      $new_verb = "654";
    } else if ($verba == "157") {
      $new_verb = "603";
    } else if ($verba == "003") {
      $new_verb = "205";
    } else if ($verba == "085") {
      $new_verb = "205";
    } else if ($verba == "027") {
      $new_verb = "027";
    } else if ($verba == "253") {
      $new_verb = "028";
    } else if ($verba == "087") {
      $new_verb = "227";
    } else if ($verba == "037") {
      $new_verb = "224";
    } else if ($verba == "178") {
      $new_verb = "222";
    } else if ($verba == "198") {
      $new_verb = "222";
    } else if ($verba == "193") {
      $new_verb = "222";
    } else if ($verba == "102") {
      $new_verb = "273";
    } else if ($verba == "033") {
      $new_verb = "221";
    } else if ($verba == "076") {
      $new_verb = "230";
    } else if ($verba == "077") {
      $new_verb = "234";
    } else if ($verba == "062") {
      $new_verb = "233";
    } else if ($verba == "104") {
      $new_verb = "233";
    } else if ($verba == "145") {
      $new_verb = "532";
    } else if ($verba == "174") {
      $new_verb = "554";
    } else if ($verba == "044") {
      $new_verb = "356";
    } else if ($verba == "058") {
      $new_verb = "356";
    } else if ($verba == "234") {
      $new_verb = "356";
    } else if ($verba == "030") {
      $new_verb = "103";
    } else if ($verba == "195") {
      $new_verb = "196";
    } else if ($verba == "048") {
      $new_verb = "180";
    } else if ($verba == "057") {
      $new_verb = "108";
    } else if ($verba == "194") {
      $new_verb = "102";
    } else if ($verba == "025") {
      $new_verb = "100";
    } else if ($verba == "110") {
      $new_verb = "100";
    } else if ($verba == "224") {
      $new_verb = "106";
    } else if ($verba == "039") {
      $new_verb = "201";
    } else if ($verba == "001") {
      $new_verb = "011";
    } else if ($verba == "196") {
      $new_verb = "003";
    } else if ($verba == "225") {
      $new_verb = "034";
    } else if ($verba == "011") {
      $new_verb = "171";
    } else if ($verba == "021") {
      $new_verb = "035";
    } else if ($verba == "042") {
      $new_verb = "557";
    } else if ($verba == "097") {
      $new_verb = "557";
    } else if ($verba == "007") {
      $new_verb = "632";
    } else if ($verba == "242") {
      $new_verb = "632";
    } else if ($verba == "164") {
      $new_verb = "E02";
    } else if ($verba == "163") {
      $new_verb = "E03";
    } else if ($verba == "002") {
      $new_verb = "511";
    } else if ($verba == "016") {
      $new_verb = "511";
    } else if ($verba == "012") {
      $new_verb = "512";
    } else if ($verba == "020") {
      $new_verb = "563";
    } else if ($verba == "017") {
      $new_verb = "562";
    } else if ($verba == "005") {
      $new_verb = "561";
    } else if ($verba == "063") {
      $new_verb = "508";
    } else if ($verba == "032") {
      $new_verb = "245";
    } else if ($verba == "038") {
      $new_verb = "253";
    } else if ($verba == "176") {
      $new_verb = "900";
    } else if ($verba == "051") {
      $new_verb = "801";
    } else if ($verba == "140") {
      $new_verb = "801";
    } else if ($verba == "166") {
      $new_verb = "507";
    } else if ($verba == "168") {
      $new_verb = "507";
    } else if ($verba == "169") {
      $new_verb = "507";
    } else if ($verba == "245") {
      $new_verb = "483";
    } else if ($verba == "212") {
      $new_verb = "583";
    } else if ($verba == "215") {
      $new_verb = "582";
    } else if ($verba == "022") {
      $new_verb = "580";
    } else if ($verba == "101") {
      $new_verb = "606";
    } else if ($verba == "213") {
      $new_verb = "354";
    } else if ($verba == "015") {
      $new_verb = "351";
    } else if ($verba == "029") {
      $new_verb = "351";
    } else if ($verba == "072") {
      $new_verb = "351";
    } else if ($verba == "218") {
      $new_verb = "351";
    } else if ($verba == "246") {
      $new_verb = "349";
    } else if ($verba == "023") {
      $new_verb = "355";
    } else if ($verba == "091") {
      $new_verb = "355";
    } else if ($verba == "108") {
      $new_verb = "026";
    } else if ($verba == "131") {
      $new_verb = "026";
    } else if ($verba == "106") {
      $new_verb = "023";
    } else if ($verba == "130") {
      $new_verb = "023";
    } else if ($verba == "115") {
      $new_verb = "030";
    } else if ($verba == "124") {
      $new_verb = "022";
    } else if ($verba == "133") {
      $new_verb = "024";
    } else if ($verba == "134") {
      $new_verb = "024";
    } else if ($verba == "113") {
      $new_verb = "021";
    } else if ($verba == "155") {
      $new_verb = "940";
    } else if ($verba == "008") {
      $new_verb = "098";
    } else if ($verba == "066") {
      $new_verb = "098";
    } else if ($verba == "067") {
      $new_verb = "098";
    } else if ($verba == "098") {
      $new_verb = "098";
    } else if ($verba == "119") {
      $new_verb = "098";
    } else if ($verba == "201") {
      $new_verb = "098";
    } else if ($verba == "207") {
      $new_verb = "098";
    } else if ($verba == "237") {
      $new_verb = "098";
    } else if ($verba == "243") {
      $new_verb = "098";
    } else if ($verba == "123") {
      $new_verb = "099";
    } else if ($verba == "248") {
      $new_verb = "099";
    } else if ($verba == "252") {
      $new_verb = "037";
    } else if ($verba == "014") {
      $new_verb = "262";
    } else if ($verba == "177") {
      $new_verb = "159";
    } else if ($verba == "026") {
      $new_verb = "176";
    } else if ($verba == "004") {
      $new_verb = "261";
    } else if ($verba == "064") {
      $new_verb = "294";
    } else if ($verba == "223") {
      $new_verb = "504";
    } else if ($verba == "019") {
      $new_verb = "420";
    } else if ($verba == "043") {
      $new_verb = "525";
    } else if ($verba == "045") {
      $new_verb = "524";
    } else if ($verba == "047") {
      $new_verb = "523";
    } else if ($verba == "060") {
      $new_verb = "H01";
    } else if ($verba == "073") {
      $new_verb = "216";
    } else if ($verba == "083") {
      $new_verb = "633";
    } else if ($verba == "084") {
      $new_verb = "634";
    } else if ($verba == "086") {
      $new_verb = "469";
    } else if ($verba == "092") {
      $new_verb = "468";
    } else if ($verba == "094") {
      $new_verb = "479";
    } else if ($verba == "099") {
      $new_verb = "527";
    } else if ($verba == "100") {
      $new_verb = "527";
    } else if ($verba == "105") {
      $new_verb = "527";
    } else if ($verba == "107") {
      $new_verb = "524";
    } else if ($verba == "111") {
      $new_verb = "527";
    } else if ($verba == "112") {
      $new_verb = "541";
    } else if ($verba == "116") {
      $new_verb = "468";
    } else if ($verba == "121") {
      $new_verb = "406";
    } else if ($verba == "127") {
      $new_verb = "332";
    } else if ($verba == "132") {
      $new_verb = "H02";
    } else if ($verba == "138") {
      $new_verb = "H03";
    } else if ($verba == "141") {
      $new_verb = "601";
    } else if ($verba == "142") {
      $new_verb = "601";
    } else if ($verba == "143") {
      $new_verb = "601";
    } else if ($verba == "146") {
      $new_verb = "520";
    } else if ($verba == "148") {
      $new_verb = "E02";
    } else if ($verba == "149") {
      $new_verb = "601";
    } else if ($verba == "152") {
      $new_verb = "H04";
    } else if ($verba == "153") {
      $new_verb = "580";
    } else if ($verba == "154") {
      $new_verb = "531";
    } else if ($verba == "156") {
      $new_verb = "H05";
    } else if ($verba == "159") {
      $new_verb = "H06";
    } else if ($verba == "160") {
      $new_verb = "E01";
    } else if ($verba == "161") {
      $new_verb = "E01";
    } else if ($verba == "162") {
      $new_verb = "570";
    } else if ($verba == "165") {
      $new_verb = "507";
    } else if ($verba == "170") {
      $new_verb = "H07";
    } else if ($verba == "171") {
      $new_verb = "H08";
    } else if ($verba == "173") {
      $new_verb = "H09";
    } else if ($verba == "175") {
      $new_verb = "H10";
    } else if ($verba == "179") {
      $new_verb = "374";
    } else if ($verba == "180") {
      $new_verb = "601";
    } else if ($verba == "181") {
      $new_verb = "601";
    } else if ($verba == "182") {
      $new_verb = "E02";
    } else if ($verba == "183") {
      $new_verb = "E02";
    } else if ($verba == "187") {
      $new_verb = "531";
    } else if ($verba == "188") {
      $new_verb = "554";
    } else if ($verba == "189") {
      $new_verb = "532";
    } else if ($verba == "192") {
      $new_verb = "H11";
    } else if ($verba == "199") {
      $new_verb = "459";
    } else if ($verba == "205") {
      $new_verb = "400";
    } else if ($verba == "206") {
      $new_verb = "216";
    } else if ($verba == "208") {
      $new_verb = "005";
    } else if ($verba == "209") {
      $new_verb = "216";
    } else if ($verba == "211") {
      $new_verb = "H12";
    } else if ($verba == "216") {
      $new_verb = "H13";
    } else if ($verba == "220") {
      $new_verb = "H14";
    } else if ($verba == "221") {
      $new_verb = "H15";
    } else if ($verba == "227") {
      $new_verb = "351";
    } else if ($verba == "228") {
      $new_verb = "450";
    } else if ($verba == "229") {
      $new_verb = "H16";
    } else if ($verba == "233") {
      $new_verb = "H17";
    } else if ($verba == "235") {
      $new_verb = "487";
    } else if ($verba == "236") {
      $new_verb = "H18";
    } else if ($verba == "239") {
      $new_verb = "H19";
    } else if ($verba == "247") {
      $new_verb = "H20";
    } else if ($verba == "249") {
      $new_verb = "H21";
    }
  }
//
  else if ($banco == "RUR_RV") {
    if ($verba == "049") {
      $new_verb = "003";
    } else if ($verba == "001") {
      $new_verb = "011";
    } else if ($verba == "040") {
      $new_verb = "017";
    } else if ($verba == "108") {
      $new_verb = "017";
    } else if ($verba == "115") {
      $new_verb = "023";
    } else if ($verba == "127") {
      $new_verb = "023";
    } else if ($verba == "025") {
      $new_verb = "025";
    } else if ($verba == "030") {
      $new_verb = "026";
    } else if ($verba == "130") {
      $new_verb = "026";
    } else if ($verba == "027") {
      $new_verb = "027";
    } else if ($verba == "103") {
      $new_verb = "034";
    } else if ($verba == "192") {
      $new_verb = "037";
    } else if ($verba == "021") {
      $new_verb = "037";
    } else if ($verba == "080") {
      $new_verb = "052";
    } else if ($verba == "028") {
      $new_verb = "070";
    } else if ($verba == "209") {
      $new_verb = "099";
    } else if ($verba == "026") {
      $new_verb = "100";
    } else if ($verba == "064") {
      $new_verb = "103";
    } else if ($verba == "177") {
      $new_verb = "159";
    } else if ($verba == "011") {
      $new_verb = "171";
    } else if ($verba == "111") {
      $new_verb = "176";
    } else if ($verba == "126") {
      $new_verb = "190";
    } else if ($verba == "135") {
      $new_verb = "190";
    } else if ($verba == "136") {
      $new_verb = "190";
    } else if ($verba == "190") {
      $new_verb = "192";
    } else if ($verba == "120") {
      $new_verb = "201";
    } else if ($verba == "204") {
      $new_verb = "202";
    } else if ($verba == "003") {
      $new_verb = "205";
    } else if ($verba == "081") {
      $new_verb = "205";
    } else if ($verba == "122") {
      $new_verb = "216";
    } else if ($verba == "035") {
      $new_verb = "221";
    } else if ($verba == "178") {
      $new_verb = "222";
    } else if ($verba == "037") {
      $new_verb = "224";
    } else if ($verba == "062") {
      $new_verb = "227";
    } else if ($verba == "067") {
      $new_verb = "230";
    } else if ($verba == "055") {
      $new_verb = "233";
    } else if ($verba == "068") {
      $new_verb = "234";
    } else if ($verba == "118") {
      $new_verb = "245";
    } else if ($verba == "121") {
      $new_verb = "253";
    } else if ($verba == "018") {
      $new_verb = "256";
    } else if ($verba == "202") {
      $new_verb = "257";
    } else if ($verba == "004") {
      $new_verb = "261";
    } else if ($verba == "014") {
      $new_verb = "262";
    } else if ($verba == "191") {
      $new_verb = "271";
    } else if ($verba == "132") {
      $new_verb = "290";
    } else if ($verba == "050") {
      $new_verb = "294";
    } else if ($verba == "113") {
      $new_verb = "330";
    } else if ($verba == "123") {
      $new_verb = "351";
    } else if ($verba == "116") {
      $new_verb = "355";
    } else if ($verba == "051") {
      $new_verb = "356";
    } else if ($verba == "194") {
      $new_verb = "360";
    } else if ($verba == "013") {
      $new_verb = "371";
    } else if ($verba == "179") {
      $new_verb = "374";
    } else if ($verba == "046") {
      $new_verb = "377";
    } else if ($verba == "201") {
      $new_verb = "400";
    } else if ($verba == "008") {
      $new_verb = "401";
    } else if ($verba == "032") {
      $new_verb = "402";
    } else if ($verba == "007") {
      $new_verb = "404";
    } else if ($verba == "036") {
      $new_verb = "405";
    } else if ($verba == "034") {
      $new_verb = "405";
    } else if ($verba == "010") {
      $new_verb = "416";
    } else if ($verba == "009") {
      $new_verb = "419";
    } else if ($verba == "019") {
      $new_verb = "420";
    } else if ($verba == "031") {
      $new_verb = "452";
    } else if ($verba == "006") {
      $new_verb = "457";
    } else if ($verba == "206") {
      $new_verb = "468";
    } else if ($verba == "023") {
      $new_verb = "468";
    } else if ($verba == "131") {
      $new_verb = "471";
    } else if ($verba == "073") {
      $new_verb = "472";
    } else if ($verba == "129") {
      $new_verb = "479";
    } else if ($verba == "134") {
      $new_verb = "482";
    } else if ($verba == "207") {
      $new_verb = "484";
    } else if ($verba == "029") {
      $new_verb = "485";
    } else if ($verba == "039") {
      $new_verb = "493";
    } else if ($verba == "214") {
      $new_verb = "494";
    } else if ($verba == "165") {
      $new_verb = "507";
    } else if ($verba == "166") {
      $new_verb = "507";
    } else if ($verba == "168") {
      $new_verb = "507";
    } else if ($verba == "169") {
      $new_verb = "507";
    } else if ($verba == "002") {
      $new_verb = "511";
    } else if ($verba == "146") {
      $new_verb = "520";
    } else if ($verba == "033") {
      $new_verb = "524";
    } else if ($verba == "089") {
      $new_verb = "527";
    } else if ($verba == "154") {
      $new_verb = "531";
    } else if ($verba == "090") {
      $new_verb = "541";
    } else if ($verba == "174") {
      $new_verb = "554";
    } else if ($verba == "005") {
      $new_verb = "561";
    } else if ($verba == "017") {
      $new_verb = "562";
    } else if ($verba == "020") {
      $new_verb = "563";
    } else if ($verba == "162") {
      $new_verb = "570";
    } else if ($verba == "153") {
      $new_verb = "580";
    } else if ($verba == "149") {
      $new_verb = "601";
    } else if ($verba == "157") {
      $new_verb = "603";
    } else if ($verba == "158") {
      $new_verb = "654";
    } else if ($verba == "022") {
      $new_verb = "660";
    } else if ($verba == "140") {
      $new_verb = "801";
    } else if ($verba == "155") {
      $new_verb = "940";
    } else if ($verba == "172") {
      $new_verb = "999";
    } else if ($verba == "180") {
      $new_verb = "999";
    } else if ($verba == "181") {
      $new_verb = "999";
    } else if ($verba == "183") {
      $new_verb = "999";
    } else if ($verba == "193") {
      $new_verb = "999";
    } else if ($verba == "195") {
      $new_verb = "999";
    } else if ($verba == "196") {
      $new_verb = "999";
    } else if ($verba == "197") {
      $new_verb = "999";
    } else if ($verba == "198") {
      $new_verb = "999";
    } else if ($verba == "199") {
      $new_verb = "999";
    } else if ($verba == "200") {
      $new_verb = "999";
    } else if ($verba == "109") {
      $new_verb = "024";
    } else if ($verba == "097") {
      $new_verb = "037";
    } else if ($verba == "104") {
      $new_verb = "037";
    } else if ($verba == "105") {
      $new_verb = "037";
    } else if ($verba == "084") {
      $new_verb = "070";
    } else if ($verba == "038") {
      $new_verb = "092";
    } else if ($verba == "110") {
      $new_verb = "098";
    } else if ($verba == "083") {
      $new_verb = "101";
    } else if ($verba == "085") {
      $new_verb = "103";
    } else if ($verba == "205") {
      $new_verb = "107";
    } else if ($verba == "077") {
      $new_verb = "187";
    } else if ($verba == "215") {
      $new_verb = "191";
    } else if ($verba == "066") {
      $new_verb = "216";
    } else if ($verba == "139") {
      $new_verb = "216";
    } else if ($verba == "143") {
      $new_verb = "216";
    } else if ($verba == "107") {
      $new_verb = "222";
    } else if ($verba == "047") {
      $new_verb = "230";
    } else if ($verba == "212") {
      $new_verb = "233";
    } else if ($verba == "088") {
      $new_verb = "256";
    } else if ($verba == "076") {
      $new_verb = "261";
    } else if ($verba == "086") {
      $new_verb = "262";
    } else if ($verba == "082") {
      $new_verb = "351";
    } else if ($verba == "106") {
      $new_verb = "374";
    } else if ($verba == "060") {
      $new_verb = "386";
    } else if ($verba == "124") {
      $new_verb = "400";
    } else if ($verba == "117") {
      $new_verb = "403";
    } else if ($verba == "210") {
      $new_verb = "403";
    } else if ($verba == "053") {
      $new_verb = "420";
    } else if ($verba == "078") {
      $new_verb = "452";
    } else if ($verba == "063") {
      $new_verb = "455";
    } else if ($verba == "102") {
      $new_verb = "457";
    } else if ($verba == "119") {
      $new_verb = "478";
    } else if ($verba == "208") {
      $new_verb = "483";
    } else if ($verba == "065") {
      $new_verb = "484";
    } else if ($verba == "203") {
      $new_verb = "486";
    } else if ($verba == "043") {
      $new_verb = "487";
    } else if ($verba == "133") {
      $new_verb = "488";
    } else if ($verba == "138") {
      $new_verb = "493";
    } else if ($verba == "042") {
      $new_verb = "494";
    } else if ($verba == "211") {
      $new_verb = "494";
    } else if ($verba == "092") {
      $new_verb = "507";
    } else if ($verba == "093") {
      $new_verb = "507";
    } else if ($verba == "094") {
      $new_verb = "507";
    } else if ($verba == "095") {
      $new_verb = "507";
    } else if ($verba == "099") {
      $new_verb = "507";
    } else if ($verba == "016") {
      $new_verb = "511";
    } else if ($verba == "087") {
      $new_verb = "511";
    } else if ($verba == "012") {
      $new_verb = "512";
    } else if ($verba == "052") {
      $new_verb = "525";
    } else if ($verba == "112") {
      $new_verb = "527";
    } else if ($verba == "187") {
      $new_verb = "531";
    } else if ($verba == "145") {
      $new_verb = "532";
    } else if ($verba == "189") {
      $new_verb = "532";
    } else if ($verba == "044") {
      $new_verb = "534";
    } else if ($verba == "045") {
      $new_verb = "534";
    } else if ($verba == "059") {
      $new_verb = "534";
    } else if ($verba == "072") {
      $new_verb = "534";
    } else if ($verba == "071") {
      $new_verb = "541";
    } else if ($verba == "188") {
      $new_verb = "554";
    } else if ($verba == "054") {
      $new_verb = "558";
    } else if ($verba == "074") {
      $new_verb = "582";
    } else if ($verba == "075") {
      $new_verb = "583";
    } else if ($verba == "079") {
      $new_verb = "601";
    } else if ($verba == "098") {
      $new_verb = "601";
    } else if ($verba == "100") {
      $new_verb = "601";
    } else if ($verba == "141") {
      $new_verb = "601";
    } else if ($verba == "142") {
      $new_verb = "601";
    } else if ($verba == "056") {
      $new_verb = "602";
    } else if ($verba == "058") {
      $new_verb = "602";
    } else if ($verba == "101") {
      $new_verb = "606";
    } else if ($verba == "114") {
      $new_verb = "632";
    } else if ($verba == "213") {
      $new_verb = "632";
    } else if ($verba == "057") {
      $new_verb = "801";
    } else if ($verba == "096") {
      $new_verb = "953";
    } else if ($verba == "091") {
      $new_verb = "955";
    } else if ($verba == "160") {
      $new_verb = "E01";
    } else if ($verba == "161") {
      $new_verb = "E01";
    } else if ($verba == "125") {
      $new_verb = "E01";
    } else if ($verba == "148") {
      $new_verb = "E02";
    } else if ($verba == "164") {
      $new_verb = "E02";
    } else if ($verba == "182") {
      $new_verb = "E02";
    } else if ($verba == "163") {
      $new_verb = "E03";
    } else if ($verba == "144") {
      $new_verb = "E17";
    } else if ($verba == "151") {
      $new_verb = "E17";
    } else if ($verba == "147") {
      $new_verb = "E18";
    } else if ($verba == "150") {
      $new_verb = "E19";
    } else if ($verba == "167") {
      $new_verb = "E20";
    } else if ($verba == "061") {
      $new_verb = "H01";
    } else if ($verba == "128") {
      $new_verb = "H02";
    } else if ($verba == "137") {
      $new_verb = "H03";
    } else if ($verba == "152") {
      $new_verb = "H04";
    } else if ($verba == "156") {
      $new_verb = "H05";
    } else if ($verba == "159") {
      $new_verb = "H06";
    } else if ($verba == "170") {
      $new_verb = "H07";
    } else if ($verba == "171") {
      $new_verb = "H08";
    } else if ($verba == "173") {
      $new_verb = "H09";
    } else if ($verba == "184") {
      $new_verb = "H09";
    } else if ($verba == "185") {
      $new_verb = "H09";
    } else if ($verba == "186") {
      $new_verb = "H09";
    } else if ($verba == "175") {
      $new_verb = "H10";
    } else if ($verba == "015") {
      $new_verb = "H11";
    } else if ($verba == "024") {
      $new_verb = "H22";
    } else if ($verba == "041") {
      $new_verb = "H32";
    } else if ($verba == "048") {
      $new_verb = "H24";
    } else if ($verba == "069") {
      $new_verb = "H25";
    } else if ($verba == "070") {
      $new_verb = "H26";
    } else if ($verba == "176") {
      $new_verb = "H27";
    }
  }
//
  else if ($banco == "URB") {
    if ($verba == "027") {
      $new_verb = "003";
    } else if ($verba == "038") {
      $new_verb = "005";
    } else if ($verba == "001") {
      $new_verb = "001";
    } else if ($verba == "206") {
      $new_verb = "017";
    } else if ($verba == "193") {
      $new_verb = "026";
    } else if ($verba == "116") {
      $new_verb = "027";
    } else if ($verba == "172") {
      $new_verb = "027";
    } else if ($verba == "226") {
      $new_verb = "028";
    } else if ($verba == "128") {
      $new_verb = "034";
    } else if ($verba == "021") {
      $new_verb = "035";
    } else if ($verba == "213") {
      $new_verb = "037";
    } else if ($verba == "024") {
      $new_verb = "052";
    } else if ($verba == "138") {
      $new_verb = "052";
    } else if ($verba == "031") {
      $new_verb = "070";
    } else if ($verba == "066") {
      $new_verb = "098";
    } else if ($verba == "067") {
      $new_verb = "098";
    } else if ($verba == "098") {
      $new_verb = "098";
    } else if ($verba == "197") {
      $new_verb = "098";
    } else if ($verba == "201") {
      $new_verb = "098";
    } else if ($verba == "207") {
      $new_verb = "098";
    } else if ($verba == "025") {
      $new_verb = "100";
    } else if ($verba == "110") {
      $new_verb = "100";
    } else if ($verba == "026") {
      $new_verb = "102";
    } else if ($verba == "030") {
      $new_verb = "103";
    } else if ($verba == "127") {
      $new_verb = "106";
    } else if ($verba == "057") {
      $new_verb = "108";
    } else if ($verba == "177") {
      $new_verb = "159";
    } else if ($verba == "011") {
      $new_verb = "171";
    } else if ($verba == "194") {
      $new_verb = "176";
    } else if ($verba == "048") {
      $new_verb = "180";
    } else if ($verba == "215") {
      $new_verb = "192";
    } else if ($verba == "075") {
      $new_verb = "193";
    } else if ($verba == "089") {
      $new_verb = "193";
    } else if ($verba == "137") {
      $new_verb = "194";
    } else if ($verba == "028") {
      $new_verb = "196";
    } else if ($verba == "209") {
      $new_verb = "202";
    } else if ($verba == "003") {
      $new_verb = "205";
    } else if ($verba == "055") {
      $new_verb = "216";
    } else if ($verba == "064") {
      $new_verb = "216";
    } else if ($verba == "073") {
      $new_verb = "216";
    } else if ($verba == "074") {
      $new_verb = "216";
    } else if ($verba == "121") {
      $new_verb = "216";
    } else if ($verba == "203") {
      $new_verb = "216";
    } else if ($verba == "033") {
      $new_verb = "221";
    } else if ($verba == "023") {
      $new_verb = "222";
    } else if ($verba == "039") {
      $new_verb = "222";
    } else if ($verba == "178") {
      $new_verb = "222";
    } else if ($verba == "037") {
      $new_verb = "224";
    } else if ($verba == "087") {
      $new_verb = "227";
    } else if ($verba == "076") {
      $new_verb = "230";
    } else if ($verba == "062") {
      $new_verb = "233";
    } else if ($verba == "104") {
      $new_verb = "233";
    } else if ($verba == "077") {
      $new_verb = "234";
    } else if ($verba == "032") {
      $new_verb = "245";
    } else if ($verba == "117") {
      $new_verb = "253";
    } else if ($verba == "018") {
      $new_verb = "256";
    } else if ($verba == "204") {
      $new_verb = "257";
    } else if ($verba == "004") {
      $new_verb = "261";
    } else if ($verba == "014") {
      $new_verb = "261";
    } else if ($verba == "061") {
      $new_verb = "264";
    } else if ($verba == "224") {
      $new_verb = "271";
    } else if ($verba == "040") {
      $new_verb = "272";
    } else if ($verba == "102") {
      $new_verb = "273";
    } else if ($verba == "056") {
      $new_verb = "290";
    } else if ($verba == "125") {
      $new_verb = "290";
    } else if ($verba == "136") {
      $new_verb = "294";
    } else if ($verba == "079") {
      $new_verb = "330";
    } else if ($verba == "202") {
      $new_verb = "331";
    } else if ($verba == "029") {
      $new_verb = "351";
    } else if ($verba == "072") {
      $new_verb = "351";
    } else if ($verba == "115") {
      $new_verb = "351";
    } else if ($verba == "130") {
      $new_verb = "351";
    } else if ($verba == "190") {
      $new_verb = "351";
    } else if ($verba == "091") {
      $new_verb = "354";
    } else if ($verba == "058") {
      $new_verb = "356";
    } else if ($verba == "191") {
      $new_verb = "356";
    } else if ($verba == "227") {
      $new_verb = "360";
    } else if ($verba == "013") {
      $new_verb = "371";
    } else if ($verba == "179") {
      $new_verb = "374";
    } else if ($verba == "041") {
      $new_verb = "376";
    } else if ($verba == "046") {
      $new_verb = "377";
    } else if ($verba == "053") {
      $new_verb = "381";
    } else if ($verba == "050") {
      $new_verb = "400";
    } else if ($verba == "205") {
      $new_verb = "400";
    } else if ($verba == "008") {
      $new_verb = "401";
    } else if ($verba == "095") {
      $new_verb = "403";
    } else if ($verba == "007") {
      $new_verb = "404";
    } else if ($verba == "035") {
      $new_verb = "405";
    } else if ($verba == "122") {
      $new_verb = "406";
    } else if ($verba == "010") {
      $new_verb = "416";
    } else if ($verba == "192") {
      $new_verb = "416";
    } else if ($verba == "009") {
      $new_verb = "419";
    } else if ($verba == "019") {
      $new_verb = "420";
    } else if ($verba == "133") {
      $new_verb = "450";
    } else if ($verba == "068") {
      $new_verb = "452";
    } else if ($verba == "065") {
      $new_verb = "455";
    } else if ($verba == "006") {
      $new_verb = "457";
    } else if ($verba == "210") {
      $new_verb = "459";
    } else if ($verba == "092") {
      $new_verb = "468";
    } else if ($verba == "034") {
      $new_verb = "471";
    } else if ($verba == "052") {
      $new_verb = "472";
    } else if ($verba == "103") {
      $new_verb = "474";
    } else if ($verba == "080") {
      $new_verb = "478";
    } else if ($verba == "059") {
      $new_verb = "479";
    } else if ($verba == "113") {
      $new_verb = "479";
    } else if ($verba == "090") {
      $new_verb = "482";
    } else if ($verba == "049") {
      $new_verb = "485";
    } else if ($verba == "131") {
      $new_verb = "486";
    } else if ($verba == "119") {
      $new_verb = "487";
    } else if ($verba == "195") {
      $new_verb = "487";
    } else if ($verba == "093") {
      $new_verb = "488";
    } else if ($verba == "114") {
      $new_verb = "488";
    } else if ($verba == "120") {
      $new_verb = "488";
    } else if ($verba == "129") {
      $new_verb = "488";
    } else if ($verba == "132") {
      $new_verb = "488";
    } else if ($verba == "085") {
      $new_verb = "490";
    } else if ($verba == "199") {
      $new_verb = "492";
    } else if ($verba == "082") {
      $new_verb = "493";
    } else if ($verba == "036") {
      $new_verb = "496";
    } else if ($verba == "126") {
      $new_verb = "504";
    } else if ($verba == "165") {
      $new_verb = "507";
    } else if ($verba == "166") {
      $new_verb = "507";
    } else if ($verba == "168") {
      $new_verb = "507";
    } else if ($verba == "169") {
      $new_verb = "507";
    } else if ($verba == "002") {
      $new_verb = "511";
    } else if ($verba == "016") {
      $new_verb = "511";
    } else if ($verba == "012") {
      $new_verb = "512";
    } else if ($verba == "146") {
      $new_verb = "520";
    } else if ($verba == "047") {
      $new_verb = "523";
    } else if ($verba == "045") {
      $new_verb = "524";
    } else if ($verba == "107") {
      $new_verb = "524";
    } else if ($verba == "099") {
      $new_verb = "527";
    } else if ($verba == "100") {
      $new_verb = "527";
    } else if ($verba == "105") {
      $new_verb = "527";
    } else if ($verba == "111") {
      $new_verb = "527";
    } else if ($verba == "154") {
      $new_verb = "531";
    } else if ($verba == "187") {
      $new_verb = "531";
    } else if ($verba == "145") {
      $new_verb = "532";
    } else if ($verba == "112") {
      $new_verb = "541";
    } else if ($verba == "185") {
      $new_verb = "549";
    } else if ($verba == "135") {
      $new_verb = "550";
    } else if ($verba == "174") {
      $new_verb = "554";
    } else if ($verba == "097") {
      $new_verb = "557";
    } else if ($verba == "069") {
      $new_verb = "558";
    } else if ($verba == "005") {
      $new_verb = "561";
    } else if ($verba == "017") {
      $new_verb = "562";
    } else if ($verba == "020") {
      $new_verb = "563";
    } else if ($verba == "162") {
      $new_verb = "570";
    } else if ($verba == "022") {
      $new_verb = "580";
    } else if ($verba == "153") {
      $new_verb = "580";
    } else if ($verba == "094") {
      $new_verb = "582";
    } else if ($verba == "086") {
      $new_verb = "583";
    } else if ($verba == "141") {
      $new_verb = "601";
    } else if ($verba == "142") {
      $new_verb = "601";
    } else if ($verba == "143") {
      $new_verb = "601";
    } else if ($verba == "149") {
      $new_verb = "601";
    } else if ($verba == "180") {
      $new_verb = "601";
    } else if ($verba == "181") {
      $new_verb = "601";
    } else if ($verba == "070") {
      $new_verb = "602";
    } else if ($verba == "088") {
      $new_verb = "602";
    } else if ($verba == "157") {
      $new_verb = "603";
    } else if ($verba == "109") {
      $new_verb = "632";
    } else if ($verba == "083") {
      $new_verb = "633";
    } else if ($verba == "084") {
      $new_verb = "634";
    } else if ($verba == "158") {
      $new_verb = "654";
    } else if ($verba == "051") {
      $new_verb = "801";
    } else if ($verba == "140") {
      $new_verb = "801";
    } else if ($verba == "176") {
      $new_verb = "900";
    } else if ($verba == "155") {
      $new_verb = "940";
    } else if ($verba == "208") {
      $new_verb = "005";
    } else if ($verba == "118") {
      $new_verb = "026";
    } else if ($verba == "212") {
      $new_verb = "037";
    } else if ($verba == "071") {
      $new_verb = "091";
    } else if ($verba == "044") {
      $new_verb = "099";
    } else if ($verba == "081") {
      $new_verb = "216";
    } else if ($verba == "106") {
      $new_verb = "351";
    } else if ($verba == "054") {
      $new_verb = "351";
    } else if ($verba == "228") {
      $new_verb = "357";
    } else if ($verba == "214") {
      $new_verb = "358";
    } else if ($verba == "217") {
      $new_verb = "358";
    } else if ($verba == "225") {
      $new_verb = "472";
    } else if ($verba == "223") {
      $new_verb = "473";
    } else if ($verba == "216") {
      $new_verb = "483";
    } else if ($verba == "096") {
      $new_verb = "484";
    } else if ($verba == "063") {
      $new_verb = "487";
    } else if ($verba == "198") {
      $new_verb = "488";
    } else if ($verba == "222") {
      $new_verb = "494";
    } else if ($verba == "043") {
      $new_verb = "525";
    } else if ($verba == "189") {
      $new_verb = "532";
    } else if ($verba == "188") {
      $new_verb = "554";
    } else if ($verba == "042") {
      $new_verb = "557";
    } else if ($verba == "101") {
      $new_verb = "606";
    } else if ($verba == "218") {
      $new_verb = "660";
    } else if ($verba == "186") {
      $new_verb = "837";
    } else if ($verba == "160") {
      $new_verb = "E01";
    } else if ($verba == "161") {
      $new_verb = "E01";
    } else if ($verba == "148") {
      $new_verb = "E02";
    } else if ($verba == "164") {
      $new_verb = "E02";
    } else if ($verba == "182") {
      $new_verb = "E02";
    } else if ($verba == "183") {
      $new_verb = "E02";
    } else if ($verba == "163") {
      $new_verb = "E03";
    } else if ($verba == "144") {
      $new_verb = "E17";
    } else if ($verba == "151") {
      $new_verb = "E17";
    } else if ($verba == "147") {
      $new_verb = "E18";
    } else if ($verba == "150") {
      $new_verb = "E19";
    } else if ($verba == "167") {
      $new_verb = "E20";
    } else if ($verba == "060") {
      $new_verb = "H01";
    } else if ($verba == "152") {
      $new_verb = "H04";
    } else if ($verba == "156") {
      $new_verb = "H05";
    } else if ($verba == "159") {
      $new_verb = "H06";
    } else if ($verba == "170") {
      $new_verb = "H07";
    } else if ($verba == "171") {
      $new_verb = "H08";
    } else if ($verba == "173") {
      $new_verb = "H09";
    } else if ($verba == "184") {
      $new_verb = "H09";
    } else if ($verba == "175") {
      $new_verb = "H10";
    } else if ($verba == "015") {
      $new_verb = "H11";
    } else if ($verba == "078") {
      $new_verb = "H12";
    } else if ($verba == "108") {
      $new_verb = "H13";
    } else if ($verba == "123") {
      $new_verb = "H14";
    } else if ($verba == "124") {
      $new_verb = "H15";
    } else if ($verba == "134") {
      $new_verb = "H16";
    } else if ($verba == "196") {
      $new_verb = "H18";
    } else if ($verba == "200") {
      $new_verb = "H19";
    } else if ($verba == "221") {
      $new_verb = "H21";
    } else if ($verba == "139") {
      $new_verb = "H28";
    } else if ($verba == "211") {
      $new_verb = "H29";
    } else if ($verba == "219") {
      $new_verb = "H30";
    } else if ($verba == "220") {
      $new_verb = "H31";
    }
  }
//
  else if ($banco == "URB_RV") {
    if ($verba == "049") {
      $new_verb = "003";
    } else if ($verba == "001") {
      $new_verb = "001";
    } else if ($verba == "041") {
      $new_verb = "017";
    } else if ($verba == "025") {
      $new_verb = "025";
    } else if ($verba == "030") {
      $new_verb = "026";
    } else if ($verba == "027") {
      $new_verb = "027";
    } else if ($verba == "103") {
      $new_verb = "034";
    } else if ($verba == "021") {
      $new_verb = "037";
    } else if ($verba == "191") {
      $new_verb = "037";
    } else if ($verba == "080") {
      $new_verb = "052";
    } else if ($verba == "028") {
      $new_verb = "070";
    } else if ($verba == "110") {
      $new_verb = "098";
    } else if ($verba == "026") {
      $new_verb = "100";
    } else if ($verba == "064") {
      $new_verb = "103";
    } else if ($verba == "177") {
      $new_verb = "159";
    } else if ($verba == "011") {
      $new_verb = "171";
    } else if ($verba == "111") {
      $new_verb = "176";
    } else if ($verba == "119") {
      $new_verb = "180";
    } else if ($verba == "192") {
      $new_verb = "192";
    } else if ($verba == "114") {
      $new_verb = "196";
    } else if ($verba == "077") {
      $new_verb = "202";
    } else if ($verba == "003") {
      $new_verb = "205";
    } else if ($verba == "081") {
      $new_verb = "205";
    } else if ($verba == "032") {
      $new_verb = "216";
    } else if ($verba == "122") {
      $new_verb = "216";
    } else if ($verba == "035") {
      $new_verb = "221";
    } else if ($verba == "108") {
      $new_verb = "222";
    } else if ($verba == "178") {
      $new_verb = "222";
    } else if ($verba == "037") {
      $new_verb = "224";
    } else if ($verba == "062") {
      $new_verb = "227";
    } else if ($verba == "055") {
      $new_verb = "233";
    } else if ($verba == "068") {
      $new_verb = "234";
    } else if ($verba == "120") {
      $new_verb = "245";
    } else if ($verba == "018") {
      $new_verb = "256";
    } else if ($verba == "004") {
      $new_verb = "261";
    } else if ($verba == "014") {
      $new_verb = "262";
    } else if ($verba == "193") {
      $new_verb = "271";
    } else if ($verba == "115") {
      $new_verb = "290";
    } else if ($verba == "050") {
      $new_verb = "294";
    } else if ($verba == "113") {
      $new_verb = "330";
    } else if ($verba == "109") {
      $new_verb = "351";
    } else if ($verba == "121") {
      $new_verb = "351";
    } else if ($verba == "038") {
      $new_verb = "355";
    } else if ($verba == "051") {
      $new_verb = "356";
    } else if ($verba == "073") {
      $new_verb = "356";
    } else if ($verba == "194") {
      $new_verb = "360";
    } else if ($verba == "013") {
      $new_verb = "371";
    } else if ($verba == "179") {
      $new_verb = "374";
    } else if ($verba == "043") {
      $new_verb = "400";
    } else if ($verba == "008") {
      $new_verb = "401";
    } else if ($verba == "007") {
      $new_verb = "404";
    } else if ($verba == "034") {
      $new_verb = "405";
    } else if ($verba == "036") {
      $new_verb = "405";
    } else if ($verba == "010") {
      $new_verb = "416";
    } else if ($verba == "009") {
      $new_verb = "419";
    } else if ($verba == "031") {
      $new_verb = "452";
    } else if ($verba == "134") {
      $new_verb = "455";
    } else if ($verba == "006") {
      $new_verb = "457";
    } else if ($verba == "023") {
      $new_verb = "468";
    } else if ($verba == "125") {
      $new_verb = "471";
    } else if ($verba == "131") {
      $new_verb = "472";
    } else if ($verba == "029") {
      $new_verb = "485";
    } else if ($verba == "019") {
      $new_verb = "487";
    } else if ($verba == "165") {
      $new_verb = "507";
    } else if ($verba == "166") {
      $new_verb = "507";
    } else if ($verba == "168") {
      $new_verb = "507";
    } else if ($verba == "169") {
      $new_verb = "507";
    } else if ($verba == "002") {
      $new_verb = "511";
    } else if ($verba == "033") {
      $new_verb = "524";
    } else if ($verba == "089") {
      $new_verb = "527";
    } else if ($verba == "154") {
      $new_verb = "531";
    } else if ($verba == "090") {
      $new_verb = "541";
    } else if ($verba == "174") {
      $new_verb = "554";
    } else if ($verba == "005") {
      $new_verb = "561";
    } else if ($verba == "017") {
      $new_verb = "562";
    } else if ($verba == "020") {
      $new_verb = "563";
    } else if ($verba == "162") {
      $new_verb = "570";
    } else if ($verba == "153") {
      $new_verb = "580";
    } else if ($verba == "149") {
      $new_verb = "601";
    } else if ($verba == "157") {
      $new_verb = "603";
    } else if ($verba == "116") {
      $new_verb = "632";
    } else if ($verba == "158") {
      $new_verb = "654";
    } else if ($verba == "022") {
      $new_verb = "660";
    } else if ($verba == "140") {
      $new_verb = "801";
    } else if ($verba == "155") {
      $new_verb = "940";
    } else if ($verba == "181") {
      $new_verb = "999";
    } else if ($verba == "183") {
      $new_verb = "999";
    } else if ($verba == "195") {
      $new_verb = "999";
    } else if ($verba == "196") {
      $new_verb = "999";
    } else if ($verba == "197") {
      $new_verb = "999";
    } else if ($verba == "198") {
      $new_verb = "999";
    } else if ($verba == "199") {
      $new_verb = "999";
    } else if ($verba == "132") {
      $new_verb = "005";
    } else if ($verba == "118") {
      $new_verb = "005";
    } else if ($verba == "040") {
      $new_verb = "017";
    } else if ($verba == "104") {
      $new_verb = "035";
    } else if ($verba == "097") {
      $new_verb = "037";
    } else if ($verba == "105") {
      $new_verb = "037";
    } else if ($verba == "133") {
      $new_verb = "037";
    } else if ($verba == "172") {
      $new_verb = "091";
    } else if ($verba == "126") {
      $new_verb = "099";
    } else if ($verba == "083") {
      $new_verb = "107";
    } else if ($verba == "066") {
      $new_verb = "216";
    } else if ($verba == "143") {
      $new_verb = "216";
    } else if ($verba == "129") {
      $new_verb = "216";
    } else if ($verba == "107") {
      $new_verb = "222";
    } else if ($verba == "047") {
      $new_verb = "230";
    } else if ($verba == "067") {
      $new_verb = "233";
    } else if ($verba == "088") {
      $new_verb = "256";
    } else if ($verba == "076") {
      $new_verb = "261";
    } else if ($verba == "086") {
      $new_verb = "262";
    } else if ($verba == "082") {
      $new_verb = "351";
    } else if ($verba == "136") {
      $new_verb = "358";
    } else if ($verba == "138") {
      $new_verb = "358";
    } else if ($verba == "180") {
      $new_verb = "360";
    } else if ($verba == "106") {
      $new_verb = "374";
    } else if ($verba == "046") {
      $new_verb = "383";
    } else if ($verba == "060") {
      $new_verb = "386";
    } else if ($verba == "053") {
      $new_verb = "420";
    } else if ($verba == "078") {
      $new_verb = "452";
    } else if ($verba == "063") {
      $new_verb = "455";
    } else if ($verba == "102") {
      $new_verb = "457";
    } else if ($verba == "128") {
      $new_verb = "478";
    } else if ($verba == "146") {
      $new_verb = "482";
    } else if ($verba == "135") {
      $new_verb = "483";
    } else if ($verba == "065") {
      $new_verb = "484";
    } else if ($verba == "123") {
      $new_verb = "486";
    } else if ($verba == "127") {
      $new_verb = "487";
    } else if ($verba == "117") {
      $new_verb = "488";
    } else if ($verba == "084") {
      $new_verb = "493";
    } else if ($verba == "042") {
      $new_verb = "494";
    } else if ($verba == "092") {
      $new_verb = "507";
    } else if ($verba == "093") {
      $new_verb = "507";
    } else if ($verba == "094") {
      $new_verb = "507";
    } else if ($verba == "095") {
      $new_verb = "507";
    } else if ($verba == "099") {
      $new_verb = "507";
    } else if ($verba == "016") {
      $new_verb = "511";
    } else if ($verba == "087") {
      $new_verb = "511";
    } else if ($verba == "012") {
      $new_verb = "512";
    } else if ($verba == "052") {
      $new_verb = "525";
    } else if ($verba == "112") {
      $new_verb = "527";
    } else if ($verba == "187") {
      $new_verb = "531";
    } else if ($verba == "145") {
      $new_verb = "532";
    } else if ($verba == "189") {
      $new_verb = "532";
    } else if ($verba == "044") {
      $new_verb = "534";
    } else if ($verba == "045") {
      $new_verb = "534";
    } else if ($verba == "059") {
      $new_verb = "534";
    } else if ($verba == "072") {
      $new_verb = "534";
    } else if ($verba == "071") {
      $new_verb = "541";
    } else if ($verba == "188") {
      $new_verb = "554";
    } else if ($verba == "054") {
      $new_verb = "558";
    } else if ($verba == "074") {
      $new_verb = "582";
    } else if ($verba == "075") {
      $new_verb = "583";
    } else if ($verba == "079") {
      $new_verb = "601";
    } else if ($verba == "098") {
      $new_verb = "601";
    } else if ($verba == "100") {
      $new_verb = "601";
    } else if ($verba == "141") {
      $new_verb = "601";
    } else if ($verba == "142") {
      $new_verb = "601";
    } else if ($verba == "056") {
      $new_verb = "602";
    } else if ($verba == "058") {
      $new_verb = "602";
    } else if ($verba == "101") {
      $new_verb = "606";
    } else if ($verba == "085") {
      $new_verb = "633";
    } else if ($verba == "137") {
      $new_verb = "660";
    } else if ($verba == "057") {
      $new_verb = "801";
    } else if ($verba == "096") {
      $new_verb = "953";
    } else if ($verba == "091") {
      $new_verb = "955";
    } else if ($verba == "160") {
      $new_verb = "E01";
    } else if ($verba == "161") {
      $new_verb = "E01";
    } else if ($verba == "148") {
      $new_verb = "E02";
    } else if ($verba == "164") {
      $new_verb = "E02";
    } else if ($verba == "182") {
      $new_verb = "E02";
    } else if ($verba == "163") {
      $new_verb = "E03";
    } else if ($verba == "144") {
      $new_verb = "E17";
    } else if ($verba == "151") {
      $new_verb = "E17";
    } else if ($verba == "147") {
      $new_verb = "E18";
    } else if ($verba == "150") {
      $new_verb = "E19";
    } else if ($verba == "167") {
      $new_verb = "E20";
    } else if ($verba == "061") {
      $new_verb = "H01";
    } else if ($verba == "124") {
      $new_verb = "H03";
    } else if ($verba == "152") {
      $new_verb = "H04";
    } else if ($verba == "156") {
      $new_verb = "H05";
    } else if ($verba == "159") {
      $new_verb = "H06";
    } else if ($verba == "170") {
      $new_verb = "H07";
    } else if ($verba == "171") {
      $new_verb = "H08";
    } else if ($verba == "173") {
      $new_verb = "H09";
    } else if ($verba == "184") {
      $new_verb = "H09";
    } else if ($verba == "185") {
      $new_verb = "H09";
    } else if ($verba == "186") {
      $new_verb = "H09";
    } else if ($verba == "175") {
      $new_verb = "H10";
    } else if ($verba == "015") {
      $new_verb = "H11";
    } else if ($verba == "130") {
      $new_verb = "H17";
    } else if ($verba == "200") {
      $new_verb = "H21";
    } else if ($verba == "024") {
      $new_verb = "H22";
    } else if ($verba == "039") {
      $new_verb = "H23";
    } else if ($verba == "048") {
      $new_verb = "H24";
    } else if ($verba == "069") {
      $new_verb = "H25";
    } else if ($verba == "070") {
      $new_verb = "H26";
    } else if ($verba == "176") {
      $new_verb = "H27";
    }
  }

  if ($new_verb == "") {
    $new_verb = "-------------------------------------";
  }

  return $new_verb;
}
