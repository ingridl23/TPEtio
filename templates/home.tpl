
<div class="home">
    {if isset($smarty.session.loggeado)}
    <div>
        <img src="images/logueado.png" />
    </div>
    {else}
    <div>
        <img src="images/registrarse.png" />
    </div>
    {/if}
</div>