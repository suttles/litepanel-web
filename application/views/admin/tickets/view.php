<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Запрос в службу поддержки #<?php echo $ticket['ticket_id'] ?></h2>
				<!-- Информация о тикете -->
				<table class="table table-striped table-condensed">
					<tr>
						<th scope="row">Заголовок</th>
						<td><?php echo $ticket['ticket_name'] ?></td>
					</tr>
					<tr>
						<th scope="row">Автор</th>
						<td><?php echo $ticket['user_firstname'] ?> <?php echo $ticket['user_lastname'] ?> <a href="/admin/users/edit/index/<?php echo $ticket['user_id'] ?>" class="btn btn-mini"><i class="icon-chevron-right"></i></a></td>
					</tr>
					<tr>
						<th scope="row">Дата создания</th>
						<td><?php echo date("d.m.Y в H:i", strtotime($ticket['ticket_date_add'])) ?></td>
					</tr>
					<tr>
						<th scope="row">Статус</th>
						<td>
							<?php if($ticket['ticket_status'] == 0): ?> 
							<span class="label label-important">Закрыт</span>
							<?php elseif($ticket['ticket_status'] == 1): ?> 
							<span class="label label-success">Открыт</span>
							<?php endif; ?> 
						</td>
					</tr>
				</table>
				<!-- /Информация о тикете -->
				
				<?php foreach($messages as $item): ?> 
				<h4><?php echo $item['user_firstname'] ?> <?php echo $item['user_lastname'] ?> написал:</h4>
				<p><?php echo nl2br($item['ticket_message']) ?></p>
				<div>
					<span class="label label-success">Опубликовано <?php echo date("d.m.Y в H:i", strtotime($item['ticket_message_date_add'])) ?></span>
				</div>
				<hr>
				<?php endforeach; ?> 
				<?php if($ticket['ticket_status'] == 1): ?> 
				<form class="form-horizontal" id="sendForm" action="#" method="POST">
					<fieldset>
						<div id="legend">
						<legend>Ответ</legend>
						</div>
						<div class="control-group">
							<!-- Текст -->
							<label class="control-label" for="text">Сообщение</label>
							<div class="controls">
								<textarea id="text" name="text" class="input-xxlarge" rows="3"></textarea>
							</div>
						</div>
						<div class="control-group">
							<!-- Закрыть запрос? -->
							<div class="controls">
								<label><input type="checkbox" id="closeticket" name="closeticket" onChange="toggleText()"> Закрыть запрос?</label>
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success btn-large"><i class="icon-ok"></i> Отправить</button>
							</div>
						</div>
					</fieldset>
				</form>
				
				<script>
					$('#sendForm').ajaxForm({ 
						url: '/admin/tickets/view/ajax/<?php echo $ticket['ticket_id'] ?>',
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
									$('#text').val('');
									setTimeout("reload()", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
					function toggleText() {
						var status = $('#closeticket').is(':checked');
						if(status) {
							$('#text').prop('disabled', true);
						} else {
							$('#text').prop('disabled', false);
						}
					}
				</script>
				<?php endif; ?> 
<?php echo $footer ?>
