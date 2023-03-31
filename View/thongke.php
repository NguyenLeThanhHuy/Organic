
        <meta charset="UTF-8">
        <div class="thongke">

        <div class="pt-5">
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
          <span>Thống Kê Từ</span><input type="date" name="day" id=""> đến nay <button type="submit">Submit</button>
        </form>
        </div>
        <div style=" width:100%;"   id="chart_div">Thống Kê</div>
      </div>
        
      </div>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(function() {
      drawVisualization(<?php if(isset($nam) && isset($thang) && isset($ngay)) echo $nam . ',' . $thang . ',' . $ngay; ?>);
     });
     function drawVisualization(nam = null,thang = null,ngay = null) {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
            var data = new google.visualization.DataTable();
            var tenhh = new Array();
            var soluongban = new Array();
            var dataten=0;
            var slb = 0;
            var rows = new Array();
          <?php
              $hh = new productdetails();
              if(isset($nam) && isset($thang) && isset($ngay)){
                $result = $hh->getThongKeMatHang($nam, $thang, $ngay);
              }else {

                $result = $hh->getThongKeMatHang();
              }
              while($set = $result->fetch()){
                $tenhh = $set['name'];
                $soluong = $set['soluong'];
                echo "tenhh.push('" . $tenhh. "');";
                echo "soluongban.push('". $soluong."');";
              }
                
          ?>

          

          for (var i = 0; i < tenhh.length; i++) {
            dataten = tenhh[i];
            slb = parseInt(soluongban[i]);
            rows.push([dataten,slb]);
          }

          data.addColumn('string', 'Tên hàng hóa');
          data.addColumn('number', 'Số lượng bán');
          data.addRows(rows);

          var options = {
            title: 'Thống kê số lượng bán',
            'width': 600,
            'height': 400,
            'backgroundColor': '#ffffff',
            is3D: true
          }
          var chart = new google.visualization.PieChart(document.getElementById("chart_div"));
          chart.draw(data,options);
	 }
                   
    </script>
        
 
 