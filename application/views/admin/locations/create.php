<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Создание локации</h2>
				<form class="form-horizontal" action="#" id="createForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Основные параметры</legend>
						</div>
						<div class="control-group">
							<!-- Название -->
							<label class="control-label" for="name">Название</label>
							<div class="controls">
								<input type="text" id="name" name="name" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- IP -->
							<label class="control-label" for="ip">IP</label>
							<div class="controls">
								<input type="text" id="ip" name="ip" class="input-xlarge">
							</div>
						</div>
						<div class="control-group">
							<!-- Пользователь -->
							<label class="control-label" for="user">Пользователь</label>
							<div class="controls">
								<input type="text" id="user" name="user" class="input-xlarge">
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
							<label class="control-label" for="password">Повторите пароль</label>
							<div class="controls">
								<input type="password" id="password2" name="password2" class="input-xlarge">
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
									<option value="0">0 - Выключена</option>
									<option value="1">1 - Включена</option>
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
					$('#createForm').ajaxForm({ 
						url: '/admin/locations/create/ajax',
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
									setTimeout("redirect('/admin/locations')", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>
