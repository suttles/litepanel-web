<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<h2>Оплата сервера</h2>
				<form class="form-horizontal" action="#" id="payForm" method="POST">
					<fieldset>
						<div id="legend">
							<legend>Общая информация</legend>
						</div>
						<div class="control-group">
							<!-- Период оплаты -->
							<label class="control-label" for="months">Период оплаты</label>
							<div class="controls">
								<select id="months" name="months" onChange="updatePrice()">
									<option value="1">1 месяц</option>
									<option value="3">3 месяца (-5%)</option>
									<option value="6">6 месяцев (-10%)</option>
									<option value="12">12 месяцев (-15%)</option>
								</select>
							</div>
						</div>
						<div id="legend">
							<legend>Стоимость</legend>
						</div>
						<div class="control-group">
							<!-- Стоимость -->
							<label class="control-label" for="price">Стоимость</label>
							<div class="controls">
								<input type="text" id="price" class="input-small">
							</div>
						</div>
						<div class="control-group">
							<!-- Кнопка -->
							<div class="controls">
								<button class="btn btn-success"><i class="icon-ok"></i> Оплатить</button>
							</div>
						</div>
					</fieldset>
				</form>
				<script>
					$('#payForm').ajaxForm({ 
						url: '/servers/pay/ajax/<?php echo $server['server_id'] ?>',
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
					
					$(document).ready(function() {
						updatePrice();
					});
					
					function updatePrice() {
						var price = <?php echo $server['game_price'] ?> * <?php echo $server['server_slots'] ?>;
						var months = $("#months option:selected").val();
						switch(months) {
							case "3":
								price = 3*price*0.95;
								break;
							case "6":
								price = 6*price*0.90;
								break;
							case "12":
								price = 12*price*0.85;
								break;
						}
						$('#price').val(price.toFixed(2) + ' руб.');
					}
				</script>
<?php echo $footer ?>
