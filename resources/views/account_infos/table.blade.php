<table class="table table-responsive" id="accountInfos-table">
    <thead>
        <tr>
            <th>Account</th>
        <th>Mini Appid</th>
        <th>Mini Secret</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accountInfos as $accountInfo)
        <tr>
            <td>{!! $accountInfo->account !!}</td>
            <td>{!! $accountInfo->mini_appid !!}</td>
            <td>{!! $accountInfo->mini_secret !!}</td>
            <td>
                {!! Form::open(['route' => ['accountInfos.destroy', $accountInfo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accountInfos.show', [$accountInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('accountInfos.edit', [$accountInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>