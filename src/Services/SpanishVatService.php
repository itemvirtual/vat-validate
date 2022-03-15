<?php

namespace Itemvirtual\VatValidate\Services;

use Itemvirtual\VatValidate\Traits\VatTrait;
use Illuminate\Support\Facades\Log;

class SpanishVatService
{
    use VatTrait;

    public function checkNif($vat)
    {
        $pattern = '/^[0-9]{8}[A-Z]{1}$/i';
        $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';

        $vat = $this->cleanVat($vat);

        if (preg_match($pattern, $vat)) {
            return $letters[(substr($vat, 0, 8) % 23)] == $vat[8];
        }
        return false;
    }

    // private function checkSpecialNif($vat)
    // {
    //     $pattern = '/^[KLM]{1}/i';
    //     $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
    //
    //     $vat = $this->cleanVat($vat);
    //
    //     if (preg_match($pattern, $vat)) {
    //         return $letters[(substr($vat, 0, 8) % 23)] == $vat[8];
    //     }
    //     return false;
    // }

    public function checkNie($vat)
    {
        $pattern = '/^[KLMXYZ][0-9]{7}[A-Z]{1}$/i';
        $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';

        $vat = $this->cleanVat($vat);

        if (preg_match($pattern, $vat)) {
            $replaced = str_replace(['X', 'Y', 'Z'], [0, 1, 2], $vat);
            return $letters[(substr($replaced, 0, 8) % 23)] == $vat[8];
        }
        return false;
    }

    public function checkSpecialNie($vat)
    {
        $pattern = '/^[T]{1}[A-Z0-9]{8}$/i';

        $vat = $this->cleanVat($vat);

        if (preg_match($pattern, $vat)) {
            return true;
        }
        return false;
    }

    public function checkCif($vat)
    {
        $pattern1 = '/^[ABEH][0-9]{8}$/i';
        $pattern2 = '/^[KPQS][0-9]{7}[A-J]$/i';
        $pattern3 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';
        $letters = 'JABCDEFGHI';

        $vat = $this->cleanVat($vat);

        if (preg_match($pattern1, $vat) ||
            preg_match($pattern2, $vat) ||
            preg_match($pattern3, $vat)) {
            $digit = $vat[strlen($vat) - 1];
            $sum1 = 0;
            $sum2 = 0;

            for ($i = 1; $i < 8; $i++) {
                if ($i % 2 == 0) {
                    $sum1 += intval($vat[$i]);
                } else {
                    $tot = (intval($vat[$i]) * 2);
                    $par = 0;

                    for ($j = 0; $j < strlen($tot); $j++) {
                        $par += substr($tot, $j, 1);
                    }
                    $sum2 += $par;
                }
            }

            $sum3 = (intval($sum1 + $sum2)) . '';
            $sum4 = (10 - intval($sum3[strlen($sum3) - 1])) % 10;

            if ($digit >= '0' && $digit <= '9') {
                return $digit == $sum4;
            }

            return strtoupper($digit) == $letters[$sum4];
        }
        return false;
    }
}
