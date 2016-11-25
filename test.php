<?php
  // 设置打开的侧边菜单
  $collapse = 'collapse-tools';
  $current_tag = 'tool-maxstring';

  function createLcs($string_x, $maxindex, $maxlen){

 		$string_lcs = "";
    $i = $maxindex;
    while($maxlen--)
    {
        $string_lcs .= $string_x[$i++];
    }
    return $string_lcs;
  }

	function LCS($string_x, $string_y){
  	$dp=array();
  	$xlen = strlen($string_x);
  	$ylen = strlen($string_y);

    $maxlen = $maxindex = 0;
    for($i = 0; $i < $xlen; $i++)
    {
      for($j = 0; $j < $ylen; $j++)
      {
        if($string_x[$i] === $string_y[$j])
        {
          if($i && $j)
          {
              $dp[$i][$j] = isset($dp[$i-1][$j-1])? $dp[$i-1][$j-1] + 1 : 1;
          }
          if($i == 0 || $j == 0)
          {
              $dp[$i][$j] = 1;
          }
          if($dp[$i][$j] > $maxlen)
          {
              $maxlen = $dp[$i][$j];
              $maxindex = $i + 1 - $maxlen;
          }
        }
      }
    }
    return createLcs($string_x, $maxindex, $maxlen);
	}

	function LCS_random(){
		$charset = "yang";
		$charset_len = strlen($charset);

		$xlen = rand(100,500);
		$ylen = rand(100,500);

		$string_x = "";
		$string_y = "";

		for($i = 0; $i < $xlen; $i ++){
			$string_x .= $charset[rand(0,$charset_len-1)];
		}

		for($i = 0; $i < $ylen; $i ++){
			$string_y .= $charset[rand(0,$charset_len-1)];
		}
		echo '$string_x = ';
		echo $string_x;
		echo "\n\n";
		echo '$string_y = ';
		echo $string_y;
		echo '$string_result = ';
		echo LCS($string_x, $string_y);

	}

	// echo LCS('13324441',"341");
	LCS_random();
?>