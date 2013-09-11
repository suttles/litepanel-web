<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Пополнение баланса</h2>				
				<form class="form-horizontal" action="#" id="payForm" method="POST">
					<fieldset>
						<div class="control-group">
							<!-- Сумма -->
							<label class="control-label" for="ammount">Сумма</label>
							<div class="controls">
								<input type="text" id="ammount" name="ammount" class="input-small" value="100.00"> руб
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button type="submit" class="btn btn-success"><i class="icon-ok"></i> Продолжить</button>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					$('#payForm').ajaxForm({ 
						url: '/account/pay/ajax',
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
									redirect(data.url);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>