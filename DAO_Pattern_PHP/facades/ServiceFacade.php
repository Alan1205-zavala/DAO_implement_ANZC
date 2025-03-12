<?php
// facades/ServiceFacade.php
require_once __DIR__ . "/../dao/UsuarioDAOImpl.php";
require_once __DIR__ . "/../config/database.php";

class ServiceFacade
{
    private $usuarioDAO;

    public function __construct()
    {
        global $conexion; // Usar la conexión de database.php
        $this->usuarioDAO = new UsuarioDAOImpl($conexion);
    }

    public function getUserInfo()
    {
        $usuario = $this->usuarioDAO->obtenerAleatorio();
        return [
            'name' => $usuario->getNombre(),
            'email' => $usuario->getEmail(),
            'role' => $usuario->getRol()
        ];
    }

    public function getAllUsers()
    {
        $usuarios = $this->usuarioDAO->obtenerTodos();
        $resultados = [];
        foreach ($usuarios as $usuario) {
            $resultados[] = [
                'id' => $usuario->getId(),
                'name' => $usuario->getNombre(),
                'email' => $usuario->getEmail(),
                'role' => $usuario->getRol()
            ];
        }
        return $resultados;
    }

    public function getWelcomeMessage()
    {
        return "Bienvenido a nuestro sitio web. ¡Esperamos que disfrutes tu visita!";
    }
}
