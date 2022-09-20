@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <livewire:articles />
@endsection

@section('js')
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('.modal').modal('hide');
        });

    </script>
@endsection