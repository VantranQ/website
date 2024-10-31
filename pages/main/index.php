<?php  
      $sql_pro =" SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE 
          tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
           ORDER BY tbl_sanpham.id_sanpham  DESC LIMIT 25 ";
          $query_pro = mysqli_query($mysqli ,$sql_pro);
      
?>
<h3>San pham moi nhat</h3>
<div>
    <ul class="list_products">
      <?php
      while($row = mysqli_fetch_array($query_pro)){
        ?>
        <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
          <img src="admin/modules/quanlysp/uploaded/<?php echo $row['hinhanh']?>"width=""alt="" >
          <p class="tile_products">Ten san pham:<?php echo $row['tensanpham']?></p>
          <p class="tile_price">Gia : <?php echo number_format($row['giasp'],0,',','.').'vnd'?></p>
          <p style="text-align:center;color:black;font-weight:bold;"><?php echo $row['tendanhmuc']?></p>
        </a>
        </li>
        <?php }?>
           </ul> 