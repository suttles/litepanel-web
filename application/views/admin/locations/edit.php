<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Редактирование локации</h2>
				<a class="btn btn-danger pull-right" href="/admin/locations/edit/delete/<?php echo $location['location_id'] ?>">Удалить локацию</a>
				<div class="btn-group">
					<a class="btn" href="/admin/servers/index?locationid=<?php echo $location['location_id'] ?>">Сервера локации</a>
				</div>
				<form class="form-horizontal" action="#" id="editForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Основные параметры</legend>
						</div>
						<div class="control-group">
							<!-- Название -->
							<label class="control-label" for="name">Название</label>
							<div class="controls">
								<input type="text" id="name" name="name" class="input-xlarge" value="<?php echo $location['location_name'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- IP -->
							<label class="control-label" for="ip">IP</label>
							<div class="controls">
								<input type="text" id="ip" name="ip" class="input-xlarge" value="<?php echo $location['location_ip'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Пользователь -->
							<label class="control-label" for="user">Пользователь</label>
							<div class="controls">
								<input type="text" id="user" name="user" class="input-xlarge" value="<?php echo $location['location_user'] ?>">
							</div>
						</div>
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
						<div id="legend">
							<legend>Прочее</legend>
						</div>
						<div class="control-group">
							<!-- Статус -->
							<label class="control-label" for="status">Статус</label>
							<div class="controls">
								<select id="status" name="status" class="input-large">
									<option value="0" <?php if($location['location_status'] == 0): ?>selected="selected"<?php endif; ?>>0 - Выключена</option>
									<option value="1" <?php if($location['location_status'] == 1): ?>selected="selected"<?php endif; ?>>1 - Включена</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Сохранить</button>
							</div>
						</div>
					</fieldset>
				</form>
				
				<script>
					$('#editForm').ajaxForm({ 
						url: '/admin/locations/edit/ajax/<?php echo $location['location_id'] ?>',
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
