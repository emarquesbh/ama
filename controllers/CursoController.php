
<?php
require_once 'models/Curso.php';

class CursoController {
    private $curso;

    public function __construct($db) {
        $this->curso = new Curso($db);
    }

    public function index() {
        $cursos = $this->curso->getAll();
        include 'views/cursos/index.php';
    }
}
?>
