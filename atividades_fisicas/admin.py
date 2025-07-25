# Path: C:\clube_amizade\atividades_fisicas\admin.py
from django.contrib import admin
from .models import Ginastica, Yoga, PosturaAlongamento, DancaSenior

class BaseAtividadeAdmin(admin.ModelAdmin):
    list_display = ('titulo', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'valor', 'quem_atualizou', 'atualizado_em')

admin.site.register(Ginastica, BaseAtividadeAdmin)
admin.site.register(Yoga, BaseAtividadeAdmin)
admin.site.register(PosturaAlongamento, BaseAtividadeAdmin)
admin.site.register(DancaSenior, BaseAtividadeAdmin)
