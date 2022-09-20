<div class="m-5">
    @include('pages.article.create')
    @include('pages.article.update')
    @include('pages.article.show')
    @include('partials.delete-confirmation-modal')
    @if(session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
        {{ session('message') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td class="col-2">
                        <button 
                            type="button" 
                            class="btn btn-sm btn-light"
                            data-bs-toggle="modal"
                            data-bs-target="#showModal"
                            wire:click="loadData({{ $article->id }})"
                        >
                            <i class="bi bi-eye" title="Visualizar"></i>
                        </button>

                        <button 
                            type="button" 
                            class="btn btn-sm btn-light"
                            data-bs-toggle="modal"
                            data-bs-target="#updateModal"
                            wire:click="loadData({{ $article->id }})"
                        >
                            <i class="bi bi-pencil-square" title="Alterar"></i>
                        </button>

                        <button 
                            type="button" 
                            class="btn btn-sm btn-light"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            wire:click="loadData({{ $article->id }})"
                        >
                            <i class="bi bi-trash" title="Remover"></i>
                        </button>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>

