<?php

namespace App\Enums;

enum UserRolesEnum:string
{
    case SUPERADMIN='superadmin';
    case ADMIN='admin';
    case EMPLOYEE='employee';
    case CUSTOMER='customer';

}