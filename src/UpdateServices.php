<?php


namespace ElePHPant\UpdateServices;


/**
 * Class UpdateServices
 *
 * Please report bugs on https://github.com/wilderamorim/updateservices/issues
 *
 * @package ElePHPant\UpdateServices
 * @author Wilder Amorim <agencia@uebi.com.br>
 * @copyright Copyright (c) 2020, Uebi. All rights reserved
 * @license MIT License
 */
class UpdateServices
{
    /** @var string */
    private $name;

    /** @var string */
    private $url;

    /** @var string|null */
    private $rss;

    /**
     * @var array|null
     * @link https://codex.wordpress.org/Update_Services
     * @link https://codex.wordpress.org/pt-br:Servi%C3%A7os_de_Atualiza%C3%A7%C3%A3o
     */
    private $services = [];

    /**
     * UpdateServices constructor.
     * @param string $name
     * @param string $url
     * @param string|null $rss
     * @param array|null $services
     */
    public function __construct(string $name, string $url, ?string $rss = null, ?array $services = [])
    {
        $this->name = $name;
        $this->url = $url;
        $this->rss = $rss;
        $this->services = $services;
    }

    /**
     * @return bool|string
     * @link https://pingomatic.com/
     */
    public function pingOMatic()
    {
        $fields = http_build_query([
            'title' => $this->name,
            'blogurl' => $this->url,
            'rssurl' => $this->rss,

            //Services to Ping
            'chk_blogs' => 'on',        // Blo.gs (http://blo.gs/)
            'chk_feedburner' => 'on',   // Feed Burner (http://feedburner.com/)
            'chk_tailrank' => 'on',     // Spinn3r (http://spinn3r.com/)
            'chk_superfeedr' => 'on'    // Superfeedr (http://superfeedr.com/)
        ]);

        return $this->ping("https://pingomatic.com/ping/?{$fields}", $fields);
    }

    /**
     * @return bool
     */
    public function all(): bool
    {
        foreach ($this->services as $service) {
            $this->ping($service, $this->xml());
        }

        $this->pingOMatic();

        return true;
    }

    /**
     * @return mixed
     * @link http://blo.gs/ping-example.php
     */
    private function xml()
    {
        $xml = new \SimpleXMLIterator('<?xml version="1.0" encoding="UTF-8"?><methodCall/>');
        $xml->addChild('methodName', 'weblogUpdates.extendedPing');
        $params = $xml->addChild('params');

        foreach ([$this->name, $this->url, $this->rss] as $item) {
            $param = $params->addChild('param');
            $param->addChild('value', $item);
        }

        return $xml->asXML();
    }

    /**
     * @param string $url
     * @param string $fields
     * @return bool|string
     */
    private function ping(string $url, string $fields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}