  <div class="table-responsive table-responsive-data2">
      <table class="table table-data2">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Id</th>
                  <th>Title</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @if(count($professions))
              @foreach($professions as $index => $prof)
              <tr class="tr-shadow" data-id="{{$prof->id}}">
                  <td style="vertical-align: middle;">{{ $index+1 }}</td>
                  <td>{{ $prof->id }}</td>
                  <td>
                      <span class="block-email" data-title-{{$prof->id}}>{{ $prof->title['en'] }}</span>
                  </td>
                  <td>
                      <div class="table-data-feature">
                          <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_profession('{{ $prof->id }}')">
                              <i class="zmdi zmdi-edit"></i>
                          </button>
                          <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_profession('{{ $prof->id }}')">
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
      {{$professions->links()}}
  </div>