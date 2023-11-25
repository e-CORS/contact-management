<script>
    import Layout from "../../Layouts/Layout.svelte";
    import CustomButton from "../../Components/CustomButton.svelte";
    import { router } from "@inertiajs/svelte";
    export let contact;
    const contactInfo = {
        address: contact.address,
        email: contact.email,
        phone: contact.phone,
    };
    const handleContactEdit = () => {
        console.log("calling...");
        router.get(`/contact/${contact.id}/edit`);
    };
    const isMobile = () => {
        window.innerWidth < 425;
    };
</script>

<Layout>
    <div slot="content">
        <div class="w-full h-44 md:h-64 px-4 md:px-20 mt-6 md:mt-11">
            <div
                class="bg-custom-pink md:bg-custom-gray w-full h-full rounded-2xl relative flex flex-col justify-start md:justify-end items-center"
            >
                <img
                    src={contact.profilePicture}
                    alt="Contact profile"
                    class="relative top-2 w-20 h-20 md:bottom-0 md:w-44 md:h-44 rounded-full object-cover md:translate-y-1/4 border-2 border-black"
                />
                <h1
                    class="md:hidden font-Red Hat Display font-bold text-2xl mt-8 mb-1 text-center"
                >
                    {contact.name}
                </h1>
                <p
                    class="md:hidden font-Public Sans font-normal text-base mb-1 text-center text-custom-light-pink"
                >
                    {contact.title}
                </p>
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
            </div>
        </div>
        <div class="mt-8 md:mt-24 flex flex-col md:items-center pl-4 pb-28">
            <h1
                class="hidden md:static font-Red Hat Display font-bold text-2xl mb-1 text-center"
            >
                {contact.name}
            </h1>
            <p
                class="hidden md:static font-Public Sans font-normal text-base mb-1 text-center text-custom-light-pink"
            >
                {contact.title}
            </p>
            <div
                class="grid grid-cols-[200px] md:grid-cols-[200px_200px] md:mt-20 w-fit gap-6 md:gap-12"
            >
                {#each Object.entries(contactInfo) as [key, value]}
                    <div class="flex flex-col items-start">
                        <p
                            class="font-Red Hat Display font-bold text-xl mb-3 capitalize"
                        >
                            {key}
                        </p>
                        <p
                            class="font-Public Sans font-normal text-base mb-1 text-custom-light-pink capitalize text-left"
                        >
                            {value}
                        </p>
                    </div>
                {/each}
            </div>
        </div>
    </div>
</Layout>
