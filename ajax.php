<?php
// By Adesign
// 接口均来源于网络如有侵权联系我删除
error_reporting(0);

$_request = isset($_REQUEST) ? $_REQUEST: null;

switch($_request['act']) {

    # QQ小工具
    case 'tools':
    $qq = $_POST['qq'];
    $type = $_POST['type'];
    if(empty($qq)) {
        exit(json_encode(['code' => '-1', 'info' => 'QQ账号不能为空！']));
    }
    if(preg_match('/^[0-9]{11}$/', $qq)) {
        exit(json_encode(['code' => '-1', 'info' => '请输入正确QQ账号！']));
    }
    if($type == 'data') {
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if(strpos($agent,'windows nt')){
          $loca = "tencent://ContactInfo/?subcmd=ViewInfo&puin=0&uin={$qq}";
        }elseif(strpos($agent,'iphone')){
          $loca = "mqq://im/chat?chat_type=wpa&uin={$qq}&version=1&src_type=web";
        }elseif(strpos($agent,'android')){
          $loca = "mqq://card/show_pslcard?src_type=internal&version=1&uin={$qq}&card_type=person&source=sharecard";
        }else{
            exit(json_encode(['code' => '-1', 'info' => '未知设备！']));
        }
        if(empty($loca)==false){
            exit(json_encode([
                'code' => '1',
                'info' => 'ok',
                'data' => [
                    'type' => 'talk',
                    'domain' => $loca
                ]
            ]));
        }
    }elseif($type == 'talk') {
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if(strpos($agent,'windows nt')){
          $loca = "tencent://message/?Menu=yes&uin={$qq}&Site=&Service=201&sigT=c66448f8ca24db68219eca617eff6c4ff5a26353acc48e29df2b4789998940d1000867caed78b0dc3e8c35acbbf6fa8d&sigU=809fc02497521090077da44b01aa5d1e001ab95480135263bb507a3b81c48cdaa204aa4abf65e7c2";
        }elseif(strpos($agent,'android')){
          $loca = "mqqwpa://im/chat?chat_type=wpa&uin={$qq}&version=1&src_type=web&web_src=oicqzone.com";
        }else{
            exit(json_encode(['code' => '-1', 'info' => '未知设备！']));
        }
        if(empty($loca)==false){
            exit(json_encode([
                'code' => '1',
                'info' => 'ok',
                'data' => [
                    'type' => 'talk',
                    'domain' => $loca
                ]
            ]));
        }
    }elseif($type == 'qtapi') {
         $data = json_decode(get_curl("http://cdn.79tian.com/api/qtapi/index.php?act=ssid",[
            'post'=>[
                'qq' => $qq,
                'page' => 2
            ]
        ]),true);
        if($data['code'] == '1') {
            exit(json_encode([
                'code' => '1',
                'info' => 'ok',
                'data' => [
                    'type' => 'qtapi',
                    'content' => $data['data']
                ]
            ]));
        }else{
            exit(json_encode(['code' => '-1', 'info' => $data['msg']]));
        }
    }else{
        exit(json_encode(['code' => '-1', 'info' => '你 ma ma si le！']));
    }
    break;
    
    # 语音包查询
    case 'kingQuery':
    $msg = $_REQUEST["name"];
    function get_rwid($msg) {
        $id = array(
            "艾琳" => 155,
            "阿古朵" => 533,
            "阿轲" => 116,
            "安琪拉" => 142,
            "白起" => 120,
            "百里守约" => 196,
            "百里玄策" => 195,
            "扁鹊" => 119,
            "蔡文姬" => 184,
            "曹操" => 128,
            "成吉思汗" => 141,
            "程咬金" => 144,
            "嫦娥" => 515,
            "达摩" => 134,
            "妲己" => 109,
            "大乔" => 191,
            "狄仁杰" => 133,
            "典韦" => 129,
            "貂蝉" => 141,
            "东皇太一" => 187,
            "暃" => 542,
            "干将莫邪" => 182,
            "高渐离" => 115,
            "公孙离" => 199,
            "关羽" => 140,
            "鬼谷子" => 189,
            "宫本武藏" => 130,
            "伽罗" => 508,
            "戈娅" => 548,
            "韩信" => 150,
            "后羿" => 169,
            "花木兰" => 154,
            "黄忠" => 192,
            "金蝉" => 540,
            "姜子牙" => 148,
            "镜" => 531,
            "铠" => 193,
            "狂铁" => 583,
            "澜" => 528,
            "兰陵王" => 153,
            "李白" => 131,
            "老夫子" => 139,
            "李元芳" => 173,
            "廉颇" => 105,
            "刘邦" => 149,
            "刘备" => 170,
            "刘禅" => 114,
            "鲁班大师" => 525,
            "鲁班" => 112,
            "露娜" => 146,
            "吕布" => 123,
            "李信" => 507,
            "马可波罗" => 132,
            "蒙犽" => 524,
            "蒙恬" => 527,
            "米莱迪" => 504,
            "马超" => 518,
            "芈月" => 121,
            "明世隐" => 501,
            "墨子" => 108,
            "哪吒" => 180,
            "牛魔" => 168,
            "女娲" => 179,
            "盘古" => 529,
            "裴擒虎" => 502,
            "上官婉儿" => 513,
            "沈梦溪" => 312,
            "司马懿" => 137,
            "苏烈" => 194,
            "孙膑" => 118,
            "孙悟空" => 167,
            "孙策" => 510,
            "孙尚香" => 111,
            "司空震" => 537,
            "桑启" => 534,
            "太乙真人" => 186,
            "王昭君" => 152,
            "武则天" => 136,
            "夏侯敦" => 126,
            "项羽" => 135,
            "小乔" => 106,
            "西施" => 523,
            "夏洛特" => 536,
            "瑶" => 505,
            "曜" => 522,
            "云中君" => 506,
            "雅典娜" => 183,
            "云缨" => 538,
            "亚瑟" => 166,
            "杨戬" => 178,
            "杨玉环" => 176,
            "弈星" => 197,
            "嬴政" => 110,
            "虞姬" => 174,
            "元歌" => 125,
            "张飞" => 171,
            "张良" => 156,
            "赵云" => 107,
            "甄姬" => 127,
            "钟馗" => 175,
            "钟无艳" => 117,
            "周瑜" => 124,
            "诸葛亮" => 190,
            "猪八戒" => 511,
            "庄周" => 113,
        );
        return $id[$msg];
    }
    $rw=get_rwid($msg);
    $url=file_get_contents("https://pvp.qq.com/zlkdatasys/storyhero/index".$rw.".json");
    $data=preg_match_all('/{"yywa1_f2":"(.*?)","yyyp_9a":"(.*?)"}/',$url,$list);
    function unicodeDecode($aa) {
        $json = '{"str":"'.$aa.'"}';
        $arr = json_decode($json,true);
        if(empty($arr)) return '';
        return $arr['str'];
    }
    if($msg == null) {
        $Json = array('code' => -1, 'info' => '请输入要查询的英雄');
    } else {
        if($rw == null) {
            $Json = array('code' => -1, 'info' => '王者英雄不存在');
        } else {
            for ($i=0; $i <$data ; $i++) {
                $ii = $i+1;
                $aa=$list[1][$i];
                $aa=unicodeDecode($aa);
                $bb=$list[2][$i];
                $bb=str_replace("\/","/",$bb);
                $array[] = array('id' => $ii, 'lines' =>$aa, 'voice' =>'https:'.$bb);
            }
            $Json = array(
                'code' => 1,
                'info' => '获取成功',
                'hero' => $msg,
                'count' => count($array),
                'img'  => 'https://game.gtimg.cn/images/yxzj/img201606/skin/hero-info/'.$rw.'/'.$rw.'-bigskin-1.jpg',
                'data' => $array
            );
        }
    }
    header('Content-Type:application/json');
    $Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    echo stripslashes($Json);
    return $Json;
    break;

    default:
        exit(json_encode(['code' => '-1', 'info' => 'No act！']));
    break;
}
function get_curl($url, $paras = array())
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if (@$paras['Header']) {
        $Header = $paras['Header'];
    } else {
        $Header[] = "Accept:*/*";
        $Header[] = "Accept-Encoding:gzip,deflate,sdch";
        $Header[] = "Accept-Language:zh-CN,zh;q=0.8";
        $Header[] = "Connection:close";
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $Header);
    if (@$paras['ctime']) { // 连接超时
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $paras['ctime']);
    } else {
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    }
    if (@$paras['rtime']) { // 读取超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $paras['rtime']);
    }
    if (@$paras['post']) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paras['post']);
    }
    if (@$paras['header']) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    if (@$paras['cookie']) {
        curl_setopt($ch, CURLOPT_COOKIE, $paras['cookie']);
    }
    if (@$paras['refer']) {
        if ($paras['refer'] == 1) {
            curl_setopt($ch, CURLOPT_REFERER, 'http://m.qzone.com/infocenter?g_f=');
        } else {
            curl_setopt($ch, CURLOPT_REFERER, $paras['refer']);
        }
    }
    if (@$paras['ua']) {
        curl_setopt($ch, CURLOPT_USERAGENT, $paras['ua']);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
    }
    if (@$paras['nobody']) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (@$paras['GetCookie']) {
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        preg_match_all("/Set-Cookie: (.*?);/m", $result, $matches);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($result, 0, $headerSize); //状态码
        $body = substr($result, $headerSize); //响应内容
        $ret = [
            "Cookie" => $matches, "body" => $body, "code" => $header
        ];
        curl_close($ch);
        return $ret;
    }
    $ret = curl_exec($ch);
    if (@$paras['loadurl']) {
        $Headers = curl_getinfo($ch);
        $ret = $Headers['redirect_url'];
    }
    curl_close($ch);
    return $ret;
}
?>