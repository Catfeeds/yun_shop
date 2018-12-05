<!-- Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account', 'Account:') !!}
    {!! Form::text('account', null, ['class' => 'form-control']) !!}
</div>

<!-- Mini Appid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mini_appid', 'Mini Appid:') !!}
    {!! Form::text('mini_appid', null, ['class' => 'form-control']) !!}
</div>

<!-- Mini Secret Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mini_secret', 'Mini Secret:') !!}
    {!! Form::text('mini_secret', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accountInfos.index') !!}" class="btn btn-default">Cancel</a>
</div>
