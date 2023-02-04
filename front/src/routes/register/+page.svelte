<script>
    let nome = "";
    let email = "";
    let senha = "";

    const createUser = async () => {

        const create = "http://localhost/avaliacao-web/back/create-user.php";
        const data = new FormData();
        data.append("nome", nome);
        data.append("email", email);
        data.append("senha", senha);

        fetch(create, {
            method: "POST",
            body: data,
        }); 
    };

</script>

<div class="img-fundo" />
<body>
    <div class="box">
        <form on:submit|preventDefault={createUser}>
            <input type="text" name="nome" id="nome" placeholder="digite seu nome" required bind:value={nome}/>
            <input type="text" name="email" id="email" placeholder="digite seu email" required bind:value={email}/>
            <input type="password" name="senha" id="senha" placeholder="digite sua passward" required bind:value={senha}/>
            <button>Register!</button>
        </form>
    </div>
</body>