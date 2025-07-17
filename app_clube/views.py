# app_clube/views.py
from django.shortcuts import render, redirect
from .models import Curso, Evento, Viagem, Reflexao

# CRUD para Curso
def listar_cursos(request):
    cursos = Curso.objects.all()
    return render(request, 'cursos/listar_cursos.html', {'cursos': cursos})

def adicionar_curso(request):
    if request.method == 'POST':
        nome = request.POST['nome']
        descricao = request.POST['descricao']
        dias = request.POST['dias']
        horario = request.POST['horario']
        mensalidade = request.POST['mensalidade']
        status = request.POST['status']
        Curso.objects.create(nome=nome, descricao=descricao, dias=dias, horario=horario, mensalidade=mensalidade, status=status)
        return redirect('listar_cursos')
    return render(request, 'cursos/adicionar_curso.html')

def editar_curso(request, id):
    curso = Curso.objects.get(id=id)
    if request.method == 'POST':
        curso.nome = request.POST['nome']
        curso.descricao = request.POST['descricao']
        curso.dias = request.POST['dias']
        curso.horario = request.POST['horario']
        curso.mensalidade = request.POST['mensalidade']
        curso.status = request.POST['status']
        curso.save()
        return redirect('listar_cursos')
    return render(request, 'cursos/editar_curso.html', {'curso': curso})

def excluir_curso(request, id):
    curso = Curso.objects.get(id=id)
    curso.delete()
    return redirect('listar_cursos')

# CRUD para Evento e Viagem seguem a mesma estrutura
