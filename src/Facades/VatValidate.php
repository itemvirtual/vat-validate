<?php

namespace Itemvirtual\VatValidate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Itemvirtual\VatValidate
 */
class VatValidate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vat-validate';
    }
}
