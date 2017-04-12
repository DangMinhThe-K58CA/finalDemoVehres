@extends('admins.layouts.index')

@section('title')
    {{ trans('admin.users.manage_users') }}
@stop

@section('tag')
    {{ trans('admin.users.manage_users') }}
@stop

@section('content')
<div class="grid-form1">
    <table class="table table-bordered">
        @include('errors.success')
        @include('errors.warning')
        <thead>
            <tr align="center">
                <th>{{ trans('admin.users.no') }}</th>
                <th>{{ trans('admin.users.name') }}</th>
                <th>{{ trans('admin.users.email') }}</th>
                <th>{{ trans('admin.users.role') }}</th>
                <th>{{ trans('admin.users.status') }}</th>
                <th>{{ trans('admin.users.description') }}</th>
                <th>{{ trans('admin.users.makePartner') }}</th>
                <th>{{ trans('admin.users.delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $item)
            <tr>
                <td class="center">{{ $key + 1 }}</td>
                <td class="center">{{ $item->name }}</td>
                <td class="center">{{ $item->email }}</td>
                @if ($item->role == config('common.user.role.user'))
                <td class="center">{{ trans('admin.users.roles.user') }}</td>
                @elseif ($item->role == config('common.user.role.partner'))
                <td class="center">{{ trans('admin.users.roles.partner') }}</td>
                @else
                <td class="center">{{ trans('admin.users.roles.admin') }}</td>
                @endif
                <td class="center">{{ $item->status }}</td>
                <td class="center">{{ $item->description }}</td>
                <td class="center">
                    @if ($item->role != config('common.user.role.admin'))
                        @include('admins.users.make_partner')
                    @endif
                </td>
                <td class="center">
                    @if ($item->role != config('common.user.role.admin'))
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $item->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) !!}
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- pagination -->
    <div class="pagination pull-right">
        {!! $users->appends(Request::except('page'))->links() !!}
    </div>
    <!-- end pagination -->
</div>
@stop
