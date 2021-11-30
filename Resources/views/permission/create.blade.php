@extends('core::layouts.app')

@section('title', 'Add Permission')

@push('meta')

@endpush

@push('webfont')

@endpush

@push('icon')

@endpush

@push('plugin-style')

@endpush

@push('page-style')

@endpush

@section('body-class', 'sidebar-mini')

@section('breadcrumbs', \Breadcrumbs::render(Route::getCurrentRoute()->getName()))

@section('actions')
    {!! \Html::backButton('rbac.permissions.index') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {!! \Form::open(['route' => 'rbac.permissions.store', 'id' => 'permission-form']) !!}
                @include('rbac::permission.form')
                {!! \Form::close() !!}
            </div>
        </div>
    </div>
@endsection


@push('plugin-script')

@endpush

@push('page-script')

@endpush
