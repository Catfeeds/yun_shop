<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $audit->id !!}</p>
</div>

<!-- Admin Id Field -->
<div class="form-group">
    {!! Form::label('admin_id', 'Admin Id:') !!}
    <p>{!! $audit->admin_id !!}</p>
</div>

<!-- Audit Id Field -->
<div class="form-group">
    {!! Form::label('audit_id', 'Audit Id:') !!}
    <p>{!! $audit->audit_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $audit->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $audit->updated_at !!}</p>
</div>

