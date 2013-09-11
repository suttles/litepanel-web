<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Восставновление пароля</h2>
				<form class="form-horizontal" action="#" id="restoreForm" method="POST">
					<fieldset>
						<div class="control-group">
							<!-- E-Mail -->
							<label class="control-label" for="email">E-Mail</label>
							<div class="controls">
								<input type="text" id="email" name="email" placeholder="username@email.com" class="input-xlarge">
							</div>
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
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Восстановить</button>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					$('#restoreForm').ajaxForm({ 
						url: '/account/restore/ajax',
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
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>