@extends('layouts.main',['title'=>'Outlet'])
@section('content')
<x-content :title="[
    'name'=>'Outlet',
    'icon'=>'fas fa-store-alt'
    ]">
    <div class="row">
        <div class="col-md-6">
        <form
        class="card card-green"
        method="POST"
        action="{{ route('outlet.update',['outlet'=>$outlet->id]) }}">
            <div class="card-header">
                Edit Outlet
            </div>
            <div class="card-body">
            @csrf 
            @method('put')
            <x-input
                    label="Nama"
                    name="nama"
                    :value="$outlet->nama" autofocus />

                    <x-input
                    label="Telepon"
                    name="tlp"
                    :value="$outlet->tlp" />

                    <x-textarea 
                    label="Alamat"
                    name="alamat"
                    :value="$outlet->alamat"/>
                </div>
            <div class="card-footer">
            <x-btn-update />
        </div>
    </form>
</div>
</div>
</x-content>
@endsection