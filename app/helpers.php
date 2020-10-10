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

// $value determined by a user's activity level.
// It is a multiplier that is factored in when calculating their required intake.
function formatActivityLevel($value)
{
    switch ($value) {
        case "1.2":
            return "Little or no exercise";
            break;
        case "1.375":
            return "Light exercise 1-3 days/week";
            break;
        case "1.55":
            return "Moderate exercise 3-5 days/week";
            break;
        case "1.725":
            return "Hard exercise 6-7 days/week";
            break;
        case "1.9":
            return "Very hard exercise and physical job";
            break;
    }
}