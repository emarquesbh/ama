// src/components/EntityList.jsx
import React, { useState, useEffect } from 'react';
import { Button, Alert, Table, Card } from 'react-bootstrap';
import EmptyState from './EmptyState';

/**
 * Componente genérico para exibir listas de entidades
 * @param {string} entityName - Nome da entidade (ex: "Cursos", "Alunos")
 * @param {Array} items - Lista de itens a serem exibidos
 * @param {Array} columns - Configuração das colunas da tabela
 * @param {Function} onAdd - Função chamada ao clicar no botão de adicionar
 * @param {Function} onEdit - Função chamada ao clicar para editar um item
 * @param {Function} onDelete - Função chamada ao clicar para excluir um item
 */
const EntityList = ({ 
  entityName, 
  items = [], 
  columns = [], 
  onAdd, 
  onEdit, 
  onDelete 
}) => {
  return (
    <Card className="mb-4">
      <Card.Header className="d-flex justify-content-between align-items-center">
        <h5>{entityName}</h5>
        <Button variant="primary" onClick={onAdd}>
          <i className="fas fa-plus mr-1"></i> Adicionar {entityName.slice(0, -1)}
        </Button>
      </Card.Header>
      <Card.Body>
        {items.length === 0 ? (
          <EmptyState 
            message={`Nenhum registro de ${entityName.toLowerCase()} encontrado`} 
            actionText={`Adicionar ${entityName.slice(0, -1)}`}
            onAction={onAdd}
          />
        ) : (
          <Table responsive hover>
            <thead>
              <tr>
                {columns.map((col, idx) => (
                  <th key={idx}>{col.header}</th>
                ))}
                <th className="text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
              {items.map((item) => (
                <tr key={item.id}>
                  {columns.map((col, idx) => (
                    <td key={idx}>{col.accessor(item)}</td>
                  ))}
                  <td className="text-center">
                    <Button 
                      variant="outline-primary" 
                      size="sm" 
                      className="mr-2"
                      onClick={() => onEdit(item)}
                    >
                      <i className="fas fa-edit"></i>
                    </Button>
                    <Button 
                      variant="outline-danger" 
                      size="sm"
                      onClick={() => onDelete(item)}
                    >
                      <i className="fas fa-trash"></i>
                    </Button>
                  </td>
                </tr>
              ))}
            </tbody>
          </Table>
        )}
      </Card.Body>
    </Card>
  );
};

export default EntityList;