<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h1>Создание запроса</h1>
				<form class="form-horizontal" action="#" id="createForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Общая информация</legend>
						</div>
						<div class="control-group">
							<!-- Период оплаты -->
							<label class="control-label" for="months">Тема</label>
							<div class="controls">
								<input type="text" id="name" name="name" class="input-large">
							</div>
						</div>
						<div class="control-group">
							<!-- Стоимость -->
							<label class="control-label" for="text">Сообщение</label>
							<div class="controls">
								<textarea id="text" name="text" class="input-xxlarge" rows="5"></textarea>
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Создать</button>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					$('#createForm').ajaxForm({ 
						url: '/tickets/create/ajax',
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
									setTimeout("redirect('/tickets/view/index/" + data.id + "')", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>