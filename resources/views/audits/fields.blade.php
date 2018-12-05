<!-- Admin Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_id', 'Admin Id:') !!}
    {!! Form::number('admin_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Audit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('audit_id', 'Audit Id:') !!}
    {!! Form::text('audit_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('audits.index') !!}" class="btn btn-default">Cancel</a>
</div>
