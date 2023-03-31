<?php
class connect
{
    var $db = null;
    // hàm tạo
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php2new';
        $user = 'root';
        $pass = '';
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (\Throwable $th) {
            echo "Thất bại";
        }
    }

    // Method lấy data từ database sau đó return về cho nơi gọi đến (Trả về 1 mảng các giá trị thỏa mãn)
    public function getList($select)
    {
        $result = $this->db->query($select);
        return $result;
    }

    // Method lấy data từ database sau đó return về cho nơi gọi đến (Trả về 1 element thỏa mãn)
    public function getInstance($select)
    {
        $result = $this->db->query($select);
        // Gần giống như Method getList tuy nhiên thay vì ta dùng fetch bên nơi gọi thì ta fetch tại đây để trả về 1 element
        $result = $result->fetch();
        return $result;
    }

    //	https://viblo.asia/p/cai-dat-ung-dung-php-thuan-su-dung-mvc-va-oop-4P856aA3lY3
    public function exec($query)
    {
        $results = $this->db->exec($query);
        // echo $results;
        return ($results);
    }
}
