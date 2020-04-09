<h1 align="center"> laravel-mta-analytics </h1>

<p align="center"> mta.</p>


## Installing

```shell
$ composer require hogus/laravel-mta-analytics
```

## Usage

- publish config

```shell
$ php artisan vendor:publish --provider="Hogus\LaravelMtaAnalytics\ServiceProvider" --tag="config"
```

## Example

```php
$mta = Mta::gateway('h5'); // h5,mini,app

$mta->coreData('2020-01-01', '2020-01-05');
```
### H5

- [应用历史趋势](https://mta.qq.com/docs/h5_api.html#%E5%BA%94%E7%94%A8%E5%8E%86%E5%8F%B2%E8%B6%8B%E5%8A%BF) coreData(string $start_date, string $end_date, $idx)
- [应用实时小时数据](https://mta.qq.com/docs/h5_api.html#%E5%BA%94%E7%94%A8%E5%AE%9E%E6%97%B6%E5%B0%8F%E6%97%B6%E6%95%B0%E6%8D%AE) getRealtimeByHour($idx)
- [应用心跳数据](https://mta.qq.com/docs/h5_api.html#%E5%BA%94%E7%94%A8%E5%BF%83%E8%B7%B3%E6%95%B0%E6%8D%AE) heartbeat()
- [实时访客](https://mta.qq.com/docs/h5_api.html#%E5%AE%9E%E6%97%B6%E8%AE%BF%E5%AE%A2) userRealtime(int $page = 1)
- [新老访客比](https://mta.qq.com/docs/h5_api.html#%E6%96%B0%E8%80%81%E8%AE%BF%E5%AE%A2%E6%AF%94) userCompare(string $start_date, string $end_date)
- [用户画像](https://mta.qq.com/docs/h5_api.html#%E7%94%A8%E6%88%B7%E7%94%BB%E5%83%8F) userPortrait(string $start_date, string $end_date, $idx)
- [客户端分析-地区数据](https://mta.qq.com/docs/h5_api.html#%E5%9C%B0%E5%8C%BA%E6%95%B0%E6%8D%AE) getArea(string $start_date, string $end_date, $idx, $type_ids)
- [省市数据](https://mta.qq.com/docs/h5_api.html#%E7%9C%81%E5%B8%82%E6%95%B0%E6%8D%AE) getProvince(string $start_date, string $end_date, $idx, $type_ids)
- [运营商](https://mta.qq.com/docs/h5_api.html#%E8%BF%90%E8%90%A5%E5%95%86) getOperator(string $start_date, string $end_date, $idx, $type_ids)
- [终端属性列表](https://mta.qq.com/docs/h5_api.html#%E7%BB%88%E7%AB%AF%E5%B1%9E%E6%80%A7%E5%88%97%E8%A1%A8) getClientPara(string $start_date, string $end_date, $idx, $type_id)
- [终端信息](https://mta.qq.com/docs/h5_api.html#%E7%BB%88%E7%AB%AF%E4%BF%A1%E6%81%AF) getClientContent(string $start_date, string $end_date, $idx, string $type_id, $type_contents)
- [页面排行-当天实时列表](https://mta.qq.com/docs/h5_api.html#%E9%A1%B5%E9%9D%A2%E6%8E%92%E8%A1%8C-%E5%BD%93%E5%A4%A9%E5%AE%9E%E6%97%B6%E5%88%97%E8%A1%A8) getRealtimePage($idx)
- [页面排行-离线列表](https://mta.qq.com/docs/h5_api.html#%E9%A1%B5%E9%9D%A2%E6%8E%92%E8%A1%8C-%E7%A6%BB%E7%BA%BF%E5%88%97%E8%A1%A8) getOfflinePage(string $start_date, string $end_date, $idx, int $page = 1)
- [页面排行-指定查询部分url](https://mta.qq.com/docs/h5_api.html#%E9%A1%B5%E9%9D%A2%E6%8E%92%E8%A1%8C-%E6%8C%87%E5%AE%9A%E6%9F%A5%E8%AF%A2%E9%83%A8%E5%88%86url) getPage(string $start_date, string $end_date, $urls, $idx)
- [性能监控-省市](https://mta.qq.com/docs/h5_api.html#%E6%80%A7%E8%83%BD%E7%9B%91%E6%8E%A7) getAreaPageSpeed(string $start_date, string $end_date, $idx, $contents)
- [性能监控-运营商](https://mta.qq.com/docs/h5_api.html#%E6%80%A7%E8%83%BD%E7%9B%91%E6%8E%A7) getProxyPageSpeed(string $start_date, string $end_date, $idx, $contents)
- [性能监控-页面地址](https://mta.qq.com/docs/h5_api.html#%E6%80%A7%E8%83%BD%E7%9B%91%E6%8E%A7) getUrlPageSpeed(string $start_date, string $end_date, $idx, $contents)
- [性能监控]() pageSpeedRequest(array $params)
- [访问深度](https://mta.qq.com/docs/h5_api.html#%E8%AE%BF%E9%97%AE%E6%B7%B1%E5%BA%A6) depth(string $start_date, string $end_date)
- [来源分析-外部链接](https://mta.qq.com/docs/h5_api.html#%E6%9D%A5%E6%BA%90%E5%88%86%E6%9E%90) sourceOut(string $start_date, string $end_date, $urls, $idx)
- [来源分析-入口页面](https://mta.qq.com/docs/h5_api.html#%E5%85%A5%E5%8F%A3%E9%A1%B5%E9%9D%A2) getPageLand(string $start_date, string $end_date, $urls)
- [来源分析-离开页面](https://mta.qq.com/docs/h5_api.html#%E7%A6%BB%E5%BC%80%E9%A1%B5%E9%9D%A2) getPageExit(string $start_date, string $end_date, $urls)
- [自定义事件](https://mta.qq.com/docs/h5_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6) custom(string $start_date, string $end_date, $custom, $idx)
- [渠道效果统计](https://mta.qq.com/docs/h5_api.html#%E6%B8%A0%E9%81%93%E6%95%88%E6%9E%9C%E5%88%86%E6%9E%90) adtag(string $start_date, string $end_date, $adtags, $idx)

### Mini (小程序)

- [实时数据](https://mta.qq.com/docs/wechat_mini_program_api.html#%E5%AE%9E%E6%97%B6%E6%95%B0%E6%8D%AE-get-analyticsrealtime) realTime()
- [历史趋势](https://mta.qq.com/docs/wechat_mini_program_api.html#%E5%8E%86%E5%8F%B2%E8%B6%8B%E5%8A%BF-get-analyticshistory) history(string $start_time, string $end_time)
- [新老用户](https://mta.qq.com/docs/wechat_mini_program_api.html#%E6%96%B0%E8%80%81%E7%94%A8%E6%88%B7-get-analyticsusercompare) userCompare(string $start_time, string $end_time)
- [分享分析](https://mta.qq.com/docs/wechat_mini_program_api.html#%E5%88%86%E4%BA%AB%E5%88%86%E6%9E%90-get-analyticsshare) share(string $start_time, string $end_time)
- [地域](https://mta.qq.com/docs/wechat_mini_program_api.html?q=#%E5%9C%B0%E5%9F%9F-get-analyticsarea) area(string $start_time, string $end_time)
- [终端信息](https://mta.qq.com/docs/wechat_mini_program_api.html#%E7%BB%88%E7%AB%AF%E4%BF%A1%E6%81%AF-get-analyticsterminal) terminal(string $start_time, string $end_time, string $type)
- [网络类型](https://mta.qq.com/docs/wechat_mini_program_api.html#%E7%BD%91%E7%BB%9C%E7%B1%BB%E5%9E%8B-get-analyticsnetwork) network(string $start_time, string $end_time)
- [自定义事件列表](https://mta.qq.com/docs/wechat_mini_program_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6%E5%88%97%E8%A1%A8-get-analyticsevent) event(string $start_time, string $end_time)
- [自定义事件详情 ](https://mta.qq.com/docs/wechat_mini_program_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6%E8%AF%A6%E6%83%85-get-analyticseventdetail) enentDetail(string $start_time, string $end_time, $event_id)
- [自定义事件-漏斗模型详情](https://mta.qq.com/docs/wechat_mini_program_api.html#%E8%87%AA%E5%AE%9A%E4%B9%89%E4%BA%8B%E4%BB%B6-%E6%BC%8F%E6%96%97%E6%A8%A1%E5%9E%8B%E8%AF%A6%E6%83%85-get-analyticsfunnel) getFunnel(string $start_time, string $end_time, $funnel_id)
- [漏斗模型配置](https://mta.qq.com/docs/wechat_mini_program_api.html#%E6%BC%8F%E6%96%97%E6%A8%A1%E5%9E%8B%E9%85%8D%E7%BD%AE-get-funnel) funnel()
- [使用时段](https://mta.qq.com/docs/wechat_mini_program_api.html#%E4%BD%BF%E7%94%A8%E6%97%B6%E6%AE%B5-get-analyticsperiod) period(string $start_time, string $end_time)
- [机型](https://mta.qq.com/docs/wechat_mini_program_api.html#%E6%9C%BA%E5%9E%8B-get-analyticsmachine) machine(string $start_time, string $end_time)

### App
- [应用基本指标-离线数据](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=101) getUserOfficeData(array $params)
- [应用基础指标-实时数据](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=102) getUserRealtimeData(array $params)
- [终端设备数据-离线数据](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=103) getTerminalOfficeData(array $params)
- [用户活跃度](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=104) getActiveAnalOfficeData(array $params)
- [用户行为分析](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=105) getUsageAnalOfficeData(array $params)
- [使用频率分析](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=106) getUsageAnalFreqDis(array $params)
- [用户留存率](https://mta.qq.com/mta/ctr_index/open_api_detail?func_id=110) getUserOfficeData(array $params)
## License

MIT
