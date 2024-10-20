@props([
    'modalTitle' => '',
    'modalId',
    'static' => false,
    'submit' => false,
    'title' => null
])

<div class="modal fade" id="{{ $modalId }}" @if ($static) data-backdrop="static" @endif
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $modalId }}Label">{{ $modalTitle }}</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if ($submit)
                    <button type="button" class="btn btn-primary">Understood</button>
                @endif
            </div>
        </div>
    </div>
</div>
