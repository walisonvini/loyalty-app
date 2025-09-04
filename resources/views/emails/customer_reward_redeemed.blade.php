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
            padding: 50px 20px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }
        .celebration-image {
            text-align: center;
            margin: 0 0 25px 0;
        }
        .reward-icon {
            font-size: 72px;
            color: #6A4CFF;
            margin-bottom: 10px;
            text-align: center;
        }
        .hero-title {
            color: #6A4CFF !important;
            font-size: 36px !important;
            text-align: center !important;
            margin: 0 !important;
            font-weight: bold !important;
            font-family: 'Arial', sans-serif !important;
        }
        h1.hero-title {
            color: #6A4CFF !important;
            font-size: 36px !important;
            text-align: center !important;
            margin: 0 !important;
            font-weight: bold !important;
            font-family: 'Arial', sans-serif !important;
        }
        .content-section {
            padding: 50px 30px;
            text-align: center;
        }
        .footer {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            border-top: 1px solid #eee;
            line-height: 1.4;
        }
        .reward-highlight {
            background-color: #f8f9fa;
            color: #333;
            padding: 35px 25px;
            border-radius: 20px;
            margin: 40px 0;
            border: 3px solid #6A4CFF;
            text-align: center;
        }
        .reward-name {
            font-size: 28px;
            font-weight: bold;
            margin: 15px 0;
            color: #6A4CFF;
            text-align: center;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            text-align: center;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 20px 40px;
            margin: 40px 0;
            background-color: #6A4CFF;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(106, 76, 255, 0.3);
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
                <div class="reward-icon">🎁</div>
            </div>
            <h1 class="hero-title">Parabéns, {{ $customerName }}!</h1>
        </div>
        
        <div class="content-section">
            <div class="points-highlight">
                <p>Você acabou de resgatar o prêmio</p>
                <div class="points-number">{{ $rewardName }}</div>
                <p>no nosso programa de fidelidade!</p>
            </div>
            
            <p>Continue acumulando para resgatar mais prêmios incríveis!</p>
            
            <a href="https://clientes.fidelizii.com.br" class="btn">Ver meus prêmios</a>
            
            <div class="footer">
                Você está recebendo este e-mail porque é participante do programa de fidelidade da Fidelizii.
            </div>
        </div>
    </div>
</body>
</html>
