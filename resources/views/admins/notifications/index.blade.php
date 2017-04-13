@extends('admins.layouts.index')

@section('tag')
    {{ trans('admin.notifications.list_notifications') }}
@stop

@section('content')
<div class="grid-form1">
    <ul class="list-group menu1" role="menu">
        @foreach (Auth::user()->notifications as $item)
        @if ($item->read_at == null)
        <li class="list-group-item" style="background-color: #D1F4E6;">
            <a href="{{ $item->data['link'] }}" data-notif-id="{{ $item->id }}" name="notifications">
                <div class="user-new">
                    <p>{{ $item->data['message'] }}</p>
                    <span>{{ $item->created_at->diffForHumans() }}</span>
                </div>
                <div class="user-new-left">
                    <i class="fa fa-info"></i>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @else
        <li class="list-group-item">
            <a href="{{ $item->data['link'] }}">
                <div class="user-new">
                    <p>{{ $item->data['message'] }}</p>
                    <span>{{ $item->created_at->diffForHumans() }}</span>
                </div>
                <div class="user-new-left">
                    <i class="fa fa-info"></i>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</div>
@stop
