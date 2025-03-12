<?php

require_once __DIR__ . "/../facades/ServiceFacade.php";

function render()
{
    $facade = new ServiceFacade();
    $userInfo = $facade->getUserInfo();

    $content = "<h1>Acerca de Nosotros</h1>
                <p>Somos una empresa dedicada a ofrecer soluciones innovadoras.</p>
                <p>Nuestro equipo está compuesto por profesionales altamente capacitados.</p>
                <p>Misión: Mejorar la vida de las personas a través de la tecnología.</p>
                <p>Usuario actual: {$userInfo['name']} ({$userInfo['role']})</p>";
    include_once "views/about.php";
}
