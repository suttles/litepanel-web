<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Все локации</h2>
				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Статус</th>
							<th>Название</th>
							<th>IP</th>
							<th>Пользователь</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($locations as $item): ?> 
						<tr>
							<td>#<?php echo $item['location_id'] ?></td>
							<td>
							<?php if($item['location_status'] == 0): ?> 
								<span class="label label-important">Выключена</span>
							<?php elseif($item['location_status'] == 1): ?> 
								<span class="label label-success">Включена</span>
							<?php endif; ?> 
							</td>
							<td><?php echo $item['location_name'] ?></td>
							<td><?php echo $item['location_ip'] ?></td>
							<td><?php echo $item['location_user'] ?></td>
							<td><a href="/admin/locations/edit/index/<?php echo $item['location_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
						</tr>
						<?php endforeach; ?> 
						<tr>
							<td colspan="<?php if(empty($locations)): ?>5<?php else: ?>6<?php endif; ?>" style="text-align: center;"><a href="/admin/locations/create" class="btn">Создать локацию</a></td>
						</tr>
					</tbody>
				</table>
				<?php echo $pagination ?> 
<?php echo $footer ?>