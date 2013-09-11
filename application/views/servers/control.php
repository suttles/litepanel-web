<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<!-- Информация о сервере -->
				<h2>Информация о сервере #<?php echo $server['server_id'] ?></h2>
				<div class="row-fluid">
					<div class="span9">
						<table class="table table-striped table-condensed">
							<tr>
								<th scope="row">Игра</th>
								<td><?php echo $server['game_name'] ?></td>
							</tr>
							<tr>
								<th scope="row">Локация</th>
								<td><?php echo $server['location_name'] ?></td>
							</tr>
							<tr>
								<th scope="row">IP</th>
								<td><?php echo $server['location_ip'] ?>:<?php echo $server['server_port'] ?></td>
							</tr>
							<tr>
								<th scope="row">Слоты</th>
								<td><?php echo $server['server_slots'] ?></td>
							</tr>
							<tr>
								<th scope="row">Оплачен до</th>
								<td><?php echo date("d.m.Y", strtotime($server['server_date_end'])) ?> <a class="btn btn-info btn-mini" href="/servers/pay/index/<?php echo $server['server_id'] ?>"><i class="icon-shopping-cart"></i> Оплатить</a></td>
							</tr>
							<tr>
								<th scope="row">Статус</th>
								<td>
								<?php if($server['server_status'] == 0): ?> 
									<span class="label label-warning">Заблокирован</span>
								<?php elseif($server['server_status'] == 1): ?> 
									<span class="label label-important">Выключен</span>
								<?php elseif($server['server_status'] == 2): ?> 
									<span class="label label-success">Включен</span>
								<?php elseif($server['server_status'] == 3): ?> 
									<span class="label">Установка</span>
								<?php endif; ?> 
								</td>
							</tr>
						</table>
					</div>
					<div class="span3">
						<div class="btn-group-vertical" id="controlBtns">
							<?php if($server['server_status'] == 1): ?> 
							<button class="btn btn-success" onClick="sendAction(<?php echo $server['server_id'] ?>,'start')"><i class="icon-off"></i> Включить</button>
							<button class="btn btn-warning" onClick="openReinstall()"><i class="icon-refresh"></i> Переустановить</button>
							<?php elseif($server['server_status'] == 2): ?> 
							<button class="btn btn-danger" onClick="sendAction(<?php echo $server['server_id'] ?>,'stop')"><i class="icon-remove"></i> Выключить</button>
							<button class="btn btn-warning" onClick="sendAction(<?php echo $server['server_id'] ?>,'restart')"><i class="icon-refresh"></i> Перезапустить</button>
							<?php endif; ?> 
						</div>
					</div>
				</div>
				<h2>FTP доступ</h2>
				<table class="table table-striped table-condensed"> 
					<tr>
						<th scope="row">IP</th>
						<td><?php echo $server['location_ip'] ?></td>
					</tr>
					<tr>
						<th scope="row">Логин</th>
						<td>gs<?php echo $server['server_id'] ?></td>
					</tr>
					<tr>
						<th scope="row">Пароль</th>
						<td><?php echo $server['server_password'] ?></td>
					</tr>
				</table>
				<?php if($server['server_status'] == 2): ?>
				<h2>Статистика сервера #<?php echo $server['server_id'] ?></h2>
				<table class="table table-striped table-condensed">
					<?php if($query): ?> 
					<tr>
						<th scope="row">Название</th>
						<td><?php echo $query['hostname'] ?></td>
					</tr>
					<tr>
						<th scope="row">Игроки</th>
						<td><?php echo $query['players'] ?> / <?php echo $query['maxplayers'] ?></td>
					</tr>
					<tr>
						<th scope="row">Игровой режим</th>
						<td><?php echo $query['gamemode'] ?></td>
					</tr>
					<tr>
						<th scope="row">Карта</th>
						<td><?php echo $query['mapname'] ?></td>
					</tr>
					<?php endif; ?>
					<tr>
						<th scope="row">Нагрузка CPU</th>
						<td><?php echo $server['server_cpu_load'] ?></td>
					</tr>
					<tr>
						<th scope="row">Нагрузка RAM</th>
						<td><?php echo $server['server_ram_load'] ?></td>
					</tr>
				</table>
				<h3>Посещаемость за сутки</h3>
				<div class="well well-large">
					<div id="statsGraph" style="height: 220px;"></div>
				</div>
				<?php endif; ?>
				<!-- /Информация о сервере -->
				<h2>Редактирование сервера</h2>
				<form class="form-horizontal" action="#" id="editForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Пароль</legend>
						</div>
						<div class="control-group">
							<div class="controls">
							<label><input type="checkbox" id="editpassword" name="editpassword" onChange="togglePassword()"> Сменить пароль?</label>
						</div>
						</div>
							<div class="control-group">
							<!-- Пароль -->
							<label class="control-label" for="password">Пароль</label>
							<div class="controls">
								<input type="password" id="password" name="password" class="input-xlarge" disabled>
							</div>
						</div>
						<div class="control-group">
							<!-- Повтор пароля -->
							<label class="control-label" for="password">Повторите пароль</label>
							<div class="controls">
								<input type="password" id="password2" name="password2" class="input-xlarge" disabled>
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button class="btn btn-success"><i class="icon-ok"></i> Сохранить</button>
							</div>
						</div>
					</fieldset>
				</form>
				
				<!-- Подтверждение переустановки -->
				<div class="modal hide" id="reinstallServer">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3>Переустановка сервера</h3>
					</div>
					<div class="modal-body">
						<p>Вы уверенны, что Вы хотите переустановить сервер? Все данные будут потеряны.</p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</a>
						<a href="#" class="btn btn-danger" data-dismiss="modal" aria-hidden="true" onClick="sendAction(<?php echo $server['server_id'] ?>,'reinstall')">Переустановить</a>
					</div>
				</div>
				<!-- /Подтверждение переустановки -->
				
				<script>
					var serverStats = [
						<?php foreach($stats as $item): ?> 
						[<?php echo strtotime($item['server_stats_date'])*1000 ?>, <?php echo $item['server_stats_players'] ?>],
						<?php endforeach; ?> 
					];
					$.plot($("#statsGraph"), [serverStats], {
						xaxis: {
							mode: "time",
							timeformat: "%H:%M"
						},
						series: {
							lines: {
								show: true,
								fill: true
							},
							points: {
								show: true
							}
						},
						grid: {
							borderWidth: 0
						},
						colors: [ "#49AFCD" ]
					});
					
					function openReinstall(id) {
						$('#reinstallServer').modal('show');
					}
					$('#editForm').ajaxForm({ 
						url: '/servers/control/ajax/<?php echo $server['server_id'] ?>',
						dataType: 'text',
						success: function(data) {
							console.log(data);
							data = $.parseJSON(data);
							switch(data.status) {
								case 'error':
									showError(data.error);
									$('button[type=submit]').prop('disabled', false);
									break;
								case 'success':
									showSuccess(data.success);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
					
					function sendAction(serverid, action) {
						$.ajax({ 
							url: '/servers/control/action/'+serverid+'/'+action,
							dataType: 'text',
							success: function(data) {
								console.log(data);
								data = $.parseJSON(data);
								switch(data.status) {
									case 'error':
										showError(data.error);
										$('#controlBtns button').prop('disabled', false);
										break;
									case 'success':
										showSuccess(data.success);
										setTimeout("reload()", 1500);
										break;
								}
							},
							beforeSend: function(arr, options) {
								if(action == "reinstall") showWarning("Сервер будет переустановлен в течении 10 минут!");
								$('#controlBtns button').prop('disabled', true);
							}
						});
					}
					
					function togglePassword() {
						var status = $('#editpassword').is(':checked');
						if(status) {
							$('#password').prop('disabled', false);
							$('#password2').prop('disabled', false);
						} else {
							$('#password').prop('disabled', true);
							$('#password2').prop('disabled', true);
						}
					}
				</script>
<?php echo $footer ?>