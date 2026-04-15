@extends('layouts.admin')
@section('content')

<div class="content">

    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>Quotes</li>
            </ul>

            <ul class="breadcrumb-elements">
                <a href="{{ route('quote.create') }}" class="btn btn-success">Create</a>
            </ul>

            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="panel-title">

                            @if($informations->isNotEmpty())

                                <table class="table table-striped">
                                    <tr>
                                        <th>Sn:</th>
                                        <th>Quote</th>
                                        <th>Action</th>
                                    </tr>

                                    @php $sn = 1 @endphp

                                    @foreach($informations as $quote)

                                        <tr>
                                            <td>{{ $sn++ }}</td>

                                            <td>
                                                {{ \Illuminate\Support\Str::limit($quote->message, 100) }}
                                            </td>

                                            <td>
                                                {{ Form::open(['method' => 'delete', 'route' => ['quote.destroy', $quote->id]]) }}

                                                <a href="{{ route('quote.edit', $quote->id) }}"
                                                   class="btn btn-primary btn-sm">
                                                    Edit
                                                </a>

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('You want to delete?');">
                                                    Delete
                                                </button>

                                                {{ Form::close() }}
                                            </td>
                                        </tr>

                                    @endforeach

                                </table>

                            @else
                                <h3>No Quotes Added</h3>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection