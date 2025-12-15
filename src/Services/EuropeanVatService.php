<?php

namespace Itemvirtual\VatValidate\Services;

use Itemvirtual\VatValidate\Traits\VatTrait;
use Illuminate\Support\Facades\Log;

class EuropeanVatService
{
    use VatTrait;

    public function check(string $vat, string $countryCode = 'ES')
    {
        $vat = $this->cleanVat($vat);
        $countryCode = strtoupper($countryCode);

        if (!\array_key_exists($countryCode, $this->patterns)) {
            throw new \Exception('Invalid country code');
        }

        return preg_match($this->patterns[$countryCode], $vat);
    }

    public function getCountryCodes()
    {
        return array_keys($this->patterns);
    }

    private $patterns = [
        'AT' => '/^(?:AT)?U\d{8}$/i',                          // Austria
        'BE' => '/^(?:BE)?\d{10}$/i',                          // Belgium
        'BG' => '/^(?:BG)?\d{9,10}$/i',                        // Bulgaria
        'CY' => '/^(?:CY)?[0-5|9]\d{7}[A-Z]$/i',               // Cyprus
        'CZ' => '/^(?:CZ)?\d{8,10}$/i',                        // Czech Republic
        'DE' => '/^(?:DE)?[1-9]\d{8}$/i',                      // Germany
        'DK' => '/^(?:DK)?\d{8}$/i',                           // Denmark
        'EE' => '/^(?:EE)?10\d{7}$/i',                         // Estonia
        // 'EL' => '/^(?:(?:EL|GR))?\d{9}$/i',                 // Greece
        // 'GR' => '/^(?:(?:EL|GR))?\d{9}$/i',
        'EL' => '/^(?:EL)?\d{9}$/i',                           // Greece
        'GR' => '/^(?:EL)?\d{9}$/i',
        'ES' => '/^(?:ES)?[0-9A-Z][0-9]{7}[0-9A-Z]$/i',        // Spain
        'EU' => '/^(?:EU)?\d{9}$/i',                           // EU-type
        'FI' => '/^(?:FI)?\d{8}$/i',                           // Finland
        'FR' => '/^(?:FR)?[0-9A-Z]{2}\d{9}$/i',                // France
        'GB' => '/^(?:GB)?(?:\d{9}|\d{12}|(?:GD|HA)\d{3})$/i', // United Kingdom (Standard = 9 digits), (Branches = 12 digits), (Government = GD + 3 digits), (Health authority = HA + 3 digits)
        'HR' => '/^(?:HR)?\d{11}$/i',                          // Croatia
        'HU' => '/^(?:HU)?\d{8}$/i',                           // Hungary
        'IE' => '/^(?:IE)?[0-9A-Z\*\+]{7}[A-Z]{1,2}$/i',       // Ireland
        'IT' => '/^(?:IT)?\d{11}$/i',                          // Italy
        'LV' => '/^(?:LV)?\d{11}$/i',                          // Latvia
        'LT' => '/^(?:LT)?(?:\d{9}|\d{12})$/i',                // Lithuania
        'LU' => '/^(?:LU)?\d{8}$/i',                           // Luxembourg
        'MT' => '/^(?:MT)?[1-9]\d{7}$/i',                      // Malta
        'NL' => '/^(?:NL)?\d{9}B\d{2}$/i',                     // Netherlands
        'NO' => '/^(?:NO)?\d{9}$/i',                           // Norway
        'PL' => '/^(?:PL)?\d{10}$/i',                          // Poland
        'PT' => '/^(?:PT)?\d{9}$/i',                           // Portugal
        'RO' => '/^(?:RO)?[1-9]\d{1,9}$/i',                    // Romania
        'RS' => '/^(?:RS)?\d{9}$/i',                           // Serbia
        'SE' => '/^(?:SE)?\d{10}01$/i',                        // Sweden
        'SI' => '/^(?:SI)?[1-9]\d{7}$/i',                      // Slovenia
        'SK' => '/^(?:SK)?[1-9]\d{9}$/i',                      // Slovakia
    ];

}
