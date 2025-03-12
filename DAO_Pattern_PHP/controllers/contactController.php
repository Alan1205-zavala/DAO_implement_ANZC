<?php

require_once __DIR__ . "/../facades/ServiceFacade.php";

function render()
{
    $facade = new ServiceFacade();
    $userInfo = $facade->getUserInfo();

    $content = "<h1>Contacto</h1>
                <p>¿Tienes alguna pregunta o comentario? ¡Contáctanos!</p>
                <form id='contactForm' class='needs-validation' novalidate>
                    <div class='mb-3'>
                        <label for='name' class='form-label'>Nombre</label>
                        <input type='text' class='form-control' id='name' required>
                        <div class='invalid-feedback'>Por favor, ingresa tu nombre.</div>
                    </div>
                    <div class='mb-3'>
                        <label for='email' class='form-label'>Correo Electrónico</label>
                        <input type='email' class='form-control' id='email' required>
                        <div class='invalid-feedback'>Por favor, ingresa un correo válido.</div>
                    </div>
                    <div class='mb-3'>
                        <label for='message' class='form-label'>Mensaje</label>
                        <textarea class='form-control' id='message' rows='5' required></textarea>
                        <div class='invalid-feedback'>Por favor, ingresa un mensaje.</div>
                    </div>
                    <button type='submit' class='btn btn-primary'>Enviar</button>
                </form>
                <p>Usuario actual: {$userInfo['name']} ({$userInfo['role']})</p>";
    include_once "views/contact.php";
}
