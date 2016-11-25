<?php include "config.php" ?>
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

		$string_result = LCS($string_x, $string_y);
		$string_arr = array('lcs' => $string_result,'x'=>$string_x, 'y' => $string_y);

		return $string_arr;
	}

 	if(count($_POST) !== 0){
 		$string_x = $_POST['string_up'];
 		$string_y = $_POST['string_down'];
 		$result = "";
 		if($string_x !=="" || $string_y !== ""){
 			// 有输入
	 		$string_result = LCS($string_x,$string_y);
	 		$result = array('lcs' => $string_result);
	 	}else{
	 		$result = LCS_random();
	 	}
	 	// 将处理结果返回给ajax
		header('content-type:application/json;charset=utf8');
	 	exit(json_encode($result));
 	}
	
?>

<?php include "./modules/header.php" ?>
<?php include "./modules/sidebar.php" ?>

	<div class="col-sm-3 col-md-2"></div>
	<div class="col-sm-9 col-md-10 main">
		<h2 class="sub-header">最长匹配字符串</h2>
		<div class="lcs-area">
			<div class="string">
				<textarea rows="5" placeholder ="长度小于或等于500的字符串" class="string-input" id="string-up"></textarea>
			</div>
			<div class="string">
				<textarea rows="5" placeholder ="长度小于或等于500的字符串" class="string-input" id="string-down"></textarea>
			</div>
			<div class="divider"></div>
			<div class="string">
				<textarea rows="4" placeholder ="字符串匹配结果" class="string-input" id="string-result"></textarea>
			</div>
			<div class="button-group">
				<button class="kmp_btn">计&nbsp;&nbsp;&nbsp;算</button><button class="kmp_random">随机测试</button>
			</div>
		</div>
	</div>

<?php include "./modules/footer.php" ?>