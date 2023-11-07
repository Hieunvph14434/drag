
<html>
    {{-- {{ HTML::style('css/table.css') }} --}}
    <table>
        <thead>
        <tr>
            <th>STT Ten Danh muc</th>
            <th>Ten Danh muc</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cates as $index => $cate)
            <tr>
                <th>{{ $index+1 }}</th>
                {{-- <th>{{ $loop->index+1 }}</th> --}}
                <td>{{ $cate->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</html>