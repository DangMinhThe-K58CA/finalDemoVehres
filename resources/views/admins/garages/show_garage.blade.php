<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="showGarageLabel">{{ trans('admin.garages.show_garage') }}</h4>
        </div>
        <div class="modal-body">
            <div id="views">
                <div class="control-group">
                    {!! Form::label('name', trans('admin.garages.name')) !!}
                    <div class="controls">
                        {!! Form::text('name', $garage->name, ['class' => 'form-control name', 'id' => 'name', 'disabled']) !!}
                    </div>
                </div>
                <div class="control-group">
                    {!! Form::label('avatar', trans('admin.garages.avatar')) !!}
                    <div class="controls">
                        {!! Html::image($garage->avatar, null, ['class'=> 'img-responsive']) !!}
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
                <button type="button" class="btn btn-default" data-dismiss="modal" id="clear">Close</button>
            </div>
        </div>
    </div>
</div>
