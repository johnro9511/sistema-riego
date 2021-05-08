<?php
    $conexion = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conexion,"sistema_riego");
    mysqli_query($conexion, "SET NAMES 'utf8'");

    $id_reg = $_POST ['id_reg'];
    $id_zona = $_POST ['id_zona'];
    $id_ubi = $_POST ['id_ubi'];
    // $cultivo = $_POST ['cultivo'];
    $temp_amb = $_POST ['temp_amb'];
    $hume_amb = $_POST ['hume_amb'];
    $iluminacion = $_POST ['iluminacion'];
    $temp_suelo = $_POST ['temp_suelo'];
    $hume_suelo = $_POST ['hume_suelo'];
    $ph = $_POST ['ph'];
    $co2 = $_POST ['co2'];

    mysqli_query($conexion, "INSERT INTO registros (id_reg,id_zona,id_ubi,cultivo,temp_amb,hume_amb,iluminacion,temp_suelo,hume_suelo,ph,co2) VALUES ('$id_reg','$id_zona','$id_ubi',(select c.desc_cultivo as cultivo from cultivo c inner join zona z where c.id_cultivo = z.id_cultivo and z.id_zona = $id_zona and z.id_ubi = $id_ubi),'$temp_amb','$hume_amb','$iluminacion','$temp_suelo','$hume_suelo','$ph','$co2');");
   
    mysqli_close($conexion);

    echo "Datos ingresados correctamente.";
?>