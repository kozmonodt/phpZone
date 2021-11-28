<?php

namespace MyProject\Controllers;

use MyProject\Models\Hosts\Host;

class HostsController extends AbstractController
{
    public static function saveStatistics()
    {
        Host::saveStatistic();
    }



}