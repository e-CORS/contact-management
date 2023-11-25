<script>
    import img from "../../img/back_arrow.png";
    import { router } from "@inertiajs/svelte";
    let currentPath = window.location.pathname;
    function handleLogout() {
        router.post("/logout");
    }
    function handleBack() {
        router.get("/");
    }
</script>

<main class="w-screen h-screen bg-custom-light-pink">
    <header
        class="w-full h-24 sm:bg-custom-pink flex justify-start items-start"
    >
        {#if currentPath.includes("/contact/")}
            <div
                role="button"
                tabindex="0"
                class="px-11 py-9 flex items-center justify-center"
                on:click={handleBack}
                on:keydown={handleBack}
            >
                <img src={img} alt="back arrow" class="w-4 h-4 mr-2" />
                <button
                    class="font-Red Hat Display font-normal text-lg text-custom-light-pink"
                    >Back
                </button>
            </div>
        {:else if currentPath !== "/login"}
            <button
                on:click={handleLogout}
                class="px-11 py-9 font-Red Hat Display font-normal text-lg text-custom-light-pink"
                >Logout</button
            >
        {/if}
    </header>
    <body>
        <slot name="content" />
    </body>
</main>
