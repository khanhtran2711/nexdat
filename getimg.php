<?php

$url="https://www.leybold-shop.com/media/phk/images/150dpi/70011-00_V1.png,https://www.leybold-shop.com/media/phk/images/150dpi/70011-00_V2.jpeg,https://www.leybold-shop.com/media/phk/images/150dpi/70011-00_V3.jpg";
// $data = file_get_contents($url);

// print_r($extension);
$subject = "E:contact@customer.com";
$pattern = "/([\w\-]*\.jpg)|([\w\-]*\.png)|([\w\-]*\.jpeg)/";
preg_match_all($pattern, $url, $m);
    $files = explode(",",$url);
    $i=0;
    // $ln = count($files);
    foreach ($files as $f) {
        
        $new = "image/".$m[0][$i];
        $i++;
        echo $new."\n";
    }
print("<pre>".print_r($m[0],true)."</pre>");
echo implode(",",$m[0]);

// foreach ($m[0] as $pic) {
//     echo $pic;
// }
// $email = $m[0];
// echo $email;
?>