<?php

namespace App\Helpers;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class MoneyFormatHelper
{
    public static function formatRupiah($amount)
    {
        $subunitAmount = $amount * 100;

        $rupiah = new Money($subunitAmount, new Currency('IDR'));
        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('id_ID', \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($rupiah);
    }
}
