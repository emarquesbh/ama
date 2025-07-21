# Path: projeto/models.py
# Define os modelos do app Projeto com atividades sociais e terapêuticas
# Cada classe representa uma atividade a ser gerenciada no admin
# Pode evoluir para uso em formulários e agendamentos futuros

from django.db import models

class GinasticaCerebral(models.Model):
    nome = models.CharField("Nome do Participante", max_length=255)
    observacoes = models.TextField("Observações", blank=True)

    def __str__(self):
        return self.nome

class Danca(models.Model):
    nome = models.CharField("Participante", max_length=255)
    estilo = models.CharField("Estilo de Dança", max_length=100)

    def __str__(self):
        return self.nome

class Pilates(models.Model):
    nome = models.CharField("Nome", max_length=255)
    nivel = models.CharField("Nível", max_length=100)

    def __str__(self):
        return self.nome

class GrupoConvivenciaTerapeutica(models.Model):
    nome = models.CharField("Nome do Integrante", max_length=255)
    tema = models.CharField("Tema Terapêutico", max_length=255)

    def __str__(self):
        return self.nome

class TaiChiChuan(models.Model):
    nome = models.CharField("Nome", max_length=255)
    grau = models.CharField("Grau", max_length=100)

    def __str__(self):
        return self.nome

class PinturaEmTecido(models.Model):
    nome = models.CharField("Participante", max_length=255)
    tecnica = models.CharField("Técnica Utilizada", max_length=100)

    def __str__(self):
        return self.nome

