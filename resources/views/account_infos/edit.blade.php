@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Account Info
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accountInfo, ['route' => ['accountInfos.update', $accountInfo->id], 'method' => 'patch']) !!}

                        @include('account_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection