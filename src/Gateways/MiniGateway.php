<?php


namespace Hogus\LaravelMtaAnalytics\Gateways;


use Hogus\LaravelMtaAnalytics\Gateways\BaseClient;

class MiniGateway extends BaseClient
{
    protected $url = "https://openapi.mta.qq.com/wx/v1/";

    /**
     * 实时数据
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E5%AE%9E%E6%97%B6%E6%95%B0%E6%8D%AE-get-analyticsrealtime
     *
     * @return array|string
     */
    public function realTime()
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/real_time", $params);
    }


    /**
     * 历史趋势
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E5%8E%86%E5%8F%B2%E8%B6%8B%E5%8A%BF-get-analyticshistory
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function history(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/history", $params);
    }

    /**
     * 新老用户
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E6%96%B0%E8%80%81%E7%94%A8%E6%88%B7-get-analyticsusercompare
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function userCompare(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/user_compare", $params);
    }

    /**
     * 分享分析
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E5%88%86%E4%BA%AB%E5%88%86%E6%9E%90-get-analyticsshare
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function share(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/share", $params);
    }

    /**
     * 地域
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html?q=#%E5%9C%B0%E5%9F%9F-get-analyticsarea
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function area(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/area", $params);
    }

    /**
     * 终端信息
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E7%BB%88%E7%AB%AF%E4%BF%A1%E6%81%AF-get-analyticsterminal
     *
     * @param string $start_time
     * @param string $end_time
     * @param string $type
     * @return array|string
     */
    public function terminal(string $start_time, string $end_time, string $type)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'type' => $type
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/terminal", $params);
    }

    /**
     * 网络类型
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E7%BD%91%E7%BB%9C%E7%B1%BB%E5%9E%8B-get-analyticsnetwork
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function network(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/network", $params);
    }

    /**
     * 自定义事件
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6%E5%88%97%E8%A1%A8-get-analyticsevent
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function event(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/event", $params);
    }

    /**
     * 自定义事件详情
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6%E8%AF%A6%E6%83%85-get-analyticseventdetail
     *
     * @param string $start_time
     * @param string $end_time
     * @param $event_id
     * @return array|string
     */
    public function enentDetail(string $start_time, string $end_time, $event_id)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'event_id' => $event_id,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/event_detail", $params);
    }

    /**
     * funnel
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6-%E6%BC%8F%E6%96%97%E6%A8%A1%E5%9E%8B%E8%AF%A6%E6%83%85-get-analyticsfunnel
     *
     * @param string $start_time
     * @param string $end_time
     * @param $funnel_id
     */
    public function getFunnel(string $start_time, string $end_time, $funnel_id)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'funnel_id' => $funnel_id,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/funnel", $params);
    }

    /**
     * 漏斗模型配置
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E6%BC%8F%E6%96%97%E6%A8%A1%E5%9E%8B%E9%85%8D%E7%BD%AE-get-funnel
     *
     * @return array|string
     */
    public function funnel()
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("funnel", $params);
    }

    /**
     * 使用时段
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E4%BD%BF%E7%94%A8%E6%97%B6%E6%AE%B5-get-analyticsperiod
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function period(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/period", $params);
    }

    /**
     * 机型
     *
     * @see https://mta.qq.com/docs/wechat_mini_program_api.html#%E6%9C%BA%E5%9E%8B-get-analyticsmachine
     *
     * @param string $start_time
     * @param string $end_time
     * @return array|string
     */
    public function machine(string $start_time, string $end_time)
    {
        $params = [
            'app_id' => $this->app_id,
            'timestamp' => time(),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet("analytics/machine", $params);

    }
    /**
     * sign
     *
     * @param array $params
     * @return string
     */
    protected function sign(array $params)
    {
        $secret_key = $this->secret_key;

        ksort($params);

        foreach ($params as $key => $value) {
            $secret_key.= '&' . $key . '=' . $value;
        }

        $sign = md5($secret_key);

        return $sign;
    }
}
