<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Все пользователи</h2>
				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>Статус</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>E-Mail</th>
							<th>Дата регистрации</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $item): ?> 
						<tr>
							<td>#<?php echo $item['user_id'] ?></td>
							<td>
							<?php if($item['user_status'] == 0): ?> 
								<span class="label label-important">Заблокирован</span>
							<?php elseif($item['user_status'] == 1): ?> 
								<span class="label label-success">Активен</span>
							<?php endif; ?> 
							</td>
							<td><?php echo $item['user_firstname'] ?></td>
							<td><?php echo $item['user_lastname'] ?></td>
							<td><?php echo $item['user_email'] ?></td>
							<td><?php echo date("d.m.Y", strtotime($item['user_date_reg'])) ?></td>
							<td><a href="/admin/users/edit/index/<?php echo $item['user_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
						</tr>
						<?php endforeach; ?>  
						<?php if(empty($users)): ?> 
						<tr>
							<td colspan="5" style="text-align: center;">На данный момент нет пользователей.</td>
						<tr>
						<?php endif; ?> 
					</tbody>
				</table>
				<?php echo $pagination ?> 
<?php echo $footer ?>