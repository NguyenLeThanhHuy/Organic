<?php
    if(isset($_GET['act']) == 'edit') {
      $ac = 1;
    }
?>

<?php 
    if($ac == 1) {
      echo '<div class="col col-4 offset-4"><h3><b>CẬP NHẬT SẢN PHẨM</b></h3></div>';
    }
?>
<div class="row col-md-4 col-md-offset-4" >
    <?php 
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $prod = new productdetails();
        $result = $prod->getHangHoabyID($id);
        $name = $result['name'];
        $category_id = $result['category_id'];
        $type = $result['type'];
        $price = $result['price'];
        $img = $result['img'];
        $description = $result['description'];
        $slug = $result['slug'];
        $sll = $result['soluongton'];

      }
    ?>

    <!-- Tạo mở thẻ form -->
    <?php 
      if($ac == 1) {
        
      }
    ?>
    <table class="table" style="border: 0px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value=""  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" name="dongia" ></td>
      </tr>
      <tr>
        <td>Giảm giá</td>
        <td><input type="text" class="form-control" name="giamgia" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
         
            <label><img width="50px" height="50px" src=""></label>
            Chọn file để upload:
            <input type="file" name="image" id="fileupload">
         
        </td>
      </tr>
      <tr>
        <td>Nhóm</td>

        <td>
          <input type="text" class="form-control" name="nhom" >
        </td>
      </tr>
      <tr>
        <td>Mã loại</td>
        <td>
          <select name="maloai" class="form-control" style="width:150px;">
            
          </select>
        </td>
      </tr>
      <tr>
        <td>Đặc biệt</td>
        <td><input type="text" class="form-control" name="dacbiet" >
        </td>
      </tr>
      <tr>
        <td>Số lượt xem</td>
        <td><input type="text" class="form-control" name="slx" >
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" name="ngaylap">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" name="mota">
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" class="form-control" name="slt" >
        </td>
      </tr>
      <tr>
        <td>Màu sắc</td>
        <td><input type="text" class="form-control" name="mausac" >
        </td>
      </tr>
      <tr>
        <td>Size</td>
        <td><input type="text" class="form-control" name="size" >
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <input type="submit" value="submit">
          

        </td>
      </tr>

    </table>
  </form>
</div>