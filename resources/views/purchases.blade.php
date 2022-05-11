@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-bordered" id="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Figure</th>
                        <th scope="col">Address</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($purchases as $purchase)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $purchase->figure->name }}</td>
                            <td>{{ $purchase->address . ', ' . $purchase->postcode . ', ' . $purchase->city . ', ' . $purchase->state }}
                            </td>
                            <td>{{ $purchase->created_at }}</td>
                            <td>{{ ucfirst($purchase->status) }}</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="/purchase/view/{{ $purchase->id }}">View</a>
                                @if ($purchase->status == 'pending')
                                    <a type="button" class="btn btn-primary"
                                        href="/purchase/edit/{{ $purchase->id }}">Edit</a>
                                @endif
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    onclick="deletePurchase('{{ $purchase->figure->name }}', '{{ $purchase->created_at }}', '{{ $purchase->id }}')">Delete</button>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <form action="purchase/delete" method="POST">
                                @csrf
                                <input type="hidden" name="purchase_id" id="purchase_id" value="">
                                <button type="submit" class="btn btn-primary"
                                    onclick="deletePurchaseConfirm()">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePurchase(pname, pdate, id) {
            $('.modal-body').text('Are you sure to delete ' + pname + ' bought at ' + pdate);
            $('#purchase_id').val(id);
        }
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection
