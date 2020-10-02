<form action="" onsubmit="submit_add_question(event)" class="question-form">
	@csrf
	<div class="modal fade" id="question_modal" tabindex="-1" role="dialog" aria-labelledby="question_modal_label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="question_modal_label">Add Question</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
							<label for="question" class=" form-control-label">Question</label>
							<input type="text" name="title_ar" data-json="title" placeholder="السوال بالعربية*" class="form-control mb-2" required>
							<input type="text" name="title_he" data-json="title" placeholder="שאלה בעברית" class="form-control mb-2">
							<input type="text" name="title_en" data-json="title" placeholder="Question English" class="form-control mb-2">
					</div>
					<div class="form-check">
							<div class="checkbox">
									<label for="active" class="form-check-label">
											<input type="checkbox" id="active" name="active" value="1" class="form-check-input" checked>Active
									</label>
							</div>
					</div>

					<div class="table-responsive m-b-40 mt-4">
							<table class="table table-borderless table-data3">
									<thead>
											<tr>
													<th style="border-right: 1px solid #fff; padding-left: 20px;">Trend</th>
													<th>Yes</th>
													<th>No</th>
													<th>Maybe</th>
											</tr>
									</thead>
									<tbody>
											@if(count($trends))
											@foreach($trends as $key => $trend)
											<tr>
													<td style="padding-left: 20px;border-right:1px solid #333;">{{ $trend->title['ar'] }}</td>
													<td>
															<input type="number" name="points_{{$trend->id}}_yes" data-json="points" value="0" class="form-control" style="width:60px;">
													</td>
													<td>
															<input type="number" name="points_{{$trend->id}}_no" data-json="points" value="0" class="form-control" style="width:60px;">
													</td>
													<td class="text-center">
															<input type="number" name="points_{{$trend->id}}_maybe" data-json="points" value="0" class="form-control" style="width:60px;">
													</td>
											</tr>
											@endforeach
											@else
											<tr>
													<td colspan="4" class="text-center">
															<span>No trends found</span>
													</td>
											</tr>
											@endif
									</tbody>
							</table>
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