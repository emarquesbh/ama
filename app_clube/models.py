# app_clube/models.py
from django.db import models

class Curso(models.Model):
    nome = models.CharField(max_length=255)
    descricao = models.TextField()
    dias = models.CharField(max_length=100)
    horario = models.CharField(max_length=50)
    mensalidade = models.DecimalField(max_digits=8, decimal_places=2)
    status = models.CharField(max_length=20)

    def __str__(self):
        return self.nome

class Evento(models.Model):
    titulo = models.CharField(max_length=255)
    descricao = models.TextField()
    data_evento = models.DateField()
    horario = models.CharField(max_length=50)
    local = models.CharField(max_length=255)
    imagem_capa = models.ImageField(upload_to='uploads/eventos/maior/')
    status = models.CharField(max_length=20)

    def __str__(self):
        return self.titulo

class Viagem(models.Model):
    titulo = models.CharField(max_length=255)
    descricao = models.TextField()
    data_saida = models.DateField()
    data_retorno = models.DateField()
    local_destino = models.CharField(max_length=255)
    preco = models.DecimalField(max_digits=10, decimal_places=2)
    imagem_capa = models.ImageField(upload_to='uploads/viagens/maior/')
    status = models.CharField(max_length=20)

    def __str__(self):
        return self.titulo

class Reflexao(models.Model):
    texto_resumido = models.TextField()
    e_palavra_do_padre = models.BooleanField(default=False)

    def __str__(self):
        return self.texto_resumido[:20]  # Retorna os primeiros 20 caracteres
