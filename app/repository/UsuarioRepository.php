<?php

namespace cursophp7\app\repository;

use cursophp7\app\entity\Usuario;
use cursophp7\core\database\QueryBuilder;


class UsuarioRepository extends QueryBuilder
{
 
    public function __construct(string $table='usuarios', string $classEntity=Usuario::class)
    {
        parent::__construct($table, $classEntity);
    }

}