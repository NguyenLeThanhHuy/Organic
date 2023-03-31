<?php
                // Query all item để lấy total_record
                $sql = 'select * from product_details';
                // //connect
                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                $data = mysqli_query($conn, $sql);
                // lấy tổng record
                $total_record = mysqli_num_rows($data);

                // chia trang
                $total_record = ceil($total_record / $num_per_page);

                // Show max 3 pages
                if ($total_record <= 3) {
                    // Prev
                    if ($page > 1) {
                        echo "<li class='pagination-list-item-prev'>
                                    <a href='index.php?action=allsanpham&page=" . ($page - 1) . "' class='btn btn-primary'>Prev</a>
                                    </li>";
                    }

                    for ($i = 1; $i <= $total_record; $i++) {
                        // Nếu
                        if ($page == $i) {
                            echo "<li class='pageNumber pagination-list-item' >
                                    <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                    </li>";
                        } else
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=$i' class='btn btn-primary'> $i</a>
                                    </li>";
                    }

                    // Next
                    if ($page >= 1 && $page < $total_record) {
                        echo "<li class='pagination-list-item-next'>
                                    <a href='index.php?action=allsanpham&page=" . ($page + 1) . "' class='btn btn-primary'>Next</a>
                                    </li>";
                    }
                } else {
                    // Prev
                    if ($page > 1) {
                        echo "<li class='pagination-list-item-prev'>
                                    <a href='index.php?action=allsanpham&page=" . ($page - 1) . "' class='btn btn-primary'>Prev</a>
                                    </li>";
                    }

                    for ($i = $page;; $i++) {
                        // TH: Trang cuối
                        if ($i == $total_record) {
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i - 2) . "' class='btn btn-primary'> " . ($i - 2) . "</a>
                                    </li>";
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i - 1) . "' class='btn btn-primary'> " . ($i - 1) . "</a>
                                    </li>";

                            echo "<li class='pageNumber pagination-list-item' >
                                    <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                    </li>";
                            // TH: Khác trang đầu tiên
                        } else if ($i != 1) {
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i - 1) . "' class='btn btn-primary'> " . ($i - 1) . "</a>
                                    </li>";

                            echo "<li class='pageNumber pagination-list-item' >
                                    <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                    </li>";

                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i + 1) . "' class='btn btn-primary'> " . ($i + 1) . "</a>
                                    </li>";
                            // TH: Trang đầu
                        } else {
                            echo "<li class='pageNumber pagination-list-item' >
                                            <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                            </li>";

                            echo "<li class='pageNumber pagination-list-item'>
                                            <a href='index.php?action=allsanpham&page=" . ($i + 1) . "' class='btn btn-primary'> " . ($i + 1) . "</a>
                                            </li>";

                            echo "<li class='pageNumber pagination-list-item'>
                                            <a href='index.php?action=allsanpham&page=" . ($i + 2) . "' class='btn btn-primary'> " . ($i + 2) . "</a>
                                            </li>";
                        }
                        // Thoát khỏi vòng lặp
                        break;
                    }

                    // Next
                    if ($page >= 1 && $page < $total_record) {
                        echo "<li class='pagination-list-item-next'>
                                    <a href='index.php?action=allsanpham&page=" . ($page + 1) . "' class='btn btn-primary'>Next</a>
                                    </li>";
                    }
                }
