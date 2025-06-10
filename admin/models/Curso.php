
<?php
class Curso {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM cursos ORDER BY ordem ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM cursos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO cursos 
            (nome, descricao, dias, horario_inicio, horario_fim, mensalidade, imagem_menor, imagem_maior, galeria_1, galeria_2, galeria_3, status, ordem)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nome'], $data['descricao'], $data['dias'], $data['horario_inicio'], $data['horario_fim'], $data['mensalidade'],
            $data['imagem_menor'], $data['imagem_maior'],
            $data['galeria_1'], $data['galeria_2'], $data['galeria_3'],
            $data['status'], $data['ordem']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE cursos SET 
            nome = ?, descricao = ?, dias = ?, horario_inicio = ?, horario_fim = ?, mensalidade = ?, imagem_menor = ?, imagem_maior = ?, 
            galeria_1 = ?, galeria_2 = ?, galeria_3 = ?, status = ?, ordem = ? 
            WHERE id = ?");
        return $stmt->execute([
            $data['nome'], $data['descricao'], $data['dias'], $data['horario_inicio'], $data['horario_fim'], $data['mensalidade'],
            $data['imagem_menor'], $data['imagem_maior'],
            $data['galeria_1'], $data['galeria_2'], $data['galeria_3'],
            $data['status'], $data['ordem'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cursos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
