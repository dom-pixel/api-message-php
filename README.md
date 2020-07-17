# Api-Message
This is Api Message for use in all projects.

### Install

You can add this library as a local, per-project dependency to your project using Composer:

```sh
$ composer require dom-pixel/api-message
```

### Quick Start

```sh
<?php


namespace App\Api;


class ApiMessage
{
    public static function message($isSuccess, $code, $message = null, $payload = null)
    {
        return [
            'isSuccess' => $isSuccess,
            'message' => $message,
            'payload' => $payload,
            'code' => $code
        ];
    }
}
```
