@section('title', 'Users')
<x-dashboard-layout>

    <x-admin.breadcrumb />
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <!-- Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
                                Add User
                            </button>

                            <x-modal modalTitle='Add User' modalId='addUser' static="true">
                                <x-form action="{{ route('user.store') }}" method="POST"
                                    formInsideWrapperStart="<div class='card-body'>" formInsideWrapperEnd="</div>"
                                    :fields="[
                                        [
                                            'type' => 'text',
                                            'name' => 'name',
                                            'id' => 'name',
                                            'placeholder' => 'Enter Your Name ... ',
                                            'label' => [
                                                'name' => 'Enter Your Name <i class=\'far fa-times-circle\'></i>',
                                                'class' => 'col-form-label',
                                            ],
                                            'class' => 'form-control',
                                            'inputWrapperStart' => '<div class=\'form-group\'>',
                                            'inputWrapperEnd' => '</div>',
                                        ],
                                        [
                                            'type' => 'text',
                                            'name' => 'email',
                                            'id' => 'email',
                                            'placeholder' => 'Enter Your Email ...',
                                            'label' => [
                                                'name' => 'Enter Your Email <i class=\'far fa-times-circle\'></i>',
                                                'class' => 'col-form-label',
                                            ],
                                            'class' => 'form-control',
                                            'inputWrapperStart' => '<div class=\'form-group\'>',
                                            'inputWrapperEnd' => '</div>',
                                        ],
                                    ]">
    <input type="submit" value="Submit">
                                </x-form>
                            </x-modal>

                            <!-- Search Filter -->
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 80vh;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allUsers as $user)
                                        @php
                                            $userRole = $user->role;
                                            $bgColour = null;
                                            $role = null;
                                            switch ($userRole) {
                                                case 0:
                                                    $bgColour = 'bg-primary';
                                                    $role = 'Admin';
                                                    break;

                                                case 1:
                                                    $bgColour = 'bg-indigo';
                                                    $role = 'Teacher';
                                                    break;

                                                case 2:
                                                    $bgColour = 'bg-success';
                                                    $role = 'Parent';
                                                    break;

                                                case 3:
                                                    $bgColour = '';
                                                    $role = 'Student';
                                                    break;

                                                default:
                                                    echo '...';
                                                    break;
                                            }
                                        @endphp
                                        <tr class="{{ $bgColour }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                            <td> {{ $role }} </td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <ion-icon class="deleteIcon" name="trash-outline"></ion-icon>
                                                    <ion-icon class="editIcon" name="create-outline"></ion-icon>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    @section('head')
        <style>
            .deleteIcon {
                color: rgba(168, 28, 28, 0.884);
                font: bolder;
                font-size: 25px;
                cursor: pointer;
            }

            .deleteIcon:hover {
                color: red;
            }

            .editIcon {
                cursor: pointer;
                color: rgba(133, 231, 133, 0.918);
                font: bolder;
                font-size: 25px;
            }

            .editIcon:hover {
                color: green;
            }
        </style>
    @endsection


</x-dashboard-layout>
