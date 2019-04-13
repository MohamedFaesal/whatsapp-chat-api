<?php

namespace ChatApi\Service;

use ChatApi\Entity\Authentication;

/**
 * AbstractWhatsappService class base whatsapp service main class for all whatsapp services
 * @package ChatApi/Service
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 **/
abstract class AbstractWhatsappService
{    
  /**
   * @var Authentication chat-api authentication credentials
   */
  protected $auth;

  /**
   * AbstractWhatsappService contructor
   * @var Authentication $auth chat-api authentication credentials
   */
  public function __construct(Authentication $auth)
  {
    $this->auth = $auth;
  }
}
