document.addEventListener("DOMContentLoaded", function(event) {
    let time = 10000,
        currentSectionIndex = 0,
        sections = document.querySelectorAll(".slider_about_us section"),
        max = sections.length;

    function nextSection() {
        sections[currentSectionIndex].classList.remove("selected");
        currentSectionIndex++;
        if (currentSectionIndex >= max) {
            currentSectionIndex = 0;
        }
        sections[currentSectionIndex].classList.add("selected");
    }
    setInterval(nextSection, time);

    let bt_enviar = document.getElementById("bt_enviar");

    bt_enviar.addEventListener("click", () => {
        let captcha_response = grecaptcha.getResponse();
        let div_captcha = document.getElementById("captcha");

        let u_nome = document.getElementById("nome").value;
        let u_email = document.getElementById("email").value;
        let u_mensagem = document.getElementById("mensagem").value;

        let div_campos = document.getElementById("campos");

        if (u_nome.length == 0 || u_email.length == 0 || u_mensagem.length == 0) {
            div_campos.style.display = 'flex';
            setTimeout(function() {
                div_campos.style.display = 'none';
            }, 3000);
        } else if (captcha_response.length == 0) {
            div_captcha.style.display = 'flex';
            setTimeout(function() {
                div_captcha.style.display = 'none';
            }, 3000);
        } else {
            let div_processando = document.getElementById("processando");
            let div_email_ok = document.getElementById("email_ok");
            let div_email_nok = document.getElementById("email_nok");

            $.ajax({
                url: 'https://localhost/Dummer/verifyCaptcha.php',
                type: 'POST',
                data: { g_recaptcha_response: captcha_response },
                dataType: 'json',
                success: function(data_captcha) {
                    if (data_captcha == "Captcha_Ok") {
                        div_processando.style.display = 'flex';
                        $.ajax({
                            url: 'https://localhost/Dummer/sendmail.php',
                            type: 'POST',
                            data: { nome: u_nome, email: u_email, msg: u_mensagem },
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                if (data == "Ok") {
                                    div_processando.style.display = 'none';
                                    div_email_ok.style.display = 'flex';
                                    setTimeout(function() {
                                        u_nome.value = '';
                                        u_email = '';
                                        u_mensagem = '';
                                        div_email_ok.style.display = 'none';
                                        location.reload();
                                    }, 3000);

                                } else {
                                    div_processando.style.display = 'none';
                                    div_email_nok.style.display = 'flex';
                                    setTimeout(function() {
                                        div_email_nok.style.display = 'none';
                                    }, 3000);
                                }
                            }
                        });
                    } else if (data_captcha == "Captcha_NOk") {
                        div_processando.style.display = 'none';
                        div_email_nok.style.display = 'flex';
                        setTimeout(function() {
                            div_email_nok.style.display = 'none';
                        }, 3000);

                    }
                }

            });

        }
    });
});