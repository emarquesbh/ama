from django.db import models

class Ginastica(models.Model):
    nome = models.CharField(max_length=100)
    descricao = models.TextField()
    duracao = models.PositiveIntegerField(help_text="Duração em minutos")
    data_criacao = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.nome
