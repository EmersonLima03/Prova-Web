
<script>
    import { onMount } from "svelte";

  const logout = async () => {
    fetch("http://localhost/avaliacao-web/back/logout.php", {
      credentials: "include",
    });
    localStorage.removeItem("logado");
    location.reload();
  };

    let modelo = "";
    let ano = "";
    let cor = "";
    let placa = "";
    let carros = [];
    let logado = "";

    const postcar = async () => {
        const postRoute = "http://localhost/avaliacao-web/back/create-car.php";
        const dado = new FormData();
        dado.append("modelo", modelo);
        dado.append("ano", ano);
        dado.append("cor", cor);
        dado.append("placa", placa);
        let res = await fetch(postRoute, {
            method: "POST",
            body: dado,
            credentials: "include",
        });
        if (!res.ok) {
            alert("erro: não foi possível postar as informações");
            return;
        }
        ocarro();
    };

    const ocarro = async () => {
        const loadRoute = "http://localhost/avaliacao-web/back/get-usercarro.php";
        const res = await fetch(loadRoute, {
            credentials: "include",
        });
        carros = await res.json();
    };

    onMount(() => {
        ocarro();
        logado = localStorage.getItem('logado');
    });

    const deletecarros = async (id) => {
        const data = new FormData();
        data.append("id", id);
        const deleteRoute = "http://localhost/avaliacao-web/back/deletecarro.php";
        const res = await fetch(deleteRoute, {
            method: "POST",
            body: data,
            credentials: "include",
        })
        if(!res.ok){
            alert("erro: não foi possível deletar o objeto");
            return;
        }
        ocarro();
    }


</script>


<body>
    {#if logado != 'true'}
    <div class="box">
        <h1>bem-vindo</h1>
        
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </div>
    {:else}
    <button id="logout" type="button" on:click={logout}>Logout</button>
    <form on:submit|preventDefault={postcar}>
        <input type="text" placeholder="seu modelo" id="modelo" bind:value={modelo}/>
        <input type="text" placeholder="Seu ano" id="ano" bind:value={ano}/>
        <input type="text" placeholder="Sua cor" id="cor" bind:value={cor}/>
        <input type="text" placeholder="Sua placa" id="placa" bind:value={placa}/>
        <button>Send</button>
    </form>
    {#each carros as car }
        {car.CAR_MODELO} {car.CAR_ANO} {car.CAR_COR} {car.CAR_PLACA}
        <span on:click={() => deletecarros(car.CAR_ID)}>&times;</span>
        <br>
    {/each}
    {/if}
</body> 


