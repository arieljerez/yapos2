@extends('admin.acl.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Roles</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('roles.create') !!}">{{ __('app.actions.addnew') }} {{ __('app.role')}} </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.acl.roles.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
