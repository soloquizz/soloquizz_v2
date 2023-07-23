<div class="card-body">
    <ul style="list-style-type: none;">
        @foreach($questions as $question)
            <li class="mb-5">
                <div class="row">
                   <div class="col-2"><h6>Question {{ $question->id }}</h6></div>
                    <div class="col-2">
                        @if(isset($_GET['page']))
                        <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                            <i class="fa fa-edit text-warning mr-1" title="Mofification de la question"></i>
                        </a>
                        @else
                            <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                <i class="fa fa-edit text-warning mr-1" title="Mofification de la question"></i>
                            </a>
                        @endif
                    </div>
                </div>
                {!! $question->contenu !!}
               <!-- <h6>
                    Options de réponse &nbsp;
                    <a href="#" data-toggle="modal" data-target="#addOption">
                        <i class="fa fa-plus-circle text-primary mr-1" onclick="changeIdquestion({{$question->id}})" title="Ajouter une option de réponse"></i>
                    </a>
                </h6>
                {{--@foreach($question->options as $option)
                    <div class="row">
                        @if($option->correcte)
                            <i class="fa fa-check text-success mr-1" title="Mofification de la question"></i>
                        @else
                            <i class="fa fa-times text-danger mr-1" title="Mofification de la question"></i>
                        @endif
                        {!! $option->contenu !!}
                        @if(isset($_GET['page']))
                            <a href="{{route('admin.options.edit.custom', ['otion_id'=>$option->id,'page'=>$_GET['page']])}}">
                                <i class="fa fa-edit text-warning mr-1" title="Mofification de l'option"></i>
                            </a>
                        @else
                            <a href="{{route('admin.options.edit.custom', ['otion_id'=>$option->id,'page'=>1])}}">
                                <i class="fa fa-edit text-warning mr-1" title="Mofification de l'option"></i>
                            </a>
                        @endif
                    </div>
                @endforeach---}}
                -->
            </li>
        @endforeach
    </ul>
</div>
<div class="card-footer">
    <nav aria-label="Page navigation example">
        {{$questions->links()}}
    </nav>
</div>