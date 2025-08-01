from django.db import models
from ckeditor.fields import RichTextField
from PIL import Image
# Path: C:\clube_amizade\atividades_fisicas\models.py
from django.conf import settings

def imagem_upload_path(instance, filename):
    return f'atividades_fisicas/imagens/{filename}'

class Imagem(models.Model):
    imagem = models.ImageField(upload_to=imagem_upload_path)
    legenda = models.CharField(max_length=255, blank=True)

    def save(self, *args, **kwargs):
        super().save(*args, **kwargs)
        img_path = self.imagem.path
        img = Image.open(img_path)
        max_size = (1280, 720)
        if img.height > max_size[1] or img.width > max_size[0]:
            img.thumbnail(max_size)
            img.save(img_path)

    def __str__(self):
        return self.legenda or f"Imagem {self.id}"

class BaseAtividade(models.Model):
    titulo = models.CharField(max_length=255)
    descricao = RichTextField()
    data_inicio = models.DateField()
    data_fim = models.DateField()
    hora_inicio = models.TimeField()
    hora_fim = models.TimeField()
    valor = models.DecimalField(max_digits=10, decimal_places=2, null=True, blank=True)
    quem_atualizou = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.SET_NULL, null=True, blank=True)
    imagem = models.ImageField(upload_to='atividades_fisicas/imagens/', null=True, blank=True)
    imagem1 = models.ImageField(upload_to='atividades_fisicas/imagens/', null=True, blank=True)
    imagem2 = models.ImageField(upload_to='atividades_fisicas/imagens/', null=True, blank=True)
    imagem3 = models.ImageField(upload_to='atividades_fisicas/imagens/', null=True, blank=True)
    criado_em = models.DateTimeField(auto_now_add=True)
    atualizado_em = models.DateTimeField(auto_now=True)

    class Meta:
        abstract = True

    def __str__(self):
        return self.titulo

class Ginastica(BaseAtividade): pass
class Yoga(BaseAtividade): pass
class PosturaAlongamento(BaseAtividade): pass
class DancaSenior(BaseAtividade): pass


