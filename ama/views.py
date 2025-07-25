from django.shortcuts import render


def yoga_view(request):
    
    context = {}
    return render(request, 'ama/yoga.html', context)



