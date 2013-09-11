<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
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
				<?php echo $pagination ?> 
<?php echo $footer ?>