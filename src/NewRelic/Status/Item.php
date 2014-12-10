<?php  namespace KevBaldwyn\NewRelic\Status;

class Item {

    protected $url;
    protected $data;

    public function __construct($url, Array $data)
    {
        $this->url = $url;
        $this->data = $data;
    }

    public function getStatus()
    {
        return $this->data['status'];
    }

    public function getResult()
    {
        return $this->data['result'];
    }

    public function getUrl()
    {
        return $this->url;
    }

}