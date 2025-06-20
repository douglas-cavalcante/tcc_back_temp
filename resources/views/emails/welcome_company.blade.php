<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boas-vindas empresa</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ecf1f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: 16px;
        }

        .card {
            background-color: #F6F9FE;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 15px;
            text-align: center;
            max-width: 400px;
            width: 100%;

            position: relative;
            border-radius: 10px;
        }

        .card .top-section {
            height: 150px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            background: linear-gradient(45deg, #FB670A 0%, #e34e0f 100%);
            position: relative;

        }

        .card .top-section .border {
            border-bottom-right-radius: 10px;
            height: 30px;
            width: 130px;
            background: white;
            background: #F6F9FE;
            position: relative;
            transform: skew(-40deg);
            box-shadow: -10px -10px 0 0 #F6F9FE;
        }

        .card .top-section .border::before {
            content: "";
            position: absolute;
            width: 15px;
            height: 15px;
            top: 0;
            right: -15px;
            background: rgba(255, 255, 255, 0);
            border-top-left-radius: 10px;
            box-shadow: -5px -5px 0 2px #F6F9FE;
        }

        .card .top-section::before {
            content: "";
            position: absolute;
            top: 30px;
            left: 0;
            background: rgba(255, 255, 255, 0);
            height: 15px;
            width: 15px;
            border-top-left-radius: 15px;
            box-shadow: -5px -5px 0 2px #F6F9FE;
        }

        .card .top-section .icons {
            position: absolute;
            top: 0;
            width: 100%;
            height: 30px;
            display: flex;
            justify-content: space-between;
        }

        .card .top-section .icons .logo {
            height: 100%;
            padding-left: 5px;
        }

        .card .top-section .icons .logo .top-section {
            height: 100%;
        }

        .card .top-section .icons .social-media {
            height: 100%;
            padding: 10px 15px;
            display: flex;
            gap: 7px;
        }

        .card .top-section .icons .social-media .svg {
            height: 100%;
            fill: #1b233d;
        }

        .card .top-section .icons .social-media .svg:hover {
            fill: white;
        }

        .card .bottom-section {
            margin-top: 15px;
            padding: 10px 10px;
        }

        .card .bottom-section .title {
            display: block;
            font-size: 24px;
            font-weight: bolder;
            color: #FB670A;
            text-align: center;
            letter-spacing: 2px;
        }

        .card .bottom-section .row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card .bottom-section .row .item {
            flex: 30%;
            text-align: center;
            padding: 5px;
            color: rgba(170, 222, 243, 0.721);
        }

        .card .bottom-section .row .item .big-text {
            font-size: 14px;
            display: block;
        }

        .card .bottom-section .row .item .regular-text {
            font-size: 14px;
        }

        .card .bottom-section .row .item:nth-child(2) {
            border-left: 1px solid rgba(255, 255, 255, 0.126);
            border-right: 1px solid rgba(255, 255, 255, 0.126);
        }

        .credentials {
            background-color: #f4792c35;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: start;
        }

        .credentials p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="top-section">
            <div class="border"></div>
            <div class="icons">
                <image width="120px" src="./assets/Logo.svg" class="logo" />
            </div>



        </div>
        <div style="width: 100%;display: flex;justify-content: center;position: relative;margin-bottom: 80px;">
            <img style="margin:0 auto;position: absolute;top: -140px;filter: drop-shadow(2px 0 2px #FB670A);"
                src="./assets/img2.svg" width="250px" />
        </div>
        <div class="bottom-section">
            <h1 style="color: #FB670A;">Bem-Vindo!</h1>
            <div class="cardBody">
                <p>Prezada {{$name}},</p>
                <p>É com grande satisfação que damos as boas-vindas ao nosso sistema de recrutamento e seleção de
                    talentos.</p>
                <p>Aqui estão suas informações de login:</p>
                <div class="credentials">
                    <p><strong>E-mail:</strong> {{$email}}</p>
                    <p><strong>Senha:</strong> {{$password}}</p>
                </div>
                <p>Utilize estas credenciais para acessar o sistema e começar a criar vagas para candidatos
                    imediatamente.</p>
                <p>Estamos ansiosos para ver as oportunidades que você irá disponibilizar e desejamos muito sucesso em
                    seus processos de seleção.</p>
                <a style="color: #FB670A;" href="http://localhost:5173" target="_blank">
                    Fazer login
                </a>
            </div>
        </div>
    </div>

</body>

</html>
