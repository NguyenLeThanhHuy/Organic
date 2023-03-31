<?php
      $ac = 0;
    if(isset($_GET['act'])) {
      if($_GET['act'] == "edit" ) {
        $ac = 1;
      }
      if($_GET['act'] == "themsp") {
        $ac = 2;
      }
      
    }
?>

<?php 
    if($ac == 1) {
      echo '<div class="col col-4 offset-4"><h3><b>CẬP NHẬT SẢN PHẨM</b></h3></div>';
    }else if($ac == 2) {
      echo '<div class="col col-4 offset-4"><h3><b>THÊM SẢN PHẨM</b></h3></div>';
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
        <td> <input type="text" disabled class="form-control" name="mahh" value="<?php if(isset($id)) echo $id; ?>"  readonly/></td>
      </tr>
      <tr>
        <td>Tên hàng</td>
        <td><input type="text" class="form-control" name="name" value="<?php if(isset($name)) echo $name; ?>"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Slug</td>
        <td><input type="text" class="form-control" name="slug" value="<?php if(isset($slug)) echo $slug; ?>"  maxlength="100px"></td>
      </tr>
      <tr>
        <td>Đơn giá</td>
        <td><input type="text" class="form-control" value="<?php if(isset($price)) echo $price; ?>" name="price" ></td>
      </tr>
      <tr>
        <td>Hình</td>
        <td>
         
            <label><img width="50px" height="50px" src="<?php if(isset($img)) echo $img; ?>"></label>
            Chọn file để upload:
            <input type="file" name="image" id="fileupload">
         
        </td>
      </tr>
      <tr>
        <td>Nhóm</td>

        <td>
          <input type="text" class="form-control" value="<?php if(isset($type)) echo $type; ?>" name="type" >
        </td>
      </tr>
      <tr>
        <td>Mã loại</td>
        <td>
       
          <select name="category_id" class="form-control" style="width:150px;">
                <option value="1" <?php if($category_id == 1) echo 'selected'; ?>>1</option>
                <option value="2" <?php if($category_id == 2) echo 'selected'; ?>>2</option>
                <option value="3" <?php if($category_id == 3) echo 'selected'; ?>>3</option>
                <option value="4" <?php if($category_id == 4) echo 'selected'; ?>>4</option>
              
          </select>
        </td>
      </tr>
     
     
     
      <tr>
        <td>Mô tả</td>
        <td><input type="text" value="<?php if(isset($description)) echo $description; ?>" class="form-control" name="description">
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