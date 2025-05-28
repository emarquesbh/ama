<?php
/**
 * Arquivo: HomeController.php
 * Pasta: app/controllers/
 * Descrição: Controlador da página inicial da área administrativa.
 */

require_once '../app/helpers/auth.php';

class HomeController extends Controller {
    public function index() {
        exigirLogin();
        $this->view('home/index');
    }
}
