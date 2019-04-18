<?php

namespace ChatApi\Service;

use ChatApi\Entity\Authentication;
use ChatApi\Exception\WhatsappException;
use ChatApi\Hydrator\AbstractHydrator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * AbstractWhatsappService class base whatsapp service main class for all whatsapp services
 * @package ChatApi/Service
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 **/
abstract class AbstractWhatsappService
{
    /**
     * @const AbstractWhatsappService::GET_REQUEST get request
     */
    const GET_REQUEST = 'GET';

    /**
     * @const AbstractWhatsappService::POST_REQUEST post request
     */
    const POST_REQUEST = 'POST';

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

    /**
     * send request to chat-api
     * @param string           $method       method will call with (i.e post, get ...etc)
     * @param string           $resourceName resource name
     * @param AbstractHydrator $hydrator     hyderator
     * @param array            $params       parameters will be sent
     * @return array
     * @throws WhatsappException if there's something goes wrong with the request
     */
    protected function executeRequest(
        string $method,
        string $resourceName,
        AbstractHydrator $hydrator,
        array $params = []
    ) : array {
        $http = new Client();
        try {
            $result = $http->request(
                $method,
                $this->auth->url . $resourceName,
                ['verify' => false, 'query' => array_merge($params, ['token' => $this->auth->token])]
            );
        } catch (ClientException $e) {
            throw new WhatsappException('Wrong resource called or unauthenticated token');
        } catch (\RuntimeException $e) {
            throw new WhatsappException('Wrong URL Called');
        }
        return [];
    }
}
