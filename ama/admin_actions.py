import csv
from django.http import HttpResponse
from django.contrib import admin

# Função para exportar dados para CSV
def export_as_csv_action(description="Exportar para CSV", fields=None, exclude=None, header=True):
    "
    "Função de ação do ModelAdmin para exportar registros selecionados para um arquivo CSV.

    "Args:
        "description (str): Descrição da ação que aparecerá no dropdown do admin.
        "fields (list): Lista de nomes de campos a serem incluídos na exportação. Se None, todos os campos serão incluídos.
        "exclude (list): Lista de nomes de campos a serem excluídos da exportação.
        "header (bool): Se True, inclui uma linha de cabeçalho com os nomes dos campos.
    "
    def export_selected_objects(modeladmin, request, queryset):
        # Cria uma resposta HTTP com o tipo de conteúdo CSV
        response = HttpResponse(content_type='text/csv')
        # Define o nome do arquivo para download
        response['Content-Disposition'] = f'attachment; filename="{modeladmin.model._meta.verbose_name_plural}.csv"'

        # Cria um escritor CSV que escreve na resposta HTTP
        writer = csv.writer(response, delimiter=';') # Usando ';' como delimitador para compatibilidade com alguns softwares

        opts = modeladmin.model._meta
        # Obtém todos os campos do modelo, incluindo campos relacionados (many-to-many, foreign key)
        # Se 'fields' for especificado, usa apenas esses campos. Caso contrário, usa todos os campos concretos.
        if fields:
            field_names = fields
        else:
            field_names = [field.name for field in opts.fields]
            if opts.many_to_many:
                field_names.extend([field.name for field in opts.many_to_many])
        
        # Remove campos excluídos, se houver
        if exclude:
            field_names = [f for f in field_names if f not in exclude]

        # Escreve o cabeçalho no arquivo CSV se header=True
        if header:
            # Para o cabeçalho, podemos usar os nomes "verbose" dos campos para maior legibilidade
            header_row = []
            for field_name in field_names:
                try:
                    field = opts.get_field(field_name)
                    # Tenta pegar o verbose_name ou usa o nome do campo
                    header_row.append(getattr(field, 'verbose_name', field.name).capitalize())
                except:
                    # Caso seja um campo customizado ou propriedade, usa o próprio nome
                    header_row.append(field_name.replace('_', ' ').capitalize())
            writer.writerow(header_row)

        # Itera sobre cada objeto (linha) no queryset (registros selecionados)
        for obj in queryset:
            row = []
            for field_name in field_names:
                # Obtém o valor do campo do objeto. Se for um método, tenta chamá-lo.
                try:
                    value = getattr(obj, field_name)
                    if callable(value): # Se for um método (ex: para campos calculados no ModelAdmin)
                        value = value()
                    # Converte valores não-string para string e trata None para evitar erros
                    row.append(str(value) if value is not None else '')
                except AttributeError:
                    # Se o campo não for diretamente acessível (ex: ManyToMany), pode ser necessário tratamento especial
                    # ou garantir que 'fields' contenha apenas campos diretos ou com métodos de acesso
                    row.append('') # Adiciona vazio se o campo não puder ser acessado
            writer.writerow(row)

        return response

    # Define a descrição da ação que será exibida no painel do admin
    export_selected_objects.short_description = description
    return export_selected_objects
