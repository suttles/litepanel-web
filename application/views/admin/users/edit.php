<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Редактирование пользователя</h2>
				<div class="btn-group">
					<a class="btn" href="/admin/servers/index?userid=<?php echo $user['user_id'] ?>">Сервера пользователя</a>
					<a class="btn" href="/admin/tickets/index?userid=<?php echo $user['user_id'] ?>">Тикеты пользователя</a>
					<a class="btn" href="/admin/invoices/index?userid=<?php echo $user['user_id'] ?>">Счета пользователя</a>
				</div>
				<form class="form-horizontal" action="#" id="editForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Основные параметры</legend>
						</div>
						<div class="control-group">
							<!-- Имя -->
							<label class="control-label"  for="firstname">Имя</label>
							<div class="controls">
								<input type="text" id="firstname" name="firstname" class="input-xlarge" value="<?php echo $user['user_firstname'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Фамилия -->
							<label class="control-label"  for="lastname">Фамилия</label>
							<div class="controls">
								<input type="text" id="lastname" name="lastname" class="input-xlarge" value="<?php echo $user['user_lastname'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Статус -->
							<label class="control-label" for="locationid">Статус</label>
							<div class="controls">
								<select id="status" name="status" class="input-small">
									<option value="0" <?php if($user['user_status'] == 0): ?>selected="selected"<?php endif; ?>>0 - Выкл</option>
									<option value="1" <?php if($user['user_status'] == 1): ?>selected="selected"<?php endif; ?>>1 - Вкл</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<!-- Баланс -->
							<label class="control-label" for="balance">Баланс</label>
							<div class="controls">
								<input type="text" id="balance" name="balance" class="input-small" value="<?php echo $user['user_balance'] ?>"> руб
							</div>
						</div>
						<div class="control-group">
							<!-- Статус -->
							<label class="control-label" for="locationid">Статус</label>
							<div class="controls">
								<select id="accesslevel" name="accesslevel" class="input-large">
									<option value="0" <?php if($user['user_access_level'] == 0): ?>selected="selected"<?php endif; ?>>0 - Демонстрация</option>
									<option value="1" <?php if($user['user_access_level'] == 1): ?>selected="selected"<?php endif; ?>>1 - Клиент</option>
									<option value="2" <?php if($user['user_access_level'] == 2): ?>selected="selected"<?php endif; ?>>2 - Техническая поддержка</option>
									<option value="3" <?php if($user['user_access_level'] == 3): ?>selected="selected"<?php endif; ?>>3 - Администрация</option>
								</select>
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
						url: '/admin/users/edit/ajax/<?php echo $user['user_id'] ?>',
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
