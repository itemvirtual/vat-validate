<?php

namespace Itemvirtual\VatValidate\Services;

use Itemvirtual\VatValidate\Traits\VatTrait;
use Illuminate\Support\Facades\Log;

class ViesService
{
    use VatTrait;

    public function check(string $vat, string $countryCode = 'ES')
    {
        $vat = $this->cleanVat($vat, $countryCode);
        $countryCode = strtoupper($countryCode);

        $client = new \SoapClient('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl');

        if ($client) {
            $params = array('countryCode' => $countryCode, 'vatNumber' => $vat);
            try {
                $soapResponse = $client->checkVat($params);
                if ($soapResponse->valid == true) {
                    // VAT is valid
                    Log::channel('vat-validate')->info('[Vies validation] ' . $countryCode . ' ' . $vat . ': ' . 'VALID');
                    return true;
                } else {
                    // VAT is NOT valid
                    Log::channel('vat-validate')->info('[Vies validation] ' . $countryCode . ' ' . $vat . ': ' . 'NOT valid');
                    return false;
                }
            } catch (\SoapFault $exception) {
                Log::channel('vat-validate')->error($exception->faultstring);
                Log::channel('vat-validate')->error($exception);
                return false;
            }
        } else {
            Log::channel('vat-validate')->error('Connection to host failed');
            return false;
        }
    }
}
