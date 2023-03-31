<?php
class user{
    public function __construct()
    {
        
    }
    // phương thức loginadmin
    public function logAdmin($user,$pass)
    {
        $db=new connect();
        $select="select * from admin where user='$user' and password='$pass'";
        // echo $select;
        $result=$db->getInstance($select);
        return $result;
        // $result=$db->getList($select);
        // $set=$result->fetch(); // $set[admin,123456]
        // return $set;
    }
}
?>