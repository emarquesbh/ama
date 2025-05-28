
// Aqui começa código 3: core/Controller.php
// Pasta: core/

<?php
/**
 * Arquivo: Controller.php
 * Pasta: core/
 * Descrição: Classe base para todos os controladores do sistema
 */

class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}

// Aqui termina código 3