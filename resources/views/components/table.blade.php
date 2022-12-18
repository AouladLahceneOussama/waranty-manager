<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative min-w-0 mb-6 break-words border-0 border-transparent border-solid rounded-2xl bg-clip-border">
            
            <div class="p-4 bg-white rounded-2xl shadow-soft-xl">
                <div class="w-full flex space-x-4">
                    <div class="w-4/5 flex justify-center items-stretch">
                        {{ $multiSearch }}
                    </div>
                    <div class="w-1/5">
                        {{ $recordSize }}
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto md:overflow-x-hidden">
                <table class="table-auto mt-4 border-collapse shadow-soft-xl w-full rounded-2xl mb-0 align-top bg-white border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        {{ $thead }}
                    </thead>

                    <tbody>
                        {{ $tbody }}
                    </tbody>
                </table>
            </div>
            
           
            <div class="mt-4 text-center">
                {{ $pagination }}
            </div>
        </div>
    </div>
</div>