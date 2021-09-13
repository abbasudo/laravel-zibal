<?php

namespace Llabbasmkhll\LaravelZibal\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static static verify(int $trackId)
 * @method static static init(int $amount, string $callback, array $callback_params = [], string $description = null, string $orderId = null, string $mobile = null, array $allowedCards = [])
 * @method static static validate(int $code = 422)
 * @method static mixed redirect()
 * @method static array getResponse()
 */
class Zibal extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'zibal';
    }
}
