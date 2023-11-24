<script>
    import { router } from "@inertiajs/svelte";
    let currentPath = window.location.pathname;

    function handleLogout() {
        router.post("/logout");
    }
</script>

<main class="w-full h-screen bg-custom-light-pink">
    <header class="w-full h-24 sm:bg-custom-pink flex justify-end items-start">
        {#if currentPath !== "/login"}
            <button on:click={handleLogout} class="p-4">Logout</button>
        {/if}
    </header>
    <body>
        <slot name="content" />
    </body>
</main>
