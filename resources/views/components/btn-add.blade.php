@props(['title'=>''])
<a {{ $attributes->merge([ 'class' => 'btn btn-success']) }}>
    <i class="fas fa-plus mr-2"></i> Tambah {{ $title}}
</a>
