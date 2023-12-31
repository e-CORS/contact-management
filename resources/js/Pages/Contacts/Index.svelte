<script>
    import Layout from "../../Layouts/Layout.svelte";
    import ContactCard from "../../Components/ContactCard.svelte";
    import CustomButton from "../../Components/CustomButton.svelte";
    import { router } from "@inertiajs/svelte";
    import noContactImg_1 from "../../../img/no_contacts_1.png";
    import noContactImg_2 from "../../../img/no_contacts_2.png";
    import noContactImg_3 from "../../../img/no_contacts_3.png";

    export let contacts;

    let filteredContacts = contacts;

    const handleSearch = (e) => {
        const searchingFor = e.target.value.toLowerCase();
        if (!searchingFor) {
            return (filteredContacts = contacts);
        }
        return (filteredContacts = contacts.filter((contact) =>
            contact.name.toLowerCase().includes(searchingFor),
        ));
    };

    const handleContactCardClick = (contactId) => {
        router.get(`/contact/${contactId}`);
    };

    const handleCreateContact = () => {
        router.get(`/contact/create`);
    };
</script>

<svelte:head>
    <title>Contacts</title>
</svelte:head>
<Layout>
    <div
        class="w-full h-full flex flex-col justify-start items-start"
        slot="content"
    >
        <div
            class="w-full h-full flex flex-col justify-center items-start mt-24 sm:px-20 px-5 mb-16"
        >
            <h1
                class="mb-9 font-Red Hat Display font-extrabold text-center text-4xl"
            >
                Contacts
            </h1>
            <div class="relative w-full">
                <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                >
                    <svg
                        class="w-4 h-4 text-gray-500 dark:text-gray-400"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                        />
                    </svg>
                </div>
                <input
                    type="search"
                    id="default-search"
                    on:input={handleSearch}
                    class="w-full py-4 pl-12 rounded-lg bg-white font-Public Sans shadow-md border-1 border-custom-pink h-11"
                />
            </div>
        </div>
        {#if filteredContacts.length > 0}
            <div
                class="grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid w-full h-full gap-x-24 gap-y-4 justify-cente px-5 md:px-20 lg:px-44"
            >
                {#each filteredContacts as contact, index}
                    <div
                        role="button"
                        tabindex={index}
                        key={contact.id}
                        on:click={() => handleContactCardClick(contact.id)}
                        on:keydown={() => handleContactCardClick(contact.id)}
                    >
                        <ContactCard
                            name={contact.name}
                            profilePicture={contact.profilePicture}
                            title={contact.title}
                        />
                    </div>
                {/each}
            </div>
        {:else}
            <div class="w-full flex flex-col items-center">
                <div class="relative w-full flex items-center justify-center">
                    <img
                        src={noContactImg_1}
                        alt="pink circle"
                        class="relative"
                    />
                    <img
                        src={noContactImg_2}
                        alt="3 users greyed out"
                        class="absolute"
                    />
                    <img
                        src={noContactImg_3}
                        alt="a diagonal vector"
                        class="absolute"
                    />
                </div>
                <p
                    class="font-Red Hat Display text-xl font-bold text-center mt-6 w-52"
                >
                    Add contacts to your database
                </p>
                <div
                    role="button"
                    tabindex="0"
                    on:click={handleCreateContact}
                    on:keydown={handleCreateContact}
                >
                    <CustomButton buttonText="Add new Contact" class="mt-9" />
                </div>
            </div>
        {/if}
    </div>
</Layout>
