<div>
    <div class="container" style="padding: 30px 0;">
        <style>
            nav svg{
                height: 20px;
            }

            nav.hidden{
                display: block !important;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>

                                <th>#</th>
                                <th>ຊື່</th>
                                <th>ອີເມວ</th>
                                <th>ເບີໂທລະສັັບ</th>
                                <th>Comment</th>
                                <th>Creted At</th>

                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->comment}}</td>
                                        <td>{{$contact->created_at}}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
