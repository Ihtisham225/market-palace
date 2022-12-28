<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shops Report</title>
</head>
<body>
    <!--begin::Table-->
    <table border="1" style="border-collapse: collapse; border:2px;">
        <!--begin::Table head-->
        <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Type</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        @php
            $count = 1;
        @endphp
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @foreach($rows as $row)
            <tr>
                <td>
                    {{ $count }}</a>
                </td>
                <td>
                    {{ $row->name }}
                </td>
                <td>
                    {{ $row->shop_type->title }}
                </td>
                <td>
                    {{ $row->phone }}
                </td>
                <td>
                    {{ $row->email }}
                </td>
                <td>
                    {{ $row->address }}
                </td>
                </td>
                <td>
                    <span style="color:{{ $row->status == 1 ? 'blue;' : 'red;'}}">{{ $row->status == 1 ? 'Active' : 'Inactive' }}</span>
                </td>
            </tr>
            @php
                $count++;
            @endphp
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</body>
</html>