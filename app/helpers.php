<?php

function currentUser()
{
    return auth()->user();
}

function currentDate()
{
    return \Carbon\Carbon::now();
}

function currentDiet()
{
    return currentUser()->diet();
}

function previousDate($date)
{
    $previousDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date->subDays(1)->toDateString());
    
    return $previousDate->toDateString();
}

function formatActivityLevel($value)
{
    switch ($value) {
        case "1.2":
            return "1: Little or no exercise";
            break;
        case "1.375":
            return "2: Light exercise or sports 1-3 days/week";
            break;
        case "1.55":
            return "3: Moderate exercise 3-5 days/week";
            break;
        case "1.725":
            return "4: Hard exercise 6-7 days/week";
            break;
        case "1.9":
            return "5: Very hard exercise and a physical job";
            break;
    }
}