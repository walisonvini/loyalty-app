<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Fidelizi - Programa de Fidelidade' }}</title>
    <link rel="stylesheet" href="{{ asset('css/emails.css') }}">
</head>
<body class="bg-gray-light text-gray-800 m-0 p-5">
    <table width="100%" cellpadding="0" cellspacing="0" class="bg-gray-light">
        <tr>
            <td align="center" class="p-5">
                <table cellpadding="0" cellspacing="0" class="max-w-lg bg-white border border-gray-border">
                    <tr>
                        <td class="bg-white p-8 text-center border-b border-gray-border">
                            @if(isset($icon) || isset($image))
                                <div class="text-center mb-5">
                                    @if(isset($image))
                                        <img src="{{ $image }}" alt="{{ $imageAlt ?? 'Fidelizi' }}" class="max-w-xs h-auto border border-gray-border rounded-lg">
                                    @elseif(isset($icon))
                                        <div class="text-6xl text-primary mb-2 text-center">{{ $icon }}</div>
                                    @endif
                                </div>
                            @endif
                            <h1 class="text-primary text-3xl text-center m-0 font-bold">{{ $greeting ?? 'Olá!' }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-8 text-center">
                            @if(isset($highlightContent))
                                <table cellpadding="0" cellspacing="0" class="bg-gray-light text-gray-800 p-6 my-5 border-2 border-primary text-center w-full">
                                    <tr>
                                        <td class="text-center">
                                            {!! $highlightContent !!}
                                        </td>
                                    </tr>
                                </table>
                            @endif
                            
                            @if(isset($content))
                                {!! $content !!}
                            @endif
                            
                            @if(isset($buttonText) && isset($buttonUrl))
                                <a href="{{ $buttonUrl }}" class="inline-block py-4 px-8 my-5 bg-primary text-white no-underline font-bold text-base text-center border border-primary rounded-full hover:bg-opacity-90 transition-all duration-300">{{ $buttonText }}</a>
                            @endif
                            
                            <div class="text-xs text-gray-600 text-center mt-5 p-4 border-t border-gray-200">
                                Você está recebendo este e-mail porque é participante do programa de fidelidade da Fidelizi.
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
