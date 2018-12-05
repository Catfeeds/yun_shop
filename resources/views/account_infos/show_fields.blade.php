<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $accountInfo->id !!}</p>
</div>

<!-- Account Field -->
<div class="form-group">
    {!! Form::label('account', 'Account:') !!}
    <p>{!! $accountInfo->account !!}</p>
</div>

<!-- Mini Appid Field -->
<div class="form-group">
    {!! Form::label('mini_appid', 'Mini Appid:') !!}
    <p>{!! $accountInfo->mini_appid !!}</p>
</div>

<!-- Mini Secret Field -->
<div class="form-group">
    {!! Form::label('mini_secret', 'Mini Secret:') !!}
    <p>{!! $accountInfo->mini_secret !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $accountInfo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $accountInfo->updated_at !!}</p>
</div>

