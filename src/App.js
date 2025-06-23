// src/App.js
import React from 'react';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import Cursos from './pages/Cursos';
import Turmas from './pages/Turmas';

function App() {
  return (
    <BrowserRouter>
      <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
        <div className="container">
          <Link className="navbar-brand" to="/">Clube da Amizade</Link>
          <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarNav">
            <ul className="navbar-nav">
              <li className="nav-item">
                <Link className="nav-link" to="/cursos">Cursos</Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/turmas">Turmas</Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/alunos">Alunos</Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/matriculas">Matrículas</Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div className="container mt-4">
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/cursos" element={<Cursos />} />
          <Route path="/turmas" element={<Turmas />} />
          <Route path="/alunos" element={<div><h1>Alunos</h1><p>Página em construção</p></div>} />
          <Route path="/matriculas" element={<div><h1>Matrículas</h1><p>Página em construção</p></div>} />
        </Routes>
      </div>
    </BrowserRouter>
  );
}

// Componente Home simples
const Home = () => (
  <div>
    <h1>Bem-vindo ao Clube da Amizade</h1>
    <p>Selecione uma opção no menu acima para começar.</p>
  </div>
);

export default App;