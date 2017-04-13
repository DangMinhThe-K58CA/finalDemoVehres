@extends('admins.layouts.index')

@section('tag')
    @if ($status == config('common.article.status.activated'))
        {{ trans('admin.articles.activated_article') }}
    @else
        {{ trans('admin.articles.new_article') }}
    @endif
@stop

@section('content')
<div class="grid-form1">
    <table class="table table-bordered">
        @include('errors.success')
        <thead>
            <tr align="center">
                <th>{{ trans('admin.articles.no') }}</th>
                <th>{{ trans('admin.articles.user') }}</th>
                <th>{{ trans('admin.articles.title') }}</th>
                <th>{{ trans('admin.articles.short_description') }}</th>
                <th>{{ trans('admin.articles.created_at') }}</th>
                <th>{{ trans('admin.articles.view') }}</th>
                @if ($status == config('common.article.status.activated'))
                <th>{{ trans('admin.articles.unactive') }}</th>
                <th>{{ trans('admin.articles.delete') }}</th>
                @elseif ($status == config('common.article.status.unactivated'))
                <th>{{ trans('admin.articles.accept') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $key => $item)
            <tr>
                <td><label>{{ $key + 1 }}</label></td>
                <td>{{ $item->user->name }}</td>
                <td class="center">{{ $item->title }}</td>
                <td class="center">{{ $item->short_description }}</td>
                <td class="center">{{ $item->created_at->format('Y-m-d') }}</td>
                <td class="center">
                    <a class="btn btn-small btn-primary showActivatedGarage" href="{{ action('Admin\ArticlesController@show', $item->id) }}">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </td>
                @if ($status == config('common.article.status.activated'))
                <td class="center">
                    {!!  Form::open(['method' => 'PUT', 'action' => ['Admin\ArticlesController@update', $item->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ', ['type' => 'submit', 'class' => 'btn btn-success', 'onclick' => "return confirm('Are you agree unactive this articles ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                <td class="center">
                    {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\ArticlesController@destroy', $item->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                @elseif ($status == config('common.article.status.unactivated'))
                <td class="center">
                    {!! Form::open(['method' => 'PUT', 'action' => ['Admin\ArticlesController@update', $item->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-ok"></span> ', ['type' => 'submit', 'class' => 'btn btn-success', 'onclick' => "return confirm('Are you agree active this article ?')"]) !!}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- pagination -->
    <div class="pagination pull-right">
        {!! $articles->appends(Request::except('page'))->links() !!}
    </div>
    <!-- end pagination -->
</div>
@stop
