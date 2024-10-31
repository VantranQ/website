<?php  
      $sql_pro =" SELECT * FROM tbl_sanpham WHERE 
          tbl_sanpham.id_danhmuc='$_GET[id]'
           ORDER BY tbl_sanpham.id_sanpham  DESC";
          $query_pro = mysqli_query($mysqli ,$sql_pro);
          //get ten danh muc
          $sql_cate =" SELECT * FROM tbl_danhmuc WHERE 
          tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
          $query_cate = mysqli_query($mysqli ,$sql_cate);
          $row_title = mysqli_fetch_array($query_cate);
?>
    <h3> Danh muc san pham:<?php echo $row_title['tendanhmuc']?></h3>
   
    <ul class="list_products">
      <?php 
      while($row_pro = mysqli_fetch_array($query_pro)){
      ?>
        <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
          <img src="admin/modules/quanlysp/uploaded/<?php echo $row_pro['hinhanh']?>"width=""alt="" >
          <p class="tile_products">Ten san pham:<?php echo $row_pro['tensanpham']?></p>
          <p class="tile_price">Gia : <?php echo number_format($row_pro['giasp'],0,',','.').'vnd'?></p>
        </a>
        </li>
        <?php } ?>
    </ul>
        