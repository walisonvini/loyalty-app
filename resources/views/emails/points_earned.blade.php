@extends('emails.layouts.base')

@section('title', 'Você ganhou pontos!')

@php
    $greeting = "Parabéns, {$customerName}!";
    $image = url('images/voceganhou.png');
    $imageAlt = '🎉 Parabéns pelos pontos ganhos!';
    $highlightContent = '
        <p class="text-base leading-relaxed text-center my-4">Você acaba de ganhar</p>
        <div class="text-4xl font-bold my-2 text-primary text-center">' . $points . ' ponto(s)</div>
        <p class="text-base leading-relaxed text-center my-4">no nosso programa de fidelidade!</p>
    ';
    $content = '<p class="text-base leading-relaxed text-center my-4">Continue acumulando para desbloquear prêmios incríveis!</p>';
    $buttonText = 'Ver meus pontos';
    $buttonUrl = 'https://clientes.fidelizii.com.br';
@endphp
