<?php
// controllers/homeController.php
require_once __DIR__ . "/../facades/ServiceFacade.php";

function render()
{
    $facade = new ServiceFacade();
    $userInfo = $facade->getUserInfo();
    $welcomeMessage = $facade->getWelcomeMessage();
    $allUsers = $facade->getAllUsers();

    $content = "<h1>Bienvenido a la Página de Inicio</h1>
                <p>{$welcomeMessage}</p>
                <p>Usuario: {$userInfo['name']} ({$userInfo['role']})</p>
                <p>¡Disfruta de la música de fondo!</p>

                <h2>Mecanismo de la Fachada y DAO</h2>
                <p>
                    La Fachada está obteniendo datos del servicio de usuarios a través del patrón DAO (Data Access Object).<br>
                    El DAO es responsable de interactuar directamente con la base de datos para realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar).<br>
                    En este caso, se están realizando las siguientes operaciones:
                </p>
                <ul>
                    <li>Obtener un usuario aleatorio desde la base de datos.</li>
                    <li>Obtener todos los usuarios desde la base de datos.</li>
                </ul>

                <h3>Lista de Usuarios</h3>
                <pre>" . json_encode($allUsers, JSON_PRETTY_PRINT) . "</pre>";
    include_once "views/home.php";
}
