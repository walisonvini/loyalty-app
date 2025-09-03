<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Você ganhou pontos!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .hero-section {
            background-color: #fff;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        .celebration-image {
            text-align: center;
            margin: 0 0 30px 0;
        }
        .celebration-image img {
            max-width: 280px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        h1 {
            color: #6A4CFF;
            font-size: 32px;
            text-align: center;
            margin: 0 0 20px 0;
        }
        .content-section {
            padding: 40px 30px;
            text-align: center;
        }
        .points-highlight {
            background-color: #f8f9fa;
            color: #333;
            padding: 25px;
            border-radius: 15px;
            margin: 30px 0;
            border: 2px solid #6A4CFF;
        }
        .points-number {
            font-size: 48px;
            font-weight: bold;
            margin: 10px 0;
            color: #6A4CFF;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            text-align: center;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 18px 35px;
            margin: 30px 0;
            background-color: #6A4CFF;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(106, 76, 255, 0.3);
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #5a3ce8;
            transform: translateY(-2px);
        }
        .footer {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero-section">
            <div class="celebration-image">
                <img src="{{ asset('images/voceganhou.png') }}" alt="🎉 Parabéns pelos pontos ganhos!">
            </div>
            <h1>Parabéns, {{ $customerName }}!</h1>
        </div>
        
        <div class="content-section">
            <div class="points-highlight">
                <p>Você acaba de ganhar</p>
                <div class="points-number">{{ $points }} ponto(s)</div>
                <p>no nosso programa de fidelidade!</p>
            </div>
            
            <p>Continue acumulando para desbloquear prêmios incríveis!</p>
            
            <a href="https://clientes.fidelizii.com.br" class="btn">Ver meus pontos</a>
            
            <div class="footer">
                Você está recebendo este e-mail porque é participante do programa de fidelidade da Fidelizii.
            </div>
        </div>
    </div>
</body>
</html>
