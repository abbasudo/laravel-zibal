<?php

namespace Llabbasmkhll\LaravelZibal;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use function PHPUnit\Framework\isEmpty;

class Zibal
{
    private array $response;

    public function init(
        int $amount,
        string $callback,
        array $callback_params = [],
        string $description = null,
        string $orderId = null,
        string $mobile = null,
        array $allowedCards = [],
    ): static {
        if (!URL::isValidUrl($callback)) {
            $callback = URL::route('redirect', $callback_params);
        }

        $data = [
            'merchant'    => config('zibal.merchant'),
            'amount'      => $amount,
            'callbackUrl' => $callback,
        ];

        if (!is_null($description)) {
            $data['description'] = $description;
        }

        if (!is_null($orderId)) {
            $data['orderId'] = $orderId;
        }

        if (!is_null($mobile)) {
            $data['mobile'] = $mobile;
        }

        if (!isEmpty($allowedCards)) {
            $data['allowedCards'] = $allowedCards;
        }

        $this->response = Http::asJson()->acceptJson()->post('https://gateway.zibal.ir/v1/request', $data)->json();

        return $this;
    }

    public function verify(int $trackId): static
    {
        $data = [
            'merchant' => config('zibal.merchant'),
            'trackId'  => $trackId,
        ];

        $this->response = Http::asJson()->acceptJson()->post('https://gateway.zibal.ir/v1/verify', $data)->json();

        return $this;
    }

    public function validate(int $code = 422): static
    {
        abort_if($this->response['result'] != 100, $code);

        return $this;
    }

    public function redirect(int $trackId = null)
    {
        if (is_null($trackId)) {
            $trackId = $this->response['trackId'];
        }

        return redirect('https://gateway.zibal.ir/start/'.$trackId);
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}
