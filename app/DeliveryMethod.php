<?php

namespace App;

enum DeliveryMethod: string
{
    case COURIER_DELIVERY = 'courier_delivery';
    case DROP_OFF = 'drop_off';
    case TECHNICIAN_OFFICE = 'technician_office';
}
