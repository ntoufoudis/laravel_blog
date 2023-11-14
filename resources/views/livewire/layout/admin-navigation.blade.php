<div>
    <x-admin.top-navigation/>
    <aside
        id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r
            border-gray-200 sm:translate-x-0"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <!-- Dashboard -->
                <x-admin.nav-link name="dashboard" :href="route('dashboard')"/>
                <!-- Users -->
                <x-admin.nav-dropdown-button name="users">
                    <x-admin.nav-dropdown-link name="all users"/>
                    <x-admin.nav-dropdown-link name="add new user"/>
                    <x-admin.nav-dropdown-link name="profile"/>
                </x-admin.nav-dropdown-button>
            </ul>
        </div>
    </aside>
</div>
