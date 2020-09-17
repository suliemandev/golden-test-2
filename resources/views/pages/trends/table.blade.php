<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Title</th>
                <th>status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(count($trends))
            @foreach($trends as $index => $trnd)
            <tr class="tr-shadow" data-id="{{$trnd->id}}">
                <td style="vertical-align: middle;">{{ $index+1 }}</td>
                <td>{{ $trnd->id }}</td>
                <td>
                    <span class="block-email" data-title-{{$trnd->id}}>{{ $trnd->title['en'] }}</span>
                </td>
                <td>
                    <span class="status--{{ $trnd->active ? 'process' : 'denied' }}" data-active-{{$trnd->id}}>{{ $trnd->active ? 'Active' : 'Disactive' }}</span>
                </td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit_trend('{{ $trnd->id }}')">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_trend('{{ $trnd->id }}')">
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
    {{$trends->links()}}
</div>