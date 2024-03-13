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
        '/admin.user-table/1/edit',
        '/admin.user-table/2/edit',
        '/admin.user-table/3/edit',
        '/admin.user-table/4/edit',
        '/admin.user-table/5/edit',
        '/admin.user-table/6/edit',
        '/admin.user-table/7/edit',
        '/admin.user-table/8/edit',
        '/admin.user-table/9/edit',
        '/admin.user-table/10/edit',
        '/admin.user-table.1.delete',
        '/admin.user-table.2.delete',
        '/admin.user-table.3.delete',
        '/admin.user-table.4.delete',
        '/admin.user-table.5.delete',
        '/admin.user-table.6.delete',
        '/admin.user-table.7.delete',
        '/admin.user-table.8.delete',
        '/admin.user-table.9.delete',
        '/admin.user-table.10.delete',

    ];
}
