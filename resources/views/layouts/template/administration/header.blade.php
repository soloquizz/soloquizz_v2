<div class="bg-gradient-primary border-bottom-white py-32pt">
    <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
        <img src="{{asset('assets/images/illustration/teacher/128/white.svg')}}" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="instructor">
        <div class="flex mb-32pt mb-md-0">
            <h2 class="text-white mb-0">{{auth()->user()->getFullName()}}</h2>
            <p class="lead text-white-50 d-flex align-items-center">Administrateur <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i></span></p>
        </div>
        <a href="#" class="btn btn-outline-white">Editer compte</a>
    </div>
</div>
