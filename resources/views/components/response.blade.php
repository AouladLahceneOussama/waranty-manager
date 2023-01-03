<div class="shadow-lg">
    @if(count($response) > 0)
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => {show = false, Livewire.emit('refreshResponse')}, {{ $responseTime }})" 
        x-show="show" 
        x-transition:enter="transition ease-out duration-500" 
        x-transition:enter-start="opacity-0 scale-90" 
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-75" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-90" 
        class="w-96 fixed z-50 bottom-2 left-2 py-2 px-4 rounded-md  text-white opacity-100 scale-100 {{ $response['error'] ? 'bg-red-600' : 'bg-teal-600' }}"
    >
        <span class="text-xs font-bold">{{ $response['msg'] }}</span>
        <i @click="show = false" class="fa-solid fa-times-circle absolute top-2 right-2 test-xs cursor-pointer"></i>

        @if($response['redirect']['ok'])
        <div>
            <a href="{{ $response['redirect']['url'] }}"class="text-xs font-bold bg-blue-400 px-4 py-2 my-2">{{ $response['redirect']['msg'] }}</a>
        </div>
        @endif
    </div>
    @endif
</div>
