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

    public function getBaseUri()
    {
        return $this->url;
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
