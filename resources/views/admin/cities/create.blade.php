@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid" style="padding: 30px 15px;">
        <div class="row">
          

            <div class="col-sm-9 col-lg-10">
                <section class="content-header">
                    <h1>
                       添加地区
                    </h1>
                </section>
                <div class="content pdall0-xs">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary mb10-xs form">

                        <div class="box-body">
                            <div class="row">
                                {!! Form::open(['route' => 'cities.store']) !!}

                                    @include('admin.cities.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


