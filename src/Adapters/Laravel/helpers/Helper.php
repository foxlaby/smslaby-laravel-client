<?php

use FoxLaby\SMSLaby\Send;

/**
 * Use as a function
 * @param string $hash_key
 * @return object
 */
function smslaby()
{
    return (new Send(env('SMSLABY_HASH_KEY', '')));
}