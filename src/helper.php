<?php

use Illuminate\Support\Str;

// if (! function_exists('joyNovaApi')) {
//     /**
//      * Helper
//      */
//     function joyNovaApi($argument1 = null)
//     {
//         //
//     }
// }

if (!function_exists('modelHasScope')) {
    /**
     * May have html
     *
     * @param Model|string $model
     */
    function modelHasScope($model, string $scope): bool
    {
        return method_exists($model, 'scope' . Str::studly($scope));
    }
}
