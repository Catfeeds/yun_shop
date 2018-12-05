<table class="table table-responsive" id="audits-table">
    <thead>
        <tr>
            <th>Admin Id</th>
        <th>Audit Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($audits as $audit)
        <tr>
            <td>{!! $audit->admin_id !!}</td>
            <td>{!! $audit->audit_id !!}</td>
            <td>
                {!! Form::open(['route' => ['audits.destroy', $audit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('audits.show', [$audit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('audits.edit', [$audit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>