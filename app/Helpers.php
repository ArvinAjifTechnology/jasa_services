<?php

if (!function_exists('formatCurrency')) {
    /**
     * Format number to Indonesian Rupiah currency.
     *
     * @param float|int $amount
     * @param bool $withSymbol
     * @return string
     */
    function formatCurrency($amount, $withSymbol = true)
    {
        $formattedAmount = number_format($amount, 0, ',', '.');
        $currencySymbol = 'Rp';

        return $withSymbol ? $currencySymbol . $formattedAmount : $formattedAmount;
    }
}
