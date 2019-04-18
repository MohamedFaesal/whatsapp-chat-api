<?php

namespace ChatApi\Entity;

/**
 * Authentication class entity that contains chat api credentials
 * @package ChatApi/Entity
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 **/
class Authentication
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
   * Authentication contructor
   * @var string $token chat-api token
   * @var string $url   chat-api url
   */
  public function __construct(string $token, string $url)
  {
    $this->token = $token;
    $this->url   = trim($url);
  }
}
