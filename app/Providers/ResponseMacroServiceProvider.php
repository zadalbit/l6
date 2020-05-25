<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register the application's response macros.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data = array()) {
            return Response::json([
              'error'  => false,
              'data' => [$data],
            ]);
        });

        Response::macro('error', function ($message, $data = array(), $status = 400) {
            return Response::json([
              'error'  => true,
              'message' => $message,
              'data' => $data,
            ], $status);
        });
    }
}
