<?php

require dirname(__DIR__, 1) . '/vendor/autoload.php';


use ElePHPant\UpdateServices\UpdateServices;

$pingServices = [
    'http://rpc.pingomatic.com',
    'http://rpc.twingly.com',
    'http://api.feedster.com/ping',
    'http://api.moreover.com/RPC2',
    'http://api.moreover.com/ping',
    'http://www.blogdigger.com/RPC2',
    'http://www.blogshares.com/rpc.php',
    'http://www.blogsnow.com/ping',
    'http://www.blogstreet.com/xrbin/xmlrpc.cgi',
    'http://bulkfeeds.net/rpc',
    'http://www.newsisfree.com/xmlrpctest.php',
    'http://ping.blo.gs/',
    'http://ping.feedburner.com',
    'http://ping.syndic8.com/xmlrpc.php',
    'http://ping.weblogalot.com/rpc.php',
    'http://rpc.blogrolling.com/pinger/',
    'http://rpc.technorati.com/rpc/ping',
    'http://rpc.weblogs.com/RPC2',
    'http://www.feedsubmitter.com',
    'http://blo.gs/ping.php',
    'http://www.pingerati.net',
    'http://www.pingmyblog.com',
    'http://geourl.org/ping',
    'http://ipings.com',
    'http://www.weblogalot.com/ping',
];

(new UpdateServices('My Blog', 'https://domain.com', 'https://domain.com/rss.xml', $pingServices))->all();

#Blog Name, Blog Home Page, RSS URL (optional)
//(new UpdateServices('My Blog', 'https://domain.com', 'https://domain.com/rss.xml'))->pingOMatic();
