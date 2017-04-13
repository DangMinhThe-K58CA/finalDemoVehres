@if ($item->role == config('common.user.role.user'))
    {!! Form::open(['method' => 'PUT', 'action' => ['Admin\UserController@update', $item->id]]) !!}
    {!! Form::button('<span class="glyphicon glyphicon-ok"></span> ', ['type' => 'submit', 'class' => 'btn btn-success', 'onclick' => "return confirm('Are you agree this user is partner ?')"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['method' => 'PUT', 'action' => ['Admin\UserController@update', $item->id]]) !!}
    {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ', ['type' => 'submit', 'class' => 'btn btn-warning', 'onclick' => "return confirm('Are you agree delete role partner this user ?')"]) !!}
    {!! Form::close() !!}
@endif
