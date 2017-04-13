@extends('admins.layouts.index')
@section('tag')
    @if ($article->status == config('common.article.status.activated'))
        <a href="{{ action('Admin\ArticlesController@index', ['status' => config('common.article.status.activated')]) }}">
            {{ trans('admin.articles.activated_article') }}
        </a>
        <i class="fa fa-angle-right"></i>
    @else
        <a href="{{ action('Admin\ArticlesController@index', ['status' => config('common.article.status.unactivated')]) }}">
            {{ trans('admin.articles.new_article') }}
        </a>
        <i class="fa fa-angle-right"></i>
    @endif
    <label>{{ $article->title }}</label>
@stop
@section('content')
    <div class="technology">
        <div class="container">
            <div class="col-md-10 technology-left">
                <div class="modal-content">
                    <div class="agileinfo">
                        <div class="modal-header">
                            <div class="col-md-8">
                                <h4 class="modal-title" id="showGarageLabel">{{ $article->title }}</h4>
                            </div>
                            <input type="hidden" id="articleId" value="{{ $article->id }}">
                        </div>
                        <div class="modal-body">
                            <div class="single">
                                <img src="{{ asset($article->avatar) }}" class="img-responsive" alt="{{ $article->avatar }}">
                                <div class="b-bottom">
                                    <h3 class="top">{{ $article->short_description }}</h3>
                                    <p class="sub">{!! $article->content !!}</p>
                                    <p class="updated_at">{{ trans('admin.articles.on') . $article->updated_at }}</p>
                                </div>
                            </div>

                            <div class="response">
                                <div id="showCommentField">
                                    <div>
                                        <input type="hidden" id="commentPaginateNumber" value="{{ config('common.garage.comment.paginate') }}">
                                    </div>
                                    <br/>
                                </div>
                                <div class="media response-info">
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        @if($article->status === config('common.article.status.activated'))
                            {!!  Form::open(['method' => 'PUT', 'action' => ['Admin\ArticlesController@update', $article->id]]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ' . trans('admin.button.unactive'), ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you agree unactive this garage ?')"]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PUT', 'action' => ['Admin\ArticlesController@update', $article->id]]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-ok"></span> ', ['type' => 'submit', 'title' => 'active', 'class' => 'btn btn-success', 'onclick' => "return confirm('Are you agree active this article ?')"]) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>

        </div>
    </div>
@stop
