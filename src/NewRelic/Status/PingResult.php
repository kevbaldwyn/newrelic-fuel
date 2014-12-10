<?php  namespace KevBaldwyn\NewRelic\Status; 


class PingResult {

    const STATUS_OK      = 'OK';
    const STATUS_PROBLEM = 'PROBLEM';

    protected $results = array();

    public function __construct(Array $array)
    {
        foreach($array as $item) {
            $obj = new Item($item);
            $this->results[] = $item;
        }
    }

    public function all()
    {
        return $this->results;
    }

} 