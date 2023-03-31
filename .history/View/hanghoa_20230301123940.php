<div  class="col-md-4 col-md-offset-4 mt-5"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
<a href="index.php?action=hanghoa&"><h4>Thêm sản phẩm</h4></a>
</div>
<div class="row">
<div class="col col-10 offset-1">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Đơn giá</th>
        <th>Hình</th>
        <th>Nhóm</th>
        <th>Mã loại</th>
        <th>Mô tả</th>     
        <th>Slug</th>
        <th>Soluongton</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $hh=new productdetails();
        $result=$hh->getHangHoaAll();
        while($set=$result->fetch()):
      ?>
      <tr>
      <td><?php echo $set['mahh'];?> </td>
        <td><?php echo $set['name'];?></td>
        <td><?php echo $set['price'];?></td>
        <td><img width="50px" height="50px" src="<?php echo $set['img'];?>"/></td>
        <td><?php echo $set['type'];?></td>
        <td><?php echo $set['category_id'];?></td>
        <td><?php echo $set['description'];?></td>
        <td><?php echo $set['slug'];?></td>
        <td><?php echo $set['soluongton'];?></td>
        <td><a href="index.php?action=hanghoa&act=edit&id=<?php echo $set['mahh'] ?>" class='btn btn-info'>Cập nhật</a></td>
        <td><a href="index.php?action=deleteprod&index=<?php echo $set['mahh'] ?>" class='btn btn-danger'>Xóa</a></td>
      </tr>
     <?php
      endwhile;
     ?>
    </tbody>
  </table>
</div>
</div>