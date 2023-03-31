<?php 
    class productdetails{
        public function __construct(){
            // Phương thức cần lấy ra sản phẩm mới nhất

        }

        // Method lấy ra sản phẩm chi tiết từ $slug
        public function getListProductDetails($slug) {
            $db = new connect();
            $select =  "SELECT * FROM product_details WHERE slug = '$slug'";
            $result = $db->getList($select);
            return $result;
        }

        // Method lấy ra các ảnh mô tả cho sản phẩm
        public function getListImgDesProductDetails($id) {
            $db = new connect();
            $select =  "SELECT * FROM img_desct WHERE product_id = $id";
            $result = $db->getList($select);
            return $result;
        }

        // Method lấy ra các sản phẩm liên quan (Cùng category, khác id, tối đa 4)
        public function getListProductRelate($id ,$category_id ) {
            $db = new connect();
            $select =  "SELECT * FROM product_details WHERE mahh != $id AND category_id = '$category_id' limit 4";
            $result = $db->getList($select);
            return $result;
        }

        function getHangHoaAll()
        {
            $db=new connect();
            $select="select * from product_details ";
            $result=$db->getList($select);
            return $result;
        }

        function getHangHoabyID($id)
        {
            $db=new connect();
            $select="select * from product_details where mahh = $id";
            $result=$db->getInstance($select);
            return $result;
            
        }

        function deletePro($id)
        {
            $db=new connect();
            $select="delete from product_details where mahh = '$id'";
            $db->exec($select);
        }

        function updatesp($id,$name,$price,$img,$type,$category_id,$description,$slt,$slug)
        {      
            $db=new connect();      
            $query="update product_details set name='$name',price='$price',  img='$img', type='$type', category_id=$category_id, description='$description', soluongton=$slt,slug = '$slug' where mahh=$id ";
            
            $db->exec($query);    
        }

        function insertsp($id,$name,$price,$img,$type,$category_id,$description,$slt,$slug)
        {      
            $db=new connect();      
            $query="insert into product_details (mahh,category_id,name,type,price,img,description,slug,soluongton)
             values($id ,$category_id, '$name','$type','$price', '$img','$description','$slug',$slt)";
            $db->exec($query);    
        }

        public function getAllProduct() {
            $db = new connect();
            $select = "select * from product_details";
            $result = $db->getList($select);
            return $result;
        } 

        // Method lấy ra các sản phẩm theo category_id từ database
        public function getListProductCategory($category_id) {
            $db = new connect();
            $select = "select * from product_details where category_id = $category_id;";
            $result = $db->getList($select);
            return $result;
        } 

        // Method phân trang tất cả sản phảm từ database
        public function getListProductPagination($num_per_page,$start_from) {
            $db = new connect();
            $select = "select * from product_details limit $start_from, $num_per_page";
            $result = $db->getList($select);
            return $result;
        }
        
    }
?>