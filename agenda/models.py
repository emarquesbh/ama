# agenda/models.py
from django.db import models

class Compromisso(models.Model):
    nome_completo = models.CharField("Nome completo", max_length=100)
    endereco_completo = models.TextField("Endereço completo")
    descricao = models.TextField("Descrição do compromisso", blank=True)
    data_hora = models.DateTimeField("Data e Hora do compromisso")

    def __str__(self):
        return f"{self.nome_completo} - {self.data_hora.strftime('%d/%m/%Y %H:%M')}"

