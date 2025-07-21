# Path: cursos/admin.py
# Registro dos modelos Yoga e Categoria no painel administrativo do Django
# Configura exibição personalizada para facilitar busca e listagem

from django.contrib import admin
from cursos.models.yoga import Yoga
from cursos.models.categoria import Categoria
from django.db import models
from tinymce.widgets import TinyMCE

class YogaAdmin(admin.ModelAdmin):
    list_display = ('titulo', 'dia', 'horario', 'turma', 'valor', 'atualizado_por', 'atualizado_em')
    search_fields = ('titulo', 'turma')
    list_filter = ('dia', 'horario', 'turma')
    formfield_overrides = {
        models.TextField: {'widget': TinyMCE(attrs={'cols': 80, 'rows': 20})},
    }

class CategoriaAdmin(admin.ModelAdmin):
    list_display = ('nome', 'quem_atualizou', 'quando_atualizou')
    search_fields = ('nome',)
    readonly_fields = ('quando_atualizou', 'created_at', 'updated_at')

admin.site.register(Yoga, YogaAdmin)
admin.site.register(Categoria, CategoriaAdmin)
