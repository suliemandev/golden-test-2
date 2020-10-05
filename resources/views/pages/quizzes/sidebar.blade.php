<h3 class="title-5 m-b-25">Quiz details</h3>
<div style="background-color: #fff; padding: 15px; position: relative;">
    @if($quiz)
      <!-- DATA TABLE -->
      <h5 class="mb-2">#{{$quiz->id}}</h5>
      <div class="form-group">
          <input type="text" disabled class="form-control mb-2" value="token: {{ $quiz->token }}">
      </div>

      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                    <th>#</th>
                    <th>Trends</th>
                    <th style="text-align: left;">Mark</th>
                  </tr>
              </thead>
              <tbody>
                  @if(count($quiz->trends_all))
                  @foreach($quiz->trends_all as $key => $trend)
                  <tr>
                    <td>#{{ $key+1 }}</td>
                    <td style="text-align: left;display:flex;align-items:center;justify-content:space-between; {{ $key < 3 ? 'background:#aaffaa;' : 'background: #e6ffaa;' }}">
                      <span>{{ isset($trend->title) ? $trend->title['ar'] : 's' }}</span>
                    </td>
                    <td style="text-align: left; {{ $key < 3 ? 'background:#aaffaa;' : 'background: #e6ffaa;' }}">
                        {{ $trend->mark }}
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="3" class="text-center">
                          <span>No trends found</span>
                      </td>
                  </tr>
                  @endif
              </tbody>
          </table>
      </div>
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Question</th>
                      <th>Answer</th>
                  </tr>
              </thead>
              <tbody>
                  @if(count($quiz->questions))
                  @foreach($quiz->questions as $key => $question)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td style="text-align: left;display:flex;align-items:center;justify-content:space-between">
                        <span>{{ $question->title['ar'] }}</span>
                      </td>
                      <td>
                        <span style="color: blue">{{ $question['answer'] }}</span>
                      </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="3" class="text-center">
                          <span>No questions found</span>
                      </td>
                  </tr>
                  @endif
              </tbody>
          </table>
      </div>
    @else
    <div class="alert alert-warning mb-0">No quiz selected</div>
    @endif
    <!-- END DATA TABLE-->
</div>