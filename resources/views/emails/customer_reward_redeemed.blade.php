@extends('emails.layouts.base')

@section('title', 'Você resgatou um prêmio!')

@php
    $greeting = "Parabéns, {$customerName}!";
    $icon = '🎁';
    $highlightContent = '
        <p class="text-base leading-relaxed text-center my-4">Você acabou de resgatar o prêmio</p>
        <div class="text-2xl font-bold my-2 text-primary text-center">' . $rewardName . '</div>
        <p class="text-base leading-relaxed text-center my-4">no nosso programa de fidelidade!</p>
    ';
    $content = '<p class="text-base leading-relaxed text-center my-4">Continue acumulando para resgatar mais prêmios incríveis!</p>';
    $buttonText = 'Ver meus prêmios';
    $buttonUrl = 'https://clientes.fidelizii.com.br';
@endphp
