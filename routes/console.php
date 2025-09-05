<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('loyalty:notify-max-reward-eligible')
    ->dailyAt('09:00');
