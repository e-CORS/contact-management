<script>
    export let name = "jhon doe";
    export let profilePicture = "../../img/no_contacts_2";
    export let title = "CEO";
</script>

<div
    class="bg-white flex w-80 pl-7 items-center py-5 border-1 border-custom-pink rounded-2xl"
>
    <img
        src={profilePicture}
        alt="Contact profile"
        class="w-16 rounded-full mr-5 h-16"
    />
    <div class="flex flex-col">
        <p class="font-Red Hat Display font-bold text-lg mb-1">{name}</p>
        <p class="font-Public Sans text-sm">{title}</p>
    </div>
</div>
