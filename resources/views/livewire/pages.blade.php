<div class="p-6">
    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:modal="modalFormVisible">
        <x-slot name="title">{{ __('Save Page') }}</x-slot>
        <x-slot name="content">
            The form goes here.
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
