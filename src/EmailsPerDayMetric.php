<?php

namespace Krissman\NovaMailTracker;

use jdavidbakr\MailTracker\Model\SentEmail;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class EmailsPerDayMetric extends Trend
{
    public function calculate(NovaRequest $request)
    {
        return $this->countByDays($request, SentEmail::class)
            ->showLatestValue();
    }

    public function ranges(): array
    {
        return [
            7  => '1 ' . __('Week'),
            14 => '2 ' . __('Weeks'),
            30 => '30 ' . __('Days'),
            60 => '60 ' . __('Days'),
            90 => '90 ' . __('Days')
        ];
    }
}
