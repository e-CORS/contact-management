<script>
    import Layout from "../../Layouts/Layout.svelte";
    import CustomInput from "../../Components/CustomInput.svelte";
    import CustomButton from "../../Components/CustomButton.svelte";
    import { router, useForm } from "@inertiajs/svelte";
    let form = useForm({
        email: null,
        password: null,
    });
    export let errors;

    function handleSubmit() {
        router.post("/login", form);
    }
</script>

<svelte:head>
    <title>Login</title>
</svelte:head>

<Layout>
    <div
        class="w-full h-full flex justify-center content-center md:mt-44"
        slot="content"
    >
        <div class="w-96 flex flex-col">
            <h1
                class="mb-12 font-Red Hat Display font-extrabold text-center text-4xl"
            >
                Welcome
            </h1>
            <form
                class="gap-y-5 flex-col flex justify-center items-center"
                on:submit|preventDefault={handleSubmit}
            >
                <CustomInput
                    inputName="Email"
                    type="text"
                    placeholder="jhon@doe.com"
                    bind:value={form.email}
                    error={errors?.email}
                />
                <CustomInput
                    inputName="Password"
                    type="password"
                    placeholder="**************"
                    bind:value={form.password}
                    error={errors?.password}
                />
                <CustomButton buttonText="Login" />
            </form>
        </div>
    </div>
</Layout>
