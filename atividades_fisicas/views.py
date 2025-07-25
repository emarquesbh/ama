from django.shortcuts import render, get_object_or_404
from .models import Yoga, Ginastica, DancaSenior, PosturaAlongamento
from django.shortcuts import render
from django.core.mail import send_mail
from .forms import ContatoForm
from django import forms
from django.core.mail import send_mail
from .forms import ContatoForm
def index(request):
     return render(request, 'atividades_fisicas/index.html')

def contato(request):
    if request.method == 'POST':
        form = ContatoForm(request.POST)
        if form.is_valid():
            nome = form.cleaned_data['str_nome']
            telefone = form.cleaned_data.get('str_telefone', '')
            email = form.cleaned_data['str_email']
            mensagem = form.cleaned_data['str_mensagem']

            corpo_email = f"""\
Mensagem recebida via site Clube da Amizade
Nome: {nome}
Telefone: {telefone}
Email: {email}

Mensagem:
{mensagem}
"""

            send_mail(
                subject=f"Nova mensagem de {nome} via Clube da Amizade",
                message=corpo_email,
                from_email='seuemail@gmail.com',
                recipient_list=['emarquesbh@gmail.com'],
                fail_silently=False,
            )

            return render(request, 'atividades_fisicas/agradecimento.html', {
                'nome': nome,
                'mensagem': mensagem
            })
    else:
        form = ContatoForm()

    return render(request, 'atividades_fisicas/contato.html', {'form': form})




def yoga_view(request):
    atividade = get_object_or_404(Yoga, id=1)  
    context = {
        'imagem': atividade.imagem_principal,
        'imagem1': atividade.imagens_galeria.all()[0] if atividade.imagens_galeria.count() > 0 else None,
        'imagem2': atividade.imagens_galeria.all()[1] if atividade.imagens_galeria.count() > 1 else None,
        'imagem3': atividade.imagens_galeria.all()[2] if atividade.imagens_galeria.count() > 2 else None,
        'descricao': atividade.descricao,
    }
    return render(request, 'public/yoga.html', context)


def ginastica_publica(request):
    atividade = get_object_or_404(Ginastica, id=1)
    context = {
        'imagem': atividade.imagem_principal,
        'imagem1': atividade.imagens_galeria.all()[0] if atividade.imagens_galeria.count() > 0 else None,
        'imagem2': atividade.imagens_galeria.all()[1] if atividade.imagens_galeria.count() > 1 else None,
        'imagem3': atividade.imagens_galeria.all()[2] if atividade.imagens_galeria.count() > 2 else None,
        'descricao': atividade.descricao,
    }
    return render(request, 'public/ginastica.html', context)

def posturaalongamento_publica(request):
    atividade = get_object_or_404(PosturaAlongamento, id=1)
    context = {'imagem': atividade.imagem_principal,
        'imagem1': atividade.imagens_galeria.all()[0] if atividade.imagens_galeria.count() > 0 else None,
        'imagem2': atividade.imagens_galeria.all()[1] if atividade.imagens_galeria.count() > 1 else None,
        'imagem3': atividade.imagens_galeria.all()[2] if atividade.imagens_galeria.count() > 2 else None,
        'descricao': atividade.descricao, }  # idêntico padrão
    return render(request, 'public/posturaalongamento.html', context)

def dancasenior_publica(request):
    atividade = get_object_or_404(DancaSenior, id=1)
    context = {'imagem': atividade.imagem_principal,
        'imagem1': atividade.imagens_galeria.all()[0] if atividade.imagens_galeria.count() > 0 else None,
        'imagem2': atividade.imagens_galeria.all()[1] if atividade.imagens_galeria.count() > 1 else None,
        'imagem3': atividade.imagens_galeria.all()[2] if atividade.imagens_galeria.count() > 2 else None,
        'descricao': atividade.descricao,}
    return render(request, 'public/dancasenior.html', context)






