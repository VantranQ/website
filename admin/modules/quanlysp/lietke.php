<?php
           $sqli_lietke_sp =" SELECT * FROM tbl_sanpham, tbl_danhmuc
            WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc
           ORDER BY id_sanpham DESC  ";
           $query_lietke_sp = mysqli_query($mysqli ,  $sqli_lietke_sp );
?>
<p>liet ke danh muc san pham</p>
<table border="1"width="100%"style="border-collapse:collapse">
    <form >
    <tr><th>id</th>
        <th>Ten san pham</th>
        <th>Ma sp</th>
        <th>Gia sp</th>
        <th>So luong</th>
        <th>Hinh ANH</th>
        <th>tom tat</th>
        <th>Noidung</th>
        <th>Danh muc</th>
        <th>Trang thai</th>
        <th>Quan ly</th>
    </tr>
    <?php 
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_sp)){
         $i++;
        
    ?>
    <tr>
        <td><?php echo $i ?></td>
        
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['masp']  ?></td>
        <td><?php echo $row['giasp']?></td>
        <td><?php echo $row['soluong']?></td>
        <td><img width="150px" src="modules/quanlysp/uploaded/<?php echo $row['hinhanh'] ?>"></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php echo $row['noidung']?></td>
        <td><?php echo $row['tendanhmuc']?></td>
        <td><?php if($row['tinhtrang']==1){
            echo "kich hoat";
        }else{
            echo "AN";
        }
         ?></td>
        <td>
    <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">xoa</a> |
    <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">sua</a>
        </td>

    </tr>
    <?php } ?>
    </form>

</table>