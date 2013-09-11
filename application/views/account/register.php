<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Регистрация</h2>
				<form class="form-horizontal" action="#" id="registerForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Общая информация</legend>
						</div>
						<div class="control-group">
							<!-- Имя -->
							<label class="control-label" for="firstname">Имя</label>
							<div class="controls">
								<input type="text" id="firstname" name="firstname" placeholder="Иван" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Фамилия -->
							<label class="control-label" for="lastname">Фамилия</label>
							<div class="controls">
								<input type="text" id="lastname" name="lastname" placeholder="Иванов" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- E-Mail -->
							<label class="control-label" for="email">E-Mail</label>
							<div class="controls">
								<input type="text" id="email" name="email" placeholder="username@email.com" class="input-xlarge">
							</div>
						</div>
						<div id="legend">
							<legend>Пароль</legend>
						</div>
						<div class="control-group">
							<!-- Пароль -->
							<label class="control-label" for="password">Пароль</label>
							<div class="controls">
								<input type="password" id="password" name="password" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Повтор пароля -->
							<label class="control-label" for="password2">Повторите пароль</label>
							<div class="controls">
								<input type="password" id="password2" name="password2" class="input-xlarge">
							</div>
						</div>
						<div id="legend">
							<legend>Проверка</legend>
						</div>
						<div class="control-group">
							<!-- Введите символы с картинки -->
							<label class="control-label" for="captcha">Проверочный код</label>
							<div class="controls">
								<input type="text" id="captcha" name="captcha" class="input-small">
								<span class="help-inline"><img id="captchaimage" src="/main/captcha" onClick="reloadImage('#captchaimage')" title="Проверочный код"></span>
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Зарегистрироваться</button>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					$('#registerForm').ajaxForm({ 
						url: '/account/register/ajax',
						dataType: 'text',
						success: function(data) {
							console.log(data);
							data = $.parseJSON(data);
							switch(data.status) {
								case 'error':
									showError(data.error);
									reloadImage('#captchaimage');
									$('button[type=submit]').prop('disabled', false);
									break;
								case 'success':
									showSuccess(data.success);
									setTimeout("redirect('/')", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>
