<?php  namespace KevBaldwyn\NewRelic\Status;

class Item {

    protected $data;

    public function __construct(Array $data)
    {
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

}