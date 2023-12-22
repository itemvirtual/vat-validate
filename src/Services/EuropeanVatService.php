<?php

namespace Itemvirtual\VatValidate\Services;

use Itemvirtual\VatValidate\Traits\VatTrait;
use Illuminate\Support\Facades\Log;

class EuropeanVatService
{
    use VatTrait;

    public function check(string $vat, string $countryCode = 'ES')
    {
        $vat = $this->cleanVat($vat, $countryCode);
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
        'AT' => '/^(U\d{8}$)/i',                                   // Austria
        'BE' => '/^(\d{10}$)/i',                                   // Belgium
        'BG' => '/^(\d{9,10}$)/i',                                 // Bulgaria
        'CY' => '/^([0-5|9]\d{7}[A-Z]$)/i',                        // Cyprus
        'CZ' => '/^(\d{8,10})?$/i',                                // Czech Republic
        'DE' => '/^([1-9]\d{8}$)/i',                               // Germany
        'DK' => '/^(\d{8}$)/i',                                    // Denmark
        'EE' => '/^(10\d{7}$)/i',                                  // Estonia
        'EL' => '/^(\d{9}$)/i',                                    // Greece
        'ES' => '/^([0-9A-Z][0-9]{7}[0-9A-Z]$)/i',                 // Spain
        'EU' => '/^(\d{9}$)/i',                                    // EU-type
        'FI' => '/^(\d{8}$)/i',                                    // Finland
        'FR' => '/^([0-9A-Z]{2}[0-9]{9}$)/i',                      // France
        'GB' => '/^((?:[0-9]{12}|[0-9]{9}|(?:GD|HA)[0-9]{3})$)/i', // UK (Standard = 9 digits), (Branches = 12 digits), (Government = GD + 3 digits), (Health authority = HA + 3 digits)
        'GR' => '/^(\d{8,9}$)/i',                                  // Greece
        'HR' => '/^(\d{11}$)/i',                                   // Croatia
        'HU' => '/^(\d{8}$)/i',                                    // Hungary
        'IE' => '/^([0-9A-Z\*\+]{7}[A-Z]{1,2}$)/i',                // Ireland
        'IT' => '/^(\d{11}$)/i',                                   // Italy
        'LV' => '/^(\d{11}$)/i',                                   // Latvia
        'LT' => '/^(\d{9}$|\d{12}$)/i',                            // Lithuania
        'LU' => '/^(\d{8}$)/i',                                    // Luxembourg
        'MT' => '/^([1-9]\d{7}$)/i',                               // Malta
        'NL' => '/^(\d{9}B\d{2}$)/i',                              // Netherlands
        'NO' => '/^(\d{9}$)/i',                                    // Norway (not EU)
        'PL' => '/^(\d{10}$)/i',                                   // Poland
        'PT' => '/^(\d{9}$)/i',                                    // Portugal
        'RO' => '/^([1-9]\d{1,9}$)/i',                             // Romania
        'RU' => '/^(\d{10}$|\d{12}$)/i',                           // Russia
        'RS' => '/^(\d{9}$)/i',                                    // Serbia
        'SI' => '/^([1-9]\d{7}$)/i',                               // Slovenia
        'SK' => '/^([1-9]\d[(2-4)|(6-9)]\d{7}$)/i',                // Slovakia Republic
        'SE' => '/^(\d{10}01$)/i',                                 // Sweden
    ];
}
