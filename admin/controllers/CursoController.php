
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

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome' => $_POST['nome'],
                'descricao' => $_POST['descricao'],
                'dias' => implode(',', $_POST['dias']),
                'horario_inicio' => $_POST['horario_inicio'],
                'horario_fim' => $_POST['horario_fim'],
                'mensalidade' => $_POST['mensalidade'],
                'imagem_menor' => '',
                'imagem_maior' => '',
                'galeria_1' => '',
                'galeria_2' => '',
                'galeria_3' => '',
                'status' => $_POST['status'],
                'ordem' => $_POST['ordem']
            ];

            $this->curso->create($data);
            header('Location: index.php?controller=Curso&action=index');
            exit;
        }
        include 'views/cursos/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?controller=Curso&action=index');
            exit;
        }

        $curso = $this->curso->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nome' => $_POST['nome'],
                'descricao' => $_POST['descricao'],
                'dias' => implode(',', $_POST['dias']),
                'horario_inicio' => $_POST['horario_inicio'],
                'horario_fim' => $_POST['horario_fim'],
                'mensalidade' => $_POST['mensalidade'],
                'imagem_menor' => '',
                'imagem_maior' => '',
                'galeria_1' => '',
                'galeria_2' => '',
                'galeria_3' => '',
                'status' => $_POST['status'],
                'ordem' => $_POST['ordem']
            ];

            $this->curso->update($id, $data);
            header('Location: index.php?controller=Curso&action=index');
            exit;
        }

        include 'views/cursos/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->curso->delete($id);
        }
        header('Location: index.php?controller=Curso&action=index');
        exit;
    }
}
?>
