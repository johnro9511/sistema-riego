<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    $datos = json_encode($data);
    $array = json_decode($datos);
    //$id = $array[0]->idarea;
    date_default_timezone_set('America/Mexico_City');
    $datetime = new DateTime();
    $date = date('Ymd_H:i:s');
    $file = fopen("json/recibidos/recibido".$date.".json", 'w');
    fwrite($file, $datos);
    //print_r(json_encode($data));
    fclose($file);
}
else if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo "GET<br>";
    parse_str(file_get_contents('php://input'), $get_vars);
    var_dump($get_vars);
    $data = json_decode(file_get_contents('php://input'), true);
    print_r(json_encode($data));
}
else if($_SERVER['REQUEST_METHOD'] == "PUT"){
    echo "PUT<br>";
    parse_str(file_get_contents('php://input'), $put_vars);
    var_dump($put_vars);

}
else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    echo "DELETE<br>";
    parse_str(file_get_contents('php://input'), $delete_vars);
    var_dump($delete_vars);
}
?>
