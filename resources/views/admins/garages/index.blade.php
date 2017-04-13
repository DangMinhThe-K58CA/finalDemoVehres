@extends('admins.layouts.index')

@section('tag')
    @if ($status == config('common.garage.status.activated'))
        {{ trans('admin.garages.activated_garages') }}
    @else
        {{ trans('admin.garages.new-garages') }}
    @endif
@stop

@section('content')
<div class="grid-form1">
    <table class="table table-bordered">
        @include('errors.success')
        <thead>
            <tr align="center">
                <th>{{ trans('admin.garages.no') }}</th>
                <th>{{ trans('admin.garages.name') }}</th>
                <th>{{ trans('admin.garages.short_description') }}</th>
                <th>{{ trans('admin.garages.phone_number') }}</th>
                <th>{{ trans('admin.garages.address') }}</th>
                <th>{{ trans('admin.garages.website') }}</th>
                <th>{{ trans('admin.garages.working_time') }}</th>
                <th>{{ trans('admin.garages.view') }}</th>
                @if ($status == config('common.garage.status.activated'))
                <th>{{ trans('admin.garages.unactive') }}</th>
                <th>{{ trans('admin.garages.delete') }}</th>
                @elseif ($status == config('common.garage.status.unactivated'))
                <th>{{ trans('admin.garages.accept') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($garages as $key => $item)
            <tr>
                <td>
                    <label>{{ $key + 1 }}</label>
                    <input type='hidden' class="garageId" value="{{ $item->id }}">
                </td>
                <td>{{ $item->name }}</td>
                <td class="center">{{ $item->short_description }}</td>
                <td class="center">{{ $item->phone_number }}</td>
                <td class="center">{{ $item->address }}</td>
                <td class="center"><a href="{{$item->website}}">{{ $item->website }}</a></td>
                <td class="center">{{ $item->working_time }}</td>
                <td class="center">
                    <a class="btn btn-small btn-primary showActivatedGarage" href="#" data-toggle="modal" data-target="#show_activated_garage" name="showGarageButton" data-garage-id="{{ $item->id }}">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
                @if ($status == config('common.garage.status.activated'))
                <td class="center">
                    {!!  Form::open(['method' => 'PUT', 'route' => ['garages.update', $item->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ', ['type' => 'submit', 'class' => 'btn btn-success', 'onclick' => "return confirm('Are you agree unactive this garage ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                <td class="center">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['garages.destroy', $item['id']]]) !!}
                    {{ Form::button('<span class="glyphicon glyphicon-remove"></span> ', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) }}
                    {!! Form::close() !!}
                </td>
                @elseif ($status == config('common.garage.status.unactivated'))
                <td class="center">
                    {!! Form::open(['method' => 'PUT', 'route' => ['garages.update', $item->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-ok"></span> ', ['type' => 'submit', 'class' => 'btn btn-success', 'onclick' => "return confirm('Are you agree active this garage ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- pagination -->
    <div class="pagination pull-right">
        {!! $garages->appends(Request::except('page'))->links() !!}
    </div>
    <!-- end pagination -->
</div>

<!-- modal show garage -->
<div class="modal fade" id="show_activated_garage" tabindex="-1" role="dialog" aria-labelledby="showGarageLabel" aria-hidden="true">

</div>
@stop
