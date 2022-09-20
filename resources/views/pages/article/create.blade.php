<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#createModal" wire:click.prevent="cancel()">
        <i class="bi bi-plus"></i> Novo
    </button>
</div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">New Article</h5>
            </div>
           <div class="modal-body">
                <form>
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="title" 
                        wire:model="title"
                        placeholder="#"
                    />
                    <label for="title">Title</label>

                    @error('title') 
                        <div id="invalidTitle" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea 
                        class="form-control @error('body') is-invalid @enderror" 
                        id="body"
                        placeholder="#"
                        wire:model="body"
                        style="height: 450px"
                    ></textarea>
                    <label for="body">Body</label>

                    @error('body') 
                        <div id="invalidBody" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-sm btn-success close-modal">Save</button>
            </div>
        </div>
    </div>
</div>