<?php

function currentUser()
{
    return auth()->user();
}

function currentDate()
{
    return \Carbon\Carbon::now();
}

function previousDate($date)
{
    $previousDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date->subDays(1)->toDateString());
    
    return $previousDate->toDateString();
}