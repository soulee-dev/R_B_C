
    <?php
/*
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
*/
    header("Content-Type: application/json; charset=UTF-8");
    //error_reporting(0);
    $rawdata = file_get_contents("php://input");
    $data = json_decode($rawdata);
    $content = strval($data->content);
    $userkey = strval($data->user_key);

    $answer = array(
        "message" => array(
        "text"=>"서버에 문제가 있어 보이네요..."
      ),"keyboard"=>array("type"=>"buttons",
      "buttons"=>array("오늘의급식", "내일의급식", "날씨", "개발자","챗봇아 손","챗봇아 발","쓰담쓰담"))
        );
    switch ($content) {
        case "개발자":
            $anstxt = "안녕하세요, 이것이리얼미덕중의급식이생각대로보이는챗의 개발자 미덕중학교 3학년 3반 민준혁입니다.";
            break;
        case "오늘의급식":
            $json = file_get_contents("http://52.230.83.207:5000/meal_today");
            $result=json_decode($json, true);
            $final=$result['메뉴'];
            $anstxt = "오늘의 급식이랄까 ".$final;
            break;
        case "내일의급식":
            $anstxt = "아직은 눌러도 해줄말이 없다고 (/ㅇwㅇ)/";
            break;
        case "날씨":
            $anstxt = "아직은 눌러도 해줄말이 없다고 (/ㅇwㅇ)/";
            break;
        case "챗봇아 손":
            $anstxt = "핥짝";
            break;
        case "챗봇아 발":
            $anstxt = "인체는 약 206개의 뼈로 구성돼 있는데 그 중 발에만 양쪽합쳐 52개의 뼈가 있다.";
            break;
        case "쓰담쓰담":
            $anstxt = "냐앙~♥";
            break;
    }
    $answer["message"]["text"]=strval($anstxt);
    echo(json_encode($answer));
    ?>
