<?php
    header("Content-Type: application/json; charset=UTF-8");
    $json = file_get_contents("http://52.230.83.207/meal_api.php?countryCode=stu.cbe.go.kr&schulCode=M100000981&insttNm=%EB%AF%B8%EB%8D%95%EC%A4%91%ED%95%99%EA%B5%90&schulCrseScCode=3&schMmealScCode=2");
    $result=json_decode($json, true);
    echo(json_encode($result));
?>