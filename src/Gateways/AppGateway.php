<?php


namespace Hogus\LaravelMtaAnalytics\Gateways;


class AppGateway extends BaseClient
{
    /**
     * 应用基本指标-离线数据
     *
     * @param array $params
     * @return array|string
     */
    public function getUserOfficeData(array $params)
    {
        $uri = "/ctr_user_basic/get_offline_data";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * 应用基本指标-实时数据
     *
     * @param array $params
     * @return array|string
     */
    public function getUserRealtimeData(array $params)
    {
        $uri = "/ctr_user_basic/get_realtime_data";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * 终端设备数据-离线数据
     *
     * @param string $start_date
     * @param string $end_date
     * @param int $type
     * @param $idx
     * @param null $version
     * @return array|string
     */
    public function getTerminalOfficeData(array $params)
    {
        $uri = "/ctr_terminal/get_offline_data";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * 用户活跃度
     *
     * @param array $params
     * @return array|string
     */
    public function getActiveAnalOfficeData(array $params)
    {
        $uri = "/ctr_active_anal/get_offline_data";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * 用户行为分析
     *
     * @param array $params
     * @return array|string
     */
    public function getUsageAnalOfficeData(array $params)
    {
        $uri = "/ctr_usage_anal/get_offline_data";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * 使用频率分析
     *
     * @param array $params
     * @return array|string
     */
    public function getUsageAnalFreqDis(array $params)
    {
        $uri = "/ctr_usage_anal/get_freq_dis";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * 用户留存率
     *
     * @return array|string
     */
    public function getUserRetentionOfficeData(array $params)
    {
        $uri = "/ctr_user_retention/get_offline_data";

        return $this->httpGet($uri, $this->formatQuerys($params, $uri));
    }

    /**
     * formatQuerys
     *
     * @param array $params
     * @param string $uri
     * @return array
     */
    protected function formatQuerys(array $params, string $uri)
    {
        $params['app_id'] = $this->app_id;

        $params['sign'] = $this->sign($params, $uri);

        ksort($params);

        return $params;
    }

    /**
     * sign
     *
     * @param array $params
     * @param $url
     * @param string $method
     * @return string
     */
    protected function sign(array $params, $url, $method = 'get')
    {
        $soucr_str = strtoupper($method) .'&' .urlencode($url) . '&';

        ksort($params);

        $str = '';

        foreach ($params as $key => $value) {
            $str .= '&'.$key .'='.$value;
        }

        $str = substr($str, 1, strlen($str));

        $soucr_str .= urlencode($str);

        $soucr_str = str_replace('~', '%7E', $soucr_str);

        $sign = hash_hmac("sha1", $soucr_str, strtr($this->secret_key .'&', '-_', '+/'));

        $sign = md5($sign);

        return $sign;
    }
}
