<?php include "config.php" ?>
<?php
  // 设置打开的侧边菜单
  $collapse = 'collapse-tools';
  $current_tag = 'tool-timespan';

  $date_now = time();
  $date_christmas = strtotime('2016-12-25');

  if($date_now < $date_christmas){
  	$timespan = round(($date_christmas-$date_now)/3600/24);
  }else{
  	$timespan = round(($date_now-$date_christmas)/3600/24);
  }
?>

<?php include "./modules/header.php" ?>
<?php include "./modules/sidebar.php" ?>

	<div class="col-sm-3 col-md-2"></div>
	<div class="col-sm-9 col-md-10 main">
  	<h2 class="sub-header">圣诞节还有多久</h2>
  	<div class="date_now">
  		<span class="now-text">今天&nbsp;\&nbsp;<?php echo date("Y年m月d日") ?></date>
  	</div>
	  <div class="text-datespan">
	  	<span class="day-num-near"><?php echo $date_now < $date_christmas?'离2016年圣诞节还有':'2016年圣诞节已过去'; ?></span><span class="day-num"><?php echo $timespan ?></span><span class="day-num-near">天</span>
	  </div>
</div>

<?php include "./modules/footer.php" ?>