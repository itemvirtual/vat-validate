<?php

namespace Itemvirtual\VatValidate;

use Itemvirtual\VatValidate\Services\EuropeanVatService;
use Itemvirtual\VatValidate\Services\SpanishVatService;
use Itemvirtual\VatValidate\Services\ViesService;
use Itemvirtual\VatValidate\Traits\VatTrait;
use Illuminate\Support\Facades\Log;

class VatValidate
{
    use VatTrait;

    public function getFullFormatedVat(string $vat, string $countryCode = 'ES')
    {
        return $this->fullFormatedVat($vat);
    }

    /* *********************************************************** SpanishVat */

    public function checkSpanishVat(string $vat)
    {
        $SpanishVatService = new SpanishVatService();

        return $SpanishVatService->checkNif($vat) ||
            $SpanishVatService->checkNie($vat) ||
            $SpanishVatService->checkSpecialNie($vat) ||
            $SpanishVatService->checkCif($vat);
    }

    public function checkNif(string $vat)
    {
        $SpanishVatService = new SpanishVatService();
        return $SpanishVatService->checkNif($vat);
    }

    public function checkNie(string $vat)
    {
        $SpanishVatService = new SpanishVatService();
        return $SpanishVatService->checkNie($vat);
    }

    public function checkSpecialNie(string $vat)
    {
        $SpanishVatService = new SpanishVatService();
        return $SpanishVatService->checkSpecialNie($vat);
    }

    public function checkCif(string $vat)
    {
        $SpanishVatService = new SpanishVatService();
        return $SpanishVatService->checkCif($vat);
    }

    /* ********************************************************** EuropeanVat */

    public function getAvailableCountryCodes()
    {
        $EuropeanVatService = new EuropeanVatService();
        return $EuropeanVatService->getCountryCodes();
    }

    public function checkEuropeanVat(string $vat, string $countryCode = 'ES')
    {
        $EuropeanVatService = new EuropeanVatService();
        return $EuropeanVatService->check($vat, $countryCode);
    }

    /* ***************************************************************** Vies */

    public function checkVies(string $vat, string $countryCode = 'ES')
    {
        $ViesService = new ViesService();
        return $ViesService->check($vat, $countryCode);
    }
}
