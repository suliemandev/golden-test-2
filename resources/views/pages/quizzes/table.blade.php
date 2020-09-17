  <div class="table-responsive table-responsive-data2">
      <table class="table table-data2">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Id</th>
                  <th>Token</th>
                  <th>Client Id</th>
                  <th>Top trends</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @if(count($quizzes))
              @foreach($quizzes as $index => $qz)
              <tr class="tr-shadow" data-id="{{$qz->id}}">
                  <td style="vertical-align: middle;">{{ $index+1 }}</td>
                  <td>{{ $qz->id }}</td>
                  <td>{{ $qz->token }}</td>
                  <td>{{ $qz->client_id }}</td>
                  <td>
                      <ul>
                          @foreach($qz['trends'] as $trend)
                              <li>{{ $trend->title['en'] }}</li>
                          @endforeach
                      </ul>
                  </td>
                  <td>
                      <div class="table-data-feature">
                          <button class="item" data-toggle="tooltip" data-placement="top" title="Result" onclick="edit_quiz('{{ $qz->id }}')">
                              <i class="zmdi zmdi-mail-send"></i>
                          </button>
                          <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_quiz('{{ $qz->id }}')">
                              <i class="zmdi zmdi-delete"></i>
                          </button>
                      </div>
                  </td>
              </tr>
              <tr class="spacer"></tr>
              @endforeach
              @else
              <tr>
                  <td colspan="5" class="text-center">
                      <div class="alert alert-danger mb-0">Empty table</div>
                  </td>
              </tr>
              @endif

          </tbody>
      </table>
  </div>
  <div class="paginator">
      {{$quizzes->links()}}
  </div>