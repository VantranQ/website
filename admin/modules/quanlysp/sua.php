<?php
           $sqli_sua_sp =" SELECT * FROM tbl_sanpham WHERE id_sanpham= '$_GET[idsanpham]' LIMIT 1  ";
           $query_sua_sp = mysqli_query($mysqli ,  $sqli_sua_sp );
?>

<p> Sua  san pham</p>

<table border="1"width="100%"style="border-collapse:collapse">
   <?php
   while ($row = mysqli_fetch_array($query_sua_sp)){
  ?>
    <form method="POST"action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>"enctype="multipart/form-data">
  <tr>
    <td>Ten san pham</td>
    <td><input type="text"value="<?php echo $row['tensanpham']?>"name="tensanpham"></td>
  </tr>
  <tr>
    <td>Ma sp </td>
    <td><input type="text"value="<?php echo $row['masp']?>"name="masp"></td>
  </tr>
  <tr>
    <td>Giasp </td>
    <td><input type="text"value="<?php echo $row['giasp']?>"name="giasp"></td>
  </tr>
  <td>Soluong</td>
    <td><input type="text"value="<?php echo $row['soluong']?>"name="soluong"></td>
  <tr>
    <td>hinh anh</td>
    <td><input type="file"name="hinhanh">
    <img width="150px" src="modules/quanlysp/uploaded/<?php echo $row['hinhanh'] ?>">
    </td>
  </tr>
  <tr>
    <td>Tom tat</td>
    <td><textarea rows="10" name="tomtat"style="resize:none"><?php echo $row['tomtat']?></textarea></td>
  </tr>
  <tr>
    <td></td>Noi dung
    <td><textarea rows="10"name="noidung"style="resize:none"><?php echo $row['noidung']?></textarea></td>
  </tr>
  <tr>
    <td>danh muc san pham</td>
    <td>
        <select name="danhmuc">
          <?php
          $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli , $sql_danhmuc);
           while($row_danhmuc =mysqli_fetch_array($query_danhmuc) ){
            if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
          ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php 
            }else{
              ?>
              <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
              <?php 
               }
            } ?>
        </select>
    </td>
  </tr>
  <tr>
    <td>tinh trang</td>
    <td>
        <select name="tinhtrang">
          <?php
          if($row['tinhtrang']== 1){
          ?>
            <option value="1"selected>Kich hoat</option>
            <option value="0">An</option>
          <?php 
         }else{
          ?>
            <option value="1">Kich hoat</option>
            <option value="0"selected>An</option>
          <?php } ?>
        </select>
    </td>
  </tr>
  <tr>
       <td colspan="2"><input type="submit"name="suasanpham"value="sua san pham"></td>
    </tr>

    </form>
    <?php } ?>
</table>