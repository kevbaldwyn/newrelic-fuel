<?php  namespace KevBaldwyn\NewRelic\Status;

use KevBaldwyn\NewRelic\Status\PingResult;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Client;

class Pinger {

    protected $urls;
    protected $httpClient;
    protected $baseHost;
    protected $okStatusCodes = [200, 301, 302];

    public function __construct(Array $urls, $baseHost, ClientInterface $httpClient = null)
    {
        if(is_null($httpClient)) {
            $httpClient = new Client();
        }
        $this->urls = $urls;
        $this->httpClient = $httpClient;
    }

    public function ping()
    {
        $res = $this->interrogateUrls();
        return new PingResult($res);
    }

    public function interrogateUrls()
    {
        $return = [];
        foreach($this->urls as $url => $regEx) {
            $res = $this->httpClient->get($this->baseHost . $url);
            $result = (!in_array($res->getResponse()->getStatusCode(), $this->okStatusCodes)) ?
                            PingResult::STATUS_PROBLEM :
                            $this->matchRegEx($res->getResponse()->getBody(), $regEx);
            $return[$url] = [
                'status' => $res->getResponse()->getStatusCode(),
                'result' => $result
            ];
        }
        return $return;
    }

    public function matchRegEx($response, $regEx)
    {
        if(preg_match('/' . $regEx . '/', $response)) {
            return PingResult::STATUS_OK;
        }
        return PingResult::STATUS_PROBLEM;
    }
} 