<?php include "config.php" ?>
<?php
  // 设置打开的侧边菜单
  $collapse = 'collapse-database';
  $current_tag = 'dishes';

  // 获取请求数据
  $paramsNum = count($_GET);
  $tip_type = "";
  if($paramsNum !== 0){
    //操作
    $action = $_GET['action'];

    if($action === 'add'){
      //插入数据
      $name = $_POST['name'];
      $price = $_POST['price'];
      // 检验数据合法性

      $query = "insert into tb_dishes (name,price)";
      $query .= " values('$name','$price')";

      $result = @mysqli_query( $conn, $query) or die(mysql_error());

      if($result){
        // 插入成功
      }else{
        // 插入失败
      }

    }else if($action === 'edit'){
      //编辑数据
      $id = $_POST['id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      // 检验数据合法性

      $query = "update tb_dishes set name='$name',price='$price'";
      $query .= " where did='$id'";

      $result = mysqli_query( $conn, $query) or die(mysql_error());

      if($result){
        // 编辑成功
      }else{
        // 编辑失败
      }
    }else if($action === 'del'){
      //删除数据
      $id = $_GET['id'];

      $query = "delete from tb_dishes where did=$id";

      $result = @mysqli_query( $conn, $query) or die(mysql_error());

      if($result){
        // 删除成功
      }else{
        // 删除失败
      }
    }
  }

  //dishes 获得所有的数据
  $query = "select * from tb_dishes";
  $res_data = @mysqli_query( $conn, $query) or die(mysql_error());
  $rows_data_num = mysqli_num_rows($res_data);

?>
<?php include "./modules/header.php" ?>
<?php include "./modules/sidebar.php" ?>
<div class="col-sm-3 col-md-2"></div>
<div class="col-sm-9 col-md-10 main">
  <h2 class="sub-header">菜品</h2>
  <div class="alert-div">
    <a href="#" class="close">
        &times;
    </a>
    <strong>警告！</strong><span class="tips-text"></span>
  </div>
  <div class="table-responsive table-shadow">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>did</th>
          <th>name</th>
          <th>price</th>
          <th>Operator</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="hidden" id="did" name="did"/><span class="did-value"></span></td>
          <td><input type="text" id="name" name="name"/></td>
          <td><input type="text" id="price" name="price"/></td>
          <td>
            <button id="insert-link-dishes" class="edit-insert"><span class="glyphicon glyphicon-plus"></span></button>
            <button id="edit-link-dishes" class="edit-insert"><span class="glyphicon glyphicon-refresh"></span></button>
            <button class="reset-btn-dishes">&nbsp;</button>
          </td>
        </tr>
        <?php
          if($rows_data_num){
            for($row = 0; $row < $rows_data_num; $row ++){
              $dbrows=mysqli_fetch_array($res_data);
              echo "<tr>\n";
              echo '<td>'.$dbrows['did'].'</td>';
              echo '<td>'.$dbrows['name'].'</td>';
              echo '<td>'.$dbrows['price'].'</td>';

              $operatorStr = '<td>';
              $operatorStr .= '<a href="#" class="operator edit dishes"><span>';
              $operatorStr .= '<span class="glyphicon glyphicon-pencil"></span>';
              $operatorStr .= '</span></a>';
              $operatorStr .= '&nbsp;&nbsp;&nbsp;';
              $operatorStr .= '<a href="./dishes.php?action=del&id='.$dbrows['did'].'">';
              $operatorStr .= '<span class="operator del">';
              $operatorStr .= '<span class="glyphicon glyphicon-minus">';
              $operatorStr .= '</span></span></a>';
              $operatorStr .= '</td>';


              echo $operatorStr;
              echo "</tr>";
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php include "./modules/footer.php" ?>