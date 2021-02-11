@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
