
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
<a href=""><h4>Thêm sản phẩm</h4></a>
</div>
<div class="row">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Đơn giá</th>
        <th>Hình</th>
        <th>Nhóm</th>
        <th>Mã loại</th>
        <th>Đặc biệt</th>
        <th>Số lượt xem</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Số lượng tồn</th>
        <th>Màu sắc</th>
        <th>Size</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $hh=new hanghoa();
        $result=$hh->getHangHoaAll();
        while($set=$result->fetch()):
      ?>
      <tr>
      <td><?php echo $set['mahh'];?> </td>
        <td><?php echo $set['name'];?></td>
        <td><?php echo $set['price'];?></td>
        <td><img width="50px" height="50px" src="Content/imagetourdien/<?php echo $set['hinh'];?>"/></td>
        <td><?php echo $set['category_id'];?></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['dacbiet'];?></td>
        <td><?php echo $set['soluotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><?php echo $set['soluongton'];?></td>
        <td><?php echo $set['mausac'];?></td>
        <td><?php echo $set['size'];?></td>
        <td><a href="">Cập nhật</a></td>
        <td><a href="">Xóa</a></td>
      </tr>
     <?php
      endwhile;
     ?>
    </tbody>
  </table>
</div>