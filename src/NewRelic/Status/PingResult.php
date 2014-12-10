<?php  namespace KevBaldwyn\NewRelic\Status; 


class PingResult {

    const STATUS_OK      = 'OK';
    const STATUS_PROBLEM = 'PROBLEM';

    protected $results = array();

    public function __construct(Array $array)
    {
        foreach($array as $url => $item) {
            $obj = new Item($url, $item);
            $this->results[] = $obj;
        }
    }

    public function getResult()
    {
        foreach($this->all() as $item) {
            if($item->getResult() == self::STATUS_PROBLEM) {
                return self::STATUS_PROBLEM;
            }
        }
        return self::STATUS_OK;
    }

    public function all()
    {
        return $this->results;
    }

} 