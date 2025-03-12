<?php
// dao/UsuarioDAOImpl.php
require_once __DIR__ . "/UsuarioDAO.php"; // Incluir la interfaz
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioDAOImpl implements UsuarioDAO
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion; // Asignar la conexión
    }

    public function obtenerTodos()
    {
        echo "DAO: Obteniendo todos los usuarios desde la base de datos.<br>"; // Mensaje de depuración
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $usuarios = [];
        foreach ($resultados as $fila) {
            $usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['rol']);
        }
        return $usuarios;
    }

    public function obtenerPorId($id)
    {
        echo "DAO: Obteniendo usuario con ID $id desde la base de datos.<br>"; // Mensaje de depuración
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['rol']);
        }
        return null;
    }

    public function obtenerAleatorio()
    {
        echo "DAO: Obteniendo un usuario aleatorio desde la base de datos.<br>"; // Mensaje de depuración
        $usuarios = $this->obtenerTodos();
        return $usuarios[array_rand($usuarios)];
    }
}
