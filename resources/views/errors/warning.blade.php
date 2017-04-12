@if(Session::has('warning'))

    <div class="alert alert-warning">
        <button class="close" type="button" data-dismiss="alert">&times;</button>
        <strong>
            <i class="fa fa-check-circle fa-lg fa-fw"></i> {{ trans('session.warning') }} &nbsp;
        </strong>
        {{ Session::get('warning') }}
    </div>

@endif
