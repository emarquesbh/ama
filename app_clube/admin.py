# app_clube/admin.py
from django.contrib import admin
from .models import Curso, Evento, Viagem, Reflexao

class CursoAdmin(admin.ModelAdmin):
    list_display = ('nome', 'dias', 'horario', 'mensalidade', 'status')
    search_fields = ('nome',)

class EventoAdmin(admin.ModelAdmin):
    list_display = ('titulo', 'data_evento', 'status')
    search_fields = ('titulo',)

class ViagemAdmin(admin.ModelAdmin):
    list_display = ('titulo', 'data_saida', 'local_destino', 'status')
    search_fields = ('titulo',)

class ReflexaoAdmin(admin.ModelAdmin):
    list_display = ('texto_resumido', 'e_palavra_do_padre')

admin.site.register(Curso, CursoAdmin)
admin.site.register(Evento, EventoAdmin)
admin.site.register(Viagem, ViagemAdmin)
admin.site.register(Reflexao, ReflexaoAdmin)
