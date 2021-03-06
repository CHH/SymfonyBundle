<?php

namespace Prismic\Bundle\PrismicBundle\Helper;

use Ivory\HttpAdapter\HttpAdapterInterface;
use Prismic\Api;
use Prismic\Cache\CacheInterface;

class PrismicHelper
{
    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var ClientInterface|null
     */
    private $client;

    /**
     * @var CacheInterface|null
     */
    private $cache;

    /**
     * Constructor.
     *
     * @param string          $apiEndpoint
     * @param string          $accessToken
     * @param string          $clientId
     * @param string          $clientSecret
     * @param ClientInterface $client
     * @param CacheInterface  $cache
     */
    public function __construct($apiEndpoint, $accessToken, $clientId, $clientSecret, HttpAdapterInterface $client = null, CacheInterface $cache = null)
    {
        $this->apiEndpoint = $apiEndpoint;
        $this->accessToken = $accessToken;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->client = $client;
        $this->cache = $cache;
    }

    /**
     * @param string $customAccessToken
     * @return Api
     */
    public function getApiHome($customAccessToken = null)
    {
        return Api::get($this->apiEndpoint, $customAccessToken ? $customAccessToken : $this->accessToken, $this->client, $this->cache);
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

}
