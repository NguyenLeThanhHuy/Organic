<div class="col l-5 c-12 " style="background-color: #fafafa;border-radius: 15px;">
    <div class="checkout_product">
        <div class="title-infor" style="padding: 5px 0;">
            <h2>Thông tin đơn hàng</h2>
        </div>
        <div class="infor-product-order">
            <div class="product-order">
                <?php
                    if(isset($_SESSION['user_tam'])) {

                    }
    
                ?>
            </div>
        </div>
        <div class="ma-giam-gia flex">
            <input type="text" placeholder="Mã giảm giá">
            <div class="ap-dung-ma">
                <span>Áp dụng</span>
            </div>
        </div>
        <div class="tam-tinh">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
            <div class="tam-tinh-main flex">
                <span>Tạm tính</span>
                <span><?=number_format($total_money_main)?><sup>đ</sup></span>
            </div>
            <div class="phi-van-chuyen flex">
                <span>Phí vận chuyển</span>
                <span>20,000 <sup>đ</sup></span>
            </div>
        </div>
        <div class="tong-cong flex">
            <span>Tổng cộng</span>
            <h3><?=number_format($total_money_main+20000)?> <sup>đ</sup></h3>
        </div>
    </div>
</div>