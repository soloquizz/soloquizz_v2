
<div class="modal fade" id="revokePermission{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="editExerciceLabel" aria-hidden="true" backdrop="false">
    <div class="modal-dialog modal-lg mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title ml-10" id="addExerciceLabel">Retirer des permissions</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($role,['route' => ['admin.revokePermissionToRole', $role->id], 'method' => 'post']) !!}
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class='form-group pl-4'>
                                        @foreach ($permissions as $permission)
                                        @if(($role->permissions->contains('id',$permission->id)))
                                        <input type="checkbox" name="permissions[]" id="" value="{{$permission->id}}">
                                            {{--{{ Form::checkbox('permissions[]',  $permission->id ) }}--}}
                                            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                </div>
                {!! Form::close() !!}
            </div>
    </div>
</div>


