<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $message = $_POST["message"];
    $code = $_POST["code"]; //  验证码，需要在服务器端进行验证

    if ($code == "7yqi"||$code =="7YQI") {
        $filename = "messages.txt"; //  TXT 文件名
        $data = "昵称: " . $name . "\n";
        $data .= "联系电话: " . $phone . "\n";
        $data .= "电子邮箱: " . $mail . "\n";
        $data .= "留言内容: " . $message . "\n";
        $data .= "验证码: " . $code . "\n";
        $data .= "---------------------\n"; //  分隔符

        //  以追加模式写入文件
        file_put_contents($filename, $data, FILE_APPEND);

        echo "留言提交成功！";
    } else {
        echo "验证码错误！";
    }
}
?>