<?php
      include('../../config/config.php');
     $tensanpham = $_POST['tensanpham'];
     $masp       =  $_POST['masp'];
     $giasp      =  $_POST['giasp'];
     $soluong    = $_POST['soluong'];
     $hinhanh  =    $_FILES['hinhanh']['name'];
     $hinhanh_tmp_name =    $_FILES['hinhanh']['tmp_name'];
     $hinhanh = time()."_".$hinhanh;
     $tomtat     = $_POST['tomtat'];
     $noidung =    $_POST['noidung'];
     $tinhtrang =  $_POST['tinhtrang'];
     $danhmuc =  $_POST['danhmuc'];

     // xuly hinh anh
if(isset($_POST['themsanpham'])){
  //them 
     $sql_them =" INSERT INTO tbl_sanpham (tensanpham, masp, giasp, soluong, hinhanh, noidung,
      tomtat, tinhtrang, id_danhmuc
     )VALUES('".$tensanpham."', '".$masp."' , '".$giasp."' , '".$soluong."', '".$hinhanh."',
      '".$tomtat."', '".$noidung."', '".$tinhtrang."' , '".$danhmuc."' )";
     mysqli_query($mysqli , $sql_them );
     move_uploaded_file($hinhanh_tmp_name ,'uploaded/'.$hinhanh);
     header('location:../../index.php?action=quanlysp&query=them');

}elseif(isset($_POST['suasanpham'])){
  //sua danh muc .
    if($hinhanh!=''){
      move_uploaded_file($hinhanh_tmp_name ,'uploaded/'.$hinhanh);
      //truong hop sua co hinh anh
    $sql_update = " UPDATE  tbl_sanpham SET
     tensanpham='".$tensanpham."' , masp='".$masp."', giasp='".$giasp."' , soluong='".$soluong."' 
     , hinhanh='".$hinhanh."'
      , tomtat='".$tomtat."' , noidung='".$noidung."' , tinhtrang='".$tinhtrang."' , id_danhmuc='".$danhmuc."'
      WHERE id_sanpham='$_GET[idsanpham]' ";
        //lay hinh anh phai xoa hinh anh cu
        $sql = " SELECT * FROM tbl_sanpham  WHERE id_sanpham ='$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli , $sql);
        while($row = mysqli_fetch_array($query)){
          unlink('uploaded/'.$row['hinhanh']);
        }
    }else{
      //truong hop sua khong thay doi hinh anh
      $sql_update = " UPDATE  tbl_sanpham SET
      tensanpham='".$tensanpham."' , masp='".$masp."', giasp='".$giasp."' , soluong='".$soluong."' ,
       hinhanh='".$hinhanh."'
       , 'tomtat='".$tomtat."' , noidung='".$noidung."' , tinhtrang='".$tinhtrang."'
       id_danhmuc='".$danhmuc."' WHERE id_sanpham = '$_GET[idsanpham]' ";
    }
    mysqli_query($mysqli , $sql_update );
    header('location:../../index.php?action=quanlysp&query=them');

  }
else{
  //xoa danh muc 
     $id = $_GET['idsanpham'];
     $sql = " SELECT * FROM tbl_sanpham  WHERE id_sanpham = '$id' LIMIT 1";
      $query = mysqli_query($mysqli , $sql);
      while($row = mysqli_fetch_array($query)){
        unlink('uploaded/'.$row['hinhanh']);
      }
      $sql_xoa = " DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."' ";
      mysqli_query($mysqli , $sql_xoa);
      header('location:../../index.php?action=quanlysp&query=them');

  }
?>