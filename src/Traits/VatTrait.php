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

        $countryCode = $this->replaceCountryCode($countryCode);

        if ($countryCode && strpos($vat, $countryCode) === 0) {
            $vat = substr($vat, strlen($countryCode));
        }

        return $vat;
    }

    public function getFullFormatedVat($vat, $countryCode)
    {
        $vat = $this->cleanVat($vat);
        $countryCode = $this->replaceCountryCode($countryCode);
        return strtoupper($countryCode) . $vat;
    }

    private function replaceCountryCode($countryCode)
    {
        $arReplace = [
            'GR' => 'EL',
        ];

        if (array_key_exists($countryCode, $arReplace)) {
            return $arReplace[$countryCode];
        }
        return $countryCode;
    }
}
