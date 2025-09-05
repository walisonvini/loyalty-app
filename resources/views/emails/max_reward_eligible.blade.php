@extends('emails.layouts.base')

@section('title', 'Você pode resgatar o prêmio máximo!')

@php
    $greeting = "Parabéns, {$customerName}!";
    $icon = '🏆';
    $highlightContent = '
        <div class="text-base leading-relaxed text-center my-2 text-gray-800">Você tem pontos suficientes para resgatar</div>
        <div class="text-2xl font-bold my-2 text-primary text-center">"' . $rewardName . '"</div>
        <div class="text-base leading-relaxed text-center my-2 text-gray-800">o prêmio máximo!</div>
    ';
    $content = '<p class="text-base leading-relaxed text-center my-4">Não perca esta oportunidade! Resgate agora e aproveite seu prêmio especial.</p>';
    $buttonText = 'Resgatar Prêmio';
    $buttonUrl = 'https://clientes.fidelizii.com.br';
@endphp
