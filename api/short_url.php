<?php
if ($_POST['mode'] == "transurl") {

    $url = sprintf("%s?url=%s", "https://openapi.naver.com/v1/util/shorturl.xml", $_POST['query']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    $headers = array(
        "X-Naver-Client-Id: YOUR_CLIENT_ID",
        "X-Naver-Client-Secret: YOUR_CLIENT_SECRET"
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $xml = simplexml_load_string($output, 'SimpleXMLElement', LIBXML_NOCDATA);

    if ($httpCode == 200) {
        $transUrl = $xml->result->url;
        $orgUrl = $xml->result->orgUrl;
        $qr = $xml->result->url.".qr";
    } else {
        $errorFormat = "단축 URL 생성에 문제가 있습니다. errorCode:%d, errorMessage:%s";
        $message = sprintf($errorFormat, $xml->errorCode, $xml->errorMessage);
    }

    curl_close($ch);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ko">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <title>ShortURL API</title>

        <style>
        body,p,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dt,dd,table,th,td,form,fieldset,legend,input,textarea,button,select{margin:0;padding:0}
        body,input,textarea,select,button,table{font-family:'돋움',Dotum,AppleGothic,sans-serif;font-size:12px}
        img,fieldset{border:0}
        ul,ol{list-style:none}
        em,address{font-style:normal}
        a{text-decoration:none}
        a:hover,a:active,a:focus{text-decoration:underline}
        .search_shop {margin: 10px;}
        .result{ margin: 20px;}
        .srch{width:100%;padding:5px 0; margin: 0px 10px;}
        .srch legend{overflow:hidden;visibility:hidden;position:absolute;top:0;left:0;width:1px;height:1px;font-size:0;line-height:0}
        .srch{color:#c4c4c4;text-align:left}
        .srch span{color:#000;text-align:left}
        .srch select,.srch input{margin:-1px 0 1px;font-size:12px;color:#373737;vertical-align:middle}
        .srch .keyword{margin-left:1px;padding:2px 3px 5px;border:1px solid #b5b5b5;font-size:12px;line-height:15px; width: 300px;}
        .tbl_type,.tbl_type th,.tbl_type td{border:0}
        .tbl_type{width:100%;border-bottom:2px solid #dcdcdc;font-family:Tahoma;font-size:11px;text-align:center}
        .tbl_type caption{display:none}
        .tbl_type th{padding:7px 0 4px;border-top:2px solid #dcdcdc;background-color:#f5f7f9;color:#666;font-family:'돋움',dotum;font-size:12px;font-weight:bold}
        .tbl_type td{padding:6px 0 4px;border-top:1px solid #e5e5e5;color:#4c4c4c}
        </style>
</head>
<body>
        <div class="search_shop">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="mode" value="transurl" />
        <fieldset class="srch">
                <legend>검색 영역</legend>
                <span>원본 URL</span> <input type="text" name="query" id="query" accesskey="s" title="URL" class="keyword" value="http://www.naver.com">
                <input type="submit" id="search" value="변환" />
        </fieldset>
        </form>
        <div><?php echo $message; ?></div>
        <table cellspacing="0" border="1" summary="단축 URL API 결과" class="tbl_type">
        <caption>단축 URL API 결과</caption>
                <colgroup>
                        <col width="40%">
                        <col width="40%">
                        <col width="20%">
                </colgroup>
                <thead>
                        <tr>
                        <th scope="col">원본 URL</th>
                        <th scope="col">단축 URL</th>
                        <th scope="col">QR CODE</th>
                        </tr>
                </thead>
                <tbody id="list">
                        <tr>
                                <td><?php echo $orgUrl; ?></td>
                                <td><a href="<?php echo $transUrl; ?>" width="84px" height="84px" target="_blank"><?php echo $transUrl; ?></a></td>
                                <td><img src="<?php echo $qr; ?>" /></td>
                        </tr>
                </tbody>
        </table>
        </div>
</body>
</html>
