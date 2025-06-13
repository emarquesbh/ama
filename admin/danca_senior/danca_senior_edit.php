
<?php
// admin/ginastica/ginastica_edit.php
include_once("../includes/conexao.php");
if (!isset($_GET["id"])) {
    header("Location: listar_danca_senior.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM ginastica WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Ginástica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Ginástica</h2>
    <form method="post" action="processar_ginastica.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_ginastica.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: ginastica_edit.php

### INÍCIO DO ARQUIVO: yoga_edit.php
<?php
// admin/yoga/yoga_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_yoga.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM yoga WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Yoga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Yoga</h2>
    <form method="post" action="processar_yoga.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_yoga.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: yoga_edit.php

### INÍCIO DO ARQUIVO: postura_alongamento_edit.php
<?php
// admin/postura_alongamento/postura_alongamento_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_postura_alongamento.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM postura_alongamento WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Postura e Alongamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Postura e Alongamento</h2>
    <form method="post" action="processar_postura_alongamento.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_postura_alongamento.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: postura_alongamento_edit.php

### INÍCIO DO ARQUIVO: celular_edit.php
<?php
// admin/celular/celular_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_celular.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM celular WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Celular</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Celular</h2>
    <form method="post" action="processar_celular.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_celular.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: celular_edit.php

### INÍCIO DO ARQUIVO: informatica_edit.php
<?php
// admin/informatica/informatica_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_informatica.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM informatica WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Informática</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Informática</h2>
    <form method="post" action="processar_informatica.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_informatica.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: informatica_edit.php

### INÍCIO DO ARQUIVO: turmas_edit.php
<?php
// admin/turmas/turmas_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_turmas.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM turmas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Turmas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Turmas</h2>
    <form method="post" action="processar_turmas.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_turmas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: turmas_edit.php

### INÍCIO DO ARQUIVO: cursos_edit.php
<?php
// admin/cursos/cursos_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_cursos.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM cursos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Cursos</h2>
    <form method="post" action="processar_cursos.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_cursos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: cursos_edit.php

### INÍCIO DO ARQUIVO: danca_salao_edit.php
<?php
// admin/danca_salao/danca_salao_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_danca_salao.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM danca_salao WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dança de Salão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Dança de Salão</h2>
    <form method="post" action="processar_danca_salao.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_danca_salao.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
### FIM DO ARQUIVO: danca_salao_edit.php

### INÍCIO DO ARQUIVO: danca_senior_edit.php
<?php
// admin/danca_senior/danca_senior_edit.php

include_once("../includes/conexao.php");

if (!isset($_GET["id"])) {
    header("Location: listar_danca_senior.php");
    exit;
}

$id = intval($_GET["id"]);
$stmt = $mysqli->prepare("SELECT * FROM danca_senior WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dado = $result->fetch_assoc();

if (!$dado) {
    echo "Registro não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dança Sênior</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({ selector: '#descricao' });
    </script>
</head>
<body class="container mt-4">
    <h2>Editar Registro - Dança Sênior</h2>
    <form method="post" action="processar_danca_senior.php">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $dado['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" name="data" id="data" value="<?= $dado['data'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="text" name="dias" id="dias" value="<?= htmlspecialchars($dado['dias']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horários:</label>
            <input type="text" name="horarios" id="horarios" value="<?= htmlspecialchars($dado['horarios']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="mensalidade" class="form-label">Mensalidade:</label>
            <input type="text" name="mensalidade" id="mensalidade" value="<?= htmlspecialchars($dado['mensalidade']) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="listar_danca_senior.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>