<h1>MetaQTV Administration</h1>

<p><a href="../">MetaQTV</a> | <a href=".">Refresh</a> | Logged in as: <?=$_SERVER['PHP_AUTH_USER']?></p>

<h2>Live commentary banner</h2>
<p>Live commentary announcement banner is  
<?php if (isCommentaryBannerOn()): ?>
enabled
<?php else: ?>
disabled
<?php endif; ?>
</p>
<form action="" method="post">
<input type="hidden" name="act" value="toggle_banner"/>
<input type="submit" value="toggle banner"/>
</form>

<h2>Servers</h2>
<table>
<thead><tr>
	<th>id</th>
	<th>order</th><th>name</th><th>hostname</th><th colspan='2'>ip</th><th>port</th>
	<th>state</th><th>errors</th><th>toggle</th><th colspan='2'>move</th><th>remove</th>
</tr></thead>
<tbody>
<?php foreach (getServerList() as $id => $server) : ?>
<tr>
	<th><?=$id?></th>
	<td><?=$server->order?></td>
	<td><?=$server->name?></td>
	<td><a href="http://<?=$server->hostname?>:<?=$server->port?>/"><?=$server->hostname?></a></td>
	<td><form action="" method="post">
		<input type="hidden" name="act" value="updateip" />
		<input type="hidden" name="server" value="<?=$id?>" />
		<input type="submit" value="update" /></form></td>
	<td><a href="http://<?=$server->ip?>:<?=$server->port?>/"><?=$server->ip?></a></td>
	<td><?=$server->port?></td>
	<td><?=$server->stateName()?></td>
	<td><?=$server->errors?></td>
	<td><? if ($server->isEnabled()) : ?>
		<form action="" method="post">
		<input type="hidden" name="act" value="disable" />
		<input type="hidden" name="server" value="<?=$id?>" />
		<input type="submit" value="disable" />
		</form>		
		<? else : ?>
		<form action="" method="post">
		<input type="hidden" name="act" value="enable" />
		<input type="hidden" name="server" value="<?=$id?>" />
		<input type="submit" value="enable" />
		</form>
		<? endif ?>
	</td>
	<td><form action="" method="post">
		<input type="hidden" name="act" value="setorder" />
		<input type="hidden" name="server" value="<?=$id?>" />
		<input type="hidden" name="order" value="<?=$server->order-1?>" />
		<input type="submit" value="up" /></form></td>
	<td><form action="" method="post">
		<input type="hidden" name="act" value="setorder" />
		<input type="hidden" name="server" value="<?=$id?>" />
		<input type="hidden" name="order" value="<?=$server->order+1?>" />
		<input type="submit" value="down" /></form></td>
	<td><form action="" method="post">
		<input type="hidden" name="act" value="delete" />
		<input type="hidden" name="server" value="<?=$id?>" />
		<input type="submit" value="delete" /></form></td>
</tr>
<?php endforeach ?>
</tbody>
</table>

<h2>Add Server</h2>
<?php
	formStart("add");
	formAddText("Hostname:", "hostname");
	formAddText("Port:", "port");
	formAddText("Name:", "name");
	formEnd();
?>
