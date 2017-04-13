@extends('admins.layouts.index')

@section('tag')
    {{ trans('admin.garages.detail-garages') }}
@stop

@section('content')
<div id="showGarageField">
    <div class="modal-content">
        <div class="modal-body">
            <div id="viewsGarageField">
                <div class="control-group">
                    {!! Form::label('name', trans('admin.garages.name')) !!}
                    <div class="controls">
                        {!! Form::text('name', $garage->name, ['class' => 'form-control name', 'id' => 'name', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        {!! Form::label('type', 'Garage type') !!}
                        <div class="controls">
                            {!! Form::select('type', [
                                config('common.garage.type.car') => 'Car garage',
                                config('common.garage.type.motor') => 'Motor garage',
                                config('common.garage.type.bike') => 'Bike garage',
                             ], $garage->type, ['id' => 'garageType','disabled']) !!}
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('avatar', trans('admin.garages.avatar')) !!}
                    <div class="controls">
                        {!! Html::image($garage->avatar, null, ['class'=> 'img-responsive avatar', 'width' => '100%']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('address', trans('admin.garages.address')) !!}
                    <div class="controls">
                        {!! Form::text('address', $garage->address, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('phone_number', trans('admin.garages.phone_number')) !!}
                    <div class="controls">
                        {!! Form::text('phone_number', $garage->phone_number, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('website', trans('admin.garages.website')) !!}
                    <div class="controls">
                        {!! Form::text('website', $garage->website, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('working_time', trans('admin.garages.working_time')) !!}
                    <div class="controls">
                        {!! Form::text('working_time', $garage->working_time, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('short_description', trans('admin.garages.short_description')) !!}
                    <div class="controls">
                        {!! Form::text('short_description', $garage->short_description, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('description', trans('admin.garages.description')) !!}
                    <div class="controls">
                        {!! Form::textarea('description', $garage->description, ['class' => 'form-control', 'disabled']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @if($garage->status === config('common.garage.status.activated'))
                    {!!  Form::open(['method' => 'PUT', 'action' => ['Admin\GarageController@update', $garage->id]]) !!}
                    {!! Form::button('<span class="glyphicon glyphicon-remove"></span> ' . trans('admin.button.unactive'), ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you agree unactive this garage ?')"]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
    <br/>
</div>
@stop
