@extends('layouts.template.administration.master')
@section('css')
<style>
    .pub{
        background-color: green;
        color: white;
        width: max-content;
        padding: 1px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
    }

    .pub2{
            background-color: rgb(246, 4, 16);
            color: white;
            width: max-content;
            padding: 1px;
            padding-left: 2px;
            padding-right: 2px;
            display: flex;
        }
</style>
@endsection

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.administration.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.administration.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <!-- Section Dashboard Layout -->
        @include('template.administration.dashboard')
        <!-- END Section Dashboard Layout -->

        <div class="container card bg-white page__container page-section mt-5">

            <div class="card-header">
                <div class="row">
                    <!-- Title -->
                    <div class="col-sm-4">
                        <h3 class="content-header-title">Role {{$role->name}}</h3>
                    </div>


                </div>
            </div>

            <!-- Wrapper -->
            <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Search -->
                <div class="search-form search-form--light mb-3 col-sm-4">
                    <input type="text" class="form-control search" placeholder="Rechercher">
                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                </div>

                <div class="modal-footer">
                    {!! Form::model($role, ['id' => 'my-form1','method'=>'post','route' => ['admin.givePermissionToRole', $role->id]]) !!}
                    <input type="hidden" name="permissions[]" id="allcheckboxes1">
                    <button type="submit" id="submit-button1" class="btn btn-outline-primary">Ajouter</button>
                    {!! Form::close() !!}
                    {!! Form::model($role, ['id' => 'my-form2','method'=>'post','route' => ['admin.revokePermissionToRole', $role->id]]) !!}
                    <input type="hidden" name="permissions[]" id="allcheckboxes2">
                    <button type="submit" id="submit-button2" class="btn btn-outline-danger" data-dismiss="modal">Supprimer</button>
                    {!! Form::close() !!}
                    
                </div>
                 
                <input type="hidden" name="" value="{{$role->id}}" id="role_id">

                <!-- Table -->
                        
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"><button id="btn" class="btn"><input type="checkbox">Tout Sélectionner</button></th>
                                                            <th scope="col">Nom</th>
                                                            <th scope="col">Espace</th>
                                                            <th scope="col">Etat</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($permissions as $permission)
                                                        {{--@if(!($role->permissions->contains('id',$permission->id)))--}}
                                                        <tr>
                                                            <th scope="row">
                                                            <input type="checkbox" name="permissions[]" id="" value="{{$permission->id}}">
                                                            </th> 
                                                            <td>
                                                            {{ Form::label($permission->name, ucfirst($permission->name)) }}
                                                            </td>
                                                            <td>
                                                                {{ Form::label($permission->espace, ucfirst($permission->espace)) }}
                                                                </td>
                                                    
                                                            <td class="name">
                                                                @if($role->hasPermissionTo($permission->name))
                                                                    <span class="pub rounded-pill border border-4 mr-1">Assigné</span>
                                                                @else
                                                                    <span class="pub2 rounded-pill border border-4 mr-1">Non Assigné</span>
                                                                @endif
                    
                                                            </td>
                                                            <td>
                                                                @if($role->hasPermissionTo($permission->name))
                                                                <form method="POST" action="{{route('admin.revokePermissionToRole', $role->id)}}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$permission->id}}" name="permissions[]">
                                                                    <button type="submit" class="btn">
                                                                        <i class="fa fa-user-times text-danger" aria-hidden="true" title="Ajout-user"></i>
                                                                    </button>
                                                                </form>
                                                                
                                                                @else
                                                                <form method="POST" action="{{route('admin.givePermissionToRole', $role->id)}}">
                                                                    @csrf
                                                                    <input type="hidden" value="{{$permission->id}}" name="permissions[]">
                                                                    <button type="submit" class="btn">
                                                                        <i class="fa fa-user-plus text-info" aria-hidden="true" title="Ajout-user"></i>
                                                                    </button>
                                                                </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                            <br>
                                                        {{--@endif--}}
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
            </div>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    @include('template.administration.roles.create')
    
@endsection

@section('script')

<script>

const btn2 = document.querySelector('#submit-button2');
            btn2.addEventListener('click', (event) => {
                let checkboxes = document.querySelectorAll('input[name="permissions[]"]:checked');
                let values =  []
                checkboxes.forEach((checkbox) => {
                    values.push(checkbox.value);
                });
                alert(values);
                $('#my-form2').submit(function(e) {
                document.getElementById('allcheckboxes2').value = values;
                console.log(values)
                //this.submit()
            });
    
})

const btn1 = document.querySelector('#submit-button1');
            btn1.addEventListener('click', (event) => {
                let checkboxes = document.querySelectorAll('input[name="permissions[]"]:checked');
                let values =  []
                checkboxes.forEach((checkbox) => {
                    values.push(checkbox.value);
                });
                alert(values);
                $('#my-form1').submit(function(e) {
                document.getElementById('allcheckboxes1').value = values;
                this.submit()
            });
    
})
function check(checked = true) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {
        checkbox.checked = checked;
    });
}

function checkAll() {
    check();
    this.onclick = uncheckAll;
}

function uncheckAll() {
    check(false);
    this.onclick = checkAll;
}

const btn3 = document.querySelector('#btn');
btn3.onclick = checkAll;
 
</script>

@endsection
