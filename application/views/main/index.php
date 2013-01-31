<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h1>Добро пожаловать!</h1>
				<table class="table table-striped table-condensed">
					<tr>
						<th scope="row">E-Mail</th>
						<td><?php echo $user_email ?></td>
					</tr>
					<tr>
						<th scope="row">Имя</th>
						<td><?php echo $user_firstname ?></td>
					</tr>
					<tr>
						<th scope="row">Фамилия</th>
						<td><?php echo $user_lastname ?></td>
					</tr>
					<tr>
						<th scope="row">Баланс</th>
						<td><?php echo $user_balance ?> рублей</td>
					</tr>
				</table>
				<h2>Мои сервера</h2>
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
							<td><a href="/servers/control/index/<?php echo $item['server_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
						</tr>
						<?php endforeach; ?> 
						<tr>
							<td colspan="<?php if(empty($servers)): ?>5<?php else: ?>6<?php endif; ?>" style="text-align: center;"><a href="/servers/order" class="btn">Заказать сервер</a></td>
						<tr>
					</tbody>
				</table>
				<h2>Мои запросы</h2>
				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Статус</th>
							<th>Тема</th>
							<th>Дата создания</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tickets as $item): ?> 
						<tr>
							<td>#<?php echo $item['ticket_id'] ?></td>
							<td>
								<?php if($item['ticket_status'] == 0): ?> 
								<span class="label label-importans">Закрыт</span>
								<?php elseif($item['ticket_status'] == 1): ?> 
								<span class="label label-success">Открыт</span>
								<?php endif; ?> 
							</td>
							<td><?php echo $item['ticket_name'] ?></td>
							<td><?php echo date("d.m.Y в H:i", strtotime($item['ticket_date_add'])) ?></td>
							<td><a href="/tickets/view/index/<?php echo $item['ticket_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
						</tr>
						<?php endforeach; ?> 
						<tr>
							<td colspan="<?php if(empty($tickets)): ?>4<?php else: ?>5<?php endif; ?>" style="text-align: center;"><a href="/tickets/create" class="btn">Создать запрос</a></td>
						<tr>
					</tbody>
				</table>
<?php echo $footer ?>