<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/login',
        '/register',
        '/logout',
        '/user/user-ui/user',
        '/user-feedback',
        '/admin.user-table.create',
        '/admin.user-table/*/edit',
        '/admin.user-table.*.delete'
    ];
}
