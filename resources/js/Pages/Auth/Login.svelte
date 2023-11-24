<script>
    import Layout from "../../Layouts/Layout.svelte";
    import CustomInput from "../../Components/CustomInput.svelte";
    import CustomButton from "../../Components/CustomButton.svelte";
    import { onMount } from "svelte";

    let email = "";
    let password = "";

    onMount(() => {
        console.log("mounted");
    });

    function handleSubmit(e) {
        e.preventDefault();
        console.log(email, password);
    }
</script>

<svelte:head>
    <title>Login</title>
</svelte:head>

<Layout>
    <div
        class="w-full h-full flex justify-center content-center mt-44"
        slot="content"
    >
        <div class="w-96 flex flex-col">
            <h1
                class="mb-12 font-Red Hat Display font-extrabold text-center text-4xl"
            >
                Welcome
            </h1>
            <form
                action=""
                class="gap-y-5 flex-col flex justify-center items-center"
            >
                <CustomInput
                    inputName="Email"
                    type="text"
                    placeholder="jhon@doe.com"
                />
                <CustomInput
                    inputName="Password"
                    type="password"
                    placeholder="**************"
                />
                <CustomButton buttonText="Login" />
            </form>
        </div>
    </div>
</Layout>
