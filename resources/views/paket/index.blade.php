@extends('layouts.main',['title'=>'Paket'])
@section('content')
<x-content :title="[
    'name'=>'Paket',
    'icon'=>'fas fa-cubes'
]">
    @if (session('message') == 'success store')
    <x-alert-success />
    @endif

    @if (session('message') == 'success update')
        <x-alert-success type="update" />
        @endif

        @if (session('message') == 'success delete')
        <x-alert-success type="delete" />
        @endif

        <div class="card card-green card-outline">
            <div class="card-header form-inline">
            <x-btn-add :href="route('paket.create')" :title="'Paket'" />
                <x-search />
            </div>
            <table class="table table-hover table-striped m-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Diskon</th> <!-- tambahkan ini -->
            <th>Harga Akhir</th> <!-- tambahkan ini -->
            <th>Outlet</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = $pakets->firstItem()
        ?>
        @foreach($pakets as $paket)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $paket->nama_paket }}</td>
                <td>{{ $paket->harga }}</td>
                <td>{{ $paket->jenis }}</td>
                <td>{{ $paket->diskon }}</td> <!-- tambahkan ini -->
                <td>{{ $paket->harga_akhir }}</td> <!-- tambahkan ini -->
                <td>{{ $paket->outlet }}</td>
                <td class="text-right">
                    <x-edit :href="route('paket.edit', ['paket' => $paket->id])"/>
                    <x-delete :data-url="route('paket.destroy', ['paket' => $paket->id])"/>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
            </div>
            <div class="card-footer">
                {{ $pakets->links('page') }}
            </div>
        
</x-content>
@endsection 
@push('modal')
<x-modal-delete />
@endpush