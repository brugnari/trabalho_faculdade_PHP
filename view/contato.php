<?php

include('../public/includes/tamplate.php');

?>



<style>
    body {
        background-position: left;
        background-repeat: no-repeat;
    }
</style>


<div class="centralizar">

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"></label>
        <input type="email" id="username" class="form-control" id="exampleFormControlInput1" placeholder="E-mail para contato" name="username">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <textarea class="form-control" id="message" rows="3" placeholder="Duvidas e Sugestões " name="message"></textarea>
    </div>

    <button type="button" class="btn btn-primary" onclick="enviarDado()" id="liveToastBtn">Enviar</button>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReYLYR6nPjYwUAjF7M3tDm18NGzEgaYFiyUA&s" class="rounded me-2" >
            <strong class="me-auto"></strong>
            
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Mensagem enviada com sucesso!<br>
            <strong>Obrigado por entrar em contato!</strong>
        </div>
    </div>
</div>

<script>
    function enviarDado() {
        const username = document.getElementById('username');
        const message = document.getElementById('message');
        fetch('webhook.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'username=' + encodeURIComponent(username.value) + '&' +
                    'message=' + encodeURIComponent(message.value)

            })
            .then(response => response.text())
            .then(data => {
                console.log('Sucesso:', data);
                username.value = '';
                message.value = '';
            })

            .catch(error => console.error('Erro:', error));

    }

    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
    }
</script>