<?php

namespace Krissman\NovaMailTracker;

use jdavidbakr\MailTracker\Model\SentEmail;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Resource;

class MailTrackerResource extends Resource
{
    public static $group = 'Admin';

    public static $model = SentEmail::class;

    public static $title = 'id';

    public static $search = ['id', 'sender_email', 'recipient_email', 'subject'];


    public static function label()
    {
        return 'Mails Tracker';
    }

    public static function singularLabel()
    {
        return 'Mail';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Sender Name', 'sender_name'),
            Text::make('Sender Email', 'sender_email'),
            Text::make('Recipient Name', 'recipient_name'),
            Text::make('Recipient Email', 'recipient_email'),
            Text::make('Subject', 'subject'),
            Text::make('Headers', 'headers')->hideFromIndex(),
            Text::make('Content', 'content')->hideFromIndex()->asHtml(),
            Number::make('Opens', 'opens')->hideFromIndex(),
            Number::make('Clicks', 'clicks')->hideFromIndex(),
            Text::make('Msg ID', 'message_id')->hideFromIndex(),
            Text::make('Meta', 'meta')->hideFromIndex(),
            Date::make('Opened At', 'opened_at')->hideFromIndex(),
            Date::make('Clicked At', 'clicked_at')->hideFromIndex()
        ];
    }

    public function cards(Request $request): array
    {
        return [
            EmailsPerDayMetric::make()
        ];
    }
}
