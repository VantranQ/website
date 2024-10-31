<?php
           $sqli_lietke_danhmucsp =" SELECT * FROM tbl_danhmuc ORDER BY thutu DESC  ";
           $query_lietke_danhmucsp = mysqli_query($mysqli ,  $sqli_lietke_danhmucsp );
?>
<p>liet ke danh muc san pham</p>
<table border="1"width="50%"style="border-collapse:collapse">
    <form >
    <tr><th>id</th>
        <th>ten danh muc </th>
        <th>thu tu</th>
        <th>Quan ly</th>
    </tr>
    <?php 
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
         $i++;
        
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td>
    <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">xoa</a> |
    <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">sua</a>
        </td>

    </tr>
    <?php } ?>
    </form>

</table>