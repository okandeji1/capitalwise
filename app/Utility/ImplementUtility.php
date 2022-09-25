<?php

namespace App\Utility;

use App\Utility\UtilityInterface;

abstract class ImplementUtility implements UtilityInterface{
    protected $ELASTIC_API_KEY;
    protected $ELASTIC_FROM;
    protected $ELASTIC_SENDER;
    protected $fromName;

    public function __construct()
    {
        $this->ELASTIC_API_KEY =  config('app.ELASTIC_API_KEY');
        $this->ELASTIC_FROM =  config('app.ELASTIC_FROM');
        $this->ELASTIC_SENDER =  config('app.ELASTIC_SENDER');
        $this->fromName =  config('app.name');
    }

    public function sendEmail($options)
    {
        $elasticUrl = 'https://api.elasticemail.com/v2/email/send?';
        $emailDAta = [
            'apikey' => $this->ELASTIC_API_KEY,
            'from' => $this->ELASTIC_FROM,
            'fromName' => $this->fromName,
            'sender' => $this->ELASTIC_SENDER,
        ];

        foreach ($emailDAta as $key1 => $value1) {
            $elasticUrl .= '&' .$key1 .'=' .$value1;
        }

        foreach ($options as $key2 => $value2) {
            $elasticUrl .= '&' .$key2 .'=' .$value2;
        }

        return $elasticUrl;
    }
}