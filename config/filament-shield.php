<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Defualt Roles
    |--------------------------------------------------------------------------
    |
    | The default is `super_admin` but you can change it to whatever works best for you.
    | `filament_user` if enabled will help smoothly provide access to filament users
    | in production when implementing `FilamentUser`
    */


    'super_admin' => [
        'enabled'   => true,
        'role_name' => 'super_admin'
    ],

    'filament_user' => [
        'enabled'   => false,
        'role_name' => 'filament_user',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Prefixes
    |--------------------------------------------------------------------------
    |
    | When generating permissions for a `Resource` the resource `Model` will be prefixed with these.
    | Keep in mind the order since these will also be used in generating policies for the resources.
    |
    | When generating permission for a `Widget` or `Page` the widget or page name will be prefixed
    | with this.
    | But you are free to change these in to whatever works for you.
    */

    'prefixes' => [
        'resource' => ["view","view_any","create","delete","delete_any","update","export"],
        'page'  =>  'view',
        'widget' => 'view'
    ],

    /*
    |--------------------------------------------------------------------------
    | Entities Permission Generator
    |--------------------------------------------------------------------------
    | Enable the Entities for which you want the permissions or permissions and policies
    | to be auto generated when you run `php artisan shield:install` command.
    */

    'entities' => [
        'pages' => true,
        'widgets' => true,
        'resources' => true,
        'custom_permissions' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Resources Generator Option
    |--------------------------------------------------------------------------
    | Here you may define the "generator" option for resources.
    | Sometimes it's beneficial to generate policies once locally, in case the production server
    | does not allow you to regenerate them (Laravel Vapor) or you have updated the policies.
    | Choose the option the fits best your use case.
    |
    | Supported options: "policies_and_permissions", "policies", "permissions"
    */

    'resources_generator_option' => '{{ resources_generator_option }}',

    /*
    |--------------------------------------------------------------------------
    | Exclude
    |--------------------------------------------------------------------------
    | Generate permissions or permissions with policies for all the entities
    | except listed here.
    | Generated Permission name will be formatted as:
    | Page: `view_page_name` i.e, `SettingsPage` => `view_settings_page`
    | Widget: `view_widget_name` i.e, `IncomeWidget` => `view_income_widget`
    */

    'exclude' => [
        'enabled' => true,
        'pages' => ["Dashboard"],
        'widgets' => ["AccountWidget","FilamentInfoWidget"],
        'resources' => [],
    ],

    /**
     * Register `RolePolicy` for `RoleResource`
     */
    'register_role_policy' => true,
];
