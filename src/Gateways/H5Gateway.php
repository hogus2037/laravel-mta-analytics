<?php


namespace Hogus\LaravelMtaAnalytics\Gateways;


use Hogus\LaravelMtaAnalytics\Gateways\BaseClient;

/**
 * Class Client
 * @package Hogus\LaravelMtaAnalytics\Gateways\H5
 */
class H5Gateway extends BaseClient
{
    /**
     * @var string
     */
    protected $url = "https://mta.qq.com/h5/api/";

    /**
     * 应用历史趋势
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E5%BA%94%E7%94%A8%E5%8E%86%E5%8F%B2%E8%B6%8B%E5%8A%BF
     *
     * @param string $start_date Y-m-d
     * @param string $end_date Y-m-d
     * @param array|string $idx pv,uv,vv,iv
     * @return array|string
     */
    public function coreData(string $start_date, string $end_date, $idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_core_data', $params);
    }

    /**
     * 应用实时小时数据
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E5%BA%94%E7%94%A8%E5%AE%9E%E6%97%B6%E5%B0%8F%E6%97%B6%E6%95%B0%E6%8D%AE
     *
     * @param array|string $idx pv,uv,vv,iv
     * @return array|string
     */
    public function getRealtimeByHour($idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_realtime/get_by_hour', $params);
    }

    /**
     * 应用心跳数据
     *
     * 应用当前pv\uv\vv\iv心跳数据数据
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E5%BA%94%E7%94%A8%E5%BF%83%E8%B7%B3%E6%95%B0%E6%8D%AE
     *
     * @return array|string
     */
    public function heartbeat()
    {
        $params = [
            'app_id' => $this->app_id,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_realtime/heartbeat', $params);
    }

    /**
     * 实时访客
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E5%AE%9E%E6%97%B6%E8%AE%BF%E5%AE%A2
     *
     * @param int $page
     * @return array|string
     */
    public function userRealtime(int $page = 1)
    {
        $params = [
            'app_id' => $this->app_id,
            'page' => $page
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_user_realtime', $params);
    }

    /**
     * 新老访客比
     * 按天查询当天新访客与旧访客的数量
     * @see https://mta.qq.com/docs/h5_api.html#%E6%96%B0%E8%80%81%E8%AE%BF%E5%AE%A2%E6%AF%94
     *
     * @param string $start_date
     * @param string $end_date
     * @return array|string
     */
    public function userCompare(string $start_date, string $end_date)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_user_compare', $params);
    }

    /**
     * 用户画像
     * 在H5统计平台查询用户画像数据，包含性别比例、年龄分布、学历分布、职业分布。接口的数据为pv量
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E7%94%A8%E6%88%B7%E7%94%BB%E5%83%8F
     *
     * @param string $start_date
     * @param string $end_date
     * @param array|string $idx sex\age\grade\profession
     * @return array|string
     */
    public function userPortrait(string $start_date, string $end_date, $idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_user_portrait', $params);
    }


    /**
     * 客户端分析-地区数据
     * 按天查询地区的pv\uv\vv\iv量
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E5%9C%B0%E5%8C%BA%E6%95%B0%E6%8D%AE
     * @see https://mta.qq.com/docs/h5_api.html#%E5%B8%82%E5%AD%97%E5%85%B8 城市数据
     *
     * @param string $start_date
     * @param string $end_date
     * @param array|string $idx
     * @param array|string $type_ids
     * @return array|string
     */
    public function getArea(string $start_date, string $end_date, $idx, $type_ids)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx),
            'type_ids' => $this->formatToString($type_ids)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_area/get_by_area', $params);
    }

    /**
     * 省市数据
     * 按天查询省市下有流量的城市的pv\uv\vv\iv量
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E7%9C%81%E5%B8%82%E6%95%B0%E6%8D%AE
     * @see https://mta.qq.com/docs/h5_api.html#%E7%9C%81%E5%B8%82%E5%AD%97%E5%85%B8 省市数据
     *
     * @param string $start_date
     * @param string $end_date
     * @param array|string $idx
     * @param array|string $type_ids
     * @return array|string
     */
    public function getProvince(string $start_date, string $end_date, $idx, $type_ids)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx),
            'type_ids' => $this->formatToString($type_ids)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_area/get_by_province', $params);
    }

    /**
     *
     * 运营商
     * 按天查询运营商的pv\uv\vv\iv量
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E8%BF%90%E8%90%A5%E5%95%86
     *
     * @param string $start_date
     * @param string $end_date
     * @param array|string $idx
     * @param array|string $type_ids 运营商ID
     * @return array|string
     */
    public function getOperator(string $start_date, string $end_date, $idx, $type_ids)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx),
            'type_ids' => $this->formatToString($type_ids)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_operator', $params);
    }

    /**
     * 终端属性列表
     * 按天查询对应属性的终端信息数据。
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E7%BB%88%E7%AB%AF%E5%B1%9E%E6%80%A7%E5%88%97%E8%A1%A8
     * @see https://mta.qq.com/docs/h5_api.html#%E7%BB%88%E7%AB%AF%E5%B1%9E%E6%80%A7 终端属性
     *
     * @param string $start_date
     * @param string $end_date
     * @param array|string $idx
     * @param array|string $type_id
     * @return array|string
     */
    public function getClientPara(string $start_date, string $end_date, $idx, $type_id)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx),
            'type_id' => $this->formatToString($type_id)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_client/get_by_para', $params);
    }

    /**
     * 终端信息
     * 按天查询终端信息数据
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E7%BB%88%E7%AB%AF%E4%BF%A1%E6%81%AF
     * @see https://mta.qq.com/docs/h5_api.html#%E7%BB%88%E7%AB%AF%E5%B1%9E%E6%80%A7 终端type_id
     * @param string $start_date
     * @param string $end_date
     * @param string $idx
     * @param string $type_id 1,2,4,5,6,9,10
     * @param string $type_contents 由/get_by_para接口中的client值决定
     * @return array|string
     */
    public function getClientContent(string $start_date, string $end_date, $idx, string $type_id, $type_contents)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'idx' => $this->formatToString($idx),
            'type_id' => $type_id,
            'type_contents' => $this->formatToString($type_contents),
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_client/get_by_content', $params);
    }

    /**
     * 页面排行-当天实时列表
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E9%A1%B5%E9%9D%A2%E6%8E%92%E8%A1%8C-%E5%BD%93%E5%A4%A9%E5%AE%9E%E6%97%B6%E5%88%97%E8%A1%A8
     *
     * @param array|string $idx
     * @return array|string
     */
    public function getRealtimePage($idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_page/list_all_page_realtime', $params);
    }

    /**
     * 页面排行-离线列表
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E9%A1%B5%E9%9D%A2%E6%8E%92%E8%A1%8C-%E7%A6%BB%E7%BA%BF%E5%88%97%E8%A1%A8
     *
     * @param string $start_date
     * @param string $end_date
     * @param $idx
     * @param int $page
     * @return array|string
     */
    public function getOfflinePage(string $start_date, string $end_date, $idx, int $page = 1)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'page' => $page,
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_page/list_all_page_offline', $params);
    }

    /**
     * 页面排行-指定查询部分url
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E9%A1%B5%E9%9D%A2%E6%8E%92%E8%A1%8C-%E6%8C%87%E5%AE%9A%E6%9F%A5%E8%AF%A2%E9%83%A8%E5%88%86url
     *
     * @param string $start_date
     * @param string $end_date
     * @param $urls
     * @param $idx
     * @return array|string
     */
    public function getPage(string $start_date, string $end_date, $urls, $idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'urls' => $this->formatUrlencode($urls),
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_page', $params);
    }

    /**
     * 性能监控-省市
     * 按天查询对应省市的访问延时与解析时长。
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E6%80%A7%E8%83%BD%E7%9B%91%E6%8E%A7
     *
     * @param string $start_date
     * @param string $end_date
     * @param $idx
     * @param $contents
     * @return array|string
     */
    public function getAreaPageSpeed(string $start_date, string $end_date, $idx, $contents)
    {
        $params = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'type' => 'area',
            'type_contents' => $this->formatToString($contents),
            'idx' => $this->formatToString($idx)
        ];

        return $this->pageSpeedRequest($params);
    }

    /**
     * 性能监控-运营商
     * 按天查询对应省市的访问延时与解析时长。
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E6%80%A7%E8%83%BD%E7%9B%91%E6%8E%A7
     *
     * @param string $start_date
     * @param string $end_date
     * @param $idx
     * @param $contents
     * @return array|string
     */
    public function getProxyPageSpeed(string $start_date, string $end_date, $idx, $contents)
    {
        $params = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'type' => 'proxy',
            'type_contents' => $this->formatToString($contents),
            'idx' => $this->formatToString($idx)
        ];

        return $this->pageSpeedRequest($params);
    }

    /**
     * 性能监控-页面地址
     * 按天查询对应省市的访问延时与解析时长。
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E6%80%A7%E8%83%BD%E7%9B%91%E6%8E%A7
     *
     * @param string $start_date
     * @param string $end_date
     * @param $idx
     * @param $contents
     * @return array|string
     */
    public function getUrlPageSpeed(string $start_date, string $end_date, $idx, $contents)
    {
        $params = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'type' => 'url',
            'type_contents' => $this->formatUrlencode($contents),
            'idx' => $this->formatToString($idx)
        ];

        return $this->pageSpeedRequest($params);
    }

    /**
     * 性能监控
     *
     * @param array $params
     * @return array|string
     */
    public function pageSpeedRequest(array $params)
    {
        $params['app_id'] = $this->app_id;

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_page_speed', $params);
    }

    /**
     * 访问深度
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E8%AE%BF%E9%97%AE%E6%B7%B1%E5%BA%A6
     *
     * @param string $start_date
     * @param string $end_date
     * @return array|string
     */
    public function depth(string $start_date, string $end_date)
    {
    $params = [
    'app_id' => $this->app_id,
    'start_date' => $start_date,
    'end_date' => $end_date,
    ];

    $params['sign'] = $this->sign($params);

    return $this->httpGet('ctr_depth', $params);
    }

    /**
     * 1.6.1 来源分析-外部链接
     * 按天查询外部同站链接带来的流量情情况
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E6%9D%A5%E6%BA%90%E5%88%86%E6%9E%90
     *
     * @param array $params
     * @return array|string
     */
    public function sourceOut(string $start_date, string $end_date, $urls, $idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'urls' => $this->formatUrlencode($urls),
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_source_out', $params);
    }

    /**
     * 1.6.2 来源分析-入口页面
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E5%85%A5%E5%8F%A3%E9%A1%B5%E9%9D%A2
     *
     * @param string $start_date
     * @param string $end_date
     * @param $urls
     * @return array|string
     */
    public function getPageLand(string $start_date, string $end_date, $urls)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'urls' => $this->formatUrlencode($urls)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_page_land', $params);
    }

    /**
     * 1.6.3 来源分析-离开页面
     *
     * @see https://mta.qq.com/docs/h5_api.html#%E7%A6%BB%E5%BC%80%E9%A1%B5%E9%9D%A2
     *
     * @param string $start_date
     * @param string $end_date
     * @param array|string $urls
     * @return array|string
     */
    public function getPageExit(string $start_date, string $end_date, $urls)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'urls' => $this->formatUrlencode($urls)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_page_exit', $params);
    }


    /**
     * 1.7 自定义事件
     * @see https://mta.qq.com/docs/h5_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6
     *
     * @param string $start_date
     * @param string $end_date
     * @param $custom
     * @param $idx
     * @return array|string
     */
    public function custom(string $start_date, string $end_date, $custom, $idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'custom' => $this->formatUrlencode($custom),
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_custom', $params);
    }

    /**
     * 1.8 渠道效果统计
     * @see https://mta.qq.com/docs/h5_api.html#%E6%B8%A0%E9%81%93%E6%95%88%E6%9E%9C%E5%88%86%E6%9E%90
     *
     * @param string $start_date
     * @param string $end_date
     * @param $adtags
     * @param $idx
     * @return array|string
     */
    public function adtag(string $start_date, string $end_date, $adtags, $idx)
    {
        $params = [
            'app_id' => $this->app_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'adtags' => $this->formatUrlencode($adtags),
            'idx' => $this->formatToString($idx)
        ];

        $params['sign'] = $this->sign($params);

        return $this->httpGet('ctr_adtag', $params);
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
            $secret_key.= $key.'='.$value;
        }

        $sign = md5($secret_key);

        return $sign;
    }
}
