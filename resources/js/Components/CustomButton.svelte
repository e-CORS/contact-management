<script>
    export let buttonText = "Button text";
    export let type = "normal";
</script>

<button
    type="submit"
    class="py-4 font-Public Sans font-normal text-lg bg-custom-purple text-center mt-14 text-white rounded-custom-rounded {type ==
    'small'
        ? 'w-32'
        : 'w-64'}">{buttonText}</button
>
