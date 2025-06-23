// src/pages/Turmas.jsx
import React, { useState } from 'react';
import { Table, Button, Form, Modal, Alert } from 'react-bootstrap';

const Turmas = () => {
  // Estado para armazenar a lista de turmas
  const [turmas, setTurmas] = useState([]);
  
  // Simulação de lista de cursos (em um app real, viria da API)
  const [cursos] = useState([
    { id: 1, nome: 'Informática Básica' },
    { id: 2, nome: 'Inglês para Iniciantes' },
    { id: 3, nome: 'Artesanato' }
  ]);
  
  // Estado para controlar a exibição do modal
  const [showModal, setShowModal] = useState(false);
  
  // Estado para armazenar a turma atual sendo editada/criada
  const [currentTurma, setCurrentTurma] = useState({
    id: null,
    nome: '',
    cursoId: '',
    dataInicio: '',
    dataFim: '',
    horario: '',
    vagas: 0
  });
  
  // Estado para controlar se estamos editando ou criando
  const [isEditing, setIsEditing] = useState(false);

  // Função para formatar data
  const formatDate = (dateString) => {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleDateString('pt-BR');
  };

  // Função para obter o nome do curso pelo ID
  const getCursoNome = (cursoId) => {
    const curso = cursos.find(c => c.id === parseInt(cursoId));
    return curso ? curso.nome : 'N/A';
  };

  // Função para abrir o modal de adição
  const handleAdd = () => {
    setCurrentTurma({
      id: null,
      nome: '',
      cursoId: cursos.length > 0 ? cursos[0].id : '',
      dataInicio: '',
      dataFim: '',
      horario: '',
      vagas: 0
    });
    setIsEditing(false);
    setShowModal(true);
  };

  // Função para abrir o modal de edição
  const handleEdit = (turma) => {
    setCurrentTurma({ ...turma });
    setIsEditing(true);
    setShowModal(true);
  };

  // Função para excluir uma turma
  const handleDelete = (id) => {
    if (window.confirm('Tem certeza que deseja excluir esta turma?')) {
      setTurmas(turmas.filter(turma => turma.id !== id));
    }
  };

  // Função para salvar uma turma (criar ou atualizar)
  const handleSave = () => {
    if (!currentTurma.nome.trim() || !currentTurma.cursoId) {
      alert('Nome da turma e curso são obrigatórios!');
      return;
    }

    if (isEditing) {
      // Atualizar turma existente
      setTurmas(turmas.map(turma => 
        turma.id === currentTurma.id ? currentTurma : turma
      ));
    } else {
      // Criar nova turma
      const newTurma = {
        ...currentTurma,
        id: Date.now() // Usar timestamp como ID temporário
      };
      setTurmas([...turmas, newTurma]);
    }

    // Fechar o modal e limpar o formulário
    setShowModal(false);
  };

  // Função para atualizar os campos do formulário
  const handleChange = (e) => {
    const { name, value } = e.target;
    setCurrentTurma({
      ...currentTurma,
      [name]: name === 'vagas' ? parseInt(value) || 0 : 
              name === 'cursoId' ? parseInt(value) || '' : value
    });
  };

  return (
    <div>
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestão de Turmas</h1>
        <Button variant="primary" onClick={handleAdd}>
          <i className="fas fa-plus me-2"></i>Adicionar Turma
        </Button>
      </div>

      {turmas.length === 0 ? (
        <Alert variant="info">
          <i className="fas fa-info-circle me-2"></i>
          Nenhuma turma cadastrada. Clique em "Adicionar Turma" para começar.
        </Alert>
      ) : (
        <Table striped bordered hover responsive>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Curso</th>
              <th>Período</th>
              <th>Horário</th>
              <th>Vagas</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {turmas.map(turma => (
              <tr key={turma.id}>
                <td>{turma.nome}</td>
                <td>{getCursoNome(turma.cursoId)}</td>
                <td>
                  {formatDate(turma.dataInicio)} a {formatDate(turma.dataFim)}
                </td>
                <td>{turma.horario}</td>
                <td>{turma.vagas}</td>
                <td>
                  <Button 
                    variant="outline-primary" 
                    size="sm" 
                    className="me-2"
                    onClick={() => handleEdit(turma)}
                  >
                    <i className="fas fa-edit"></i>
                  </Button>
                  <Button 
                    variant="outline-danger" 
                    size="sm"
                    onClick={() => handleDelete(turma.id)}
                  >
                    <i className="fas fa-trash"></i>
                  </Button>
                </td>
              </tr>
            ))}
          </tbody>
        </Table>
      )}

      {/* Modal para adicionar/editar turma */}
      <Modal show={showModal} onHide={() => setShowModal(false)}>
        <Modal.Header closeButton>
          <Modal.Title>{isEditing ? 'Editar Turma' : 'Adicionar Turma'}</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form>
            <Form.Group className="mb-3">
              <Form.Label>Nome da Turma</Form.Label>
              <Form.Control 
                type="text" 
                name="nome" 
                value={currentTurma.nome} 
                onChange={handleChange} 
                required 
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Curso</Form.Label>
              <Form.Select 
                name="cursoId" 
                value={currentTurma.cursoId} 
                onChange={handleChange} 
                required
              >
                <option value="">Selecione um curso</option>
                {cursos.map(curso => (
                  <option key={curso.id} value={curso.id}>
                    {curso.nome}
                  </option>
                ))}
              </Form.Select>
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Data de Início</Form.Label>
              <Form.Control 
                type="date" 
                name="dataInicio" 
                value={currentTurma.dataInicio} 
                onChange={handleChange} 
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Data de Término</Form.Label>
              <Form.Control 
                type="date" 
                name="dataFim" 
                value={currentTurma.dataFim} 
                onChange={handleChange} 
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Horário</Form.Label>
              <Form.Control 
                type="text" 
                name="horario" 
                value={currentTurma.horario} 
                onChange={handleChange} 
                placeholder="Ex: Segunda a Sexta, 08 às 17 h" 
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Vagas</Form.Label>
              <Form.Control 
                type="number" 
                name="vagas" 
                value={currentTurma.vagas} 
                onChange={handleChange} 
                min="0" 
              />
            </Form.Group>
          </Form>
        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={() => setShowModal(false)}>
            Cancelar
          </Button>
          <Button variant="primary" onClick={handleSave}>
            Salvar
          </Button>
        </Modal.Footer>
      </Modal>
    </div>
  );
};

export default Turmas;