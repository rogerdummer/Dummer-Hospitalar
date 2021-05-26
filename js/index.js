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
        let captcha = document.getElementById("google_captcha");



        let u_nome = document.getElementById("nome").value;
        let u_email = document.getElementById("email").value;
        let u_mensagem = document.getElementById("mensagem").value;

        let div_campos = document.getElementById("campos");

        if (u_nome.length == 0 || u_email.length == 0 || u_mensagem.length == 0) {
            div_campos.style.display = 'flex';
            setTimeout(function() {
                div_campos.style.display = 'none';
            }, 3000);
        } else {
            let div_processando = document.getElementById("processando");
            let div_email_ok = document.getElementById("email_ok");
            let div_email_nok = document.getElementById("email_nok");
            div_campos.style.display = 'none';
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
                            div_email_ok.style.display = 'none';
                        }, 3000);
                        document.getElementById("nome").value = '';
                        document.getElementById("email").value = '';
                        document.getElementById("mensagem").value = '';

                    } else {
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