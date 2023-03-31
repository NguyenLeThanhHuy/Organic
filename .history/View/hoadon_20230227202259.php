<div  class="col-md-4 col-md-offset-4 mt-5"><h3 ><b>DANH SÁCH HÓA ĐƠN</b></h3></div>

<div class="row">
<div class="col col-10 offset-1">
<table class="table">
    <thead>
      <tr class="table-primary">
        <th>Mã Hóa Đơn</th>
        <th>Tên KH</th>
        <th>Tên KH2</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Address</th>
        <th>Ngày mua</th>     
        <th>MaSP</th>
        <th>Soluong</th>
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
        <td><?php echo $set['user_name'];?></td>
        <td><?php echo $set['user_name1'];?></td>
        <td><?php echo $set['phone_number'];?></td>
        <td><?php echo $set['email'];?></td>
        <td><?php echo $set['address'];?></td>
        <td><?php echo $set['description'];?></td>
        <td><?php echo $set['slug'];?></td>
        <td><?php echo $set['soluongton'];?></td>
        <td><a href="" class='btn btn-info'>Cập nhật</a></td>
        <td><a href="index.php?action=deleteprod&index=<?php echo $set['mahh'] ?>" class='btn btn-danger'>Xóa</a></td>
      </tr>
     <?php
      endwhile;
     ?>
    </tbody>
  </table>
</div>
</div>