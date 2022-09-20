<?php

namespace Intelliants\NovaMailTracker;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaMailTrackerTool extends Tool
{
    public function boot(): void
    {
        Nova::resources([
            MailTrackerResource::class
        ]);
    }
}
