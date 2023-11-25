<script>
    import Layout from "../../Layouts/Layout.svelte";
    import ContactBanner from "./ContactBanner.svelte";
    export let contact;
    const contactInfo = {
        address: contact.address,
        email: contact.email,
        phone: contact.phone,
    };
</script>

<Layout>
    <div slot="content" class="flex flex-col md:items-center">
        <ContactBanner {contact} />
        <div
            class="grid grid-cols-[200px] md:grid-cols-[200px_200px] mt-8 md:mt-20 w-fit gap-6 md:gap-12 pl-4 pb-28"
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
</Layout>
