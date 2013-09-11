<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h1>Вход</h1>
				<form class="form-horizontal" id="loginForm" action="#" method="POST">
					<fieldset>
						<div class="control-group">
							<!-- E-Mail -->
							<label class="control-label"  for="email">E-Mail</label>
							<div class="controls">
								<input type="text" id="email" name="email" placeholder="username@email.com" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Пароль-->
							<label class="control-label" for="password">Пароль</label>
							<div class="controls">
								<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Вход</button> <a class="btn btn-mini" href="/account/restore">Забыли пароль?</a>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					$('#loginForm').ajaxForm({ 
						url: '/account/login/ajax',
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
