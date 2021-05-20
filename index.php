<!--API reCAPTCHA GOOGLE
Site Key: 6LeCn9waAAAAANyJurvyXGeXy1Jn9G6EbzeKg0BW
Secret Key: 6LeCn9waAAAAAFFx1qhWeQbt1l4zSICNUhgalcFV
-->
<?php
if(isset($_POST['submit'])){
    
    $secretKey = "6LeCn9waAAAAAFFx1qhWeQbt1l4zSICNUhgalcFV";
    $responseKey =$_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $response = file_get_contents($url);
    $json_response = json_decode($response);

    if($json_response->success){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        $email_remetente = "rd.estudar@gmail.com";
        $email_destinatario = "rogerdummer@gmail.com";
        $email_reply = "$email";
        $email_assunto = "Contato do site";

        $email_conteudo = "Nome = $nome \n";
        $email_conteudo .= "Email = $email \n";
        $email_conteudo .= "Mensagem = $msg \n";

        $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );

        if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
            echo "</b>E-Mail enviado com sucesso!</b>"; 
            } else {
                echo "</b>Falha no envio do E-Mail!</b>";
            }
    } else {
        echo "Erro!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/logodados.png">
    <link rel="stylesheet" type="text/css" href="./styles/cabecalho.css">
    <link rel="stylesheet" type="text/css" href="./styles/index.css">
    <link rel="stylesheet" type="text/css" href="./styles/rodape.css">
    <title>Dummer Tecnologia Hospitalar</title>
    <script type="text/javascript" src="./js/index.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <a href="index.html"><img id="img1" src="./assets/logodados.png" alt="Logo Dummer Hospitalar"></a>
            </div>
            <div class="navigation">
                <a class="links" href="#space_between_home">Home</a>
                <a class="links" href="#space_between_assistencia">Assistência Técnica</a>
                <a class="links" href="#space_between_servicos">Serviços</a>
                <a class="links" href="#space_between_contato">Contato</a>
            </div>
        </div>
        <div class="space_between" id="space_between_home"></div>
    </header>
    <div class="slider_about_us" id="home">
        <section id="sec1" class="selected">
            <div id="content1" class="content1">
                <div class="content1_right">
                    <h1 class="content1_right_title">DUMMER TECNOLOGIA</h1>
                    <p class="content1_right_text">Há 11 anos oferecendo serviços diferenciados e exclusivos com o atributo que considera a máxima em atendimento ao cliente: Pessoalidade.</p>
                </div>
                <div class="content1_left">
                    <img class="atb_pessoalidade" src="assets/pessoalidade.jpg" alt="atb_pessoalidade">
                </div>
            </div>
        </section>
        <section id="sec2">
            <div id="content2" class="content2">
                <div class="content2_right">
                    <h1 class="content2_right_title">ATENDIMENTO HUMANIZADO</h1>
                    <p class="content2_right_text">Nossos técnicos, há mais de 18 anos no ambiente do comércio e da manutenção de equipamentos médicos, compreendem as necessidades e buscam as soluções mais apropriadas para cada cliente, sem fórmulas prontas.</p>
                </div>
                <div class="content2_left">
                    <img class="atb_tecnico" src="assets/tecnico.webp" alt="atb_tec">
                </div>
            </div>
        </section>
    </div>
    <div class="space_between" id="space_between_assistencia"></div>
    <div class="assistencia" id="assistencia">
        <div class="assistencia_title">
            <h1>ASSISTÊNCIA TÉCNICA AUTORIZADA</h1>
        </div>
        <div class="assistencia_images">
            <div class="assistencia_images_l1">
                <a href="https://www.medpej.com.br/" target="_blank"><img src="./assets/medpej.webp" alt="Logo Medpej"></a>
                <a href="https://www.oxigel.com.br/" target="_blank"><img src="./assets/oxigel.webp" alt="Logo Oxigel"></a>
                <a href="https://sandersdobrasil.com.br/" target="_blank"><img src="./assets/sanders.webp" alt="Logo Sanders"></a>
            </div>
            <div class="assistencia_images_l2">
                <a href="http://www.sismatec.com.br/" target="_blank"><img src="./assets/sismatec.webp" alt="Logo Sismatec"></a>
                <a href="https://sispack.com.br/" target="_blank"><img src="./assets/sispack.webp" alt="Logo Sispack"></a>
                <a href="https://tuttnauer.com/" target="_blank"><img src="./assets/tuttnauer.webp" alt="Logo Tuttnauer"></a>
            </div>
        </div>
    </div>
    <div class="space_between" id="space_between_servicos"></div>
    <div class="servicos" id="servicos">
        <div class="servicos_titulo">
            <h1>NOSSOS SERVIÇOS</h1>
        </div>
        <div class="servicos_conteudo">
            <div class="servicos_conteudo_s1">
                <img src="assets/servicos1.webp">
                <h2 class="conteudo_titulo">Serviços de Assesoria</h2>
                <p class="conteudo_paragrafo">Conhecer a retaguarda dos estabelecimentos de saúde permite saber as reais necessidades e oferecer soluções otimizadas, com foco em funcionalidade, operacionalidade e geração de economia. Quando tiver dúvidas ao adquiri equipamentos, solicite
                    nossa assessoria.
                </p>
            </div>
            <div class="servicos_conteudo_s2">
                <img src="assets/servicos2.webp">
                <h2 class="conteudo_titulo">Contratos de Manutenção</h2>
                <p class="conteudo_paragrafo">Mais do que apenas revisões e relatórios, tenha na Dummer Tecnologia a tranquilidade de que seu parque tecnológico está sob a responsabilidade técnica e cível de profissionais ligados aos conselhos e às agências fiscalizadoras, os quais
                    lhe ajudarão sempre que houver exigências das agências sobre sua documentação, além de manter seus equipamentos em pleno funcionamento.</p>
            </div>
            <div class="servicos_conteudo_s3">
                <img src="assets/servicos3.webp">
                <h2 class="conteudo_titulo">Serviços de alta complexidade</h2>
                <p class="conteudo_paragrafo">Manutenção em ventiladores pulmonares, aparelhos de anestesia, microscópios cirúrgicos e biológicos, ampliação e reparos em redes de gases medicinais, automação e modernização de autoclaves e automações diversas.</p>
            </div>
        </div>
    </div>
    <div class="space_between" id="space_between_contato"></div>
    <div class="contato_e_mapa" id="contato">
        <div class="contato">
            <form action="<?php $PHP_SELF; ?>" method="POST">
            <h1 class="contato_titulo">CONTATO</h1>
            <p class="contato_info">Nome: </p>
            <input id="nome" value="" required="" name="nome" type="name" placeholder="Digite seu nome">
            <p class="contato_info">E-mail: </p>
            <input id="email" value="" required="" name="email" type="email" placeholder="Digite seu e-mail">
            <p class="contato_info">Mensagem: </p>
            <textarea id="mensagem" value="" name="msg" placeholder="Digite sua mensagem" required></textarea>
            <div class="botao_e_captcha">
            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeCn9waAAAAANyJurvyXGeXy1Jn9G6EbzeKg0BW"></div>
            <button type="submit" name="submit" id="bt_enviar">ENVIAR</button>
            </div>
            </form>
        </div>
        <div class="mapa"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.638313106403!2d-51.09391188527299!3d-30.04723268188128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95199e095f7cd2f9%3A0xf50e612416d8c7e0!2sAv.%20Prot%C3%A1sio%20Alves%2C%2012403%20-%20M%C3%A1rio%20Quintana%2C%20Porto%20Alegre%20-%20RS%2C%2091260-000!5e0!3m2!1spt-BR!2sbr!4v1620837906711!5m2!1spt-BR!2sbr"
                width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
    </div>
    <footer>
    <div class="footer">
        <img class="footer_logo" src="assets/logodados.png">
        <address>
            <p>Av. Protásio Alves, 12403, Mário Quintana - Porto Alegre, RS - 91260-000</p>
        </address>
        <p>(51) 9 8132-4965</p>
        <p>at@dummer.srv.br</p>
        <p>10.948.006/0001-49</p>
        <p>&copy Dummer Tecnologia Hospitalar</p>
    </div>
</footer>
</body>

</html>