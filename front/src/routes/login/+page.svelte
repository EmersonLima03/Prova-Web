<script>
    let email = "";
    let senha = "";

    const submit = async () => {
        const auth = "http://localhost/avaliacao-web/back/auth.php";

        const data = new FormData();
        data.append("email", email);
        data.append("senha", senha);

        const res = await fetch(auth, {
            method: "POST",
            body: data,
            credentials: "include",
        });

        if (!res.ok) {
            alert("Usuário ou senha incorreto");
            return;
        }

        localStorage.setItem("logado", "true");
        window.location.href = "/";
    };
</script>

<body>
    <div class="box">
        <form on:submit|preventDefault={submit}>
            <input type="text" placeholder="Digite seu email" id="email" bind:value={email}/>
            <input type="password" placeholder="Digite sua senha" id="senha" bind:value={senha}/>
            <button>Login!</button>
        </form>
    </div>
</body>