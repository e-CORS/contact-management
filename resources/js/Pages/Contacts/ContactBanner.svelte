<script>
    import CustomButton from "../../Components/CustomButton.svelte";
    import uplaodIcon from "../../../img/upload.png";
    import { router } from "@inertiajs/svelte";

    export let contact;
    export let handleContactUpload;

    let currentPath = window.location.pathname;
    const handleContactEdit = () => {
        router.get(`/contact/${contact.id}/edit`);
    };
</script>

<div class="flex flex-col md:items-center w-full h-fit">
    <div class="w-full h-44 md:h-64 px-4 md:px-20 mt-6 md:mt-11">
        <div
            class="bg-custom-pink md:bg-custom-gray w-full h-full rounded-2xl relative flex flex-col justify-start md:justify-end items-center"
        >
            <img
                src={contact?.profilePicture}
                alt="Contact profile"
                class="relative top-2 w-20 h-20 md:bottom-0 md:w-44 md:h-44 rounded-full object-cover md:translate-y-1/4 border-2 border-black bg-white"
            />
            <h1
                class="md:hidden font-Red Hat Display font-bold text-2xl mt-8 mb-1 text-center"
            >
                {contact?.name}
            </h1>
            <p
                class="md:hidden font-Public Sans font-normal text-base mb-1 text-center text-custom-light-pink"
            >
                {contact?.title}
            </p>
            {#if !currentPath.includes("edit") && !currentPath.includes("create")}
                <div
                    tabindex="0"
                    role="button"
                    class="fixed md:right-6 bottom-6 md:hidden"
                    on:click={handleContactEdit}
                    on:keydown={handleContactEdit}
                >
                    <CustomButton buttonText="EDIT" type="normal" />
                </div>
                <div
                    tabindex="0"
                    role="button"
                    class="hidden md:flex absolute md:right-6 bottom-6"
                    on:click={handleContactEdit}
                    on:keydown={handleContactEdit}
                >
                    <CustomButton buttonText="EDIT" type="small" />
                </div>
            {:else}
                <div class="right-5 bottom-5 absolute">
                    <button on:click={handleContactUpload}>
                        <img src={uplaodIcon} alt="upload" />
                    </button>
                </div>
            {/if}
        </div>
    </div>
    <div class="mt-8 md:mt-24 flex flex-col md:items-center pl-4">
        <h1
            class="hidden md:flex font-Red Hat Display font-bold text-2xl mb-1 text-center"
        >
            {contact?.name}
        </h1>
        <p
            class="hidden md:flex font-Public Sans font-normal text-base mb-1 text-center text-custom-light-pink"
        >
            {contact?.title}
        </p>
    </div>
</div>
