<div class="container-fluid">
<div class="row">
<div class="col-sm-3 col-md-2 sidebar">
  <div class="menu-title"></div>
  <div class="accordion" id="accordion2">
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-database">
         <span class="glyphicon glyphicon-th-large menu-head"></span>&nbsp;&nbsp;数据表
        </a>
      </div>
      <div id="collapse-database" class="accordion-body collapse">
          <ul>
          	<li ><a id="staff" href="./staff.php">员工</a></li>
            <li ><a id="dishes" href="./dishes.php">菜品</a></li>
            <li><a id="material" href="#">原料</a></li>
            <li><a id="order" href="#">订单</a></li>
            <li><a id="customer" href="#">客户</a></li>
          </ul>
      </div>
    </div>
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-search">
         <span class="glyphicon glyphicon-search menu-head"></span>&nbsp;&nbsp;查询
        </a>
      </div>
      <div id="collapse-search" class="accordion-body collapse">
          <ul>
            <li ><a id="order-detail" href="#">订单详情</a></li>
            <li><a id="dishes-saled" href="#">商品销售汇总</a></li>
            <li><a id="material-used" href="#">原料消耗</a></li>
          </ul>
      </div>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-tools">
           <span class="glyphicon glyphicon-wrench menu-head"></span>&nbsp;&nbsp;小工具
          </a>
        </div>
        <div id="collapse-tools" class="accordion-body collapse">
          <ul>
            <li ><a id="tool-timespan" href="./datespan.php">圣诞节还有多久</a></li>
            <li><a id="tool-maxstring" href="./LCS.php">最长匹配字符串</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>