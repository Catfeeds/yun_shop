@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Audit
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($audit, ['route' => ['audits.update', $audit->id], 'method' => 'patch']) !!}

                        @include('audits.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection