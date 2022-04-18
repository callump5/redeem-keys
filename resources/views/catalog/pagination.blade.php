@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        {{-- Previous Page Link --}}
        <button wire:click="previousPage()" wire:loading.attr="disabled" rel="prev"  @if($paginator->onFirstPage())disabled="disabled" class="disabled" @endif>
            {!! __('pagination.previous') !!}
        </button>

        {{-- Next Page Link --}}
        <button wire:click="nextPage()" wire:loading.attr="disabled" rel="next"  @if(!$paginator->hasMorePages()) disabled="disabled" class="disabled" @endif>
            {!! __('pagination.next') !!}
        </button>
   
    </nav>
@endif
