// src/pages/Cursos.jsx
import React, { useState } from 'react';
import { Table, Button, Form, Modal, Alert } from 'react-bootstrap';

const Cursos = () => {
  // Estado para armazenar a lista de cursos
  const [cursos, setCursos] = useState([]);
  
  // Estado para controlar a exibição do modal
  const [showModal, setShowModal] = useState(false);
  
  // Estado para armazenar o curso atual sendo editado/criado
  const [currentCurso, setCurrentCurso] = useState({
    id: null,
    nome: '',
    descricao: '',
    cargaHoraria: 0
  });
  
  // Estado para controlar se estamos editando ou criando
  const [isEditing, setIsEditing] = useState(false);

  // Função para abrir o modal de adição
  const handleAdd = () => {
    setCurrentCurso({
      id: null,
      nome: '',
      descricao: '',
      cargaHoraria: 0
    });
    setIsEditing(false);
    setShowModal(true);
  };

  // Função para abrir o modal de edição
  const handleEdit = (curso) => {
    setCurrentCurso({ ...curso });
    setIsEditing(true);
    setShowModal(true);
  };

  // Função para excluir um curso
  const handleDelete = (id) => {
    if (window.confirm('Tem certeza que deseja excluir este curso?')) {
      setCursos(cursos.filter(curso => curso.id !== id));
    }
  };

  // Função para salvar um curso (criar ou atualizar)
  const handleSave = () => {
    if (!currentCurso.nome.trim()) {
      alert('O nome do curso é obrigatório!');
      return;
    }

    if (isEditing) {
      // Atualizar curso existente
      setCursos(cursos.map(curso => 
        curso.id === currentCurso.id ? currentCurso : curso
      ));
    } else {
      // Criar novo curso
      const newCurso = {
        ...currentCurso,
        id: Date.now() // Usar timestamp como ID temporário
      };
      setCursos([...cursos, newCurso]);
    }

    // Fechar o modal e limpar o formulário
    setShowModal(false);
  };

  // Função para atualizar os campos do formulário
  const handleChange = (e) => {
    const { name, value } = e.target;
    setCurrentCurso({
      ...currentCurso,
      [name]: name === 'cargaHoraria' ? parseInt(value) || 0 : value
    });
  };

  return (
    <div>
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestão de Cursos</h1>
        <Button variant="primary" onClick={handleAdd}>
          <i className="fas fa-plus me-2"></i>Adicionar Curso
        </Button>
      </div>

      {cursos.length === 0 ? (
        <Alert variant="info">
          <i className="fas fa-info-circle me-2"></i>
          Nenhum curso cadastrado. Clique em "Adicionar Curso" para começar.
        </Alert>
      ) : (
        <Table striped bordered hover responsive>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Carga Horária</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {cursos.map(curso => (
              <tr key={curso.id}>
                <td>{curso.nome}</td>
                <td>{curso.descricao}</td>
                <td>{curso.cargaHoraria} horas</td>
                <td>
                  <Button 
                    variant="outline-primary" 
                    size="sm" 
                    className="me-2"
                    onClick={() => handleEdit(curso)}
                  >
                    <i className="fas fa-edit"></i>
                  </Button>
                  <Button 
                    variant="outline-danger" 
                    size="sm"
                    onClick={() => handleDelete(curso.id)}
                  >
                    <i className="fas fa-trash"></i>
                  </Button>
                </td>
              </tr>
            ))}
          </tbody>
        </Table>
      )}

      {/* Modal para adicionar/editar curso */}
      <Modal show={showModal} onHide={() => setShowModal(false)}>
        <Modal.Header closeButton>
          <Modal.Title>{isEditing ? 'Editar Curso' : 'Adicionar Curso'}</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form>
            <Form.Group className="mb-3">
              <Form.Label>Nome do Curso</Form.Label>
              <Form.Control 
                type="text" 
                name="nome" 
                value={currentCurso.nome} 
                onChange={handleChange} 
                required 
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Descrição</Form.Label>
              <Form.Control 
                as="textarea" 
                rows={3} 
                name="descricao" 
                value={currentCurso.descricao} 
                onChange={handleChange} 
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Carga Horária (horas)</Form.Label>
              <Form.Control 
                type="number" 
                name="cargaHoraria" 
                value={currentCurso.cargaHoraria} 
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

export default Cursos;