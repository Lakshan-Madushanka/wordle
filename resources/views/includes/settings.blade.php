<x-modal @display-settings.window.stop="modelOpen = true">
    <div>
        <h1 class="text-xl text-center w-full font-medium uppercase">Settings</h1>
        <div class="flex justify-center mt-6">
            <div class="w-96">
                <div class="w-full flex justify-between text-lg border-y-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                    <p>Dark Theme</p>
                    <x-switch checkedStatus="$persist($store.darkMode.on).as('darkMode_on')" switchToggleAction="$store.darkMode.toggle()"/>
                </div>
            </div>
        </div>
    </div>
</x-modal>
