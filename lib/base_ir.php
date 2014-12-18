<?php

function base_ir_2($periodo) {
  $base = null;

  if ($periodo >= 201401) {
    $base = 179.71;
  } else if ($periodo >= 201301) {
    $base = 171.97;
  } else if ($periodo >= 201201) {
    $base = 164.56;
  } else if ($periodo >= 201104) {
    $base = 157.47;
  } else if ($periodo >= 201001) {
    $base = 150.69;
  } else if ($periodo >= 200901) {
    $base = 144.20;
  } else if ($periodo >= 200801) {
    $base = 137.99;
  } else if ($periodo >= 200701) {
    $base = 132.05;
  } else if ($periodo >= 200602) {
    $base = 126.36;
  } else if ($periodo >= 200501) {
    $base = 117.00;
  } else if ($periodo >= 200201) {
    $base = 106.00;
  } else if ($periodo >= 199601) {
    $base = 98.00;
  } else if ($periodo >= 199510) {
    $base = 79.52;
  } else if ($periodo >= 199507) {
    $base = 75.64;
  } else if ($periodo >= 199504) {
    $base = 70.61;
  } else if ($periodo >= 199501) {
    $base = 67.67;
  } else if ($periodo == 199412) {
    $base = 66.18;
  } else if ($periodo == 199411) {
    $base = 64.28;
  } else if ($periodo == 199410) {
    $base = 63.08;
  } else if ($periodo == 199409) {
    $base = 62.07;
  } else if ($periodo == 199408) {
    $base = 23.64;
  } else if ($periodo == 199407) {
    $base = 22.47;
  } else if ($periodo == 199406) {
    $base = 42722.40;
  } else if ($periodo == 199405) {
    $base = 29625.00;
  } else if ($periodo == 199404) {
    $base = 20973.00;
  } else if ($periodo == 199403) {
    $base = 14602.00;
  } else if ($periodo == 199402) {
    $base = 10452.00;
  } else if ($periodo == 199401) {
    $base = 7510.00;
  } else if ($periodo == 199312) {
    $base = 5494.80;
  } else if ($periodo == 199311) {
    $base = 4103.60;
  } else if ($periodo == 199310) {
    $base = 3036.00;
  } else if ($periodo == 199309) {
    $base = 2259.20;
  } else if ($periodo == 199308) {
    $base = 1711.00;
  } else if ($periodo == 199307) {
    $base = 1309987.00;
  } else if ($periodo == 199306) {
    $base = 1005054.00;
  } else if ($periodo == 199305) {
    $base = 780260.00;
  } else if ($periodo == 199304) {
    $base = 612738.00;
  } else if ($periodo == 199303) {
    $base = 486454.00;
  } else if ($periodo == 199302) {
    $base = 383881.00;
  } else if ($periodo == 199301) {
    $base = 296502.00;
  } else if ($periodo == 199212) {
    $base = 240102.00;
  } else if ($periodo == 199211) {
    $base = 194100.00;
  } else if ($periodo == 199210) {
    $base = 154686.00;
  } else if ($periodo == 199209) {
    $base = 125425.00;
  } else if ($periodo == 199208) {
    $base = 101856.00;
  } else if ($periodo == 199207) {
    $base = 84171.00;
  } else if ($periodo == 199206) {
    $base = 68282.00;
  } else if ($periodo == 199205) {
    $base = 55312.00;
  } else if ($periodo == 199204) {
    $base = 46159.00;
  } else if ($periodo == 199203) {
    $base = 37826.00;
  } else if ($periodo == 199202) {
    $base = 29997.00;
  } else if ($periodo == 199201) {
    $base = 23883.00;
  } else if ($periodo == 199112) {
    $base = 20000.00;
  } else if ($periodo == 199111) {
    $base = 16000.00;
  } else if ($periodo >= 199108) {
    $base = 10000.00;
  } else if ($periodo >= 199102) {
    $base = 5074.00;
  } else if ($periodo == 199101) {
    $base = 4221.00;
  } else if ($periodo == 199012) {
    $base = 3536.00;
  } else if ($periodo == 199011) {
    $base = 3031.00;
  } else if ($periodo == 199010) {
    $base = 2362.00;
  } else if ($periodo == 199009) {
    $base = 2136.00;
  } else if ($periodo == 199008) {
    $base = 2136.00;
  } else if ($periodo == 199007) {
    $base = 1928.00;
  } else if ($periodo == 199006) {
    $base = 1759.00;
  } else if ($periodo >= 199004) {
    $base = 1669.00;
  } else if ($periodo == 199003) {
    $base = 1182.00;
  } else if ($periodo == 199002) {
    $base = 684.00;
  } else if ($periodo == 199001) {
    $base = 438.00;
  } else if ($periodo == 198912) {
    $base = 214.00;
  } else if ($periodo == 198911) {
    $base = 152.00;
  } else if ($periodo == 198910) {
    $base = 110.00;
  } else if ($periodo == 198909) {
    $base = 81.00;
  } else if ($periodo == 198908) {
    $base = 63.00;
  } else if ($periodo == 198907) {
    $base = 49.00;
  } else if ($periodo == 198906) {
    $base = 36.00;
  } else if ($periodo == 198905) {
    $base = 27.68;
  } else if ($periodo >= 198902) {
    $base = 24.68;
  } else if ($periodo == 198901) {
    $base = 24680.00;
  }


  return $base;
}

function base_ir($mes, $ano) {
  $base = null;
  if (($mes >= 01 && $ano == 2014) && ($mes <= 12 && $ano == 2014)) {
    $base = 179.71;
  } else if (($mes >= 01 && $ano == 2013) && ($mes <= 12 && $ano == 2013)) {
    $base = 171.97;
  } else if (($mes >= 01 && $ano == 2012) && ($mes <= 12 && $ano == 2012)) {
    $base = 164.56;
  } else if (($mes >= 04 && $ano == 2011) && ($mes <= 12 && $ano == 2011)) {
    $base = 157.47;
  } else if (($mes >= 01 && $ano == 2010) && ($mes <= 03 && $ano == 2011)) {
    $base = 150.69;
  } else if (($mes >= 01 && $ano == 2009) && ($mes <= 12 && $ano == 2009)) {
    $base = 144.20;
  } else if (($mes >= 01 && $ano == 2008) && ($mes <= 12 && $ano == 2008)) {
    $base = 137.99;
  } else if (($mes >= 01 && $ano == 2007) && ($mes <= 12 && $ano == 2007)) {
    $base = 132.05;
  } else if (($mes >= 02 && $ano == 2006) && ($mes <= 12 && $ano == 2006)) {
    $base = 126.36;
  } else if (($mes >= 01 && $ano == 2005) || ($mes <= 01 && $ano == 2006)) {
    $base = 117.00;
  } else if (($mes >= 01 && $ano == 2002) || ($mes <= 12 && $ano == 2004)) {
    $base = 106.00;
  } else if (($mes >= 01 && $ano == 1998) || ($mes <= 12 && $ano == 2001)) {
    $base = 90.00;
  } else if (($mes >= 01 && $ano == 1996) || ($mes <= 12 && $ano == 1997)) {
    $base = 90.00;
  } else if (($mes >= 10 && $ano == 1995) && ($mes <= 12 && $ano == 1995)) {
    $base = 79.52;
  } else if (($mes >= 07 && $ano == 1995) && ($mes <= 09 && $ano == 1995)) {
    $base = 75.64;
  } else if (($mes >= 04 && $ano == 1995) && ($mes <= 06 && $ano == 1995)) {
    $base = 70.61;
  } else if (($mes >= 01 && $ano == 1995) && ($mes <= 03 && $ano == 1995)) {
    $base = 67.67;
  } else if (($mes >= 12 && $ano == 1994) && ($mes <= 12 && $ano == 1994)) {
    $base = 66.18;
  } else if (($mes >= 11 && $ano == 1994) && ($mes <= 11 && $ano == 1994)) {
    $base = 64.28;
  } else if (($mes >= 10 && $ano == 1994) && ($mes <= 10 && $ano == 1994)) {
    $base = 63.08;
  } else if (($mes >= 09 && $ano == 1994) && ($mes <= 09 && $ano == 1994)) {
    $base = 62.07;
  } else if (($mes >= 08 && $ano == 1994) && ($mes <= 08 && $ano == 1994)) {
    $base = 23.64;
  } else if (($mes >= 07 && $ano == 1994) && ($mes <= 07 && $ano == 1994)) {
    $base = 22.47;
  } else if (($mes >= 06 && $ano == 1994) && ($mes <= 06 && $ano == 1994)) {
    $base = 42722.40;
  } else if (($mes >= 05 && $ano == 1994) && ($mes <= 05 && $ano == 1994)) {
    $base = 29625.00;
  } else if (($mes >= 04 && $ano == 1994) && ($mes <= 04 && $ano == 1994)) {
    $base = 20973.00;
  } else if (($mes >= 03 && $ano == 1994) && ($mes <= 03 && $ano == 1994)) {
    $base = 14602.00;
  } else if (($mes >= 02 && $ano == 1994) && ($mes <= 02 && $ano == 1994)) {
    $base = 10452.00;
  } else if (($mes >= 01 && $ano == 1994) && ($mes <= 01 && $ano == 1994)) {
    $base = 7510.00;
  } else if (($mes >= 12 && $ano == 1993) && ($mes <= 12 && $ano == 1993)) {
    $base = 5494.80;
  } else if (($mes >= 11 && $ano == 1993) && ($mes <= 11 && $ano == 1993)) {
    $base = 4103.60;
  } else if (($mes >= 10 && $ano == 1993) && ($mes <= 10 && $ano == 1993)) {
    $base = 3036.00;
  } else if (($mes >= 09 && $ano == 1993) && ($mes <= 09 && $ano == 1993)) {
    $base = 2259.20;
  } else if (($mes >= 08 && $ano == 1993) && ($mes <= 08 && $ano == 1993)) {
    $base = 1711.00;
  } else if (($mes >= 07 && $ano == 1993) && ($mes <= 07 && $ano == 1993)) {
    $base = 1309987.00;
  } else if (($mes >= 06 && $ano == 1993) && ($mes <= 06 && $ano == 1993)) {
    $base = 1005054.00;
  } else if (($mes >= 05 && $ano == 1993) && ($mes <= 05 && $ano == 1993)) {
    $base = 780260.00;
  } else if (($mes >= 04 && $ano == 1993) && ($mes <= 04 && $ano == 1993)) {
    $base = 612738.00;
  } else if (($mes >= 03 && $ano == 1993) && ($mes <= 03 && $ano == 1993)) {
    $base = 486454.00;
  } else if (($mes >= 02 && $ano == 1993) && ($mes <= 02 && $ano == 1993)) {
    $base = 383881.00;
  } else if (($mes >= 01 && $ano == 1993) && ($mes <= 01 && $ano == 1993)) {
    $base = 296502.00;
  } else if (($mes >= 12 && $ano == 1992) && ($mes <= 12 && $ano == 1992)) {
    $base = 240102.00;
  } else if (($mes >= 11 && $ano == 1992) && ($mes <= 11 && $ano == 1992)) {
    $base = 194100.00;
  } else if (($mes >= 10 && $ano == 1992) && ($mes <= 10 && $ano == 1992)) {
    $base = 154686.00;
  } else if (($mes >= 09 && $ano == 1992) && ($mes <= 09 && $ano == 1992)) {
    $base = 125425.00;
  } else if (($mes >= 08 && $ano == 1992) && ($mes <= 08 && $ano == 1992)) {
    $base = 101856.00;
  } else if (($mes >= 07 && $ano == 1992) && ($mes <= 07 && $ano == 1992)) {
    $base = 84171.00;
  } else if (($mes >= 06 && $ano == 1992) && ($mes <= 06 && $ano == 1992)) {
    $base = 68282.00;
  } else if (($mes >= 05 && $ano == 1992) && ($mes <= 05 && $ano == 1992)) {
    $base = 55312.00;
  } else if (($mes >= 04 && $ano == 1992) && ($mes <= 04 && $ano == 1992)) {
    $base = 46159.00;
  } else if (($mes >= 03 && $ano == 1992) && ($mes <= 03 && $ano == 1992)) {
    $base = 37826.00;
  } else if (($mes >= 02 && $ano == 1992) && ($mes <= 02 && $ano == 1992)) {
    $base = 29997.00;
  } else if (($mes >= 01 && $ano == 1992) && ($mes <= 01 && $ano == 1992)) {
    $base = 23883.00;
  } else if (($mes >= 12 && $ano == 1991) && ($mes <= 12 && $ano == 1991)) {
    $base = 20000.00;
  } else if (($mes >= 11 && $ano == 1991) && ($mes <= 11 && $ano == 1991)) {
    $base = 16000.00;
  } else if (($mes >= 08 && $ano == 1991) && ($mes <= 10 && $ano == 1991)) {
    $base = 10000.00;
  } else if (($mes >= 02 && $ano == 1991) && ($mes <= 07 && $ano == 1991)) {
    $base = 5074.00;
  } else if (($mes >= 01 && $ano == 1991) && ($mes <= 01 && $ano == 1991)) {
    $base = 4221.00;
  } else if (($mes >= 12 && $ano == 1990) && ($mes <= 12 && $ano == 1990)) {
    $base = 3536.00;
  } else if (($mes >= 11 && $ano == 1990) && ($mes <= 11 && $ano == 1990)) {
    $base = 3031.00;
  } else if (($mes >= 10 && $ano == 1990) && ($mes <= 10 && $ano == 1990)) {
    $base = 2362.00;
  } else if (($mes >= 09 && $ano == 1990) && ($mes <= 09 && $ano == 1990)) {
    $base = 2136.00;
  } else if (($mes >= 08 && $ano == 1990) && ($mes <= 08 && $ano == 1990)) {
    $base = 2136.00;
  } else if (($mes >= 07 && $ano == 1990) && ($mes <= 07 && $ano == 1990)) {
    $base = 1928.00;
  } else if (($mes >= 06 && $ano == 1990) && ($mes <= 06 && $ano == 1990)) {
    $base = 1759.00;
  } else if (($mes >= 04 && $ano == 1990) && ($mes <= 05 && $ano == 1990)) {
    $base = 1669.00;
  } else if (($mes >= 03 && $ano == 1990) && ($mes <= 03 && $ano == 1990)) {
    $base = 1182.00;
  } else if (($mes >= 02 && $ano == 1990) && ($mes <= 02 && $ano == 1990)) {
    $base = 684.00;
  } else if (($mes >= 01 && $ano == 1990) && ($mes <= 01 && $ano == 1990)) {
    $base = 438.00;
  } else if (($mes >= 12 && $ano == 1989) && ($mes <= 12 && $ano == 1989)) {
    $base = 214.00;
  } else if (($mes >= 11 && $ano == 1989) && ($mes <= 11 && $ano == 1989)) {
    $base = 152.00;
  } else if (($mes >= 10 && $ano == 1989) && ($mes <= 10 && $ano == 1989)) {
    $base = 110.00;
  } else if (($mes >= 09 && $ano == 1989) && ($mes <= 09 && $ano == 1989)) {
    $base = 81.00;
  } else if (($mes >= 08 && $ano == 1989) && ($mes <= 08 && $ano == 1989)) {
    $base = 63.00;
  } else if (($mes >= 07 && $ano == 1989) && ($mes <= 07 && $ano == 1989)) {
    $base = 49.00;
  } else if (($mes >= 06 && $ano == 1989) && ($mes <= 06 && $ano == 1989)) {
    $base = 36.00;
  } else if (($mes >= 05 && $ano == 1989) && ($mes <= 05 && $ano == 1989)) {
    $base = 27.68;
  } else if (($mes >= 02 && $ano == 1989) && ($mes <= 04 && $ano == 1989)) {
    $base = 24.68;
  } else if (($mes >= 01 && $ano == 1989) && ($mes <= 01 && $ano == 1989)) {
    $base = 24680.00;
  }

  return $base;
}
