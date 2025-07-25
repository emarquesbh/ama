# admin.py
from django.contrib import admin

admin.site.site_header = "Administração do Clube da Amizade"
admin.site.site_title = "Painel Administrativo"
admin.site.index_title = "Bem-vindo ao Painel de Gerenciamento"
from django.contrib import admin
from .models import SeuModelo # Importe o seu modelo aqui
from .admin_actions import export_as_csv_action # Importe a função de ação

# Registra a ação no admin para o seu modelo
@admin.register(SeuModelo) # Ou admin.site.register(SeuModelo, SeuModeloAdmin)
class SeuModeloAdmin(admin.ModelAdmin):
    list_display = ('id', 'nome', 'data_criacao') # Campos exibidos na lista do admin
    search_fields = ('nome',) # Campos para busca

    # Adiciona a ação customizada ao ModelAdmin
    # export_as_csv_action() retorna a função 'export_selected_objects' configurada
    actions = [export_as_csv_action(
        description="Exportar registros de SeuModelo para CSV",
        # Você pode especificar quais campos quer exportar ou deixar como None para todos
        # fields=['id', 'nome', 'data_criacao'],
        # Ou campos para excluir
        # exclude=['campo_sensivel', 'campo_interno']
    )]

    # Melhoria: Pode-se criar uma ação específica para um modelo com campos pré-definidos
    def exportar_meus_campos_csv(self, request, queryset):
        # Reutiliza a função de ação com campos específicos para este modelo
        return export_as_csv_action(
            description="Exportar campos específicos para CSV",
            fields=['id', 'nome'], # Exemplo: exportar apenas ID e Nome
            header=True
        )(self, request, queryset)
    exportar_meus_campos_csv.short_description = "Exportar ID e Nome para CSV"
    
    actions.append(exportar_meus_campos_csv)


# Exemplo com outro modelo, se tiver
# from .models import OutroModelo
# @admin.register(OutroModelo)
# class OutroModeloAdmin(admin.ModelAdmin):
#     list_display = ('titulo', 'categoria')
#     actions = [export_as_csv_action()] # Para exportar todos os campos
