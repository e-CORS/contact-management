<script>
    export let inputName = "inputName";
    export let type = "text";
    export let placeholder = "";
</script>

<div class="w-full px-5 sm:px-0">
    <p class="font-Red Hat Display mb-2 font-bold text-xl">{inputName}</p>
    <input
        {type}
        {placeholder}
        class="bg-custom-pink pl-6 py-5 rounded-lg font-Public Sans w-full"
    />
</div>
