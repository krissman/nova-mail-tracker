# Nova Mail Tracker

A tool which adds a Laravel Nova resource on top of `jdavidbakr/mail-tracker` to list & view sent emails.

Actually this is a fork of `stonkeep/nova-mail-tracker` package which unexpectedly disappeared in Sep 2022.

### Install

Run this command into your nova project:

`composer require intelliants/nova-mail-tracker`

### Add it to your NovaServiceProvider:

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        Intelliants\NovaMailTracker\NovaMailTrackerTool::make(),
    ];
}
```