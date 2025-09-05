<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Você pode resgatar o prêmio máximo!</title>
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
        .reward-icon {
            font-size: 72px;
            margin-bottom: 25px;
            color: #6A4CFF;
            text-align: center;
        }
        h1 {
            color: #6A4CFF;
            font-size: 36px;
            text-align: center;
            margin: 0;
            font-weight: bold;
        }
        .content-section {
            padding: 50px 30px;
            text-align: center;
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
        .highlight-text {
            font-size: 18px;
            line-height: 1.6;
            text-align: center;
            margin: 15px 0;
            color: #333;
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
            <div class="reward-icon">🏆</div>
            <h1>Parabéns, {{ $customerName }}!</h1>
        </div>
        
        <div class="content-section">
            <div class="reward-highlight">
                <div class="highlight-text">Você tem pontos suficientes para resgatar</div>
                <div class="reward-name">"{{ $rewardName }}"</div>
                <div class="highlight-text">o prêmio máximo!</div>
            </div>
            
            <p>Não perca esta oportunidade! Resgate agora e aproveite seu prêmio especial.</p>
            
            <a href="https://clientes.fidelizii.com.br" class="btn">Resgatar Prêmio</a>
            
            <div class="footer">
                Você está recebendo este e-mail porque é participante do programa de fidelidade da Fidelizii.
            </div>
        </div>
    </div>
</body>
</html>
