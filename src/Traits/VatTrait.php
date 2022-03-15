<?php

namespace Itemvirtual\VatValidate\Traits;

// use Illuminate\Support\Str;

trait VatTrait
{
    public function cleanVat($vat, $countryCode = null)
    {
        $vat = preg_replace("/[^A-Za-z0-9]/", '', $vat);
        $vat = strtoupper($vat);
        $countryCode = strtoupper($countryCode);

        if ($countryCode && strpos($vat, $countryCode) === 0) {
            $vat = substr($vat, strlen($countryCode));
        }

        return $vat;
    }

    public function getFullFormatedVat($vat, $countryCode)
    {
        $vat = $this->cleanVat($vat, $countryCode);
        return strtoupper($countryCode) . $vat;
    }
}
