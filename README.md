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
