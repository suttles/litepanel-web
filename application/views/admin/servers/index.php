<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Все сервера</h2>
				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Статус</th>
							<th>Игра</th>
							<th>Локация</th>
							<th>IP</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($servers as $item): ?> 
						<tr>
							<td>#<?php echo $item['server_id'] ?></td>
							<td>
							<?php if($item['server_status'] == 0): ?> 
								<span class="label label-warning">Заблокирован</span>
							<?php elseif($item['server_status'] == 1): ?> 
								<span class="label label-important">Выключен</span>
							<?php elseif($item['server_status'] == 2): ?> 
								<span class="label label-success">Включен</span>
							<?php elseif($server['server_status'] == 3): ?> 
								<span class="label">Установка</span>
							<?php endif; ?> 
							</td>
							<td><?php echo $item['game_name'] ?></td>
							<td><?php echo $item['location_name'] ?></td>
							<td><?php echo $item['location_ip'] ?>:<?php echo $item['server_port'] ?></td>
							<td><a href="/admin/servers/control/index/<?php echo $item['server_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
						</tr>
						<?php endforeach; ?> 
						<?php if(empty($servers)): ?> 
						<tr>
							<td colspan="5" style="text-align: center;">На данный момент нет серверов.</td>
						<tr>
						<?php endif; ?> 
					</tbody>
				</table>
				<?php echo $pagination ?> 
<?php echo $footer ?>