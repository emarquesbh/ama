// src/pages/Matriculas.jsx
import React, { useState, useEffect } from 'react';
import { Container, Modal, Form, Button, Badge } from 'react-bootstrap';
import EntityList from '../components/EntityList';
import api from '../services/api';

const Matriculas = () => {
  const [matriculas, setMatriculas] = useState([]);
  const [alunos, setAlunos] = useState([]);
  const [turmas, setTurmas] = useState([]);
  const [showModal, setShowModal] = useState(false);
  const [currentMatricula, setCurrentMatricula] = useState({ 
    alunoId: '', 
    turmaId: '', 
    dataMatricula: new Date().toISOString().split('T')[0],
    status: 'Ativa'
  });
  const [isEditing, setIsEditing] = useState(false);
  
  // Colunas para a tabela de matrículas
  const columns = [
    { header: 'Aluno', accessor: (item) => item.aluno?.nome || 'N/A' },
    { header: 'Turma', accessor: (item) => item.turma?.nome || 'N/A' },
    { header: 'Curso', accessor: (item) => item.turma?.curso?.nome || 'N/A' },
    { header: 'Data da Matrícula', accessor: (item) => formatDate(item.dataMatricula) },
    { 
      header: 'Status', 
      accessor: (item) => (
        <Badge bg={getStatusColor(item.status)}>
          {item.status}
        </Badge>
      ) 
    },
  ];
  
  // Definir cor do badge de acordo com o status
  const getStatusColor = (status) => {
    switch (status) {
      case 'Ativa': return 'success';
      case 'Cancelada': return 'danger';
      case 'Concluída': return 'primary';
      case 'Trancada': return 'warning';
      default: return 'secondary';
    }
  };
  
  // Formatar data
  const formatDate = (dateString) => {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('pt-BR');
  };
  
  // Carregar dados ao montar o componente
  useEffect(() => {
    loadMatriculas();
    loadAlunos();
    loadTurmas();
  }, []);
  
  // Função para carregar matrículas da API
  const loadMatriculas = async () => {
    try {
      const response = await api.get('/matriculas');
      setMatriculas(response.data);
    } catch (error) {
      console.error('Erro ao carregar matrículas:', error);
      setMatriculas([]);
    }
  };
  
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
  
  // Função para carregar turmas da API
  const loadTurmas = async () => {
    try {
      const response = await api.get('/turmas');
      setTurmas(response.data);
    } catch (error) {
      console.error('Erro ao carregar turmas:', error);
      setTurmas([]);
    }
  };
  
  // Função para abrir modal de adição
  const handleAdd = () => {
    setCurrentMatricula({ 
      alunoId: alunos.length > 0 ? alunos[0].id : '', 
      turmaId: turmas.length > 0 ? turmas[0].id : '', 
      dataMatricula: new Date().toISOString().split('T')[0],
      status: 'Ativa'
    });
    setIsEditing(false);
    setShowModal(true);
  };
  
  // Função para abrir modal de edição
  const handleEdit = (matricula) => {
    setCurrentMatricula({
      ...matricula,
      alunoId: matricula.aluno?.id || '',
      turmaId: matricula.turma?.id || ''
    });
    setIsEditing(true);
    setShowModal(true);
  };
  
  // Função para excluir matrícula
  const handleDelete = async (matricula) => {
    if (window.confirm(`Deseja realmente excluir a matrícula de ${matricula.aluno?.nome || 'aluno'} na turma ${matricula.turma?.nome || 'turma'}?`)) {
      try {
        await api.delete(`/matriculas/${matricula.id}`);
        loadMatriculas();
      } catch (error) {
        console.error('Erro ao excluir matrícula:', error);
        alert('Erro ao excluir matrícula. Tente novamente.');
      }
    }
  };
  
  // Função para salvar matrícula (criar ou atualizar)
  const handleSave = async () => {
    try {
      if (isEditing) {
        await api.put(`/matriculas/${currentMatricula.id}`, currentMatricula);
      } else {
        await api.post('/matriculas', currentMatricula);
      }
      setShowModal(false);
      loadMatriculas();
    