@extends('Layouts.app')
@section('title', 'Logs')

@section("content")
    <table class="table table-stripe">
        <tr>
            <th>Event</th>
            <th>Model</th>
            <th>Changes</th>
            <th>Updated At</th>
            <th>Created At</th>
        </tr>
    @foreach ($activity as $item)
        <tr>
            <td>{{ $item->description }}</td>
            <td>{{ $item->subject_type}}</td>
            <td>
                <button class="btn btn-success showHide" data-tid="{{ $item->id }}">Show/Hide</button>
                <div style="display: none" class="pt-1" id="d{{ $item->id }}">
                    @include('Elements.changes', ['changes' => $item->changes])

                </div>
            </td>
            <td>{{ $item->updated_at }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
    @endforeach
    </table>
    {{ $activity->links() }}
@endsection

@push('scripts')
    <script>
        $( document ).ready(function() {
            $( ".showHide" ).click(function() {
                $("#d"+ $(this).attr('data-tid')).toggle();
            });
        });
    </script>
@endpush



