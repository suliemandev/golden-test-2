<form action="" onsubmit="submit_add_profession(event)" class="profession-form">
	@csrf
	<div class="modal fade" id="profession_modal" tabindex="-1" role="dialog" aria-labelledby="profession_modal_label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="profession_modal_label">Add Profession</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <div class="form-group">
                        <label for="profession" class=" form-control-label">Profession</label>
                        <input type="text" name="title_ar" data-json="title" placeholder="*التخصص بالعربية" class="form-control mb-2" required>
                        <input type="text" name="title_he" data-json="title" placeholder="התמחות בעברית" class="form-control mb-2">
                        <input type="text" name="title_en" data-json="title" placeholder="Profession English" class="form-control mb-2">
		                <select class="form-control" name="trendID" required>
		                	<option value="" selected>Choose a trend</option>
		                    @foreach($trends as $trend)
		                    <option value="{{$trend->id}}">{{ $trend->title['ar'] }}</option>
		                    @endforeach
		                </select>
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