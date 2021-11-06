{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_x">Jaką kwotę kredytu potrzebujesz?: </label>
			<input id="id_x" type="text" name="x" value="{$form->x}" />
	</div>
        <div class="pure-control-group">
			<label for="id_y">Podaj okres kredytowania w latach: </label>
			<input id="id_y" type="text" name="y" value="{$form->y}" />
	</div>
		<div class="pure-control-group">
			<label for="id_z">Podaj wartość oprocentowania: </label>
			<input id="id_z" type="text" name="z" value="{$form->z}" />
	</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
	</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages inf">
	Wynik: {$res->result}
</div>
{/if}

{/block}