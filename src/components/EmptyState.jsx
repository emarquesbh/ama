// src/components/EmptyState.jsx
import React from 'react';
import { Button, Alert } from 'react-bootstrap';

/**
 * Componente para exibir estado vazio com mensagem e ação
 * @param {string} message - Mensagem a ser exibida
 * @param {string} actionText - Texto do botão de ação
 * @param {Function} onAction - Função chamada ao clicar no botão
 */
const EmptyState = ({ message, actionText, onAction }) => {
  return (
    <Alert variant="info" className="text-center p-5">
      <i className="fas fa-info-circle fa-3x mb-3"></i>
      <p className="mb-3">{message}</p>
      {onAction && (
        <Button variant="primary" onClick={onAction}>
          {actionText}
        </Button>
      )}
    </Alert>
  );
};

export default EmptyState;