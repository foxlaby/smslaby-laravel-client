<?php

namespace FoxLaby\SMSLaby;

use FoxLaby\SMSLaby\Config;

use Illuminate\Support\Facades\Http;

class CallServer
{
    /**
     * Create a new CallServer Instance
     * @param object $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }

    /**
     * When you run  it sends information to the server
     * @return array Results
     */
    public function run()
    {
        $response = Http::withHeaders($this->config['headers'])
            ->post($this->config['endpoint'], [
                'lang' => $this->config['lang'],
                'number' => $this->config['to'],
                'body' => $this->config['message'],
                'mode' => $this->config['mode'],
            ]);

        return $response;
    }
}