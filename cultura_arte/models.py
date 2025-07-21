# Path: cultura_arte/models.py
# Contém os modelos do app Cultura e Arte com suas subáreas
# Cada classe representa um submenu na administração do Django
# Pode ser expandido com novos campos no futuro

from django.db import models

class Violao(models.Model):
    nome = models.CharField("Nome do Aluno", max_length=255)
    horario = models.CharField("Horário", max_length=100)
    turma = models.CharField("Turma", max_length=50)

    def __str__(self):
        return self.nome

class Celular(models.Model):
    nome = models.CharField("Nome do Participante", max_length=255)
    aparelho = models.CharField("Modelo do Aparelho", max_length=100)

    def __str__(self):
        return self.nome

class Informatica(models.Model):
    nome = models.CharField("Nome", max_length=255)
    nivel = models.CharField("Nível de Conhecimento", max_length=100)

    def __str__(self):
        return self.nome

class Teclado(models.Model):
    nome = models.CharField("Aluno", max_length=255)
    experiencia = models.TextField("Experiência anterior", blank=True)

    def __str__(self):
        return self.nome

class Bonecando(models.Model):
    nome = models.CharField("Nome", max_length=255)
    material = models.CharField("Material usado", max_length=100)

    def __str__(self):
        return self.nome
