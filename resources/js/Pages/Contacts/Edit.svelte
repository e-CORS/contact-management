<script>
    import Layout from "../../Layouts/Layout.svelte";
    import ContactBanner from "./ContactBanner.svelte";
    import CustomInput from "../../Components/CustomInput.svelte";
    import CustomButton from "../../Components/CustomButton.svelte";
    import { router, useForm } from "@inertiajs/svelte";

    export let errors;
    export let contact;

    let editableContactInfo = {
        name: { value: "", type: "text" },
        address: { value: "", type: "text" },
        title: { value: "", type: "text" },
        phone: { value: "", type: "text" },
        profilePicture: { value: "", type: "text" },
        email: { value: "", type: "text" },
    };
    let form = useForm({});

    function handleCancel() {
        editableContactInfo = {
            name: { value: "", type: "text" },
            address: { value: "", type: "text" },
            title: { value: "", type: "text" },
            phone: { value: "", type: "text" },
            profilePicture: { value: "", type: "text" },
            email: { value: "", type: "text" },
        };
    }
    function handleContactUpload() {
        for (const [key, value] of Object.entries(editableContactInfo)) {
            if (value.value) {
                form[key] = value.value;
            } else {
                form[key] = contact[key];
            }
        }
        router.post(`/contact/${contact.id}/edit`, form);
        handleCancel();
    }
</script>

<Layout>
    <div slot="content">
        <div class="hidden md:flex">
            <ContactBanner {contact} {handleContactUpload} />
        </div>
        <form class="flex flex-col items-start md:items-center">
            <div
                class="grid grid-cols-[343px] md:grid-cols-[343px_343px] md:mt-8 w-fit md:gap-x-20 gap-y-3 pl-4 pb-28 md:pb-0"
            >
                {#each Object.entries(editableContactInfo) as [key, value]}
                    <div class="flex flex-col items-start">
                        <CustomInput
                            inputName={key.charAt(0).toUpperCase() +
                                key.slice(1)}
                            type={value.type}
                            placeholder={contact[key]}
                            bind:value={editableContactInfo[key].value}
                            error={errors?.[key]}
                        />
                    </div>
                {/each}
            </div>
        </form>
        <div
            class="w-full fixed bottom-7 md:hidden flex justify-center gap-x-3"
        >
            <div
                role="button"
                tabindex="0"
                on:click={handleCancel}
                on:keydown={handleCancel}
            >
                <CustomButton buttonText="CANCEL" type="small" />
            </div>
            <div
                role="button"
                tabindex="0"
                on:click={handleContactUpload}
                on:keydown={handleContactUpload}
            >
                <CustomButton buttonText="SAVE" type="small" />
            </div>
        </div>
    </div>
</Layout>
