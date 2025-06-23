// src/pages/Alunos.jsx
import React, { useState, useEffect } from 'react';
import { Container, Modal, Form, Button } from 'react-bootstrap';
import EntityList from '../components/EntityList';
import api from '../services/api';

const Alunos = () => {
  const [alunos, setAlunos] = useState([]);
  const [showModal, setShowModal] = useState(false);
  const [currentAluno, setCurrentAluno] = useState({ 
    nome: '', 
    email: '', 
    telefone: '', 
    dataNascimento: '',
    cpf: ''
  });
  const [isEditing, setIsEditing] = useState(false);
  
  // Colunas para a tabela de alunos
  const columns = [
    { header: 'Nome', accessor: (item) => item.nome },
    { header: 'Email', accessor: (item) => item.email },
    { header: 'Telefone', accessor: (item) => item.telefone },
    { header: 'Data de Nascimento', accessor: (item) => formatDate(item.dataNascimento) },
    { header: 'CPF', accessor: (item) => item.cpf },
  ];
  
  // Formatar data
  const formatDate = (dateString) => {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('pt-BR');
  };
  
  // Carregar alunos ao montar o componente
  useEffect(() => {
    loadAlunos();
  }, []);
  
  // Função para carregar alunos da API
  const loadAlunos = async () => {
    try {
      const response = await api.get('/alunos');
      setAlunos(response.data);
    } catch (error) {
      console.error('Erro ao carregar alunos:', error);
      setAlunos([]);
    }
  };
  
  // Função para abrir modal de adição
  const handleAdd = () => {
    setCurrentAluno({ 
      nome: '', 
      email: '', 
      telefone: '', 
      dataNascimento: '',
      cpf: ''
    });
    setIsEditing(false);
    setShowModal(true);
  };
  
  // Função para abrir modal de edição
  const handleEdit = (aluno) => {
    setCurrentAluno(aluno);
    setIsEditing(true);
    setShowModal(true);
  };
  
  // Função para excluir aluno
  const handleDelete = async (aluno) => {
    if (window.confirm(`Deseja realmente excluir o aluno "${aluno.nome}"?`)) {
      try {
        await api.delete(`/alunos/${aluno.id}`);
        loadAlunos();
      } catch (error) {
        console.error('Erro ao excluir aluno:', error);
        alert('Erro ao excluir aluno. Tente novamente.');
      }
    }
  };
  
  // Função para salvar aluno (criar ou atualizar)
  const handleSave = async () => {
    try {
      if (isEditing) {
        await api.put(`/alunos/${currentAluno.id}`, currentAluno);
      } else {
        await api.post('/alunos', currentAluno);
      }
      setShowModal(false);
      loadAlunos();
    } catch (error) {
      console.error('Erro ao salvar aluno:', error);
      alert('Erro ao salvar aluno. Verifique os dados e tente novamente.');
    }
  };
  
  // Função para atualizar o estado do aluno atual
  const handleChange = (e) => {
    const { name, value } = e.target;
    setCurrentAluno({
      ...currentAluno,
      [name]: value
    });
  };
  
  return (
    <Container>
      <h2 className="my-4">Gestão de Alunos</h2>
      
      <EntityList
        entityName="Alunos"
        items={alunos}
        columns={columns}
        onAdd={handleAdd}
        onEdit={handleEdit}
        onDelete={handleDelete}
      />
      
      {/* Modal para adicionar/editar aluno */}
      <Modal show={showModal} onHide={() => setShowModal(false)}>
        <Modal.Header closeButton>
          <Modal.Title>{isEditing ? 'Editar Aluno' : 'Adicionar Aluno'}</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form>
            <Form.Group className="mb-3">
              <Form.Label>Nome</Form.Label>
              <Form.Control
                type="text"
                name="nome"
                value={currentAluno.nome}
                onChange={handleChange}
                required
              />
            </Form.Group>
            
            <Form.Group className="mb-3">
              <Form.Label>Email</Form.Label>
              <Form.Control
                type="email"
                name="email"
                value={currentAluno.email}
                onChange={handleChange}
                required
              />
            </Form.Group>
            
            <Form.Group className="mb-3">
              <Form.Label>Telefone</Form.Label>
              <Form.Control
                type="text"
                name="telefone"
                value={currentAluno.telefone}
                onChange={handleChange}
              />
            </Form.Group>
            
            <Form.Group className="mb-3">
              <Form.Label>Data de Nascimento</Form.Label>
              <Form.Control
                type="date"
                name="dataNascimento"
                value={currentAluno.dataNascimento}
                onChange={handleChange}
              />
            </Form.Group>
            
            <Form.Group className="mb-3">
              <Form.Label>CPF</Form.Label>
              <Form.Control
                type="text"
                name="cpf"
                value={currentAluno.cpf}
                onChange={handleChange}
                placeholder="000.000.000-00"
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
    </Container>
  );
};

export default Alunos;