<?php

namespace Itemvirtual\VatValidate\Traits;

trait VatTrait
{
    public function cleanVat($vat)
    {
        $vat = preg_replace("/[^A-Za-z0-9]/", '', $vat);
        $vat = strtoupper($vat);

        return $vat;
    }

    public function cleanVatAndRemoveCountryCode($vat, $countryCode)
    {
        $vat = preg_replace("/[^A-Za-z0-9]/", '', $vat);
        $vat = strtoupper($vat);
        $countryCode = strtoupper($countryCode);

        if ($countryCode == 'GR') {
            $countryCode = 'EL';
        }

        if ($countryCode && strpos($vat, $countryCode) === 0) {
            $vat = substr($vat, strlen($countryCode));
        }

        return $vat;
    }

    public function getFullFormatedVat($vat, $countryCode)
    {
        $vat = $this->cleanVat($vat);
        if ($countryCode == 'GR') {
            $countryCode = 'EL';
        }
        return strtoupper($countryCode) . $vat;
    }
}
