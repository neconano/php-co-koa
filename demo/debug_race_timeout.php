<?php
/**
 * Created by PhpStorm.
 * User: laogui
 * Date: 17/3/28
 * Time: 下午2:13
 */
use Sukui\Client\HttpClient;
use Sukui\Task\AsyncDns;
use Sukui\Task\AsyncSleep;
use Sukui\Context;

require dirname(__FILE__)."/vendor/autoload.php";



// test
spawn(function() {
    try {
        $ip = (yield race([
            async_dns_lookup("www.baidu.com"),
            timeout(100),
        ]));
        $res = (yield (new HttpClient($ip, 80))->awaitGet("/"));
        var_dump($res->statusCode);
    } catch (\Exception $ex) {
        echo $ex;
        swoole_event_exit();
    }
});
