<?php


namespace Hogus\LaravelMtaAnalytics\Gateways;


use Hogus\LaravelMtaAnalytics\MtaAnalyticsManager;
use Hogus\LaravelMtaAnalytics\Supports\HttpRequest;

class BaseClient
{
    use HttpRequest;

    protected $url = "https://openapi.mta.qq.com";

    protected $contentType = 'json';

    protected $app_id;

    protected $secret_key;

    public function __construct($app_id, $secret_key)
    {
        $this->app_id = $app_id;

        $this->secret_key = $secret_key;
    }

    /**
     * getBaseUri
     *
     * @return string
     */
    public function getBaseUri()
    {
        return $this->url;
    }

    /**
     * setAppid
     *
     * @param $value
     * @return $this
     */
    public function setAppid($value)
    {
        $this->app_id = $value;
        
        return $this;
    }

    /**
     * setSecretKey
     *
     * @param $value
     * @return $this
     */
    public function setSecretKey($value)
    {
        $this->secret_key = $value;
        
        return $this;
    }
    /**
     * formatToString
     *
     * @param array|string $values
     * @return string
     */
    public function formatToString($values)
    {
        return is_array($values) ? implode(',', $values) : $values;
    }

    /**
     * formatUrlencode
     *
     * @param array|string $values
     * @return string
     */
    public function formatUrlencode($values)
    {
        return is_array($values) ? implode(',', array_map(function ($value) {
            return urlencode($value);
        }, $values)) : urlencode($values);
    }
}
