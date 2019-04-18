<?php

namespace ChatApi\Entity;

/**
 * AbstractEntity class bese entity class will be a parent for all entities
 * @package ChatApi/Entity
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 **/
class AbstractEntity
{
    /**
     * @var string chat-api token
     */
    public $token;

    /**
     * @var string chat-api url will call at
     */
    public $url;

    /**
     * AbstractEntity constructor.
     * @var string $token chat-api token
     * @var string $url   chat-api url
     */
    public function __construct(string $token, string $url)
    {
        $this->token = trim($token);
        $this->url   = trim($url);
    }
}
