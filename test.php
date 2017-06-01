<?php

$arr = array();
for ($i = 0; $i < 10000; ++$i) {
    $arr[] = array(
    'name' => 'test',
    'str' => md5($i),
  );
}
$contentArr = str_split(json_encode($arr), 65536);
// foreach ($contentArr as $part) {
//     echo $part;
// }
echo json_encode($arr);
