<script>
    export let contact;
</script>

<div>
    <div>
        <div>
            <img src={contact.profilePicture} alt="Contact profile" />
            <div>
                <button>Edit</button>
            </div>
        </div>
    </div>
    <div>
        <h1>{contact.name}</h1>
        <p>{contact.title}</p>
        <div>
            {#each Object.entries(contact) as [key, value]}
                <div>
                    <p>{key}</p>
                    <p>{value}</p>
                </div>
            {/each}
        </div>
    </div>
</div>
