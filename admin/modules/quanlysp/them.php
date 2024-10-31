<p>them  san pham</p>
<table border="1"width="100%"style="border-collapse:collapse">
    <form method="POST"action="modules/quanlysp/xuly.php"enctype="multipart/form-data">
  <tr>
    <td>Ten san pham</td>
    <td><input type="text"name="tensanpham"></td>
  </tr>
  <tr>
    <td>Ma sp </td>
    <td><input type="text"name="masp"></td>
  </tr>
  <tr>
    <td>Gia sp </td>
    <td><input type="text"name="giasp"></td>
  </tr>
  <tr>
    <td>Soluong</td>
    <td><input type="text"name="soluong"></td>
 </tr>
  <tr>
    <td>hinh anh</td>
    <td><input type="file"name="hinhanh"></td>
  </tr>
  <tr>
    <td>Tom tat</td>
    <td><textarea rows="10" name="tomtat"style="resize:none"></textarea></td>
  </tr>
  <tr>
    <td>Noi Dung</td>
    <td><textarea rows="10"name="noidung"style="resize:none"></textarea></td>
  </tr>
  <tr>
    <td>danh muc san pham</td>
    <td>
        <select name="danhmuc">
          <?php
          $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli , $sql_danhmuc);
           while($row_danhmuc =mysqli_fetch_array($query_danhmuc) ){
          ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php } ?>
        </select>
    </td>
  </tr>
  <tr>
    <td>tinh trang</td>
    <td>
        <select name="tinhtrang">
            <option value="1">Kich hoat</option>
            <option value="0">An</option>
        </select>
    </td>
  </tr>
  <tr>
       <td colspan="2"><input type="submit"name="themsanpham"value="them san pham"></td>
    </tr>

    </form>
</table>