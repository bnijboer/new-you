@extends('layouts.app')

@section('title', 'Assistance')

@section('banner-text', 'Assistance')

@section('content')

    <div class="md:w-1/2 lg:w-1/3 text-gray-600 px-3 mb-10 mx-auto">
        
        <p class="font-semibold text-lg text-blue-800 tracking-wider uppercase text-center mt-16 mb-6 pb-2 border-b border-dotted border-gray-200">
            Dashboard
        </p>
        <p>
            The <span class="italic">Dashboard</span> keeps track of all your food intake logs of a particular day.
        </p>
        <p class="mt-2">
            Under <span class="italic">Nutritional Intake</span> you can see the total amount of calories
            and macronutrients you have consumed that day,
            as well as the amount of calories and macronutrients that are required to meet your goal.
        </p>
        <p class="mt-2">
            By default, your required intake is set to <span class="italic">maintenance</span>.
            This is the amount of calories you need to consume in order to maintain your current weight.
            This number is based on your current weight, age, length, gender and activity level. 
        </p>
        
        
        <p class="font-semibold text-lg text-blue-800 tracking-wider uppercase text-center mt-16 mb-6 pb-2 border-b border-dotted border-gray-200">
            Products
        </p>
        <p>
            Products serve as templates to your logs. They store the ratio of nutrients to weight.
        </p>
        <p class="my-4 p-3 italic text-gray-600 tracking-wider text-sm border border-dotted border-gray-200 rounded-lg">
                <span class="text-center font-medium mb-2">Tip: </span>
                Packaged products display nutritional values per 100 grams on a nutrional facts label.
                This information can often also be found online.
        </p>
        <p class="mt-2">
            As soon as there are one or more products in the database, you are ready to start logging!
        </p>
        
        
        <p class="font-semibold text-lg text-blue-800 tracking-wider uppercase text-center mt-16 mb-6 pb-2 border-b border-dotted border-gray-200">
            Logs
        </p>
        <p>
            Your logs contain the amount of a particular product you have consumed.
            Adding a log requires you to have stored products first.
        </p>
        <p class="mt-2">
            Whenever you create a log, you can enter the quantity of the product you have consumed.
            The corresponding caloric and nutritional values will then be calculated for you.
        </p>
        
        
        <p class="font-semibold text-lg text-blue-800 tracking-wider uppercase text-center mt-16 mb-6 pb-2 border-b border-dotted border-gray-200">
            Diets
        </p>
        <p>
            If you're planning to gain or lose weight, you can start a diet.
        </p>
        <p class="mt-2">
            Simply enter your current weight, goal weight, planned activity level and preferred diet intensity,
            and your required intake will be adjusted accordingly.
        </p>
        <p class="mt-2">
            <span class="italic">Diet Intensity</span> primarily determines the length of your diet.
            A high intensity means either a high caloric deficit or a high caloric surplus.
        </p>
        <p class="mt-2">
            While a high diet intensity means the length of your diet will be relatively short,
            it also means you will have to work harder to achieve your daily goals.
            Similarly, with a low intensity it will generally be easier to keep up,
            but it will take you longer to reach your desired weight.
        </p>
        <p class="mt-2">
            When on a diet, <span class="italic">New You</span> keeps track of your dietary goals, but not of your current weight.
            Since results can vary from person to person and depend on a number of (biological) factors
            apart from your intake, you will have to update your actual weight manually.
        </p>

    </div>

@endsection