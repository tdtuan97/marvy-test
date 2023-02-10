<?php
/* Define common app */

use Carbon\Carbon;

/**
 * Is env production
 *
 * @return bool
 */
function is_env_production(): bool
{
    return config('app.env') === 'production';
}

/**
 * Is mode debug
 *
 * @return bool
 */
function is_mode_debug(): bool
{
    return config('app.debug');
}

/**
 * @return string
 */
function get_app_name(): string
{
    return config('app.name');
}

/**
 * Get time created at default
 *
 * @return string
 */
function get_created_at(): string
{
    return Carbon::now()->toAtomString();
}

/**
 * Format amount value
 *
 * @param $value
 * @return mixed|string
 */
function format_amount($value)
{
    if (is_numeric($value)) {
        return number_format($value) . ' ' . CURRENCY_VND;
    }
    return $value;
}
