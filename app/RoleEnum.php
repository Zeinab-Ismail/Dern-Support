<?php

namespace App;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case INDIVIDUAL = 'individual';
    case BUSINESS = 'business';
}
