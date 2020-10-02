<form action="" onsubmit="submit_add_trend(event)" class="trend-form">
	@csrf
	<div class="modal fade" id="trend_modal" tabindex="-1" role="dialog" aria-labelledby="trend_modal_label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="trend_modal_label">Add Trend</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
							<label for="trend" class=" form-control-label">Trend</label>
							<input type="text" name="title_ar" data-json="title" placeholder="مجال التعليم بالعربية*" class="form-control mb-2" required>
							<input type="text" name="title_he" data-json="title" placeholder="תחום בעברית" class="form-control mb-2">
							<input type="text" name="title_en" data-json="title" placeholder="Trend English" class="form-control mb-2">
					</div>
					<div class="form-check">
							<div class="checkbox">
									<label for="active" class="form-check-label">
											<input type="checkbox" id="active" name="active" value="1" class="form-check-input" checked>Active
									</label>
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary" >Confirm <div class="loader modal-loader" style="display: none"></div></button>
				</div>
			</div>
		</div>
	</div>
</form>