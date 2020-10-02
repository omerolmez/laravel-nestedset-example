@php
    $data = array_keys($changes['attributes']);
@endphp
<table class="table table-stripte">
    <tr>
        <th colspan="2">Existing Data</th>
    </tr>
    @if (sizeof($data) > 0)
        @foreach ($data as $key)
            <tr>
                <th style="text-align: left; background: #4a5568">{{ $key }}</th>
                <td style="text-align: left;  background: #4a5568">{{ $changes['attributes'][$key] }}</td>
            </tr>
        @endforeach
    @endif
    @if (isset($changes['old']))
        @php
            $data = array_keys($changes['old']);
        @endphp
        <tr>
            <th colspan="2">Changes Data</th>
        </tr>
        @if (sizeof($data) > 0)
            @foreach ($data as $key)
                <tr>
                    <th style="text-align: left; background: cadetblue">{{ $key }}</th>
                    <td style="text-align: left;  background: cadetblue">{{ $changes['old'][$key] }}</td>
                </tr>
            @endforeach
        @endif
    @endif
</table>
