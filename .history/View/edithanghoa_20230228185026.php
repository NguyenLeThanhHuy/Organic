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
        $slt = $result['soluongton'];
      }
    ?>

    <!-- Tạo mở thẻ form -->
    <?php 
      if($ac == 1) {
        echo '<form action="index.php?action=hanghoa&act=edit_action&id='.$id.'" method="post" enctype="multipart/form-data">';
      }
    ?>
    <table class="table" style="border: 0px;">

      <tr>
        <td>Mã hàng</td>
        <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($id)) echo $id; ?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="tenhh" value="<?php if(isset($name)) echo $name; ?>"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" value="<?php if(isset($price)) echo $price; ?>" name="dongia" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
         
            <label><img width="50px" height="50px" src=""></label>
            Chọn file để upload:
            <input type="file" name="image" value="<?php if(isset($img)) echo $id; ?>" id="fileupload">
         
        </td>
      </tr>
      <tr>
        <td>Nhóm</td>

        <td>
          <input type="text" class="form-control" value="<?php if(isset($type)) echo $type; ?>" name="nhom" >
        </td>
      </tr>
      <tr>
        <td>Mã loại</td>
        <td>
        <!-- value="Admin" {{'Admin' == $edit->role ? 'selected' : ''}} -->
          <select name="maloai" class="form-control" style="width:150px;">
                <option value="1" <?php if() ?>>1</option>
                <option value="2">2</option>
                <option value="3" >3</option>
                <option value="4">4</option>
                <option value="5">5</option>
          </select>
        </td>
      </tr>
     
     
     
      <tr>
        <td>Mô tả</td>
        <td><input type="text" value="<?php if(isset($description)) echo $description; ?>" class="form-control" name="mota">
        </td>
      </tr>
      <tr>
        <td>Số lượng tồn</td>
        <td><input type="text" value="<?php if(isset($slt)) echo $slt; ?>" class="form-control" name="slt" >
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