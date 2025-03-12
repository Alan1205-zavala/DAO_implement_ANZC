<?php
// dao/UsuarioDAO.php
interface UsuarioDAO
{
    public function obtenerTodos();
    public function obtenerPorId($id);
    public function obtenerAleatorio();
}
