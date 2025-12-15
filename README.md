# Vat Validate
> Laravel package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/itemvirtual/vat-validate.svg?style=flat-square)](https://packagist.org/packages/itemvirtual/vat-validate)
[![Total Downloads](https://img.shields.io/packagist/dt/itemvirtual/vat-validate.svg?style=flat-square)](https://packagist.org/packages/itemvirtual/vat-validate)


## Installation

You can install the package via composer:

```bash
composer require itemvirtual/vat-validate
```

## Usage

Use the `VatValidate` Facade for all methods

```php
use Itemvirtual\VatValidate\Facades\VatValidate;
```

#### · Validate Spanish NIF, NIE, CIF

```php
VatValidate::checkSpanishVat($vat);
```
or you can do it for a specific type of document

```php
VatValidate::checkNif($vat);
VatValidate::checkNie($vat);
VatValidate::checkSpecialNie($vat);
VatValidate::checkCif($vat);
```

#### · Validate European VAT

```php
VatValidate::checkEuropeanVat($vat, $countryCode);
```

#### · VIES Validation

```php
VatValidate::checkVies($vat, $countryCode);
```

#### · Helper methods
Get VAT number formatted with country code
```php
VatValidate::getFullFormatedVat($vat, $countryCode);
```

#### · Example VAT

```php
$exampleVats = [
    'AT' => 'ATU12345678',
    'BE' => 'BE0123456789',
    'BG' => 'BG123456789',
    'CY' => 'CY12345678A',
    'CZ' => 'CZ12345678',
    'DE' => 'DE123456789',
    'DK' => 'DK12345678',
    'EE' => 'EE101234567',
    'GR' => 'EL123456789',
    'ES' => 'ESX1234567L',
    'FI' => 'FI12345678',
    'FR' => 'FRAB123456789',
    'GB' => 'GB123456789',
    'HR' => 'HR12345678901',
    'HU' => 'HU12345678',
    'IE' => 'IE1A23456B',
    'IT' => 'IT12345678901',
    'LV' => 'LV12345678901',
    'LT' => 'LT123456789',
    'LU' => 'LU12345678',
    'MT' => 'MT12345678',
    'NL' => 'NL123456789B01',
    'PL' => 'PL1234567890',
    'PT' => 'PT123456789',
    'RO' => 'RO123456789',
    'SE' => 'SE123456789001',
    'SI' => 'SI12345678',
    'SK' => 'SK1234567890',
];
```

### Info

[Vies Schema](https://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl)

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

-   [Sergio](https://github.com/sergio-item)
-   [Itemvirtual](https://github.com/itemvirtual)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
