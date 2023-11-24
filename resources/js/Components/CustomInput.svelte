<script>
    export let inputName = "inputName";
    export let type = "text";
    export let placeholder = "";
    export let error = "";
    export let value = "";
</script>

<div class="w-full px-5 sm:px-0">
    <p class="font-Red Hat Display mb-2 font-bold text-xl">{inputName}</p>
    {#if type == "text"}
        <input
            type="text"
            {placeholder}
            bind:value
            class="bg-custom-pink pl-6 py-5 rounded-lg font-Public Sans w-full"
        />
    {:else if type == "password"}
        <input
            type="password"
            {placeholder}
            bind:value
            class="bg-custom-pink pl-6 py-5 rounded-lg font-Public Sans w-full"
        />
    {/if}
    {#if error !== "" && error}
        <p class="text-red-400 font-Public Sans text-xl mt-4">{error}</p>
    {/if}
</div>
