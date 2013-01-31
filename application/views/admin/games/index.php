<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Все игры</h2>
				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Статус</th>
							<th>Название</th>
							<th>Код</th>
							<th>Слоты</th>
							<th>Порты</th>
							<th>Стоимость</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($games as $item): ?> 
						<tr>
							<td>#<?php echo $item['game_id'] ?></td>
							<td>
							<?php if($item['game_status'] == 0): ?> 
								<span class="label label-important">Выключена</span>
							<?php elseif($item['game_status'] == 1): ?> 
								<span class="label label-success">Включена</span>
							<?php endif; ?> 
							</td>
							<td><?php echo $item['game_name'] ?></td>
							<td><?php echo $item['game_code'] ?></td>
							<td><?php echo $item['game_min_slots'] ?> - <?php echo $item['game_max_slots'] ?></td>
							<td><?php echo $item['game_min_port'] ?> - <?php echo $item['game_max_port'] ?></td>
							<td><?php echo $item['game_price'] ?></td>
							<td><a href="/admin/games/edit/index/<?php echo $item['game_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
						</tr>
						<?php endforeach; ?> 
						<tr>
							<td colspan="<?php if(empty($games)): ?>7<?php else: ?>8<?php endif; ?>" style="text-align: center;"><a href="/admin/games/create" class="btn">Создать игру</a></td>
						</tr>
					</tbody>
				</table>
				<?php echo $pagination ?> 
<?php echo $footer ?>