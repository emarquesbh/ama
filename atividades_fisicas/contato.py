from django.shortcuts import render, get_object_or_404
from .models import Yoga, Ginastica, DancaSenior, PosturaAlongamento
from django.shortcuts import render
from django.core.mail import send_mail
from .forms import ContatoForm


def contato(request):
    if request.method == 'POST':
        form = ContatoForm(request.POST)
        if form.is_valid():
            nome = form.cleaned_data['str_nome']
            telefone = form.cleaned_data.get('str_telefone', '')
            email = form.cleaned_data['str_email']
            mensagem = form.cleaned_data['str_mensagem']

            corpo_email = f"""
              Nome: {nome}
              Telefone: {telefone}
              Email: {email}
              Mensagem:
             {mensagem}
            """

            send_mail(
                subject=f"Nova mensagem de {nome} via site Clube da Amizade",
                message=corpo_email,
                from_email=email,
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





