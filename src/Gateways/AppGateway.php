<?php


namespace Hogus\LaravelMtaAnalytics\Gateways;


class AppGateway extends BaseClient
{
    public function getOfficeData()
    {
        $url = "/ctr_user_basic/get_offline_data";

        $params['sign'] = $this->sign($params, $url);

        $this->httpGet($url);
    }

    protected function params()
    {
        $params = [
            'app_id' => $this->app_id
        ];
    }

    protected function sign(array $params, $url, $method = 'get')
    {
        $secret_key = $this->secret_key;

        $soucr_str = $secret_key .'&' .strtoupper($method) .'&' .urlencode($url) . '&';

        ksort($params);

        $str = '';

        foreach ($params as $key => $value) {
            $str .= '&'.$key .'='.$value;
        }

        $str = substr($str, 1, strlen($str));

        $soucr_str .= urlencode($str);

        $soucr_str = str_replace('~', '%7E', $soucr_str);

        $sign = hash_hmac("sha1", $soucr_str, strtr($secret_key, '-_', '+/'));

        $sign = md5($sign);

        return $sign;
    }
}
