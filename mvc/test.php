<html>
<body>
</body>    
<?php

function createTable($data,$act,$id_name){
    $row = ["product_id" => 12,"name" => "jack"];
    var_dump($row);
    $hmtl = "jemoeder";
    $id = $row[$id_name];
    $html .= "<a
    href='index.php?act={$act}&op=read&id={$id}'>link</a>";
    return $html;
}
$spul = "";
echo createTable($spul,"products",'product_id');

?>
</hmtl>