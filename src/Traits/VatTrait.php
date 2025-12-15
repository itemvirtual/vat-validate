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

    public function getFullFormatedVat($vat, $countryCode)
    {
        $vat = $this->cleanVat($vat);
        if ($countryCode == 'GR') {
            $countryCode = 'EL';
        }
        return strtoupper($countryCode) . $vat;
    }
}
