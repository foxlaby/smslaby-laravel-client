<?php

namespace FoxLaby\SMSLaby;

use FoxLaby\SMSLaby\Config;

use Exception;

class Send
{
    /**
     * @var instance Reference to class instance
     */
    private static $instance = null;

    /**
     * Initialize Send sms.
     *
     * @param string $hash_key
     * @return object
     */
    public static function init($hash_key = '')
    {
        if (self::$instance !== null) {
            return self::$instance;
        }
        return self::$instance = new self($hash_key);
    }
    
    /**
     * Create a new Send Instance
     * @param string $hash_key
     * @return object
     */
    public function __construct($hash_key = '') {
        $this->config = new Config($hash_key);
        $this->call = new CallServer($this->config);
        return $this;
    }

    /**
     * Add lang alpha-2
     * @param string $lang
     * @return object this class
     */
    public function lang($lang)
    {
        if (!in_array($lang, ['ar', 'en'])) {
            throw new Exception('The selected language is not accepted.');
        }

        $this->config['lang'] = $lang;
        return $this;
    }

    /**
     * Add the recipient number
     * @param string $number
     * @return object this class
     */
    public function to($number)
    {
        $this->config['to'] = $number;
        return $this;
    }

    /**
     * Choose sandbox mode
     * @param string $mode
     * @return object this class
     */
    public function sandbox($mode)
    {
        if ($mode) {
            $mode = 'sandbox';
        }

        $this->config['mode'] = $mode;
        return $this;
    }

    /**
     * Write the content of the message
     * @param string $body
     * @return array from run method in call class
     */
    public function message($body)
    {
        $this->config['message'] = $body;
        return $this->call->run();
    }
}