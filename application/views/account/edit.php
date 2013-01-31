<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Редактирование профиля</h2>
				<form class="form-horizontal" action="#" id="editForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Основные параметры</legend>
						</div>
						<div class="control-group">
							<!-- Имя -->
							<label class="control-label"  for="firstname">Имя</label>
							<div class="controls">
								<input type="text" id="firstname" name="firstname" class="input-xlarge" value="<?php echo $user['firstname'] ?>">
							</div>
						</div>
						<div class="control-group">
							<!-- Фамилия -->
							<label class="control-label"  for="lastname">Фамилия</label>
							<div class="controls">
								<input type="text" id="lastname" name="lastname" class="input-xlarge" value="<?php echo $user['lastname'] ?>">
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
						url: '/account/edit/ajax',
						dataType: 'text',
						success: function(data) {
							console.log(data);
							data = $.parseJSON(data);
							switch(data.status) {
								case 'error':
									showError(data.error);
									break;
								case 'success':
									showSuccess(data.success);
									break;
							}
							$('button[type=submit]').prop('disabled', false);
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