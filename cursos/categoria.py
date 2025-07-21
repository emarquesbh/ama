# Path: cursos/models/categoria.py
# Define o modelo Categoria com base na estrutura SQL fornecida
# Inclui nome, descrição, timestamps de criação e atualização, rastreamento de quem atualizou
# Usado para administração via painel Django
# Pode futuramente ser associado ao modelo Yoga ou outros cursos

from django.db import models

class Categoria(models.Model):
    nome = models.CharField("Nome da Categoria", max_length=255)
    descricao = models.TextField("Descrição", blank=True, null=True)
    quem_atualizou = models.CharField("Atualizado por", max_length=255)
    quando_atualizou = models.DateTimeField("Quando Atualizado", auto_now=True)
    created_at = models.DateTimeField("Criado em", auto_now_add=True)
    updated_at = models.DateTimeField("Atualizado em", auto_now=True)

    def __str__(self):
        return self.nome
