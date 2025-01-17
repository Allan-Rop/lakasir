<?php

use App\Models\Media;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

if (! function_exists('action')) {
    function action(array $action)
    {
    }
}

if (! function_exists('dash_to_space')) {
    function dash_to_space(string $string, bool $capital = false)
    {
        $name = str_replace(['-', '_'], [' ', ' '], $string);

        return $capital ? Str::upper($name) : $name;
    }
}
if (! function_exists('price_format')) {
    function price_format($price)
    {
        return 'Rp. '.number_format($price, 0, ',', '.');
    }
}
if (! function_exists('get_lang')) {
    function get_lang()
    {
        app()->setLocale(optional(auth()->user() ?? 'en')->localization);
    }
}
if (! function_exists('media')) {
    function media(Media $media = null)
    {
        return url($media->getFullName ?? '');
    }
}
if (! function_exists('medias')) {
    function medias(Collection $media)
    {
        dd($media);
    }
}

if (! function_exists('checkValueArray')) {
    function array_must_same(array $array, array $key, $expectedValue): bool
    {
        $count = count($key);

        for ($i = 0; $i < $count; $i++) {
            if (!isset($array[$key[$i]]) || $array[$key[$i]] != $expectedValue) {
                return false;
            }
        }

        return true;
    }
}

if (! function_exists('percentage')) {
    function percentage(int $percentage): string
    {
        return $percentage . '%';
    }
}

if (! function_exists('get_month')) {
    function get_month($length = null, $withKey = false): array
    {
        $month = [];

        for($m=1; $m<=12; ++$m){
            $date = date('F', mktime(0, 0, 0, $m, 1));
            $name = $length ? substr($date, 0, $length) : $date;

            $month[] = $withKey
                ? [
                    'month_name' => $name,
                    'month_key' => $m,
                ]
                : $name;
        }

        return $month;
    }
}

if (! function_exists('get_wrapper_month')) {
    function get_wrapper_month(): array
    {
        $wrapp = [];
        for ($i = 0; $i <=12; $i++) {
            $wrapp[$i] = null;
        }

        return $wrapp;
    }
}

if (! function_exists('setting')) {
    function setting(string $key)
    {
        return optional(Setting::where('key', $key)->first())->value;
    }
}

if (! function_exists('getProfileImage')) {
    function getProfileImage()
    {
        return (new User)->adminlte_image();
    }
}
