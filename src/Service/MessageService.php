<?php

namespace ChatApi\Service;

use ChatApi\Entity\Authentication;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * MessageService class message service that send/receive messages
 * @package ChatApi/Service
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 **/
class MessageService extends AbstractWhatsappService
{
    /**
     * get list of messages (could be for specific chat or group)
     * @param int $lastMessageNumber - 0 for last messages only
     * @param string $chatId id for chat or group
     * @throws \Exception
     * @return array
     */
    public function getMessages(int $lastMessageNumber = 0, string $chatId = null) : array
    {
        $params = [];
        // if chat id sent will fetch messages for this chat or group only
        if ($lastMessageNumber === 0) {
            $params['last'] = 1;
        }
        // if last message number contains 0 value will fetch last messages only
        if ($lastMessageNumber === 0) {
            $params['last'] = 1;
        } else {
            $params['lastMessageNumber'] = $lastMessageNumber;
        }
        $this->executeRequest(self::GET_REQUEST, 'messages', null, $params);
        // return json_decode($res->getBody());
    }
}
