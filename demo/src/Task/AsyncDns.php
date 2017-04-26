<?php
/**
 * Created by PhpStorm.
 * User: laogui
 * Date: 17/3/30
 * Time: 下午2:07
 */
namespace Sukui\Task;
use React\EventLoop\Factory;

class AsyncDns implements Async {


    public function begin(callable $cc){
//        $loop = Factory::create();
//        $factory = new \React\Dns\Resolver\Factory();
//        $dns = $factory->createCached('223.6.6.6',$loop);
//        $dns->resolve("www.baidu.com")->then(function ($ip)use($cc){
//            $cc($ip);
//        },function (\Exception $e){
//            echo $e->getMessage();
//        });
//        $loop->run();
        swoole_async_dns_lookup("www.baidu.com",function ($host,$ip)use($cc){
            $cc($ip);
        });
    }
}